<div class="container">
<section class="row">
    <img src="<?php echo base_url(); ?>assets/themes/default/images/header_image.jpg" class="floatL img-responsive" alt="user_gallery"/>
</section>

    <div id="body">

        <section class="">
            <div class="row">
                <div>
                    <iframe class="floatL" width="420" height="315" src="https://www.youtube.com/embed/xK5FaAnt9KY" frameborder="0" allowfullscreen></iframe>
                    <h2>About</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut dui efficitur, lacinia lectus sit amet, consectetur lectus. 
                        Nullam vel velit est. Suspendisse tempor, sem ut placerat aliquet, nisl nunc congue nulla, 
                        in suscipit nulla elit at dolor. Donec ultrices lorem lectus, quis efficitur orci hendrerit ac. 
                        Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam tincidunt augue nunc, 
                        vel elementum elit varius sit amet. Phasellus egestas nunc odio, et eleifend enim rhoncus non. 
                        Maecenas porttitor urna quam, ut bibendum felis laoreet at.
                    </p>
                    <a class="btn btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More</a>
                </div>
            </div>
            <hr/>
        </section>

        <section>
            <div class="row">
                <div>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat.jpg" class="floatL img-responsive" alt="user_gallery"/>
                    <div>
                        <h2>User Gallery</h2>
                        <p>
                            View some of the images that have been uploaded by other users. 
                            Only registered users can upload their own images. To become a member 
                            and upload your own images, all you have to do is create an account.
                        </p>
                        <a class="btn btn-primary" href="<?php echo site_url('site/gallery'); ?>" role="button">View More</a>
                        <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#imageUploadModal" role="button">Upload <span class="glyphicon glyphicon-upload"></span></a>
                    </div>
                </div>

            </div>
            <hr/>
        </section>

        <section class="">

            <div class="row">
                <div class="col-md-4">
                    <h2>Airboats</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" class="img-responsive" alt="user_gallery"/>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut dui efficitur, lacinia lectus sit amet, consectetur lectus. 
                        Nullam vel velit est. Suspendisse tempor, sem ut placerat aliquet. 
                    </p>
                    <a class="btn btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More</a>
                </div>
                <div class="col-md-4">
                    <h2>Specifications</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" class="img-responsive" alt="user_gallery"/>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut dui efficitur, lacinia lectus sit amet, consectetur lectus. 
                        Nullam vel velit est. Suspendisse tempor, sem ut placerat aliquet. 
                        
                    </p>
                    <a class="btn btn-primary" href="<?php echo site_url('site/about'); ?>" role="button">Read More</a>
                </div>
                <div class="col-md-4">
                    <h2>Upcoming Events</h2>
                    <img src="<?php echo base_url(); ?>assets/themes/default/images/airboat2.jpg" class="img-responsive" alt="user_gallery"/>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut dui efficitur, lacinia lectus sit amet, consectetur lectus. 
                        Nullam vel velit est. Suspendisse tempor, sem ut placerat aliquet.
                    </p>
                    <a class="btn btn-primary" href="<?php echo site_url('site/events'); ?>" role="button">View</a>
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
                                <textarea class="form-control" id="comment" rows="3"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-default">Cancel</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>

