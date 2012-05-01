<!DOCTYPE html>
<html lang="en">
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
                    Conecte via 
                    <a href="<?php echo Yii::app()->params['facebookLoginUrl'] ?>">Facebook</a>
                    ou Faça o
                    <a href="/?r=site/login">Login</a>
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
    
	<div class="container clear">
    	<?php echo $content; ?>
	</div>

    <div class="modal" id="myModal">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Avalie seu Banco</h3>
        </div>
        <div class="modal-body">
            <p>Ops!</p>
        </div>
    </div>
        <!--
        <div class="modal-footer">
            <a href="#" class="btn">Close</a>
        </div>
        -->
    
    <footer id="footer">
        <div class="container">
            <div class="pull-right">
                Flechaweb (<?php echo date('Y'); ?>) - 
                <?php echo Yii::powered(); ?>
            </div>            
        </div>
   	</footer>
</div><!-- page -->

<!--
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.7.1");</script>
-->
<script type="text/javascript" src="/js/jQuery.min.js"></script>

<script>
    if ( typeof jQuery == 'undefined' ) {
        //document.write('<script type="text/javascript" src="/js/jquery.min.js"><\/script>');
    }
    if ( typeof jQuery == 'undefined' ) {
        console.log('jQuery yet not loaded');
    }
</script>

<script type="text/javascript" src="/js/functions.js?id=<?php echo uniqid(); ?>"></script>
<script type="text/javascript" src="/js/bootstrap-modal.js"></script>

</body>
</html>
