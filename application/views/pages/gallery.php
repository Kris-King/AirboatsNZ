<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <h1>User Gallery<hr></h1>
            <div class="row element_margins">
                <?php foreach ($result as $r): ?>
                    <div class="col-md-4 spacing">

                        <img src="<?php echo base_url() ?>uploads/<?php echo $r->url; ?>" class="img-responsive" alt="User submitted image"/>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</section>