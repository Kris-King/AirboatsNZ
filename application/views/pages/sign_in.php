<section class="wrapper">
    <div class="container">
        <div class="row">
            <div>
                <h3>Sign In<hr></h3>
                <p>
                    Just fill in the details below and away you go.
                </p>
                <div class="spacing Event_spacing">
                    
                    <?php echo validation_errors('<div class"alert alert-error">', "</div>"); ?>
                </div>
                <div>
                    <form id="frm-sign_in" action="<?php echo site_url('auth/validate') ?>" method="POST">
                        <div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="email" class="form-control" name="email_address" value="<?php echo set_value('email_address'); ?>">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="password" class="form-control" name="user_password" value="<?php echo set_value('user_password'); ?>">
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox"> Remember Me</label>
                            </div>


                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Sign In <span class="glyphicon glyphicon-log-in"></span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <br><br>
</section>