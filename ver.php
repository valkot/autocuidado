<html>
    <head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/sankey.js"></script>
    <script src="https://code.highcharts.com/modules/organization.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script> 

    <style>
        #container 
        {
            min-width: 1024px;
            max-width: 1920px;
            margin: 1em auto;
            border: 1px solid silver;
        }

        #container h4 
        {
            text-transform: none;
            font-size: 8px;
            font-weight: normal;
        }
        #container p 
        {
            font-size: 9px;
            line-height: 16px;
        }
    </style>


    </head>
    <body>
        <div id="container" style="width: 1600px; height: auto;"></div>
        
    </body>  
<?php 

$server = "localhost";
$user = "root";
$pass = "$&s3rv1c10S4ludMS&$";
$bd = "ssms_prais";


$conexion = new PDO("mysql:host=localhost;dbname=ssms_prais", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));


$ind = array();
$ad = array();
$ben = array();
$categories = array();

$id = array();
$rut = array();
$nombreCompleto = array();
$posicion = array();

$c = array();
$c[] = '2';
$c[] = '1';
$c[] = '4';
$c[] = '2';
echo "TEST";

$queryIND = $conexion->query("SELECT BEN_id, BEN_ficha, BEN_rut, BEN_nombres, BEN_paterno, BEN_materno, REL2_id, ACRE_id FROM beneficiarios WHERE BEN_ficha = (SELECT BEN_ficha FROM beneficiarios WHERE BEN_id = 113) order by ACRE_id ASC, REL2_id ASC");
while($rows = $queryIND->fetch())
{
    
    if($rows['ACRE_id'] == 1)
    {
        $id[] = $rows['BEN_id'];
        $rut[] = $rows['BEN_rut'];
        $nombreCompleto[] = $rows['BEN_nombres'].' '.$rows['BEN_paterno'].' '.$rows['BEN_materno'];
        $posicion[] = $rows['ACRE_id'];
    }
    else if($rows['ACRE_id'] == 2)
    {
        $t = $rows['BEN_id'];
        $f = $rows['REL2_id'];
        $ad[] = "['$f', '$t']";
        $id[] = $rows['BEN_id'];
        $rut[] = $rows['BEN_rut'];
        $nombreCompleto[] = $rows['BEN_nombres'].' '.$rows['BEN_paterno'].' '.$rows['BEN_materno'];
        $posicion[] = $rows['ACRE_id'];
    }
    else if($rows['ACRE_id'] == 3)
    {
        $a = $rows['REL2_id'];
        $b = $rows['BEN_id']; 
        $ben[] = "['$a','$b']";
        $id[] = $rows['BEN_id'];
        $rut[] = $rows['BEN_rut'];
        $nombreCompleto[] = $rows['BEN_nombres'].' '.$rows['BEN_paterno'].' '.$rows['BEN_materno'];
        $posicion[] = $rows['ACRE_id'];
        //rel2(3) == ben(2)=>

    }
}

for($j=0; $j< count($ad); $j++)
{
    $categories[] = $ad[$j].',';
}
$largo = count($ben); 
$fin = $largo-2;
for($k=0; $k<$largo; $k++)
{
    if($k > $fin)
    {
        $categories[] = $ben[$k];
    }
    else
    {
        $categories[] = $ben[$k].',';
    }   
}


?>
<?php 


$end = count($rut);
$ended = $end -2;
?>


<br /><br />
    <script>
        Highcharts.chart('container', {

chart: {
    height: 500,
    inverted: true
},

title: {
    text: 'Numero de Ficha'
},

series: [{
    type: 'organization',
    name: 'PRAIS',
    keys: ['from', 'to'],
    data: [ <?php for($i=0; $i< count($categories); $i++){echo $categories[$i];}?>
    ],
    levels: 
    [
        {
        level: 0,
        color: 'red',
        dataLabels: 
            {
                color: 'white'
            },
            height: 25//25
        }, 
        {
        level: 1,
        color: 'blue',
        dataLabels: 
            {
                color: 'white'
            },
            height: 25//25
        }, 
        {
        level: 2,
        color: 'green',
        dataLabels: 
            {
                color: 'white'
            }
        }
    ],
    nodes: 
    [
        <?php 
        $num = 1;

            for($j=0; $j<count($rut); $j++)
            { 
                if($j > $ended)
                {
                    echo "{id: '$id[$j]', title: '$rut[$j]', name: '$nombreCompleto[$j]'}";
                }
                else
                {
                    echo "{id: '$id[$j]', title: '$rut[$j]', name: '$nombreCompleto[$j]'},";
                }  
            }
        ?>
    ],
    colorByPoint: false,
    color: '#007ad0',
    dataLabels: {
        color: 'white'
    },
    borderColor: 'white',
    nodeWidth: 65
}],
tooltip: {
    outside: true
},
exporting: {
    allowHTML: true,
    sourceWidth: 800,
    sourceHeight: 600
},
credits: {
    enabled: false
}

});
    </script>
    
</html>