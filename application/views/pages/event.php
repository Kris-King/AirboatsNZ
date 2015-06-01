<section class="wrapper">
    <section class="container">
        <div class="spacing">
            <section  id="events" class="container spacing">
                <!--                       Display Event Title                                               -->
                <h1 class="margin_spacing img-title"><span class="glyphicon glyphicon-calendar"></span><?php echo $event_data->title; ?></h1>
            </section>
            <div>
                <!--                Display Event information           -->
                <div class="spacing">
                    <h4 class="events_page">Start Date: <?php echo $event_data->start_date; ?></h4>
                </div>
                <div class="spacing">
                    <h4 class="events_page">End Date: <?php echo $event_data->end_date; ?></h4>
                </div>
                <div class="spacing">
                    <h4 class="events_page">City/Town: <?php echo $event_data->city_town; ?></h4>
                </div>
                <div class="spacing">
                    <h4>Country: <?php echo $event_data->country; ?></h4>
                </div>
                <div>
                    <h4 class="events_page">Description:</h4>
                    <p class="events_page"><?php echo $event_data->description; ?></p>
                </div>
            </div>
        </div>
    </section>
</section>