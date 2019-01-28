<div class="container col-md-12">
    <div class="row col-md-12 homePage carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url('assets/images/quotes/q2.jpg'); ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>"So many books, so little time."</h3>
                        <p>Frank Zappa</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/images/quotes/q1.jpg'); ?>" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>“A room without books is like a body without a soul.”</h3>
                        <p>Marcus Tullius Cicero</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('assets/images/quotes/q3.jpg'); ?>" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>“There is no friend as loyal as a book.” </h3>
                        <p>Ernest Hemingway</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row" style="margin: auto;">        
        <div class="col-md-12">
            <br>
            <h1>All Books</h1>
            <br>
            <div class="col-md-12 row" style="margin: auto;margin-left: 40px;">
                <?php
                foreach ($allBooks as $key) {
                    echo
                    //'<div style="padding-bottom: 15px;" class="col-md-3">
                    '<div style="padding-bottom: 15px; padding-right: 25px;" class="card-deck col-md-3">
                    <div style="max-height: 575px; min-height: 575px;" class="card border-primary">
                    <img class="allBooks img" src="' . base_url() . 'assets/images/' . $key->ImageUrl . '" alt="' . base_url() . 'assets/images/wonder.jpg">
                        <div class="card-body">
                            <div class="allbooks title">
                               <h6class="card-title ">'. $key->Title . '</h5>
                            </div>
                            <div class="allbooks author">
                                <p class="card-text"> Author : ' . $key->AuthorName . '</p>
                            </div>                       
                            <p class="card-text"> Year of published : ' . $key->YearOfPublished . '</p>
                            <p class="card-text"><strong>Price : $' . $key->Price . '</strong></p>
                            <a href="' . site_url('BookController/viewBook/' .
                            urldecode($key->SerialKey)) . '" class="btn btn-primary btn-block">View</a>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
            <div class="row"><?php echo $links; ?></div>
        </div>
    </div>
</div>