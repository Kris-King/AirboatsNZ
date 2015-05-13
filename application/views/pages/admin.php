<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <h1><span class="glyphicon glyphicon-cog"></span> Admin Dashboard<hr></h1>
            <div>
                <a href="<?php echo site_url('events/add_edit'); ?>" class="btn btn-primary btn-lg btn-block" role="button"><span class="glyphicon glyphicon-plus"></span> Add an Event</a>
            </div>
            <div class="element_margins">
                <?php
                //success message
                if ($this->session->flashdata('success')):
                    ?>
                    <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php
                //error message
                if ($this->session->flashdata('error')):
                    ?>
                    <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span> <?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
            </div>
            <div class="element_spacing">
                <div class="element_margins">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#Welcome" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-user"></span> Welcome</a></li>
                        <li><a data-toggle="pill" href="#Events" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-edit"></span> Edit/Delete Events</a></li>
                        <li><a data-toggle="pill" href="#User_Images" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-user"></span> User Images</a></li>
                        <li><a data-toggle="pill" href="#Help" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="Welcome" class="tab-pane fade in active element_spacing">
                            <h3><span class="glyphicon glyphicon-user"></span> Hi, Malcolm<hr></h3>
                            <br>
                            <p>
                                As an administrator of Airboats New Zealand you have special permissions on this site and that includes adding, 
                                editing, deleting upcoming events and deleting user images. You and only you will have access to this portion of the site; no other 
                                users will have access. The dashboard has been structured as a simple and easy to use interface, this is to 
                                ensure your continued satisfaction. If you however become unsure of how to operate the admin dashboard at any 
                                point you can visit the 'Help' section. This 'Help' section can walk you through the admin process. 
                                The dashboard has been structured to give you only the most important information so you can remain in 
                                control of what is shown on the 'Events' page. Thank you for time and have a nice day. 
                            </p>
                        </div>
                        <div id="Events" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-calendar"></span> Edit/Delete Events<hr></h3>
                            <div class="element_margins">
                                <!--           List of Events created by site admin                        -->
                                <?php
                                if (isset($events)):
                                    $table_template = array(
                                        'table_open' => '<table class="table">',
                                    );
                                    $table_heading = array(
                                        '0' => array('data' => 'Id', 'class' => 'col-sm-2'),
                                        '1' => array('data' => 'Title', 'class' => 'col-sm-4'),
                                        '2' => array('data' => 'Edit Event', 'class' => 'col-sm-3'),
                                        '3' => array('data' => 'Delete Event', 'class' => 'col-sm-3'));
                                    $this->table->set_template($table_template);
                                    $this->table->set_heading($table_heading);
                                    echo $this->table->generate($events);
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="User_Images" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-user"></span> User Images<hr></h3>
                            <div class="element_margins">
                                <!--    List of images uploaded by users of this site           -->
                                <?php
                                if (isset($images)):
                                    $table_template = array(
                                        'table_open' => '<table class="table">',
                                    );
                                    $table_heading = array(
                                        '0' => array('data' => 'Id'),
                                        '1' => array('data' => 'User Id'),
                                        '2' => array('data' => 'Image Name'),
                                        '3' => array('data' => 'Delete Image'));
                                    $this->table->set_template($table_template);
                                    $this->table->set_heading($table_heading);
                                    echo $this->table->generate($images);
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="Help" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-question-sign"></span> Help<hr></h3>
                            <h4>Confused and need assistance?</h4>
                            <br>
                            <p>
                                - To edit an event, head to the 'Edit/Delete Events' section and select 'Edit' next to the event that you wish to edit.
                                <br><br>
                                - To add an event click the 'Add an Event' button and fill in the information that the form requires.
                                <br><br>
                                - To delete an event head to the 'Edit/Delete Events' section and select delete next to the event that you wish to delete.
                                <br><br>
                                - To confirm an event deletion a confirmation dialog box will be displayed.
                                <br><br>
                                - Once an event has been deleted it can not be recovered. A new event will need to be created if you deleted it by mistake.
                                <br><br>
                                - To view images submitted by site users head to the 'User Images' section.
                                <br><br>
                                - You can delete these user images. When you do so, you will be asked to confirm this deletion.
                                <br><br>
                                - If the information you entered is incorrect an error will be displayed to let you know what you missed.
                                <br><br>
                                - If you require further assistance please contact the site creator with your concerns and/or problems.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>