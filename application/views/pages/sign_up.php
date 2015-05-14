<section class="wrapper">
    <div class="container">
        <div>
            <div class="spacing">
                <h1>Create an Account<hr></h1>
                <h4 class="spacing">
                    Just fill in the details below and away you go.
                </h4>
                <div>
                    <?php echo form_open('auth/create_user'); ?>
                    <div class="form-group element_margins">
                        <label for="first_name">First Name:</label>
                        <?php if (form_error('first_name'))://Display error if field does not meet validation requirments ?>
                            <div class="alert alert-danger"> <?php echo form_error('first_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <?php if (form_error('last_name'))://Display error if field does not meet validation requirments ?>
                            <div class="alert alert-danger"> <?php echo form_error('last_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    </div>
                    <div class="form-group element_margins">
                        <label for="email_address">Email Address:</label>
                        <?php if (form_error('email_address'))://Display error if field does not meet validation requirments ?>
                            <div class="alert alert-danger"> <?php echo form_error('email_address', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="email_address" value="<?php echo set_value('email_address'); ?>">
                    </div>
                    <div class="form-group element_margins">
                        <label for="user_password">Password:</label>
                        <?php if (form_error('user_password'))://Display error if field does not meet validation requirments ?>
                            <div class="alert alert-danger"> <?php echo form_error('user_password', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <?php if (form_error('confirm_password'))://Display error if field does not meet validation requirments ?>
                            <div class="alert alert-danger"> <?php echo form_error('confirm_password', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">
                    </div>
                    <div class="form-group element_margins">
                        <!--                        Google reCAPTHA                                     -->
                    <div class="g-recaptcha" data-sitekey="6Lc3qQYTAAAAABGbOz--xQZmg3_oZ45hBiHN2s2g"></div>
                    </div>
                    <div class="form-group">
                        <?php echo form_hidden('status', 'Pending'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Create Account</button>
                    <?php echo form_reset('submit', 'Cancel', 'class="btn btn-default marg5 btn-lg"'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>