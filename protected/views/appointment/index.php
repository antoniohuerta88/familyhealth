<?php
/* @var $this AppointmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citas',
);

$this->menu=array(
	array('label'=>'Crear una cita', 'url'=>array('create')),
	array('label'=>'Administrar cita', 'url'=>array('admin')),
);
?>
<div class="form-panel">
    
<h4 class="mb"><i class="fa fa-angle-right"></i>Citas</h4>

<?php  if(!Yii::app()->user->checkAccess('Paciente')) { ?>
<a class="btn btn-default" href="<?php echo Yii::app()->request->baseUrl; ?>/appointment/DownloadReport" role="button">Export to excel</a>
<?php
}
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>