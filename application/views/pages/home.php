<section id="about">
    <div class="container element_spacing">
        <div>
            <div>
                <?php
                //success message
                if ($this->session->flashdata('success')):
                    ?>
                    <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
            </div>
            <div  style="margin-top:3%;">
                <img src="<?php echo base_url(); ?>assets/themes/default/images/Site_Logo.png" class="img-responsive col-md-offset-3" alt="Site Logo"/>
            </div>
            <div class="element_spacing col-md-6">
                <h2 class="text-uppercase tag-line">An experience unlike any other</h2>
                <p class="element_spacing">
                    We are passionate about airboats and hope you are too.
                    It is our mission to provide users the ability to share their experiences with others. 
                    You can also catch up on upcoming events that are happening in
                    your region
                </p>
                <a class="btn btn-primary btn-lg element_spacing" href="<?php echo base_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a class="btn btn-primary btn-lg element_spacing" href="#Enquiry">Make an Enquiry <span class="glyphicon glyphicon-send"></span></a>
            </div>

            <div class="element_spacing col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/xfjsBn3rIsw" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>


<section id="user_gallery">
    <div class="container margin_spacing">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo base_url(); ?>assets/themes/default/images/user_gallery.jpg" class="floatL img-responsive" alt="user_gallery"/>
            </div>
            <div class="col-md-6 spacing">
                <h2>User Gallery<hr></h2>
                <p class="spacing">
                    View some of the images that have been uploaded by other users. 
                    Only registered users can upload their own images. To become a member 
                    and upload your own images, all you have to do is create an account.
                </p>
                <a class="btn-primary btn-lg" href="<?php echo base_url('images'); ?>" role="button">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php if ($this->session->userdata('is_logged_in')): ?>
                    <a class="btn-primary btn-lg" href="<?php echo base_url('images/upload'); ?>"  role="button"> Upload <span class="glyphicon glyphicon-upload"></span></a>
                <?php else: ?>
                    <a class="btn-primary btn-lg" href="#" data-toggle="modal" data-target="#imageUploadModal" role="button"> Upload <span class="glyphicon glyphicon-upload"></span></a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <h1 class="element_spacing">About Airboats<hr></h1>
        <div class="row" style="margin-bottom: 20%;">

            <div class="col-md-4 element_spacing">
                <h3>Airboats</h3>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img2.jpg" class="img-responsive spacing" alt="user_gallery"/>
                <p class="spacing">
                    The River-Crossover Airboat can be used for fishing and hunting, 
                    sightseeing and adventure tourism, search and rescue, geological exploration, 
                    military applications, or just having a boatload of fun with family and friends.
                </p>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="col-md-4 element_spacing">
                <h3>Specifications</h3>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img1.jpg" class="img-responsive spacing" alt="user_gallery"/>
                <p class="spacing">
                    Range from a 4-seat 500kg to a 10-seat 1200kg loading capacity.
                    Speeds attainable on water depend on the loading of the Airboat, although in general, 
                    70km/h for the smaller Airboats and up to 110km/h for the larger more powerful Airboats.
                </p>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="col-md-4 element_spacing">
                <h3>Upcoming Events</h3>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img7.jpg" class="img-responsive spacing" alt="user_gallery"/>
                <p class="spacing">
                    There is always something happening with airboats and we can keep you informed when a event is
                    happening. To be informed of upcoming events, visit our events page to view them.
                </p>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/events'); ?>" role="button">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</section>

<section id="enquiry_form">
    <div class="container">
        <div class="margin_spacing" id="Enquiry">
            <div class="col-xs-12">
                <h2>Enquiry<hr></h2>
                <p class="spacing">
                    If you require more information about airboats or are keen in purchasing one, please fill in the form below
                    and we will be in touch as soon as possible.
                </p>
                <?php
                //success message
                if ($this->session->flashdata('success')):
                    ?>
                    <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-send"></span> <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <div>
                    <?php echo form_open('site/make_enquiry'); ?>
                    <div class="form-group spacing">
                        <label for="first_name">First Name</label>
                        <?php if (form_error('first_name')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('first_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    </div>
                    <div class="form-group spacing">
                        <label for="last_name">Last Name</label>
                        <?php if (form_error('last_name')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('last_name', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    </div>
                    <div class="form-group spacing">
                        <label for="email_address">Email Address</label>
                        <?php if (form_error('email_address')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('email_address', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <input type="email" class="form-control" name="email_address" value="<?php echo set_value('email_address'); ?>">
                    </div>
                    <div class="form-group spacing">
                        <label for="comment">Comment</label>
                        <?php if (form_error('comment')): ?>
                            <div class="alert alert-danger"> <?php echo form_error('comment', '<div><span class="glyphicon glyphicon-warning-sign"></span>', '</div>'); ?></div> 
                        <?php endif; ?>
                        <textarea class="form-control" name="comment" rows="8"><?php echo set_value('comment'); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Submit <span class="glyphicon glyphicon-send"></span></button>
                        <?php echo form_reset('submit', 'Cancel', 'class="btn btn-default marg15 btn-lg"'); ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if ($is_contact_validation) {
    echo '<script>$("#Enquiry").get(0).scrollIntoView();</script>';
}

