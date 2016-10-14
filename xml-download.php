<?php

$dzisiaj = date("Y-m-d");


$filename = 'paczkomaty-z-' . $dzisiaj . '.xml' ;

if (file_exists($filename)) {
    echo "Plik $filename istnieje";
} else {
    echo "Plik $filename nie istnieje!";
    $string = file_get_contents('http://api.paczkomaty.pl/?do=listmachines_xml');
	file_put_contents('paczkomaty-z-' . $dzisiaj. '.xml', $string);

	echo '<br />' . $filename . 'został zapisany';
}






?>