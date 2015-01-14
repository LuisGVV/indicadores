<!DOCTYPE html>
<html>
    <head>
        <title>Consejo Nacional de Rectores</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php 
        include_once ('conare/head.ctp');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->fetch('script');
        echo $this->fetch('css');
        ?>
    </head>
    <body>
        <?php include_once ('conare/header.ctp'); ?>
        <?php include_once ('conare/content.ctp'); ?>
    </body>
</html>
