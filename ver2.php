<html>
    <head>
    </head>
    <body>
<?php


$server = "localhost";
$user = "root";
$pass = "$&s3rv1c10S4ludMS&$";
$bd = "ssms_prais";

$conexion = new PDO("mysql:host=localhost;dbname=ssms_prais", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));


$ind = "";
$ad = array();
$ben[] = array();
$categories = array();


$queryIND = $conexion->query("SELECT BEN_id, BEN_ficha, BEN_rut, BEN_nombres, BEN_paterno, BEN_materno, REL2_id, ACRE_id FROM beneficiarios WHERE BEN_ficha = (SELECT BEN_ficha FROM beneficiarios WHERE BEN_id = 113) order by ACRE_id DESC");
while($rows = $queryIND->fetch())
{
    if($rows['ACRE_id'] == 3)
    {
        $ind = $rows['BEN_id'];
    }
    else if($rows['ACRE_id'] == 1)
    {
        $t = $rows['BEN_id'];
        $ad[] = "['$ind', '$t'],"; 
    }
    else if($rows['ACRE_id'] == 2)
    {
       $a = $rows['REL2_id'];
       $b = $rows['BEN_id']; 
        $ben[] = "['$a','$b'],";
    }
}

for($j=0; $j< count($ad); $j++)
{
    $categories[] = $ad[$j];
}

for($k=0; $k< count($ben); $k++)
{
    $categories[] = $ben[$k];
}

for($l=0; $l< count($categories); $l++)
{
    echo $categories[$l].'<br />';
}
echo '<br /><br /><br /><br /><br />';




$result = array();

$objetos = array();
$contador = 1;

for($i=0; $i< count($categories); $i++)
{echo $categories[$i].'<br />';
    if($i >= 2)
    {
        if($categories[$i] == 'AD')
        {
            //$objetos[] = "['AD','BEN".$contador."']";
            $objetos = "[AD,BEN]";
            $contador++;
        }
    }
    else
    {
        $objetos = "[INDICE,AD]";
    }
}


array_push($result,$categories);


//print json_encode($result, JSON_NUMERIC_CHECK);
//$json = json_encode($objetos);

$link = NULL;

//header('Content-Type: application/json');
 
//echo $json;

?>
    </body>
</html>





<?php for($j=0; $j<count($rut); $j++){echo "{id: $id[$j], title: $rut[$j], name: $nombreCompleto[$j]},";}?>