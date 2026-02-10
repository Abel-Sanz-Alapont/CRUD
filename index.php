<?php
require_once "autoload.php";
$miCatalago = new GestorVehiculos();

$modelos=["Honda","Ducati","Yamaha","Kawasaki","Suzuki","BMW","Harley","KTM"];//como el arrayrand

for ($i = 1; $i <= 25; $i++) { //coches
    $coche = new Coche(($i*2)+1, $i,$i*200);
    $miCatalago->anyadir($coche);
}

for ($i = 1; $i <= 25; $i++) { //motos
    $moto = new Moto($i*2,$modeloRand=$modelos[rand(0, count($modelos)-1)],rand(50,1200));
    $miCatalago->anyadir($moto);
}

var_dump($miCatalago);

$miCatalago->actualizarCoche(3,90,999999);
$miCatalago->actualizarMoto(2,"KIA",6060606060);

var_dump($miCatalago);

$miCatalago->eliminar(20);
$miCatalago->eliminar(24);

var_dump($miCatalago);