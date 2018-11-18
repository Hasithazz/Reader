
<div class="container col-md-12">
    <div class="row col-md-12">
        <div class="container col-md-12">
            <?php echo form_open('AdminController/searchBook'); ?>
            <div class="form-inline col-md-12">
                <div class="form-group my-1 mr-sm-2">
                    <label class="my-1 mr-sm-2" for="searchTitle">Enter Title </label>
                    <input type="text" class="form-control my-1 mr-sm-2" id="searchTitle" name="searchTitle" placeholder="Enter Title of the Book">
                    <?php echo form_error('searchTitle', '<div class="adminFormErrorMsg">', '</div>'); ?>
                </div>
                <div class="form-group my-1 mr-sm-2">
                    <label class="my-1 mr-sm-2" for="searchAuthor">Enter Author</label>
                    <input type="text" class="form-control my-1 mr-sm-2" id="searchAuthor" name="searchAuthor" placeholder="Enter Author of the Book">
                    <?php echo form_error('searchAuthor', '<div class="adminFormErrorMsg">', '</div>'); ?>
                </div>
                <div class="col-auto my-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="titleCheck" value="check" name="titleCheck">
                        <label class="form-check-label" for="titleCheck">
                            By Title
                        </label>
                        <?php echo form_error('titleCheck', '<div class="adminFormErrorMsg">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-auto my-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="authorCheck" value="check" name="authorCheck">
                        <label class="form-check-label" for="authorCheck">
                            By Author
                        </label>
                        <?php echo form_error('authorCheck', '<div class="adminFormErrorMsg">', '</div>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-1">Search &nbsp;<i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="container">
            <div class="container row col-md-12">
                <?php               
                if (isset($books)) {
                    echo '<div class="container row col-md-12">'
                    . '<h2>Search Result</h2>'
                    . '</div>'
                    . '<div class="container row col-md-12">';
                    foreach ($books as $value) {
                        echo
                        '<div class="card-deck">
                            <div class="card">
                                <img class="allBooks img" src="' . base_url() . 'assets/images/' . $value->ImageUrl . '" alt="' . base_url() . 'assets/images/wonder.jpg">
                                <div class="card-body">
                                    <div class="allbooks title">
                                        <h6class="card-title ">' . $value->Title . '</h5>
                                    </div>
                                    <div class="allbooks author">
                                    <p class="card-text"> Author : ' . $value->AuthorName . '</p>
                                    </div>                       
                                    <p class="card-text"> Year of published : ' . $value->YearOfPublished . '</p>                            
                                </div>
                            </div>
                        </div>';
                    }
                    echo '</div>';
                } else {
                    
                }
                ?>
            </div>
        </div>
    </div>
</div>
