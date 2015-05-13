<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <h1><span class="glyphicon glyphicon-camera"></span> User Gallery<hr></h1>
            <div class="row element_margins">
                <!--                Images uploaded by site users                  -->
                <?php foreach ($result as $r): ?>
                    <div class="col-md-4 spacing">

                        <a href="<?php echo base_url() ?>uploads/<?php echo $r->url; ?>" target="_self" class="litebox">
                            <img src="<?php echo base_url() ?>uploads/<?php echo $r->url; ?>" class="img-responsive" alt="User submitted image"/>
                        </a>

                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <!--                Links to other pages when the amount of images on the page exceed a certain amount                         -->
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </section>
</section>