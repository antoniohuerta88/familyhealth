<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i>Creando usuario</h4>
    
    <?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
        }
    ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
                'class' => 'form-horizontal'
        ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
	</div>
    
     <?php 
        if(Yii::app()->user->checkAccess('Admin'))
        { 
     ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
        </div>
	</div>
    
    <?php 
        } 
    ?>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	    </div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model->profile,'firstname',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'firstname',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'firstname'); ?>
	</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model->profile,'lastname',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'lastname',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'lastname'); ?>
	</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model->profile,'address',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'address',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'address'); ?>
	</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model->profile,'phone',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'phone',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'phone'); ?>
	</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model->profile,'birthdate',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php 
            
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model' => $model->profile,
                'attribute' => 'birthdate',
                'options'=>array(
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' =>$model->profile->birthdate,
                    'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1940:2050'
                ),
                'htmlOptions'=>array(
                    'class'=>'form-control'
                ),
            ));
         ?>
		<?php echo $form->error($model->profile,'birthdate'); ?>
	</div>
	</div>


    
    <?php 
        if(Yii::app()->user->checkAccess('Admin'))
        {
            $roles = Yii::app()->authManager->getRoles();
            $ld=CHtml::listData($roles,'name','name');
            echo CHtml::dropDownList('role','',$ld, array('options' => array($model->Role=>array('selected'=>true))
            //, 'ajax'=>array('type'=>'GET','url'=>$this->createUrl('user/update',array('id'=>$model->id)),'data' =>array('role'=>'js:this.value'),
            //,'onchange'=>'window.location.href = "' . $this->createUrl('user/update',array('id'=>$model->id)) . '?role="')
            ));        
        }
     ?>
     
	<div class="form-group">
		<?php echo $form->labelEx($model->profile,'licencenumber',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'licencenumber',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'licencenumber'); ?>
	</div>
	</div>
    
	<div class="form-group">
		<?php echo $form->labelEx($model->profile,'speciality',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
		<div class="col-sm-8">
        <?php echo $form->textField($model->profile,'speciality',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
		<?php echo $form->error($model->profile,'speciality'); ?>
	</div>
	</div>

	<div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
		    <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-default')); ?>
	    </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->