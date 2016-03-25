<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de citas', 'url'=>array('index')),
	array('label'=>'Crear una cita', 'url'=>array('create')),
	array('label'=>'Actualizar cita', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar una cita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar cita', 'url'=>array('admin')),
);
?>

<div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                
                <h4 class="mb"><i class="fa fa-angle-right"></i>Ver cita #<?php echo $model->id; ?></h4>

                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'attributes'=>array(
                        'id',
                        array(               // related city displayed as a link
                            'label'=>'Diagnostic',
                            'type'=>'raw',
                            'value'=>$model->diagnostic,
                        ),
                        array(               // related city displayed as a link
                            'label'=>'Treatment',
                            'type'=>'raw',
                            'value'=>$model->treatment,
                        ),
                        'appointmentdate',
                        'completed',
                        'doctor.profile.fullname',
                        'doctor.profile.licencenumber',
                    ),
                )); ?>

        <div/>
    <div/>
<div/>