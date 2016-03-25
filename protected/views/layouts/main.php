<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Salud familiar</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
<section id="container" >
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b><?php echo CHtml::encode(Yii::app()->name); ?></b></a>
            <!--logo end-->

            <div class="top-menu">
                <?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions'=>array('id' => 'second', 'class' => 'nav pull-right top-menu'),
				'items'=>array(
					array('label'=>'Iniciar sesion', 'url'=>array('/site/login'),'active'=>false, 'visible'=>Yii::app()->user->isGuest, 'linkOptions'=>array('class'=>'logout', 'activeClass' => '')),
					array('label'=>'Salir ('.Yii::app()->user->name.')','active'=>false, 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'linkOptions'=>array('class'=>'logout'))
				),
			)); ?>
            </div>
        </header>
      <!--header end-->
      
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse " style="padding-top: 75px">
			<?php if(!Yii::app()->user->isGuest): ?>
				<p class="centered" ><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index"><img src="<?php echo Yii::app()->request->baseUrl; ?>/public/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
				<h5 class="centered"><?php echo Yii::app()->user->name; ?></h5>
			<?php endif ?>
            
            <?php $this->widget('zii.widgets.CMenu',array(
                'htmlOptions'=>array('id' => 'second', 'class' => 'sidebar-menu', 'style'=>'    margin-top: 0px;'),
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                array('label'=>'Citas', 'url'=>array('/appointment/index')),
                array('label'=>'Usuarios', 'url'=>array('/user/index'), 'visible'=> !Yii::app()->user->checkAccess("Paciente") && !Yii::app()->user->isGuest ),
			),
		)); ?>
			<!-- sidebar menu end-->
		</div>
      </aside>
      <!--sidebar end-->
      
    <section id="main-content">
        <section class="wrapper">
        <!--main content start-->
        <?php echo $content; ?>
        <!--main content end-->
        </section>
    </section>

<!-- js placed at the end of the document so the pages load faster -->

    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui') ?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery.sparkline.js"></script>
    
    

    <!--common script for all pages-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/gritter-conf.js"></script>

</body>
</html>
