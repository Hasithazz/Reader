<div class ="container">
    <h2>Add Book</h2>

    <?php echo form_open_multipart('AdminController/addBook', 'class="col-md-12 adminForm"'); ?>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
        <?php echo form_error('title', '<div class="adminFormErrorMsg">', '</div>'); ?>        
    </div>
    <div class="form-group">
        <label for="authorSelect">Author</label>
        <select class="form-control" id="authorSelect" name="authorSelect">
            <?php
            foreach ($authors as $key) {
                echo
                '<option value="' . $key->AuthorId . '">' . $key->AuthorName . '</option>';
            }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="categorySelect">Category</label>
        <select class="form-control" id="categorySelect" name="categorySelect">
            <?php
            foreach ($categories as $key) {
                echo
                '<option value="' . $key->CatID . '">' . $key->Type . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="yearOfPublished">Year of Published</label>
        <input type="text" class="form-control" id="yearOfPublished" name="yearOfPublished" placeholder="Enter Published Year">
        <?php echo form_error('yearOfPublished', '<div class="adminFormErrorMsg">', '</div>'); ?>        
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
        <?php echo form_error('price', '<div class="adminFormErrorMsg">', '</div>'); ?>        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <label for="imageName">Image Name</label>
                <input type="text" class="form-control" id="imageName" name="imageName" placeholder="Enter Image Name">
                <?php echo form_error('imageName', '<div class="adminFormErrorMsg">', '</div>'); ?>        
            </div>
            <div class="form-group col-sm-4">
                <label for="upload">Upload Image</label>
                <input type="file" class="form-control-file" id="upload" name="upload">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>

    <?php echo form_close(); ?>

</div>