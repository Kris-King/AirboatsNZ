<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <!--                       Display Event Title                                               -->
            <h1><span class="glyphicon glyphicon-calendar"></span><?php echo $event_data->title; ?><hr></h1>
            <div>
                <!--                Display Event information           -->
                <div class="element_spacing">
                <h4>Start Date: <?php echo $event_data->start_date; ?></h4>
                </div>
                <div class="element_spacing">
                <h4>End Date: <?php echo $event_data->end_date; ?></h4>
                </div>
                <div class="element_spacing">
                    <h4>City/Town: <?php echo $event_data->city_town; ?></h4>
                </div>
                <div class="element_spacing">
                    <h4>Country: <?php echo $event_data->country; ?></h4>
                </div>
                <div class="element_spacing">
                    <h4 class="element_margins">Description:</h4>
                    <p><?php echo $event_data->description; ?></p>
                </div>
            </div>
        </div>
    </section>
</section>