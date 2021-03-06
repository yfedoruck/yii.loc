<?php

class DropboxController extends Controller
{
	public $dropbox;
	public $dropboxBasePath;
	
	public function init(){
		$app = Yii::app();
		$consumerKey = $app->params['dropbox']['appKey'];
		$consumerSecret = $app->params['dropbox']['appSecret'];
		$this->dropboxBasePath = Yii::app()->basePath . '/../Dropbox/';
		//$session = $app->session;
		//var_dump($consumerKey); die;
		require 'protected/vendor/Dropbox/autoload.php';
		session_start();
		
		spl_autoload_unregister(array('YiiBase','autoload'));
		//Yii::registerAutoloader(array('Dropbox_autoload','autoload'));
		$oauth = new Dropbox_OAuth_PHP($consumerKey, $consumerSecret);
		
		spl_autoload_register(array('YiiBase','autoload'));

		$this->dropbox = new Dropbox_API($oauth);

		// There are multiple steps in this workflow, we keep a 'state number' here
		if (isset($_SESSION['state'])) {
			$state = $_SESSION['state'];
		} else {
			$state = 1;
		}
		switch($state) {

			/* In this phase we grab the initial request tokens
			   and redirect the user to the 'authorize' page hosted
			   on dropbox */
			case 1 :
				//echo "Step 1: Acquire request tokens\n";
				$tokens = $oauth->getRequestToken();
				//print_r($tokens);

				// Note that if you want the user to automatically redirect back, you can
				// add the 'callback' argument to getAuthorizeUrl.
				//echo "Step 2: You must now redirect the user to:\n";
				//echo $oauth->getAuthorizeUrl() . "\n";
				$_SESSION['state'] = 2;
				$_SESSION['oauth_tokens'] = $tokens;
				header('location: '.$oauth->getAuthorizeUrl());
				die();

			/* In this phase, the user just came back from authorizing
			   and we're going to fetch the real access tokens */
			case 2 :
				echo "Step 3: Acquiring access tokens\n";
				$oauth->setToken($_SESSION['oauth_tokens']);
				$tokens = $oauth->getAccessToken();
				print_r($tokens);
				$_SESSION['state'] = 3;
				$_SESSION['oauth_tokens'] = $tokens;
				// There is no break here, intentional

			/* This part gets called if the authentication process
			   already succeeded. We can use our stored tokens and the api 
			   should work. Store these tokens somewhere, like a database */
			case 3 :
				//echo "The user is authenticated\n";
				//echo "You should really save the oauth tokens somewhere, so the first steps will no longer be needed\n";
				//print_r($_SESSION['oauth_tokens']);
				//$oauth->setToken($_SESSION['oauth_tokens']);
				$oauth->setToken( array('token' => $app->params['dropbox']['token'], 'token_secret' => $app->params['dropbox']['token_secret']) );

				break;
		}
		parent::init();
		//var_dump( $this->dropbox->getAccountInfo() );
		//yii::d( $this->dropbox->getMetaData('/') );
	}
	
	public function actionIndex(){
	}

	public function actionDownload(){
		$dropboxData = $this->dropbox->getMetaData( $this->_prepareFile($_REQUEST['dir']) );
		//$dropboxData = $this->dropbox->getMetaData('/');
		$content = $dropboxData['contents'];
		$localPath = realpath(Yii::app()->basePath . "/../Dropbox");

		usort($content, function ($b, $a) {
			if ($a['is_dir'] === $b['is_dir'])
				return 0;
			return ($a['is_dir']) ? +1 : -1;
		});
		foreach ($content as $file) {
			$tmp = explode('/', ltrim($file['path'], '/'));
			$tmpExt = substr(strrchr(end($tmp), '.'), 1);
			$i['name'] = str_replace('.' . $tmpExt, '', end($tmp));
			$i['extension'] = '.' . strtolower(substr(strrchr(end($tmp), '.'), 1));
			$i['path'] = $file['path'];
			$i['mimetype'] = (!empty($file['mime_type'])) ? $file['mime_type'] : null;
			$i['type'] = $file['is_dir'] ? 'dir' : 'file';
			$i['size'] = ($file['bytes'] !== 0) ? $file['size'] : '';
			$i['id'] = 0;
			$i["date"] = $file["modified"];
			//error_reporting(E_ALL);
			//yii::d($file); 
			//die;
			if( $file['is_dir'] === false && !empty($file["is_deleted"]) ){
				if ($file["is_deleted"]) {
					$i["is_deleted"] = true;
				} else {
					$i["is_deleted"] = false;
				}
			}
			//write files and create folders to local Dropbox
			if( !file_exists($localPath . $file['path']) ){
				if($file['is_dir'] === true){
					mkdir($localPath . $file['path'], 0777);
				}else{
					$f = fopen($localPath . $file['path'], 'w+');
					fwrite($f, $this->dropbox->getFile($file['path']));
					fclose($f);
				}
			}

			$files[] = $i;
		}
	}
	
	public function actionUpload(){
		//yii::D($_REQUEST);
		if( !$_REQUEST['file'] ){
			throw new Exception ("There is no files");
		}

		foreach( $_REQUEST['file'] as $file ){
			chmod(Yii::app()->basePath . "/../" .$file['path'], 0775 );
			try{
				if($file['mime'] !== 'directory'){
					$this->dropbox->putFile( $this->_prepareFile($file['path']), $file['path'] );
				}else {
					$this->dropbox->createFolder( $this->_prepareFile($file['path']) );
					$paths = $this->_walkdir(Yii::app()->basePath . "/../" .$file['path']);
					foreach($paths as $path){
						if( !is_dir($path) ){
							$path = $this->_cutBaseDxDir($path);
							try{
								$this->dropbox->putFile( $path, 'Dropbox/'.$path );
							}catch(Exception $e){ echo $e->getMessage(); }
						}
					}
				}
			}catch(Exception $e){ echo $e->getMessage(); }
		}
	}
	
	public function actionRename(){
		//if( !$_REQUEST['file']['old'] || !$_REQUEST['file']['renew'] ){ throw new Exception ("There is no files"); }
		try{
			$this->dropbox->move( $this->_prepareFile($_REQUEST['file']['old']['path']), $this->_prepareFile($_REQUEST['file']['renew']['path']) );
		}catch(Exception $e){ echo $e->getMessage(); }
	}
	
	public function actionRemove(){
		//yii::D($_REQUEST);
		if( empty($_REQUEST['file']) ){
			//throw new Exception ("There is no files");
			return;
		}
		foreach( $_REQUEST['file'] as $file ){
			try{
				$this->dropbox->delete( $this->_prepareFile($file) );
			}catch(Exception $e){ echo $e->getMessage(); }
		}
	}

	protected function _prepareFile($file){
		//$file = preg_replace('/(\s)/', '\ ', $file);
		//echo 'file is = '.$file;
		//var_dump(preg_replace('/^Dropbox\/?/', '', $file));
		return preg_replace('/^Dropbox\/?/', '', $file);
	}
	
	protected function _walkdir($dir){
		$objects = new RecursiveIteratorIterator (new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
		$items = array();
		foreach ($objects as $name => $object){ 
			$items[] = $name;
		}
		return $items;
	}
	
	protected function _cutBaseDxDir($path){
		return str_replace($this->dropboxBasePath, '', $path);
	}
}
?>
