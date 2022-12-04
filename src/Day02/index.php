<?php

// Lire le fichier Txt
$data = file("../../inputs/Day02/input-day2.txt");
$total = count($data);
$scorefinal_1 = 0;

$move = ["X" => 1, "Y" => 2, "Z" => 3];
// A for Rock, B for Paper, and C for Scissors
// X for Rock, Y for Paper, and Z for Scissors
$fight_turn_1 = [
    "0" => ["A", "B", "C"],
    "X" => ["3", "0", "6"],
    "Y" => ["6", "3", "0"],
    "Z" => ["0", "6", "3"],
];

foreach ($data as $key => $item) {
    $item = trim($item);
    [$adversaire, $perso] = explode(" ", $item);

    $infos = array_search($adversaire, $fight_turn_1[0]);
    $scorefinal_1 += $fight_turn_1[$perso][$infos] + $move[$perso];
}

// ----------------------------------------------------------------
$scorefinal_2 = 0;
// A for Rock, B for Paper, and C for Scissors : // A > B > C > A
// X = Lose, Y = Draw, and Z = Win
// 1 for Rock, 2 for Paper, and 3 for Scissors
$move = ["X" => 0, "Y" => 3, "Z" => 6];
$choice = ["A" => 1, "B" => 2, "C" => 3];

$fight_turn_2 = [
    "0" => ["A", "B", "C"],
    "X" => ["C", "A", "B"],
    "Y" => ["A", "B", "C"],
    "Z" => ["B", "C", "A"],
];

foreach ($data as $key => $item) {
    $item = trim($item);
    [$adversaire, $resultat] = explode(" ", $item);

    $infos = array_search($adversaire, $fight_turn_2[0]);
    $perso = $fight_turn_2[$resultat][$infos];
    $scorefinal_2 += $move[$resultat] + $choice[$perso];
}

echo "Resultat 1 : " . $scorefinal_1;
echo "<br />Resultat 2 : " . $scorefinal_2;