<div id="file-uploader"></div>
 
<?php
 
$filesPath = realpath(Yii::app()->basePath . "/../upload");
$filesUrl = Yii::app()->baseUrl . "/upload";

$filesPathDropbox = realpath(Yii::app()->basePath . "/../Dropbox");
$filesUrlDropbox = Yii::app()->baseUrl . "/Dropbox";
 
$this->widget("ext.ezzeelfinder.ElFinderWidget", array(
    'selector' => "div#file-uploader",
    'clientOptions' => array(
        'lang' => "ru",
        'resizable' => false,
        'wysiwyg' => "ckeditor",
        'contextmenu' => array( 'files' => array('getfile', '|','open', 'quicklook', 'editimage', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info') ),
        'uiOptions' => array(
			'toolbar' => array(
				array('back', 'forward'),
				array('netmount'),
				array('mkdir', 'mkfile', 'upload'),
				array('quicklook', 'editimage'),
				//array('editimage'),
				//array(),
				//array(),
				//array(''),
			),
		),
    ),
    'connectorRoute' => "admin/fileUploaderConnector",
    'connectorOptions' => array(
        'roots' => array(
            array(
                'driver'  => "LocalFileSystem",
                'path' => $filesPath,
                'URL' => $filesUrl,
                'tmbPath' => $filesPath . DIRECTORY_SEPARATOR . ".tmb",		// .tmb is default setting. You can set some other dir name.
                //'tmbPath' => $filesPath . DIRECTORY_SEPARATOR,			//disable
                //'tmbDir' => $filesPath . '/_tmbn',
                'mimeDetect' => "internal",
                'accessControl' => "access"
            ),
			array(
				'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
				'path'          => $filesPathDropbox,         // path to files (REQUIRED)
				'URL'           => $filesUrlDropbox, // URL to files (REQUIRED)
				'tmbPath' => $filesPathDropbox . DIRECTORY_SEPARATOR . ".tmb",		// default
				//'tmbPath' => $filesPathDropbox . DIRECTORY_SEPARATOR,				//disable
				//'tmbDir' =>  $filesPathDropbox . DIRECTORY_SEPARATOR,
				'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
			),
        )
    )
));

?>
<?php 
$cs = Yii::app()->clientScript->registerScriptFile( Yii::app()->baseUrl . '/js/dropbox.js' ); 
$cs = Yii::app()->clientScript->registerScript(
	'elfinder-instance-on-page-load',
	'$(window).load(function() {
			elFinder.prototype.i18.en.messages["cmdeditimage"] = "Edit Image";
			elFinder.prototype._options.commands.push("editimage");
			elFinder.prototype.commands.editimage = function() {
				this.exec = function(hashes) {
					 console.log("hallo");
					 //do whatever
				}
				this.getstate = function() {
					//return 0 to enable, -1 to disable icon access
					return 0;
				}
			}
		Dropbox.init();
	});'
);
?>

<?
//$this->widget('ext.ckeditor.CKEditorWidget',array(
  //"model"=>$this,                 # Data-Model
  //"attribute"=>'body',          # Attribute in the Data-Model
  //"defaultValue"=>"Test Text",     # Optional
 //
  //# Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
  //"config" => array(
      //"height"=>"400px",
      //"width"=>"100%",
      //"toolbar"=>"Basic",
      //'filebrowserBrowseUrl' => $this->createUrl("admin/fileUploader")
      //),
 //
  //#Optional address settings if you did not copy ckeditor on application root
  //"ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                  //# Path to ckeditor.php
  //"ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                  //# Realtive Path to the Editor (from Web-Root)
  //) );
?>
