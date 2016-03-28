<?php
/* @var $this AppointmentController */
/* @var $model Appointment */
/* @var $form CActiveForm */
Yii::import('ext.krichtexteditor.KRichTextEditor');
Yii::import('ext.YiiDateTimePicker.jqueryDateTime');

?>
<div class="form-panel">
    <h4 class="mb"><i class="fa fa-angle-right"></i>Creando una cita</h4>
    
    <?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
        }
    ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'appointment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
                'class' => 'form-horizontal'
        ),
    )); ?>

	<p class="note">Los campos con un <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php 

     if(!Yii::app()->user->checkAccess('Doctor'))
    {
        
    ?> 

	<div class="form-group">
        <?php echo $form->labelEx($model,'diagnostic',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
        <div class="col-sm-8">
        <?php 
            $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                'model' => $model,
                'attribute' => 'appointmentdate',
                'options' => array(
                    'inline'=>true, 
                    'minDate'=>0,
                    'step'=>10,
                'allowTimes' => array(
                    '08:00',
                    '08:20',
                    '08:40',
                    '09:00',
                    '09:20',
                    '09:40',
                    '10:00',
                    '10:20',
                    '10:40',
                    '11:00',
                    '11:20',
                    '11:40',
                    '12:00',
                    '12:20',
                    '12:40',
                    '13:00',
                    '13:20',
                    '13:40',
                    '15:30',
                    '15:50',
                    '16:10',
                    '16:30',
                    '16:50',
                    '17:10',
                    '17:30',
                    '17:50',
                    '18:10',
                    '18:30',
                    '18:50',
                    '19:10',
                    '19:30',
                    '19:50',)
                ), //DateTimePicker options
                'htmlOptions' => array('class' => 'form-control'),
            ));
        ?>
        <?php echo $form->error($model,'appointmentdate'); ?>
        </div>
    </div>
    
    <?php 
    }
    ?>
    
    <?php 
    
    if(!Yii::app()->user->checkAccess('Paciente'))
    {
        
    ?> 
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'diagnostic',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
        <div class="col-sm-8">
            <?php 
            $this->widget('KRichTextEditor', array(
                    'model' => $model,
                    'value' => $model->isNewRecord ? '' : $model->diagnostic,
                    'attribute' => 'diagnostic',
                    'options' => array(
                        'theme_advanced_resizing' => 'true',
                        'theme_advanced_statusbar_location' => 'bottom',
                    ),
                ));
            ?>
            <?php echo $form->error($model,'diagnostic'); ?>
        </div>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'treatment',array('class' => 'col-sm-2 col-sm-2 control-label')); ?>
        <div class="col-sm-8">
            <?php 
            $this->widget('KRichTextEditor', array(
                    'model' => $model,
                    'value' => $model->isNewRecord ? '' : $model->treatment,
                    'attribute' => 'treatment',
                    'options' => array(
                        'theme_advanced_resizing' => 'true',
                        'theme_advanced_statusbar_location' => 'bottom',
                    ),
                ));
            ?>
            <?php echo $form->error($model,'treatment'); ?>
        </div>
    </div>
    
    <?php 
    }
    ?>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class' => 'btn btn-default')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
