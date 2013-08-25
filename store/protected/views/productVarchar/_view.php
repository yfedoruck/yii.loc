<?php
/* @var $this ProductVarcharController */
/* @var $data ProductVarchar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->value_id), array('view', 'id'=>$data->value_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute_id')); ?>:</b>
	<?php echo CHtml::encode($data->attribute_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity_id')); ?>:</b>
	<?php echo CHtml::encode($data->entity_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>