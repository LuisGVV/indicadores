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
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut mi faucibus libero volutpat egestas in vel erat. Praesent sagittis, dui at ullamcorper rhoncus, enim leo venenatis velit, eget eleifend erat diam sit amet magna. Pellentesque mollis tempus enim nec euismod. Nunc ultrices dolor ac tortor volutpat sit amet tincidunt arcu hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc a sem risus. Proin placerat tristique imperdiet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin eget neque sit amet nibh cursus viverra et id arcu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </p>
    <p>
        Donec ultricies, massa a pharetra tempus, sapien sapien tristique neque, id bibendum arcu orci eget purus. Sed eu ipsum lectus, vel lobortis sapien. Suspendisse nec felis enim. Donec vulputate lectus orci, ac semper elit. Vivamus in varius est. Etiam ut ipsum iaculis leo aliquet gravida. Proin suscipit velit a arcu tempus eu bibendum diam elementum. Etiam ornare rhoncus mi ac sagittis.
    </p>
</div>
