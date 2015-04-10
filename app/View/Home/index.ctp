<div class="container">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <?php
        $image_list = scandir(ROOT . '/app/webroot/img/intro/');
        foreach ($image_list as $image) {
            if (preg_match('/.*\.jpg/', $image)) {
                ?>
                <img src="//<?= $this->base . '/app/webroot/img/intro/' . $image ?>" />
            <?php
            }
        }
        ?>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= $this->base . '/app/webroot/img/intro/1.jpg' ?>">
                <div class="carousel-caption">
                </div>
            </div>
            <?php
            $image_list = scandir(ROOT . '/app/webroot/img/intro/');
            foreach ($image_list as $image) {
                if (preg_match('/.*\.jpg/', $image)) {
                    ?>
                    <div class="item">
                        <img src="<?= $this->base . '/app/webroot/img/intro/' . $image ?>">
                        <div class="carousel-caption">
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div> <!-- Carousel -->
</div>

<div class="container">
    <h1>Indicadores de Investigación</h1>
    <p>
        La Comisión de Vicerrectores de Investigación del Consejo Nacional de Rectores (CONARE) se honra en presentar a las comunidades universitaria, nacional e internacional el sitio de publicación sobre los indicadores de investigación interuniversitaria estatal de las cuatro instituciones de educación superior que conforman este Consejo.
    </p>
    <p>
        La expectativa es que esta publicación se convierta en un insumo esperado, año tras año, por quienes ostentan cargos que demandan la toma de decisiones; pero también por aquellos y aquellas académicas que gustan del análisis crítico de la situación y/o tendencias de la investigación universitaria. Análisis que permita concluir sobre los logros y limitaciones alrededor del proceso de investigación en nuestras instituciones de educación superior universitaria estatal.
    </p>
</div>
