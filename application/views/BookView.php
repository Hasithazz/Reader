<div class="container">
    <div class="col-md-12">
        <div class="row mostPopuler row">
            <div class="row mostPopuler title"><h2>Most Popular</h2></div>
            <div class="row" style="margin: auto;"><?php
                $count = 1;
                foreach ($mostPopulerBooks as $key) {
                    if ($key->SerialKey == $book->SerialKey) {
                        
                    } else {
                        echo '<td class="mostPopuler content">';
                        echo '<table>';
                        echo '<tbody>';
                        echo '<tr>';
                        echo '<td class="mostPopuler title"><b>' . $key->Title . '</b></td></tr>'; //display the title 
                        echo '<tr>';
                        echo '<td><img class="mostPopuler img" src="' . base_url() . 'assets/images/' . $key->ImageUrl . '"></td></tr>';
                        echo '</tbody></table></td>';
                        $count++;
                    }
                    if ($count == 6)
                        break;
                }
                ?>
            </div></div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img class="img-fluid rounded float-left book image" src="<?php echo base_url('assets/images/' . $book->ImageUrl); ?>" alt="Card image cap">
        </div>
        <div class="col-md-9" style="margin-top: 8.25rem;">
            <div class="col-md-12 book-card">
                <div class="card col-md-12">                    
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book->Title; ?></h5>

                        <div class="allbooks author">
                            <p class="card-text"> Author : <?php echo $book->AuthorName; ?></p>
                            <p class="card-text"> Category : <?php echo $book->Type; ?></p>
                        </div>                       
                        <p class="card-text"> Year of published :  <?php echo $book->YearOfPublished; ?> </p>
                        <p class="card-text">Price : $<?php echo $book->Price; ?></p>
                        <a href="<?php
                        echo site_url('BookController/buyBook/' .
                                urldecode($book->SerialKey));
                        ?>" class="btn btn-primary">Buy</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row mostPopuler row">
            <div class="row"><h2>Recommended</h2></div>
            <div class="row"><?php
                $count = 1;
                foreach ($recommended as $key) {

                    echo '<td class="mostPopuler content">';
                    echo '<table>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td class="mostPopuler title"><b>' . $key->Title . '</b></td></tr>'; //display the title 
                    echo '<tr>';
                    echo '<td><img class="mostPopuler img" src="' . base_url() . 'assets/images/' . $key->ImageUrl . '"></td></tr>';
                    echo '</tbody></table></td>';
                    $count++;
                }
                ?>
            </div></div>
    </div>
</div>