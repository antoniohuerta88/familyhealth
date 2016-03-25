<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
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
		<div class="col-sm-8"><?php echo $form->textField($model,'id',array('class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'diagnostic',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'diagnostic',array('size'=>60,'maxlength'=>2000,'class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'treatment',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'treatment',array('size'=>60,'maxlength'=>2000,'class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'appointmentdate',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'appointmentdate',array('class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'completed',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'completed',array('class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'patientuserid',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'patientuserid',array('class' => 'form-control')); ?></div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'doctoruserid',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8"><?php echo $form->textField($model,'doctoruserid',array('class' => 'form-control')); ?></div>
	</div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?php echo CHtml::submitButton('Buscar', array('class' => 'btn btn-default')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->