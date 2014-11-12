<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?= $this->Html->url(array("controller" => "home", "action" => "index")) ?>">Consejo Nacional de Rectores</a>
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


