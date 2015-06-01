<section class="wrapper">
    <section class="container">
        <!--   Image Attribution: http://commons.wikimedia.org/wiki/File:BoogalooAudienceNOLA2009.JPG   -->
        <section  id="events" class="container">
            <h1 class="margin_spacing img-title"><span class="glyphicon glyphicon-globe"></span> Upcoming Events</h1>
        </section>
        <section class="element_margins">
            <div class="spacing">
                <!--                Links to other pages when the amount of events on the page exceed a certain amount                         -->
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <!--            Display Upcoming Events          -->
            <?php if ($result == null): ?>
            <div class="margin_spacing">
            <h3>There are no Upcoming Events at this time but please check back later</h3><hr>
            </div>
            <?php endif; ?>
                 <?php foreach ($result as $r): ?>
                <div class="element_spacing">
                    <div>
                        <h3><span class="glyphicon glyphicon-calendar"></span> <?php echo $r->title; ?><hr></h3>
                    </div>
                    <div class="spacing">
                        <h4 class="events_page">Start Date: <?php echo $r->start_date; ?></h4>
                        <h4 class="events_page">End Date: <?php echo $r->end_date; ?></h4>
                    </div>
                    <div>
                        <p class="spacing events_page">
                            <?php echo $r->description; ?>
                        </p>
                    </div>
                    <a class="btn-lg btn-primary" href="<?php echo base_url('events/display_event/' . $r->id); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            <?php endforeach; ?>
            
           
            <div class="element_spacing">
                <!--                Links to other pages when the amount of events on the page exceed a certain amount                         -->
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </section>
    </section>
</section>