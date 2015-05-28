<!DOCTYPE html>
<html lang="en">
    <head>
        <!--        Display a title based on the page that the user is on  -->
        <title><?php echo $title; ?> | Airboats New Zealand</title>
        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="We are passionate about Airboats and we hope to share that with you" />
        <?php
        /** -- Copy from here -- */
        if (!empty($meta)) {
            foreach ($meta as $name => $content) {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
            }
        }
        echo "\n";

        if (!empty($canonical)) {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical ?>" /><?php
        }
        echo "\n\t";

        foreach ($css as $file) {
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";

        foreach ($js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";

        /** -- to here -- */
        ?>


        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/litebox.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/general.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


        <script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap-datepicker.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="<?php echo base_url(); ?>assets/themes/default/js/images-loaded.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/default/js/litebox.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/images/fav.png" type="image/x-icon"/>

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/themes/default/images/Airboats_Logo.png" style="float:left;z-index:5;" alt="logo"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="<?php echo base_url(); ?>site/about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
                        <li><a href="<?php echo base_url(); ?>images"><span class="glyphicon glyphicon-camera"></span> Gallery</a></li>
                        <li><a href="<?php echo base_url(); ?>events/upcoming_events"><span class="glyphicon glyphicon-globe"></span> Events</a></li>
                        <?php if ($this->session->userdata('is_logged_in')): ?>
                            <li><a href="<?php echo base_url(); ?>images/upload"><span class="glyphicon glyphicon-upload"></span> Upload</a></li>
                        <?php else: ?>
                            <li><a href="#" data-toggle="modal" data-target="#imageUploadModal"><span class="glyphicon glyphicon-upload"></span> Upload</a></li>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('user_id') == 1): ?>
                            <li><a href="<?php echo base_url(); ?>events"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
                        <?php endif; ?>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <?php if ($this->session->userdata('is_logged_in')): ?>
                            <li><a href="<?php echo base_url(); ?>auth/signout"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
                        <?php else: ?>
                            <!-- Ajax login modal dialog -->
                            <li><a href="#" data-toggle="modal" data-target="#signInModal"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>auth/sign_up"><span class="glyphicon glyphicon-edit"></span> Sign Up</a></li>
                    </ul>

                </div>
            </div>
        </nav>          
        <?php echo $output; ?>
        <br>
        <footer class="container-fluid">
            <div class="row">
                <p class="col-sm-12">
                    Designed and Developed by Sabre Interactive Solutions
                </p>
            </div>
        </footer>

        <!-- User Sign In Modal-->
        <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                    </div>
                    <form id="frm-sign_in" action="<?php echo site_url('auth/validate') ?>" method="POST">
                        <div class="modal-body">
                            <div class="alert alert-danger hidden" id="login-error" role="alert"><span class="glyphicon glyphicon-alert"></span> Email Address and/or Password incorrect</div>
                            <div class="alert alert-danger hidden" id="login-email-required-error" role="alert"><span class="glyphicon glyphicon-alert"></span> Email Address is required</div>
                            <div class="alert alert-danger hidden" id="login-password-required-error" role="alert"><span class="glyphicon glyphicon-alert"></span> Password is required</div>
                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <input id="email" class="form-control" name="email_address" type="text"/>
                            </div>
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input id="password" class="form-control" name="user_password" type="password"/>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox"> Remember Me</label>
                            </div>

                            <?php echo "Don't have an account? " . anchor('auth/sign_up', "Create an Account."); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary  btn-lg btn-block"><span class="glyphicon glyphicon-lock"></span> Sign In</button>
                            <button type="button" class="btn btn-default  btn-lg btn-block" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--        Modal for Standard users if they try to access the Upload page without Signing In or Creating an Account         -->
        <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="imageUploadModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
                    </div>
                    <div class="modal-body">
                        <p class="element_margins">
                            Uploading Images is a feature reserved for registered users. Don't worry though as becoming a registered user 
                            is as simple as creating an account. If you already have an account then all you need to do is sign in with your 
                            email address and password.
                        </p>
                        <div class="modal-footer">
                            <?php echo "To create an account visit this page " . anchor('auth/sign_up', "here"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

            //ajax Sign In functionality
            $(document).ready(function () {
                $("#frm-sign_in").submit(function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();
                    $.post(url, data)
                            .done(function (data) {
                                if (data === 'fail') {
                                    $("#login-error").removeClass("hidden");
                                    $("#login-password-required-error").addClass("hidden");
                                    $("#login-email-required-error").addClass("hidden");
                                } else if (data === "no-email") {
                                    $("#login-email-required-error").removeClass("hidden");
                                    $("#login-error").addClass("hidden");
                                    $("#login-password-required-error").addClass("hidden");
                                } else if (data === "no-password") {
                                    $("#login-password-required-error").removeClass("hidden");
                                    $("#login-error").addClass("hidden");
                                    $("#login-email-required-error").addClass("hidden");
                                } else if (data === "empty-fields") {
                                    $("#login-email-required-error").removeClass("hidden");
                                    $("#login-error").addClass("hidden");
                                    $("#login-password-required-error").removeClass("hidden");
                                } else {
                                    window.location.href = '';
                                }

                            });


                });
            });

            //Dialog box which is displayed when a user is trying to access the Upload page but is not logged in
            $(document).ready(function () {
                $("#img_upload").submit(function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: method,
                        data: data
                    }).done(function () {
                        window.location.href = '';
                    });
                });
            });

            //Dialog box which is displayed when the site administrator wants to delete an event (to confirm if they want to delete the event)
            $(document).ready(function () {
                $('a[confirm-event-deletion]').click(function () {
                    var href = $(this).attr('href');
                    if (!$('#confirmDeletion').length) {
                        $('body').append('\
                        <div id="confirmDeletion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">\n\
                        <div class="modal-dialog">\n\
                        <div class="modal-content">\n\
                        <div class="modal-header">\n\
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\n\
                        <h4 class="modal-title" id="dataConfirmLabel">Confirm Deletion</h4>\n\
                        </div>\n\
                        <div class="modal-body"><p>Warning: You are about to delete this event!</p><p class="element_margins">\n\
                        Deleting this event will remove it from this site permanently, are sure you want to delete it?\n\
                        </p>\n\
                        </div>\n\
                        <div class="modal-footer">\n\
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">No, keep it</button>\n\
                        <a class="btn btn-danger" id="dataConfirmOK">Yes, delete it</a>\n\
                        </div>\n\
                        </div>\n\
                        </div>\n\
                        </div>');
                    }
                    $('#dataConfirmOK').attr('href', href);
                    $('#confirmDeletion').modal({show: true});
                    return false;
                });
            });


            //Dialog box which is displayed when the site administrator wants to delete an image submitted by a site user (to confirm if they want to delete the image)
            $(document).ready(function () {
                $('a[confirm-image-deletion]').click(function () {
                    var href = $(this).attr('href');
                    if (!$('#confirmImageDeletion').length) {
                        $('body').append('\
                        <div id="confirmImageDeletion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">\n\
                        <div class="modal-dialog">\n\
                        <div class="modal-content">\n\
                        <div class="modal-header">\n\
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\n\
                        <h4 class="modal-title" id="dataConfirmLabel">Confirm Deletion</h4>\n\
                        </div>\n\
                        <div class="modal-body"><p>Warning: You are about to remove an image uploaded by this user!</p><p class="element_margins">\n\
                        You should only remove an image which breaches the Code of Conduct mentioned on this site. Are you sure this image needs to be removed?</p>\n\
                        </div>\n\
                        <div class="modal-footer">\n\
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">No, leave it be</button>\n\
                        <a class="btn btn-danger" id="dataConfirmOK">Yes, remove it</a>\n\
                        </div>\n\
                        </div>\n\
                        </div>\n\
                        </div>');
                    }
                    $('#dataConfirmOK').attr('href', href);
                    $('#confirmImageDeletion').modal({show: true});
                    return false;
                });
            });

            //Lightbox which displays User Images at Full Screen. Code provided by: Joe Mottershaw, Cloud Eight. http://www.cloud-eight.com/
            //https://github.com/joemottershaw/litebox
            $('.litebox').liteBox({
                revealSpeed: 400,
                background: 'rgba(0,0,0,.8)',
                overlayClose: true,
                escKey: true,
                navKey: true,
                errorMessage: 'Error loading content.'
            });


            //Extra fuctionality for the date picker on add-edit page
            //Code supplied by eternicode/bootstrap-datepicker (https://github.com/eternicode/bootstrap-datepicker)
            $('.date-selection .input-group.date').datepicker({
            format: "yyyy/mm/dd",
            startDate: "today",
            clearBtn: true,
            toggleActive: true
            });


        </script>
    </body></html>
