<?php
/* @var $this AppointmentController */
/* @var $data Appointment */
?>


<blockquote>
    <b>
    <?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    
    <?php  if(Yii::app()->user->checkAccess('Doctor')) { ?>
    
    <?php echo CHtml::link(CHtml::encode($data->id . '  -> Iniciar cita'), array('appointment/update', 'id'=>$data->id)); ?>
    
    <?php } else if (Yii::app()->user->checkAccess('Paciente') || Yii::app()->user->checkAccess('Admin')) {?>
    
    <?php echo CHtml::link(CHtml::encode($data->id . '  -> Ver'), array('view', 'id'=>$data->id)); ?>
    
    <?php } ?>
    
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diagnostic')); ?>:</b>
	<?php echo $data->diagnostic; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatment')); ?>:</b>
	<?php echo $data->treatment; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appointmentdate')); ?>:</b>
	<?php echo CHtml::encode($data->appointmentdate); ?>
	<br />
</blockquote>