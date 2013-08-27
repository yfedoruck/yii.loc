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
        'wysiwyg' => "ckeditor"
    ),
    'connectorRoute' => "admin/fileUploaderConnector",
    'connectorOptions' => array(
        'roots' => array(
            array(
                'driver'  => "LocalFileSystem",
                'path' => $filesPath,
                'URL' => $filesUrl,
                'tmbPath' => $filesPath . DIRECTORY_SEPARATOR . ".thumbs",
                'mimeDetect' => "internal",
                'accessControl' => "access"
            ),
			array(
				'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
				'path'          => $filesPathDropbox,         // path to files (REQUIRED)
				'URL'           => $filesUrlDropbox, // URL to files (REQUIRED)
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
		  Dropbox.init()
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
