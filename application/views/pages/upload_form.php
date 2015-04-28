<section class="wrapper">
    <section class="element_spacing">
        <div class="container">
            <div class="row spacing">
                <h1>Upload Image<hr></h1>
                <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                <?php echo form_open_multipart('images/do_upload'); ?>

                <input type="file" class="btn-lg btn-primary" name="userfile" size="20" />

                <br /><br />

                <button type="submit" class="btn btn-primary" value="upload"><span class="glyphicon glyphicon-upload"></span> Upload</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</section>