<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <h1><span class="glyphicon glyphicon-plus-sign"></span> Add Event<hr></h1>
<!--            <h1><span class="glyphicon glyphicon-wrench"></span> Edit Event<hr></h1>-->
            <div class="element_margins">
                <h4>
                    Just fill in the details below and the system will handle the rest.
                </h4>
                <div class="spacing element_margins">
                    <div>
                        <?php echo form_open('events/add_edit'); ?>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <?php if (form_error('title')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('title', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <?php if (form_error('start_date')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('start_date', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                            <input type="text" class="form-control" name="start_date" value="<?php echo set_value('start_date'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <?php if (form_error('end_date')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('end_date', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                            <input type="text" class="form-control" name="end_date" value="<?php echo set_value('end_date'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="city_town">City/Town:</label>
                            <?php if (form_error('city_town')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('city_town', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <input type="text" class="form-control" name="city_town" value="<?php echo set_value('city_town'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <?php if (form_error('country')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('country', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div>  
                            <?php endif; ?>
                            <input type="text" class="form-control" name="country" value="<?php echo set_value('country'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <?php if (form_error('description')): ?>
                                <div class="alert alert-danger"> <?php echo form_error('description', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                            <?php endif; ?>
                            <textarea class="form-control" name="description" rows="7" value="<?php echo set_value('description'); ?>"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary  btn-lg">Submit</button>
                        <?php echo form_reset('submit', 'Cancel', 'class="btn btn-default marg15 btn-lg"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>


            </div>
    </section>
</section>