<?php

// Lire le fichier Txt
$fichier = file("../../inputs/Day1/input-day01.txt");
$total = count($fichier);

$calories = [];
$elve = 0;

for ($i=0; $i < $total; $i++) {
    if (strlen(($fichier[$i])) !== 1) {
        $calories[$elve][] .= $fichier[$i];
    } else if (strlen(($fichier[$i])) === 1) {
        $elve++;
    }
}

$elve = 1;

// faire des sommes par Elf
foreach ($calories as $key => $elf) {
    $tmp[$key] = array_sum($elf);

    $elve++;
}
unset($calories);
$calories = $tmp;
rsort($calories, SORT_NUMERIC);

$sum = $calories[0] + $calories[1] + $calories[2];

// Retourner l'Elf qui aura le plus de calorie.
echo "L'elfe ayant eu le plus de calorie : " . max($calories). "<br />Somme de calorie des 3 premiers elfes : ". $sum;