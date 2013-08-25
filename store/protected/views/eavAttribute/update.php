<?php
/* @var $this EavAttributeController */
/* @var $model EavAttribute */

$this->breadcrumbs=array(
	'Eav Attributes'=>array('index'),
	$model->attribute_id=>array('view','id'=>$model->attribute_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EavAttribute', 'url'=>array('index')),
	array('label'=>'Create EavAttribute', 'url'=>array('create')),
	array('label'=>'View EavAttribute', 'url'=>array('view', 'id'=>$model->attribute_id)),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>Update EavAttribute <?php echo $model->attribute_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>