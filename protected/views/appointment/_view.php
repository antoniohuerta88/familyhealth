<?php
/* @var $this AppointmentController */
/* @var $data Appointment */
?>

<blockquote>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed')); ?>:</b>
	<?php echo CHtml::encode($data->completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient')); ?>:</b>
	<?php echo CHtml::encode($data->patient->profile->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor')); ?>:</b>
	<?php echo CHtml::encode($data->doctor->profile->fullname); ?>
	<br />
</blockquote>