<?php
/* @var $this EavAttributeController */
/* @var $model EavAttribute */

$this->breadcrumbs=array(
	'Eav Attributes'=>array('index'),
	$model->attribute_id,
);

$this->menu=array(
	array('label'=>'List EavAttribute', 'url'=>array('index')),
	array('label'=>'Create EavAttribute', 'url'=>array('create')),
	array('label'=>'Update EavAttribute', 'url'=>array('update', 'id'=>$model->attribute_id)),
	array('label'=>'Delete EavAttribute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->attribute_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>View EavAttribute #<?php echo $model->attribute_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'attribute_id',
		'attribute_code',
		'frontend_label',
	),
)); ?>
