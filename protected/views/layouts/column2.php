<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?php echo $content; ?>		
        </div>
        <div class="col-lg-3 ds">
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'<h3>Operaciones</h3>',
                ));
                $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'itemCssClass' => 'list-group-item',
                'htmlOptions'=>array('class'=>'operations list-group'),
                ));
                $this->endWidget();
            ?>
        </div>
    </div>
<?php $this->endContent(); ?>