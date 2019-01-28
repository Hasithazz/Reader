<h1>Statistics</h1>
<table class="table">
    <thead>
    <tr>
        <th>Serial Key</th>
        <th>Title</th>
        <th>Views</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($books as $book) {
        echo '<tr>';
        echo '<td>'.$book->SerialKey.'</td>';
        echo '<td>'.$book->Title.'</td>';
        echo '<td>'.$book->Views.'</td>';
        echo '</tr>';
    }
    ?>

    </tbody>
</table>