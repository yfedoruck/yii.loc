<?php
/* @var $this ProductVarcharController */
/* @var $model ProductVarchar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-varchar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'attribute_id'); ?>
		<?php echo $form->textField($model,'attribute_id'); ?>
		<?php echo $form->error($model,'attribute_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_id'); ?>
		<?php echo $form->textField($model,'entity_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'entity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->