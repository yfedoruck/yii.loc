<?php
/* @var $this ProductVarcharController */
/* @var $model ProductVarchar */

$this->breadcrumbs=array(
	'Product Varchars'=>array('index'),
	$model->value_id=>array('view','id'=>$model->value_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductVarchar', 'url'=>array('index')),
	array('label'=>'Create ProductVarchar', 'url'=>array('create')),
	array('label'=>'View ProductVarchar', 'url'=>array('view', 'id'=>$model->value_id)),
	array('label'=>'Manage ProductVarchar', 'url'=>array('admin')),
);
?>

<h1>Update ProductVarchar <?php echo $model->value_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>