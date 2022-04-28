
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="../../assets/css/consultas.css" rel="stylesheet" type="text/css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		  <div class="navbar-header">
			<a class="navbar-brand" id="censo" href="#">Censo</a>
		  </div>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </nav>
	  
	<div class="alert alert-success" style="display:none;"></div>
    <?php
                include "conexion.php";
                $dni=$_POST["dni"];
                $query="SELECT * from info_persona where DNI='$dni'";
                $result = $db->query($query);
				$result->setFetchMode(PDO::FETCH_ASSOC);
                ?>
                <div class="row">
                    <div class="col-md-3" ></div>
                    <div class="col-md-6" >
                    <form action="" method="post">
				    <?php while ($row = $result->fetch()): ?>
                        <div class="form-header">						
                            <h4 class="modal-title">Modificar información</h4>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>DNI</label>
                                <input id="DNI" type="text" name="dni"  class="form-control" value="<?php echo htmlspecialchars($row['DNI']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo htmlspecialchars($row['NOMBRE']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Fecha Nacimiento</label>
                                <input type="date" name="fecnac" value="<?php echo htmlspecialchars($row['FECNAC']) ?>" id="fecnac">
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input id="dir" type="text" name="dir"  class="form-control" value="<?php echo htmlspecialchars($row['DIR']) ?>" required>
                            </div>	
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="int" id="tfno" name="tfno" value="<?php echo htmlspecialchars($row['TFNO'])?>" id="tfno">
                            </div>				
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success">
                        </div>
					<?php endwhile; ?>
				</form>
                    </div>
                    <div class="col-md-3" ></div>
                </div>
                

				<?php
                    if(isset($_POST['submit'])){
						$dni=$_POST["dni"];
						$nombre=$_POST["nombre"];
						$fecnac=$_POST["fecnac"];
						$dir=$_POST["dir"];
						$tfno=$_POST["tfno"];
						
							$sql = "UPDATE info_persona SET NOMBRE='$nombre',FECNAC='$fecnac',DIR='$dir',TFNO=$tfno WHERE DNI='$dni'";
							$query=$db->prepare($sql);
                            $query->execute();
                            $data = $query->fetchAll();
                            $delete=array();

                            if($query){
                                $delete["respuesta_delete"]=true;
                                }else{
                                $delete["respuesta_delete"]=false;
                                } 
                                header("location:../../views/admin/consultas.html");
                            
                            echo json_encode($delete);

							
                    }
					
					
				?>
						
	
</body>

<script src="../../assets/js/jquery-3.6.0.min.js"> </script>
<script src="../../assets/js/consultas.js"></script>
</html>
