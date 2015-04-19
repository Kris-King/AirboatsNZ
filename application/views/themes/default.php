<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Airboats New Zealand | <?php echo $title; ?></title>
        <meta name="resource-type" content="document" />
        <meta name="robots" content="all, index, follow"/>
        <meta name="googlebot" content="all, index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        /** -- Copy from here -- */
        if (!empty($meta))
            foreach ($meta as $name => $content) {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
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
        <link href="<?php echo base_url(); ?>assets/themes/default/css/general.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/themes/default/css/custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>


        <script src="<?php echo base_url(); ?>assets/themes/default/js/bootstrap.min.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/images/fav.png" type="image/x-icon"/>
        <meta property="og:image" content="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png"/>
        <link rel="image_src" href="<?php echo base_url(); ?>assets/themes/default/images/facebook-thumb.png" />


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
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/themes/default/images/site_logo.png" style="float:left;z-index:5;" alt="logo"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="<?php echo site_url('site/about'); ?>"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
                        <li><a href="<?php echo site_url('site/gallery'); ?>"><span class="glyphicon glyphicon-camera"></span> Gallery</a></li>
                        <li><a href="<?php echo site_url('site/events'); ?>"><span class="glyphicon glyphicon-globe"></span> Events</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#" data-toggle="modal" data-target="#signInModal"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
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

        <!-- /container -->
        <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                    </div>
                    <form id="frm-login" action="<?php echo base_url() ?>auth/validate" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name="password" type="password"/>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox"> Remember Me</label>
                            </div>

                            <?php echo "Don't have an account? " . anchor('site/sign_up', "Create an Account."); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sign In <span class="glyphicon glyphicon-log-in"></span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="imageUploadModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
                    </div>
                    <form id="img-upload" action="<?php echo base_url() ?>image/validate" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="uploadImage">Upload Image</label>
                                <input type="file" id="uploadImage">
                                <br>
                                <p class="help-block">Max Size: 1000MB</p>
                                <p class="help-block">Accepted Files: jpg, png, gif</p>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload <span class="glyphicon glyphicon-upload"></span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">

            //ajax login functionality
            $(document).ready(function() {
                $("#frm_login").submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: method,
                        data: data
                    }).done(function() {
                        window.location.href = 'site';
                    });
                });
            });

            //ajax image upload functionality
            $(document).ready(function() {
                $("#img_upload").submit(function(e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();
                    $.ajax({
                        url: url,
                        type: method,
                        data: data
                    }).done(function() {
                        window.location.href = 'site';
                    });
                });
            });
        </script>
    </body></html>
