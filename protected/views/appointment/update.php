<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de citas', 'url'=>array('index')),
	array('label'=>'Crear una cita', 'url'=>array('create')),
	array('label'=>'Ver cita', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar cita', 'url'=>array('admin')),
);
?>

<h1>Actualizar cita <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>