<link rel="stylesheet" href="/css/tablePrice.css">
<section id="price" class="fon2">
    <h2>Прайс</h2>

    <?php
    $group = array();
    foreach ($haircuts as $haircut) {
        $group[$haircut->titleService][] = $haircut;
    }
    ksort($group);

    echo '<table class="table">';
    echo '<tr>';
    echo '<th class="th">Услуга</th>';
    echo '<th class="th">Цена</th>';
    echo '</tr>';
    echo '</tbody>';
    foreach ($group as $key1 => $haircut1) {
        ksort($haircut1);
        echo '<tr><th style="background-color: #cccccc;">', $key1, '</th></tr>';
        foreach ($haircut1 as $key2) {
            echo '<tr>';
            echo '<td style="text-align: left; width: 50%;">', $key2->title, '</td>';
            echo '<td>', $key2->price, '&#8381;</td>';
            echo '</tr>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    ?>
</section>