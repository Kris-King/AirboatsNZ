<section class="container element_spacing">
<div class="alert alert-danger" role="alert"><?php echo $error; ?></div>

<?php echo form_open_multipart('images/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
</section>