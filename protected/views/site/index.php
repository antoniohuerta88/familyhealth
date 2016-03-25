<?php
/* @var $this SiteController */

?>

<div class="form-panel">
    <?php 
        if(!Yii::app()->user->isGuest)
        {
            echo '<h4 class="mb"><i class="fa fa-angle-right"></i>Mis citas</h4>';
            
            if(Yii::app()->user->checkAccess('Paciente')){ 
                echo CHtml::link('Agendar una cita',array('appointment/create'),array('class' => 'btn btn-primary btn-lg btn-block'));
            }
            
            echo '<br/>';
            
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
            )); 
        }
        else { 
    ?>
    
    
    <h4 class="mb"><i class="fa fa-angle-right"></i> Bienvenido a Salud Familiar </h4>
    <p>Algo de texto</p>
    <img class="img-rounded img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/public/img/medica640.jpg" alt="W3Schools.com" ismap>
            
        
    <?php
    }
    ?>

</div>
