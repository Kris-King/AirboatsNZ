<h1>Sign Up</h1>

<p>
    All you have to do is fill in the details below and away you go.
</p>

<div class="floatR">
    <?php echo form_open(); ?>
    <fieldset>
        <div class="form-group">
            <?php echo form_label('First Name', 'first_name'); ?>
            <?php echo form_input('first_name'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Last Name', 'last_name'); ?>
            <?php echo form_input('last_name'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Email Address', 'email_address'); ?>
            <?php echo form_input('email_address'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Password', 'password'); ?>
            <?php echo form_input('password'); ?>
        </div>
        <div class="form-group">
            <?php echo form_label('Confirm Password', 'confirm_password'); ?>
            <?php echo form_input('confirm_password'); ?>
        </div>
        <div class="wrapper">
            <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>
            <?php echo form_reset('cancel', 'Cancel', 'class="btn btn-default"'); ?>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>