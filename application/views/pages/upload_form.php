<section class="wrapper">
    <section class="container">
        <section  id="events" class="container">
            <h1 class="margin_spacing">Upload Images</h1>
        </section>

        <section class="element_margins">
            <p>
                Here you can upload images to the User Gallery. If you need assistance uploading an image please follow the instructions below.
            </p>
            <div class="element_margins">
            <p>1. Click on the browse or Choose file button</p>
            <p>2. Select the image that you want to upload</p>
            <p>3. Click the upload button</p>
            <p>4. Errors with your image will be displayed below</p>
            <p>5. Upon the successful upload of your image you will be redirected to the User Gallery page</p>
            </div>
            <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
            <?php echo form_open_multipart('images/do_upload'); ?>

            <input type="file" class="btn-lg btn-primary" id="userfile" name="userfile" size="20" />

            <br /><br />

            <button type="submit" class="btn btn-primary" value="upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>

            <?php echo form_close(); ?>
        </section>
    </section>
</section>