<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_flag'); ?>
		<?php echo $form->textField($model,'social_flag',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'social_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_profile'); ?>
		<?php echo $form->textField($model,'social_profile',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'social_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_name'); ?>
		<?php echo $form->textField($model,'social_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'social_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_img'); ?>
		<?php echo $form->textField($model,'social_img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'social_img'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->