<?php
/* @var $this ProductVarcharController */
/* @var $model ProductVarchar */

$this->breadcrumbs=array(
	'Product Varchars'=>array('index'),
	$model->value_id,
);

$this->menu=array(
	array('label'=>'List ProductVarchar', 'url'=>array('index')),
	array('label'=>'Create ProductVarchar', 'url'=>array('create')),
	array('label'=>'Update ProductVarchar', 'url'=>array('update', 'id'=>$model->value_id)),
	array('label'=>'Delete ProductVarchar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductVarchar', 'url'=>array('admin')),
);
?>

<h1>View ProductVarchar #<?php echo $model->value_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'value_id',
		'attribute_id',
		'entity_id',
		'value',
	),
)); ?>
