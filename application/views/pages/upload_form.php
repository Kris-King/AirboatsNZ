<section class="wrapper">
    <section class="container">
        <section  id="events" class="container">
            <h1 class="margin_spacing">Upload Images</h1>
        </section>

        <section class="element_margins">
            <p>
                Here you can upload images to the User Gallery. If you require assistance please follow the instructions below.
            </p>
            <div class="element_margins">
            <p>1. Airboat</p>
            <p>2. Airboat</p>
            <p>3. Airboat</p>
            <p>4. Airboat</p>
            <p>5. Airboat</p>
            </div>
            <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
            <?php echo form_open_multipart('images/do_upload'); ?>

            <input type="file" class="btn-lg btn-primary" name="userfile" size="20" />

            <br /><br />

            <button type="submit" class="btn btn-primary" value="upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>

            <?php echo form_close(); ?>
        </section>
    </section>
</section>