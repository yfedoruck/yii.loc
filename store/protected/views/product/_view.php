<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	<b><?php //yii::ms($data); 
    //$x = $data->productVarchars;
     echo CHtml::encode($data->productVarchars[0]->attribute->getAttribute('frontend_label')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->productVarchars[0]->value), array('view', 'id'=>$data->entity_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sku')); ?>:</b>
	<?php echo CHtml::encode($data->sku); ?>
	<br />

	<b><?php echo CHtml::encode($data->productVarchars[1]->attribute->getAttribute('frontend_label')); ?>:</b>
	<?php echo CHtml::encode($data->productVarchars[1]->value); ?>
	<br />


</div>