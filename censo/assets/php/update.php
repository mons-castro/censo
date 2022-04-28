

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                include "conexion.php";
                $dni=$_POST["dni"];
                $query="SELECT * from info_persona where DNI='$dni'";
                $result = $db->query($query);
				$result->setFetchMode(PDO::FETCH_ASSOC);
                ?>
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
</html>