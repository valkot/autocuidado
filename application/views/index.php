<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>REGISTROS</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url();'assets/css/style.css'?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
 
<body>

<div class="container">
 <!--<div id ="home-title" class="alert alert-success"> Listado de beneficiarios</div>-->
 
    <div align="center">
        <table class="table" style="width: 60%; height: auto;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>FICHA</th>
                    <th>RUT</th>
                    <th>NOMBRES</th>
                    <th>PATERNO</th>
                    <th>MATERNO</th>
                    <th>DIRECCION</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
        </table>
    </div>
    <div align="center" style="overflow: hidden; display: inline-block; vertical-align: middle; height: 300px; width: 100%;">
        <table class="table" style="width: 60%; height: auto;">   
            <tbody>
                <tr>
                <?php
                foreach($data as $row)
                {
                echo "<tr>";
                    echo "<td>".$row->BEN_id."</td>";
                    echo "<td>".$row->BEN_ficha."</td>";
                    echo "<td>".$row->BEN_rut."</td>";
                    echo "<td>".$row->BEN_nombres."</td>";
                    echo "<td>".$row->BEN_paterno."</td>";
                    echo "<td>".$row->BEN_materno."</td>";
                    echo "<td>".$row->BEN_direccion."</td>";
                    //echo "<td><button name='agregar' value='agregar'></button></td>";
                    echo "<td><button type='button' class='btn btn-warning'>Editar</button></td>";
                    echo "<td><button type='button' class='btn btn-danger'>Eliminar</button></td>";
                echo "</tr>";
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
 
 
</div>

    
</body>
<!--
<button type="button" class="btn">Basic</button>
<button type="button" class="btn btn-default">Default</button>
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-link">Link</button>
-->
</html>
