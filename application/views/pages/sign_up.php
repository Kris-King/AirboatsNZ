
<?php echo validation_errors('<div class"alert alert-error">', "</div>"); ?>
<fieldset>
    <legend>Personal Information</legend>
    <?php echo form_open('auth/create_user'); ?>
    <div class="field">
        <?php
        $fn_data = array(
            'name' => 'first_name',
            'value' => set_value('first_name'),
            'placeholder' => 'First Name'
        );
        echo form_input($fn_data);
        ?>
    </div>
        <div class="field">
        <?php
        $ln_data = array(
            'name' => 'last_name',
            'value' => set_value('last_name'),
            'placeholder' => 'Last Name'
        );
        echo form_input($ln_data);
        ?>
    </div>
        <div class="field">
        <?php
        $email_data = array(
            'name' => 'email_address',
            'value' => set_value('email_address'),
            'placeholder' => 'Email'
        );
        echo form_input($email_data);
        ?>
    </div>
</fieldset>

<fieldset>
    <legend>Login Info</legend>
        <div class="field">
        <?php
        $pw_data = array(
            'name' => 'password',
            'value' => set_value('password'),
            'placeholder' => 'Password'
        );
        echo form_password($pw_data);
        ?>
    </div>
        <div class="field">
        <?php
        $pw2_data = array(
            'name' => 'confirm_password',
            'value' => set_value('confirm_password'),
            'placeholder' => 'Confirm Password'
        );
        echo form_password($pw2_data);
        ?>
    </div>
            <div class="field">
        <?php
        $status_data = array(
            'name' => 'status',
            'value' => set_value('status'),
            'placeholder' => 'Status'
        );
        echo form_password($status_data);
        ?>
    </div>
    
    <div class="wrapper">
        <?php echo form_submit(array('name' => 'save', 'class' => 'submit', 'value' => 'Create Account')); ?>
    </div>
    
</fieldset>
<?php echo form_close();
