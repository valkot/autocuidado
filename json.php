<?php
//http://10.66.61.53:57772/rest/fonasa/getCertificadoPrevisional/rut:2068446-1

//$rs     = API::Authentication($URL.'authentication','','');
//$array  = API::JSON_TO_ARRAY($rs);


//$rs     = API::GET($URL.'rut:2068446-1', $token);
//$array  = API::JSON_TO_ARRAY($rs);
//echo $array;






$ch = curl_init();

$headers = array(
    sprintf('Authorization: Bearer 12345678')
);
$rut ='18443705-8';

// set url
curl_setopt($ch, CURLOPT_URL, "http://10.66.61.53:57772/rest/fonasa/getCertificadoPrevisional/rut:".$rut);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);






// close curl resource to free up system resources
curl_close($ch);   










extract(json_decode($output, true));
if(isset($nombres))
{$elNombre = $nombres;}
else
{$elNombre = '';}

if(isset($apell1))
{$elPaterno = $apell1;}
else
{$elPaterno = '';} 

if(isset($apell2))
{$elMaterno = $apell2;}
else
{$elMaterno = '';}

if(isset($direccion))
{$laDireccion = $direccion;}
else
{$laDireccion = '';}

if(isset($fechaNacimiento))
{$fechaNac = $fechaNacimiento;}
else
{$fechaNac = '';}

if(isset($fechaFallecimiento))
{$fechaFall = $fechaFallecimiento;}
else
{$fechaFall = '';}

if(isset($generoDes))
{$genero = $generoDes;}
else
{$genero = '';}

if(isset($tramoFo))
{$tramo = $tramoFo;}
else
{$tramo = '';}

if(isset($telefono))
{$fono = $telefono;}
else
{$fono = '';}


?>