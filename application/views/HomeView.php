<div class="container">
    <div class ='row'><br></div>
    <div class ='row'>
        <div class="col-xs-12">
            <h1>Most Popular</h1>
            <br>
            <div class="row">
                <table style="margin-left: 10px">
                    <tbody>
                        <tr>
                            <?php
                            $count = 0;
                            foreach ($mostPopulerBooks as $key) {
                                echo '<td class="mostPopuler content">';
                                echo '<table>';
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<td class="mostPopuler title"><b>' . $key->Title . '</b></td></tr>'; //display the title 
                                echo '<tr>';
                                echo '<td><img class="mostPopuler img" src="' . base_url() . 'assets/images/' . $key->ImageUrl . '"></td></tr>';
                                echo '</tbody></table></td>';
                                $count++;
                                if ($count == 5)
                                    break;
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-xs-12">
            <br>
            <h1>All Books</h1>
            <br>
            <div class="row">
                <?php
                foreach ($allBooks as $key) {
                    echo
                    //'<div style="padding-bottom: 15px;" class="col-md-3">
                    '<div style="padding-bottom: 15px; padding-right: 25px;" class="card-deck">
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
            <div class="row"><?php echo $links; ?></div>
        </div>
    </div>
</div>