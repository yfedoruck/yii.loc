<?php
/* @var $this ProductVarcharController */
/* @var $model ProductVarchar */

$this->breadcrumbs=array(
	'Product Varchars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductVarchar', 'url'=>array('index')),
	array('label'=>'Manage ProductVarchar', 'url'=>array('admin')),
);
?>

<h1>Create ProductVarchar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>