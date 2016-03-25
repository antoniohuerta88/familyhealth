<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i> Inicio de sesion </h4>
    <p>Por favor llena el formulario con tu informacion:</p>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions'=>array(
                'class' => 'form-horizontal'
            ),
        )); ?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'username',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->textField($model,'username',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
                <div class="col-sm-8">
                    <?php echo $form->passwordField($model,'password',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    <?php echo $form->label($model,'rememberMe'); ?>
                    <?php echo $form->error($model,'rememberMe'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <?php echo CHtml::submitButton('Iniciar sesion', array('class' => 'btn btn-default')); ?>
                </div>
            </div>
    <?php $this->endWidget(); ?>
</div>