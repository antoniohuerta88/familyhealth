<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrando',
);

$this->menu=array(
	array('label'=>'Lista de usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<<div class="form-panel">
    
<h4 class="mb"><i class="fa fa-angle-right"></i>Administrando usuarios</h4>


<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'email',
		'profileid',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>