<!DOCTYPE HTML>
<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/transact/sessioncheck.php";
include $path;
session();
?>
<html lang="es">
    <head>
	<title>Departamentos</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
        <link rel="stylesheet"  href="../../../css/themes/default/jquery.mobile-1.3.0-beta.1.css">
        <link rel="stylesheet" href="../_assets/css/jqm-docs.css"/>

        <link rel="stylesheet" href="/resources/demos/style.css" />
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>

        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <script src="../../../js/jquery.mobile-1.3.0-beta.1.js"></script>
        <script src="../../docs/_assets/js/jqm-docs.js"></script>
        <script src="../jquery.mobile.validate.js" type="text/javascript"></script>


    </head>
    <body>



        
           

               


    
                <?php
                include "../menu.html";
				include '../transact/conectDB.php';
                $link = conectar();
                $query = "SELECT NumDepartamento, NomDepartamento FROM departamento ORDER BY NumDepartamento ASC";
                $result = mysql_query($query, $link) or die($sql . ">>" . mysql . error());
                ?>
       



            
			<div data-role="content">
                    <table>

                        <thead>
                            <tr>
                                <th>Id Departamento</th>
                                <th>Departamento</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($row = mysql_fetch_array($result)) {
                                do {

                                    echo "<tr><td>" . $row["NumDepartamento"] . "</td><td>" . $row["NomDepartamento"] . "</td>";
                                    ?>
                                <td><a href="ActuDeparta.php?NumDepartamento=<?php echo $row["NumDepartamento"]; ?>"><center><img src = '../images/edit.png' alt='Editar' height='25' width='25'></a></center></a></td></tr>
                                <?php
                            } while ($row = mysql_fetch_array($result));
                            echo "</table> \n";
                        } else {
                            echo "� No se ha encontrado ning�n registro !";
                        }
                        ?>


                        </tbody>

                    </table>
					
					<a href="RegDepar.php"><button type="button" data-inline="true">Registrar Departamento</button></a>
			</div>
</div>
        
    </body>
</html>