<?php 
$conexion=mysqli_connect('localhost','root','','gestion_usuarios');
$provincia=$_POST['provincia'];
$query=$conexion->query("SELECT * FROM localidad WHERE id_provincia={$provincia}");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>=0){
print "<option value='0'>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->id_localidad'>$s->descripcion</option>";
}
}else{
echo "<option value='0'>-- NO HAY DATOS --</option>";
}
?>