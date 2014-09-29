<?= $this->Html->script('transitions/jqFancyTransitions.1.8.js') ?>

<script type="text/javascript">
    $(document).ready( function(){
        $('#advertising').jqFancyTransitions({ 
            width: 1024, 
            height: 400,
            direction: "fountain",
            effect: "wave",
            strips: 100,
            delay: 5000
        });
    });
</script>
<div id="advertising">
    <?php
    $image_list = scandir(ROOT . '/app/webroot/img/intro/');
    foreach ($image_list as $image) {
        if (preg_match('/.*\.jpg/', $image)) {
            ?>
            <img src="<?= $this->base . '/app/webroot/img/intro/' . $image ?>" />
            <?php
        }
    }
    ?>
</div>

<div>
    <h1>Indicadores de Investigacion</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut mi faucibus libero volutpat egestas in vel erat. Praesent sagittis, dui at ullamcorper rhoncus, enim leo venenatis velit, eget eleifend erat diam sit amet magna. Pellentesque mollis tempus enim nec euismod. Nunc ultrices dolor ac tortor volutpat sit amet tincidunt arcu hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc a sem risus. Proin placerat tristique imperdiet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin eget neque sit amet nibh cursus viverra et id arcu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </p>
    <p>
        Donec ultricies, massa a pharetra tempus, sapien sapien tristique neque, id bibendum arcu orci eget purus. Sed eu ipsum lectus, vel lobortis sapien. Suspendisse nec felis enim. Donec vulputate lectus orci, ac semper elit. Vivamus in varius est. Etiam ut ipsum iaculis leo aliquet gravida. Proin suscipit velit a arcu tempus eu bibendum diam elementum. Etiam ornare rhoncus mi ac sagittis.
    </p>
</div>