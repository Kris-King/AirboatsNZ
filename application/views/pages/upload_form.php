<section class="wrapper">
    <section class="container">
        <section  id="upload" class="container">
            <h1 class="margin_spacing floatR"><span class="glyphicon glyphicon-upload"></span> Upload Images</h1>
        </section>

        <section class="element_margins">
            <p>
                Here you can upload images to the User Gallery. If you need assistance uploading an image please follow the instructions below.
            </p>
            <br>
            <div>
                <p>Allowed file types: jpg, png, JPG, jpeg</p>
                <p>Max image width: 1920px</p>
                <p>Max image height: 1080px</p>
                <p>Max image size: 1 MB (1,000 KB)</p>
                <br>
                <p>1. Click on the browse or Choose file button</p>
                <p>2. Select the image that you want to upload</p>
                <p>3. Click the upload button</p>
                <p>4. Errors with your image will be displayed below</p>
            </div>
            <br>
            <div class="spacing">
                <?php
                //success message if the image uploaded successfully
                if ($this->session->flashdata('success')):
                    ?>
                    <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-floppy-open"></span> <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php
                //error message if the image failed to upload
                if ($this->session->flashdata('error')):
                    ?>
                    <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-floppy-open"></span> <?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
            </div>
            <?php if (isset($error))://If there is an error with the image a user is trying to upload then show this error message ?>
                <div class="alert alert-danger"><?php echo $error; ?></div> 
            <?php endif; ?>
                <!--                Image Upload                                                     -->
            <?php echo form_open_multipart('images/do_upload'); ?>
            <input type="file" class="btn btn-primary btn-lg btn-block" id="userfile" name="userfile" />
            <br>
            <button type="submit" class="btn btn-primary  btn-lg btn-block" value="upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>
            <?php echo form_close(); ?>
        </section>
    </section>
</section>