<?php
/* @var $this ProductVarcharController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Varchars',
);

$this->menu=array(
	array('label'=>'Create ProductVarchar', 'url'=>array('create')),
	array('label'=>'Manage ProductVarchar', 'url'=>array('admin')),
);
?>

<h1>Product Varchars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
