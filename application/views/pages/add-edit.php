<section class="wrapper">
    <section class="container">
        <div>
            <?php if ($edit): //if an event is being edited display the title of the event?>
                <h1><span class="glyphicon glyphicon-wrench"></span> Edit Event: <?php echo html_escape($event->title); ?><hr></h1>
            <?php else: //display the title: Add an Event?>
                <h1><span class="glyphicon glyphicon-plus-sign"></span> Add an Event<hr></h1>
            <?php endif; ?> 
            <div>
                <h4>
                    Just fill in the details below and the system will handle the rest.
                </h4>
                <div class="element_margins">
                    <div>
                        <?php echo form_open(); ?>
                        <div class="form-group-lg">
                            <label for="title">Title:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('title')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('title', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <input type="text" class="form-control" name="title" value="<?php echo $event->title; //display submitted info if being edited  ?>">
                        </div>
                        <div class="form-group-lg element_margins date-selection">
                            <label for="start_date">Start Date:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('start_date')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('start_date', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                                <div class="input-group input-group-lg date">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                                <input type="text" class="form-control" name="start_date" value="<?php echo $event->start_date; //display submitted info if being edited  ?>">
                            </div>
                        </div>
                        <div class="form-group-lg element_margins date-selection">
                            <label for="end_date">End Date:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('end_date')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('end_date', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                                <div class="input-group input-group-lg date">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="button"><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                                <input type="text" class="form-control" name="end_date" value="<?php echo $event->end_date; //display submitted info if being edited  ?>">
                            </div>
                        </div>
                        <div class="form-group-lg">
                            <label for="city_town">City/Town:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('city_town')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('city_town', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <input type="text" class="form-control" name="city_town" value="<?php echo $event->city_town; //display submitted info if being edited  ?>">
                        </div>
                        <div class="form-group-lg element_margins">
                            <label for="country">Country:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('country')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('country', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                            <input type="text" class="form-control" name="country" value="<?php echo $event->country; //display submitted info if being edited  ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <!--                            Display error message if the user input does not meet validation requirements               -->
                            <?php if (form_error('description')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('description', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <textarea class="form-control" name="description" rows="7" ><?php echo $event->description; //display submitted info if being edited   ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success  btn-lg"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                        <?php echo form_reset('submit', 'Cancel', 'class="btn btn-default marg15 btn-lg"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>


            </div>
        </div>
    </section>
</section>