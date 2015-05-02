<section class="wrapper">
    <div class="container">
        <div>
            <div class="spacing">
                <h1>Create an Account<hr></h1>
                <h4>
                    Just fill in the details below and away you go.
                </h4>
                <div class="spacing element_margins">
                    <?php echo validation_errors('<div class"alert alert-danger">', "</div>"); ?>
                </div>
                <div>
                    <?php echo form_open('auth/create_user'); ?>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="email" class="form-control" name="email_address" value="<?php echo set_value('email_address'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password'); ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
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