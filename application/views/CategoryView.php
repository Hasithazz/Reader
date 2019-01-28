<div class="container">
    <div class='row'><br></div>
    <div class='row'>
        <div class="col-md-12">
            <h1><?php echo urldecode($category); ?></h1><br>
            <div class="row">
                <?php
                foreach ($booksInCategory as $key) {
                    echo
                        '<div style="padding-bottom: 15px;" class="col-sm-3">
                    <div style="max-height: 575px; min-height: 575px;" class="card">
                    <img class="allBooks img" src="' . base_url() . 'assets/images/' . $key->ImageUrl . '" alt="' . base_url() . 'assets/images/wonder.jpg">
                        <div class="card-body">
                            <div class="allbooks title">
                               <h6class="card-title ">' . $key->Title . '</h5>
                            </div>
                            <div class="allbooks author">
                                <p class="card-text"> Author : ' . $key->AuthorName . '</p>
                            </div>                       
                            <p class="card-text"> Year of published : ' . $key->YearOfPublished . '</p>
                            <p class="card-text">Price : $' . $key->Price . '</p>
                            <a href="' . site_url('BookController/viewBook/' .
                            urldecode($key->SerialKey)) . '" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
