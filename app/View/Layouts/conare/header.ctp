<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a id="header-bar" class="navbar-brand" href="<?= $this->Html->url(array("controller" => "home", "action" => "index")) ?>">CONARE</a>
            <a id="bar-logo" class="navbar-brand" href="http://www.ucr.ac.cr"><img id="ucr-logo" src="<?= $this->base.'/app/webroot/img/universities/ucr-logo.png'?>"></a>
            <a id="bar-logo" class="navbar-brand" href="http://www.tec.ac.cr"><img id="tec-logo" src="<?= $this->base.'/app/webroot/img/universities/tec-logo.png'?>"></a>
            <a id="bar-logo" class="navbar-brand" href="http://www.una.ac.cr"><img id="una-logo" src="<?= $this->base.'/app/webroot/img/universities/una-logo.png'?>"></a>
            <a id="bar-logo" class="navbar-brand" href="http://www.uned.ac.cr"><img id="uned-logo" src="<?= $this->base.'/app/webroot/img/universities/uned-logo.png'?>"></a>
        </div>

        <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <?php 
            include_once('menu/internal.ctp'); 
            ?><!--Menus internos de la app-->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Más...<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Sobre CONARE</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="#">Noticias</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </li>
        </ul>

        <?php
        //Status del usuario
        include_once ('status.ctp'); 
        ?>

        </div><!--/.navbar-collapse -->
    </div>
</div>


