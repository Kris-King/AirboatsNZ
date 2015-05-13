<section class="wrapper">
    <section class="container">
        <!--   Image Attribution: http://commons.wikimedia.org/wiki/File:BoogalooAudienceNOLA2009.JPG   -->
        <section  id="events" class="container">
            <h1 class="margin_spacing"><span class="glyphicon glyphicon-globe"></span> Upcoming Events</h1>
        </section>
        <section class="element_margins">
            <div>
                <!--                Links to other pages when the amount of events on the page exceed a certain amount                         -->
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <!--            Display Upcoming Events          -->
            <?php foreach ($result as $r): ?>
                <div class="spacing">
                    <hr>
                    <h3><span class="glyphicon glyphicon-calendar"></span> <?php echo $r->title; ?></h3>
                    <h5>Start Date: <?php echo $r->start_date; ?></h5>
                    <h5>Start Date: <?php echo $r->end_date; ?></h5>
                    <p class="Event_spacing spacing">
                        <?php echo $r->description; ?>
                    </p>
                    <a class="btn-lg btn-primary" href="<?php echo base_url('events/display_event/' . $r->id); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>
            <?php endforeach; ?>
            <div>
                <!--                Links to other pages when the amount of events on the page exceed a certain amount                         -->
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </section>
    </section>
</section>