<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<?php 
	/*
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    */
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="screen, projection, print" />    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/config.css" media="screen, projection, print" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="page">

	<div id="header">
	    <div class="container">
    		<div id="logo"><a href="/"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>
    		
            <section id="login">
                <?php
                if ( Yii::app()->user->isGuest ) {
                    ?>
                    <a href="<?php echo Yii::app()->params['facebookLoginUrl'] ?>">Conecte usando sua conta do Facebook</a>
                    ou
                    <a href="/?r=site/login">Faça login no nosso sistema</a>
                    <?php
                } else {
                    ?>
                    Ola <?php echo Yii::app()->user->name ?>, voce esta conectado !
                    <?php
                }
                ?>
            </section>
            
    	</div>
	</div><!-- header -->
    
	<!-- mainmenu -->
	<div class="container">
    	<?php echo $content; ?>
	</div>

	<div class="clear"></div>

    <footer id="footer">
        <div class="container">
		    &copy; <?php echo date('Y'); ?> Flechaweb<br/>
	    	<?php echo Yii::powered(); ?>
        </div>
   	</footer><!-- footer -->
   	
</div><!-- page -->

</body>
</html>
