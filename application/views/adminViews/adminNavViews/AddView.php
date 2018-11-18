<div class="container col-md-12">
    <div class="row admin_panel">
        <div class="card-deck col-md-12">
            <div class="col-md-4">
                <div style="height: 49%; margin-bottom: 3.1%;" class="card col-md-12">
                    <h2 class="admin add_views"><i class="fa fa-bars" aria-hidden="true"></i> Add Category</h2>
                    <div class="container admin_forms">
                        <?php echo form_open('AdminController/addCategory'); ?>
                        <div class="form-group">
                            <label for="categoryField">Enter Category</label>
                            <input type="text" class="form-control" id="categoryField" name="category" placeholder="Enter Category">
                            <?php echo form_error('category', '<div class="adminFormErrorMsg">', '</div>'); ?>
                        </div>
                        <button type="submit" class="btn btn-success col-md-12">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div style="height: 49%" class="card col-md-12">
                    <h2 class="admin add_views"><i class="fa fa-pencil-square" aria-hidden="true"></i> Add Author</h2>
                    <div class="container admin_forms">
                        <?php echo form_open('AdminController/addAuthor'); ?>
                        <div class="form-group">
                            <span id="author">Enter Author</span>
                            <input type="text" id="author" class="form-control" name="author" placeholder="Enter Author Name">
                            <?php echo form_error('author', '<p class="adminFormErrorMsg">', '</p>'); ?>
                        </div>
                        <button type="submit" class="btn btn-success col-md-12">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="card col-md-8">
                <h2 class="admin add_views"><i class="fa fa-book" aria-hidden="true"></i> Add Book</h2>
                <div class="container admin_forms">
                    <?php echo form_open_multipart('AdminController/addBook'); ?>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        <?php echo form_error('title', '<div class="adminFormErrorMsg">', '</div>'); ?>        
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
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
                        <div class="form-group col">
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="yearOfPublished">Year of Published</label>
                            <input type="text" class="form-control" id="yearOfPublished" name="yearOfPublished" placeholder="Enter Published Year">
                            <?php echo form_error('yearOfPublished', '<div class="adminFormErrorMsg">', '</div>'); ?>        
                        </div>
                        <div class="form-group col">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                            <?php echo form_error('price', '<div class="adminFormErrorMsg">', '</div>'); ?>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="imageName">Image Name</label>
                            <input type="text" class="form-control" id="imageName" name="imageName" placeholder="Enter Image Name">
                            <?php echo form_error('imageName', '<div class="adminFormErrorMsg">', '</div>'); ?>        
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="upload">Upload Image</label>
                            <input type="file" class="form-control-file" id="upload" name="upload">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Submit</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
