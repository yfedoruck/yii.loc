<?php
die('ok');
error_reporting(E_ALL);
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
//
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//
require_once($yii);

Yii::createWebApplication($config)->run();

var_dump( Yii::app()->basePath . "/../files");
//$oauth = new OAuth('yf30i5vf7z1nw1g', 'qh4htpryawnc4ng');
//$r = $oauth->getRequestToken('https://api.dropbox.com/1/oauth/request_token');
//$oauth->setToken($r["oauth_token"], $r["oauth_token_secret"]);

//$r->getAccessToken('https://api.dropbox.com/1/oauth/access_token');



//spl_autoload_unregister(array('YiiBase','autoload'));    
//Yii::registerAutoloader(array('Dropbox_autoload','autoload'));
//$consumerKey = '***';
//$consumerSecret = '***';
//$oauth = new Dropbox_OAuth_PHP($consumerKey, $consumerSecret);
//
//try {
   //$oauth = new Dropbox_OAuth_PHP($consumerKey, $consumerSecret);
   //$dropbox = new Dropbox_API($oauth);            
   //$info = $dropbox->getMetaData('Files');
//} catch (Exception $e) {
   //$error = "error: " . $e->getMessage();
//}
//spl_autoload_register(array('YiiBase','autoload'));
