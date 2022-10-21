<?php 
include("connect.php");
?>
<!DOCTYPE">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BIENVENIDOS AL CRUD</title>
</head>

<body>
<h2>CREAR USUARIOS</h2>
<form action="create.php" method="post" enctype="application/x-www-form-urlencoded">
<label>Nombres</label>
<input type="text" name="name" required="required" /><br /><br />
<label>Celular</label>
<input type="text" name="mobile" required="required" /><br /><br />

<label>Email</label>
<input type="email" name="email" required="required" /><br /><br />

<input type="submit" name="submit" required="required" value="ENVIAR" />
</form>
<table border="1" width="300px">
<tr>
<th>#</th>
<th>Nombres</th>
<th>Correo</th>
<th>Celular</th>
<th>Acción</th>
</tr>
<?php 
$get_datas = $conn->prepare("select * from crud");
$get_datas->execute();
if($get_datas->rowCount()>0){
$i=1;
while($res=$get_datas->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $res['name']; ?></td>
<td><?php echo $res['mobile']; ?></td>
<td><?php echo $res['email']; ?></td>
<td><a href="edit.php?id=<?php echo $res['id'];?>">Editar</a><br /><a href="delete.php?id=<?php echo $res['id'];?>">Eliminar</a></td>
</tr>
<?php } }else{
echo "<tr><td colspan='5'>NO SE ENCUNTRAN DATOS</td></tr>";
} ?>
</table>
<?php if(@$_GET['message']){ 
 echo $_GET['message'];
 } ?>
</body>
</html>