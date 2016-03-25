<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<div class="form-panel">
    
<h4 class="mb"><i class="fa fa-angle-right"></i>Viendo usuario #<?php echo $model->id; ?></h4>

<?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
        }
    ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
		'profile.Fullname',
        'profile.address',
        'profile.phone',
        'profile.birthdate',
        'profile.licencenumber',
        'profile.speciality',
	),
)); ?>

</div>