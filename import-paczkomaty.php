<?php
$dzisiaj = date("Y-m-d");
$filename = 'paczkomaty-z-' . $dzisiaj . '.xml' ;

if (file_exists($filename)) {

$string2 = file_get_contents('paczkomaty-z-' . $dzisiaj . '.xml');

$xml = simplexml_load_string(
	$string2
    , null
    , LIBXML_NOCDATA
	);
$json = json_encode($xml);
$array = json_decode($json,TRUE);



$paczkomat = $array['machine'];

foreach ($paczkomat as $key)

{
								
echo '<ol>';
echo '<li>' . $key['name'] . '</li>';
echo '<li>' . $key['type'] . '</li>';
echo '<li>' . $key['postcode'] . '</li>';
echo '<li>' . $key['province'] . '</li>';
echo '<li>' . $key['street'] . '</li>';
if (!empty($key['buildingnumber'])) {echo '<li>' . $key['buildingnumber'] . '</li>';}
echo '<li>' . $key['town'] . '</li>';
echo '<li>' . $key['latitude'] . '</li>';
echo '<li>' . $key['longitude'] . '</li>';
echo '<li>' . $key['paymentavailable'] . '</li>';
echo '<li>' . $key['status'] . '</li>';
if (!empty($key['locationdescription'])) {echo '<li>' . $key['locationdescription'] . '</li>';}
if (!empty($key['locationDescription2'])) {echo '<li>' . $key['locationDescription2'] . '</li>'; } 
if (!empty($key['operatinghours'])) {echo '<li>' . $key['operatinghours'] . '</li>';} 
if (!empty($key['paymentpointdescr'])) {echo '<li>' . $key['paymentpointdescr'] . '</li>';}
if (!empty($key['paymenttype'])) {echo '<li>' . $key['paymenttype'] . '</li>';}

echo '</ol>';

}


//polacze sie do bazy

//$nazwa == $key['name'];

//sql= update * from where $nazwa 

//jesli cos sie nie uda to wysle sobie mejla

} else {

echo "trzeba sciagnac plik";
}


?>