<section class="wrapper">
    <div class="container">
        <div>
            <div class="spacing">
                <h1>Create an Account<hr></h1>
                <h4>
                    Just fill in the details below and away you go.
                </h4>
                <!--                <div class="spacing element_margins">
                <?php if (validation_errors()): ?>
                                            <div class="alert alert-danger"> <?php echo validation_errors('<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                <?php endif; ?>
                                </div>-->
                <div class="element_margins">
                    <?php echo form_open('auth/create_user'); ?>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <?php if (form_error('first_name')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('first_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <?php if (form_error('last_name')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('last_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email_address">Email Address:</label>
                        <?php if (form_error('email_address')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('email_address', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="email_address" value="<?php echo set_value('email_address'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="user_password">Password:</label>
                        <?php if (form_error('user_password')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('user_password', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <?php if (form_error('confirm_password')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('confirm_password', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('status', 'Pending'); ?>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary  btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Create Account</button>
                    <?php echo form_reset('submit', 'Cancel', 'class="btn btn-default marg15 btn-lg"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>