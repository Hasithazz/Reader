<div class ="container">
    <h2>Add Category</h2>

    <?php echo form_open('AdminController/addAuthor', 'class="col-md-12 adminForm"'); ?>
    
    <div class="form-group">
        <label for="author">Enter Author Name</label>
        <input type="text" class="form-control" id="categoryField" name="author" placeholder="Enter Author Name">
        <?php echo form_error('author', '<div class="adminFormErrorMsg">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    
    <?php echo form_close(); ?>

</div>
