<section class="wrapper">
    <section class="container">
        <h1 style="margin-bottom: 10%;">User Gallery<hr></h1>
        <div class="row" style="margin-bottom: 20%;">
            <?php foreach ($result as $r): ?>
            <div class="col-md-4 spacing">
                    
                        <img src="<?php echo $r->url; ?>" class="img-responsive" alt="About Us - Airboat image 1"/>
                    
            </div>
            <?php endforeach; ?>
            <!--            <div class="col-md-4 spacing">
                            <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img2.jpg" class="img-responsive" alt="user_gallery"/>
                        </div>-->

        </div>
    </section>
</section>