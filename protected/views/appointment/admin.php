<?php
/* @var $this AppointmentController */
/* @var $model Appointment */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	'Administrando',
);

$this->menu=array(
	array('label'=>'Lista de citas', 'url'=>array('index')),
	array('label'=>'Crear una cita', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#appointment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="form-panel">
    
<h4 class="mb"><i class="fa fa-angle-right"></i>Administrando citas</h4>


<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'appointment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'diagnostic',
		'treatment',
		'appointmentdate',
		'completed',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>