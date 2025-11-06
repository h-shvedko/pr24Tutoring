<?php
//Start local php server -  php -S localhost:8000

$testData = [
        1 => [
                'id' => 1,
                'name' => 'Test 1',
        ],
        3 => [
                'name' => 'Test 2',
        ],
        'php' => [
                'id' => 3,
                'name' => 'Test 3',
        ],
];

function getId(array $arrayData)
{
    if(array_key_exists('id', $arrayData)) {
        return $arrayData['id'];
    } else {
        return 0;
    }
}

// <?php echo ist dasselbe wie <?=
?>

<h1>Test Datei mit User Tabelle (Nummer von users ist: <?=count($testData)?>)</h1>
<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($testData as $test) : ?>
        <?php if (getId($test) == 1) : ?>
            <tr>
                <td>First</td>
                <td><?= $test['name'] ?></td>
            </tr>
        <?php else : ?>
            <tr>
                <td><?= getId($test) ?></td>
                <td><?= $test['name'] ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

    </tbody>
</table>

<?php

/**
 * <?php foreach ($testData as $test) { ?>
 * <?php if (getId($test) == 1) { ?>
 * <tr>
 * <td>First</td>
 * <td><?= $test['name'] ?></td>
 * </tr>
 * <?php } else { ?>
 * <tr>
 * <td><?php echo getId($test) ?></td>
 * <td><?php echo $test['name'] ?></td>
 * </tr>
 * <?php } ?>
 * <?php } ?>
 */


$lagerbestand = [
        'APF-01' => [
                "name" => "Äpfel (Bio)",
                "anzahl" => 80,
                "kategorie" => "Obst & Gemüse",
                "warnschwelle" => 20
        ],
        'BAN-02' => [
                "name" => "Bananen (Fairtrade)",
                "anzahl" => 45,
                "kategorie" => "Obst & Gemüse",
                "warnschwelle" => 20
        ],
        'MIL-03' => [
                "name" => "Milch (1.5%)",
                "anzahl" => 9,
                "kategorie" => "Milchprodukte",
                "warnschwelle" => 10
        ],
        'BRO-04' => [
                "name" => "Brot (Vollkorn)",
                "anzahl" => 0,
                "kategorie" => "Backwaren",
                "warnschwelle" => 5
        ]
];

/**
 *
 * Hausaufgabe
 *
 * Aufgabe: mache eine tabelle Darstellung in HTML von Array $lagerbestand
 * wenn anzahl < warnschwelle => zeigen "AUSVERKAUFT", wenn nicht, dann anzahl selbst
 *
 *
 * name                |      anzahl                |         kategorie            |        warnschwelle
 * Brot (Vollkorn)            AUSVERKAUFT                    Backwaren                         5
 */
