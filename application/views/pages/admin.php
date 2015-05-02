<section class="wrapper">
    <section class="container">
        <div class="element_margins">
            <h1><span class="glyphicon glyphicon-cog"></span> Admin Dashboard<hr></h1>
            <div>
            <a href="<?php echo site_url('events/add_event'); ?>" class="btn btn-primary btn-lg btn-block" role="button"><span class="glyphicon glyphicon-plus"></span> Add an Event</a>
            </div>
            <div class="row element_spacing">
                <div class="element_margins container">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#Welcome" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-user"></span> Welcome</a></li>
                        <li><a data-toggle="pill" href="#Events" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-edit"></span>Edit Events</a></li>
                        <li><a data-toggle="pill" href="#Delete_Events" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-trash"></span> Delete Events</a></li>
                        <li><a data-toggle="pill" href="#Help" class="btn-default marg3" role="button"><span class="glyphicon glyphicon-question-sign"></span> Help</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="Welcome" class="tab-pane fade in active element_spacing">
                            <h3><span class="glyphicon glyphicon-user"></span> Welcome, Malcolm<hr></h3>
                            <br>
                            <p>
                                As an administer of Airboats New Zealand you have special permissions on this site and that includes adding, 
                                editing and deleting upcoming events. You and only you will have access to this portion of the site; no other 
                                users will have access. The dashboard has been structured as a simple and easy to use interface, this is to 
                                ensure your continued satisfaction. If you however become unsure of how to operate the admin dashboard at any 
                                point you can visit the 'Help' section. This 'Help' section can walk you through the admin process. 
                                The dashboard has been structured to give you only the most important information so you can remain in 
                                control of what is shown on the 'Events' page. Thank you for time and have a nice day. 
                            </p>
                        </div>
                        <div id="Events" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-edit"></span>Edit Events<hr></h3>        
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Edit Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Airboat Meet</td>
                                            <td><a href="<?php echo site_url('events/add_event'); ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-wrench"></span> Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airboat Conference</td>
                                            <td><a href="<?php echo site_url('events/add_event'); ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-wrench"></span> Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airboat Showcase</td>
                                            <td><a href="<?php echo site_url('events/add_event'); ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-wrench"></span> Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                        </div>
                        <div id="Delete_Events" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-trash"></span> Delete Events<hr></h3>
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Delete Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Airboat Meet</td>
                                            <td><a href="#Add_Event" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airboat Conference</td>
                                            <td><a href="#Add_Event" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airboat Showcase</td>
                                            <td><a href="#Add_Event" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div id="Help" class="tab-pane fade element_spacing">
                            <h3><span class="glyphicon glyphicon-question-sign"></span> Help<hr></h3>
                            <h4>Confused and need assistance?</h4>
                            <br>
                            <p>
                                - To edit an event, head to the 'Edit Events' section and select 'Edit' next to the event that you wish to edit.
                                <br><br>
                                - To add an event click the 'Add an Event' button and fill in the information that the form requires.
                                <br><br>
                                - To delete an event head to the 'Delete Events' section and select delete next to the event that you wish to delete.
                                <br><br>
                                - To confirm an event deletion a confirmation dialog box will be displayed.
                                <br><br>
                                - Once an event has been deleted it can not be recovered. A new event will need to be created if you deleted it by mistake.
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