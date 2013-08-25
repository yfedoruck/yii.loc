<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->entity_id,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->entity_id)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->entity_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->entity_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'entity_id',
		'sku',
	),
)); 



$this->widget('ext.ckeditor.CKEditorWidget',array(
  "model"=>$model,                 # Data-Model
  "attribute"=>'content',          # Attribute in the Data-Model
  "defaultValue"=>"Test Text",     # Optional
 
  # Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
  "config" => array(
      "height"=>"400px",
      "width"=>"100%",
      "toolbar"=>"Basic",
      ),
 
  #Optional address settings if you did not copy ckeditor on application root
  "ckEditor"=>Yii::app()->basePath."/../ckeditor/ckeditor.php",
                                  # Path to ckeditor.php
  "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
                                  # Realtive Path to the Editor (from Web-Root)
  ) );
?>
