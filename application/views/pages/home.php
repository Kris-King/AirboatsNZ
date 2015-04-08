<div class="container">
<!--<section class="row">
    <img src="<?php echo base_url(); ?>assets/themes/default/images/header_image.jpg" class="floatL" alt="user_gallery"/>
</section>-->

<div id="body">

    <section>
        <div class="row">
            <iframe class="floatL" width="420" height="315" src="https://www.youtube.com/embed/xK5FaAnt9KY" frameborder="0" allowfullscreen></iframe>
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut dui efficitur, lacinia lectus sit amet, consectetur lectus. 
                Nullam vel velit est. Suspendisse tempor, sem ut placerat aliquet, nisl nunc congue nulla, 
                in suscipit nulla elit at dolor. Donec ultrices lorem lectus, quis efficitur orci hendrerit ac. 
                Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam tincidunt augue nunc, 
                vel elementum elit varius sit amet. Phasellus egestas nunc odio, et eleifend enim rhoncus non. 
                Maecenas porttitor urna quam, ut bibendum felis laoreet at.</p>
            <button type="button" class="btn btn-primary"><span class="glyphicons glyphicons-edit"></span>Read More</button>
        </div>    
        <hr/>
    </section>

    <section>
        <div class="row">
            <div>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat.jpg" class="floatL" alt="user_gallery"/>
                <h2>User Gallery</h2>
                <p>
                    View some of the images that have been uploaded by other users. 
                    Registered users can upload their own images.
                </p>
                <button type="button" class="btn btn-primary">View More</button>
                <button type="button" class="btn btn-primary">Upload</button>
            </div>

        </div>
        <hr/>
    </section>

    <section>
        
            <div class="row">
                <div class="col-md-4">
                    <h2>Airboats</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" alt="user_gallery"/>
                    <p>
                        View some of the images that have been uploaded by other users. 
                        Registered users can upload their own images.
                    </p>
                    <button type="button" class="btn btn-primary">Read More</button>
                </div>
                <div class="col-md-4">
                    <h2>Specifications</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" alt="user_gallery"/>
                    <p>
                        View some of the images that have been uploaded by other users. 
                        Registered users can upload their own images.
                    </p>
                    <button type="button" class="btn btn-primary">Read More</button>
                </div>
                <div class="col-md-4">
                    <h2>Upcoming Events</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" alt="user_gallery"/>
                    <p>
                        View some of the images that have been uploaded by other users. 
                        Registered users can upload their own images.
                    </p>
                    <button type="button" class="btn btn-primary">View</button>
                </div>
            </div>
        <hr/>
    </section>

    <section>
        <div class="row">
            <div>
                <h2>Enquiry</h2>
                <p>
                    Make an enquiry about airboats if you so wish.
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
                            <?php echo form_label('Description', 'description'); ?>
                            <?php echo form_textarea('description'); ?>
                        </div>
                        <div class="wrapper">
                            <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>
                            <?php echo form_reset('cancel', 'Cancel', 'class="btn btn-default"'); ?>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </section>
</div>
</div>

