<div class ="container">
    <h2>Add Category</h2>

    <?php echo form_open('AdminController/addCategory', 'class="col-md-12 adminForm"'); ?>
    
    <div class="form-group">
        <label for="categoryField">Enter Category</label>
        <input type="text" class="form-control" id="categoryField" name="category" placeholder="Enter Category">
        <?php echo form_error('category', '<div class="adminFormErrorMsg">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    
    <?php echo form_close(); ?>

</div>
