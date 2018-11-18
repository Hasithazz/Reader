<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Main</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <?php $this->load->view('layouts/NavBar', $categories); ?> 
        </div>

        <div class="container">
            <div class="row">
                <br><br>          
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    if ($mainView == 'HomeView') {
                        $this->load->view(mainView,$mostPopulerBooks);
                    }elseif ($mainView == 'CategoryView') {
                        $this->load->view(mainView);                      
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

