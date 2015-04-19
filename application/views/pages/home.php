<section id="about">
    <div class="container element_spacing">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <img src="<?php echo base_url(); ?>assets/themes/default/images/Home_Page_logo.png" class="img-responsive" alt="user_gallery"/>
            </div>
            <div class="element_spacing col-md-6">
                <h2 class="text-uppercase">An experience unlike any other</h2>
                <p class="spacing">
                  We are passionate about airboats and hope you are too.
                  It is our mission to provide users the ability to share their experiences with others. 
                  You can also catch up on upcoming events that are happening in
                  your region
                </p>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a class="btn-lg btn-primary" href="#enquiry_form">Make an Enquiry <span class="glyphicon glyphicon-send"></span></a>
            </div>

            <div class="element_spacing col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/C8rnxVvhoF8" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>


<section id="user_gallery">
    <div class="container" style="margin-top: 20%;">
        <div class="row">
            <div>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/user_gallery.jpg" class="floatL img-responsive" alt="user_gallery"/>
            </div>
            <div class="col-md-6">
                <h2>User Gallery<hr></h2>
                <p class="spacing">
                    View some of the images that have been uploaded by other users. 
                    Only registered users can upload their own images. To become a member 
                    and upload your own images, all you have to do is create an account.
                </p>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/gallery'); ?>" role="button">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a class="btn-lg btn-primary" href="#"  data-toggle="modal" data-target="#imageUploadModal" role="button">
                    Upload 
                    <span class="glyphicon glyphicon-upload"></span>
                </a>
            </div>

        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row" style="margin-top: 30%; margin-bottom: 20%;">
            <div class="col-md-4">
                <h2>Airboats</h2>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img2.jpg" class="img-responsive" alt="user_gallery"/>
                <br>
                <p>
                    The River-Crossover Airboat can be used for fishing and hunting, 
                    sightseeing and adventure tourism, search and rescue, geological exploration, 
                    military applications, or just having a boatload of fun with family and friends.
                </p>
                <br>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="col-md-4">
                <h2>Specifications</h2>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img1.jpg" class="img-responsive" alt="user_gallery"/>
                <br>
                <p>
                    Range from a 4-seat 500kg to a 10-seat 1200kg loading capacity.
                    Speeds attainable on water depend on the loading of the Airboat, although in general, 
                    70km/h for the smaller Airboats and up to 110km/h for the larger more powerful Airboats.
                </p>
                <br>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <div class="col-md-4">
                <h2>Upcoming Events</h2>
                <hr>
                <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat_img2.jpg" class="img-responsive" alt="user_gallery"/>
                <br>
                <p>
                    There is always something happening with airboats and we can keep you informed when a event is
                    happening. To be informed of upcoming events, visit our events page to view them.
                </p>
                <br>
                <a class="btn-lg btn-primary" href="<?php echo site_url('site/events'); ?>" role="button">View More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</section>

<section id="enquiry_form">
    <div class="container">
        <div class="row" style="margin-top: 20%;">
            <div class="col-xs-12">
                <h2>Enquiry<hr></h2>
                <p>
                    If you wish to make an enquiry about airboats please fill in the form below.
                </p>
                <br>
                <div>
                    <form>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" class="form-control" id="email_address">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="8"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit <span class="glyphicon glyphicon-send"></span></button>
                        <button type="submit" class="btn btn-default marg30">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


