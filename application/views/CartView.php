<div class="container">
    <div class="row"></div>
    <div class="row">
        <?php
        $items = $this->session->sessionArray;
        if (isset($items)) {
            $index = 0;
            foreach ($items as $item) {

                echo '<div class="row cart-row col-md-12">';
                echo '<div class="container">';
                echo '<img class="cart-img" src="' . base_url('assets/images/') . $item['imageUrl'] . '">';
                echo '<div class="col-xs-2 cart-title">' . $item['title'] . "</div>";
                echo '<a class="btn btn-danger cart-remove-btn" href="' . site_url('BookController/removeItem/' . $index) . '"> Remove </a>';
                echo '</div>';
                echo '</div>';
                $index++;
            }
        } else {
            echo 'No Items To Purchase';
        }
        ?>
    </div>
</div>
