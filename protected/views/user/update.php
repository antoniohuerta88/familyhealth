<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizando',
);

$this->menu=array(
	array('label'=>'Lista de usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar usuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>