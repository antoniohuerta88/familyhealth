<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form-panel">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array(
        'class' => 'form-horizontal'
    ),
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'id',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'id'); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'username',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'email',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'profileid',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'profileid'); ?></div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->