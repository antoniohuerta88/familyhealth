<?php
/* @var $this UserController */
/* @var $data User */
?>

<blockquote>

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile.fullname')); ?>:</b>
	<?php echo CHtml::encode($data->profile->Fullname); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('profile.address')); ?>:</b>
	<?php echo CHtml::encode($data->profile->address); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('profile.phone')); ?>:</b>
	<?php echo CHtml::encode($data->profile->phone); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('profile.birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->profile->birthdate); ?>
	<br />

</blockquote>