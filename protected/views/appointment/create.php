<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	'Creando',
);

$this->menu=array(
	array('label'=>'Lista de citas', 'url'=>array('index')),
	array('label'=>'Administrar cita', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
