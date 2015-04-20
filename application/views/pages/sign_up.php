<section class="wrapper">
    <div class="container">
        <div class="row">
            <div>
                <h3>Create an Account<hr></h3>
                <p>
                    Just fill in the details below and away you go.
                </p>
                <br>
                <?php echo validation_errors('<div class"alert alert-error">',"</div>"); ?>
                <div>
                    <?php echo form_open('auth/create_user'); ?>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" value="<?php echo set_value('first_name'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" value="<?php echo set_value('last_name'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" class="form-control" id="email_address" value="<?php echo set_value('email_address'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div class="form-group">
                            <?php echo form_hidden('status', 'Pending'); ?>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit <span class="glyphicon glyphicon-floppy-save"></span></button>
                        <?php echo form_reset('submit', 'Cancel' , 'class="btn btn-default marg15"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    <br><br>
</section>
