<?php
//if($_SERVER['REQUEST_METHOD'] == 'POST') {

$method = 'login';
$format = 'xml';

$email = 'pavelzin@gmail.com';
$password = md5('^GEoFr0*^f1V');

$url = "http://furgonetka.pl/api/$method.$format?email=$email&password=$password";

$xml = simplexml_load_file($url);

$status = $xml->getName();

if ($status == 'success') {
$hasz = $xml->hash;

$method = 'getPlacowki';
$params = array();

$params['hash'] = $hasz;



$query = array();
foreach ($params as $name => $value) {
    $query[] = "$name=" . urlencode($value);
}
$query = implode('&', $query);

$url = "http://furgonetka.pl/api/$method.$format?$query";

$xml = simplexml_load_file($url);

echo '<pre>';
print_r($url);
echo '<pre>';


$status = $xml->getName();

if ($status == 'success') {
    echo "OK";
} elseif ($status == 'error') {
    foreach($xml->error as $error) {
        if(isset($error->field)) {
            echo $error->field .': ';
   echo $xml->hash;
        }
        echo $error->message;
    }
} else {
    echo 'Błąd komunikacji';
}

} elseif ($status == 'error') {
    foreach($xml->error as $error) {
        if(isset($error->field)) {
            echo $error->field .': ';
        }
        echo 'total error ;)';
    }
} else {
    echo 'Błąd komunikacji';
}

?>