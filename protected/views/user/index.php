<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<div class="form-panel">
    
<h4 class="mb"><i class="fa fa-angle-right"></i>Usuarios</h4>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>