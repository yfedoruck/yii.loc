<?php
/* @var $this EavAttributeController */
/* @var $model EavAttribute */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'attribute_id'); ?>
		<?php echo $form->textField($model,'attribute_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attribute_code'); ?>
		<?php echo $form->textField($model,'attribute_code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frontend_label'); ?>
		<?php echo $form->textField($model,'frontend_label',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->