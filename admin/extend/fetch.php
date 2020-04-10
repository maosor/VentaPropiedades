<?php
//fetch.php
include '../conexion/conexion.php';

$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
 $records_per_page = $_POST["rowCount"];
}
else
{
 $records_per_page = 10;
}
if(isset($_POST["current"]))
{
 $current_page_number = $_POST["current"];
}
else
{
 $current_page_number = 1;
}
$start_from = ($current_page_number - 1) * $records_per_page;


if(isset($_POST["id"]))
{
 $idGrid = $_POST["id"];
}
else
{
 $idGrid = "data-cliente";
}

if ($idGrid == "data-cliente")  {
	$query .= "SELECT cliente.*, " . 
	          " IFNULL(ejecutivo.Nombre,'') as nombreEjecutivo, IFNULL(ejecutivo.Apellido1,'') as apellido1Ejecutivo, IFNULL(ejecutivo.Apellido2,'')  as apellido2Ejecutivo  " . 
	          " FROM cliente " . 
			  " LEFT OUTER JOIN ejecutivo ON cliente.idEjecutivoAsignado = ejecutivo.idEjecutivo ";
	if(!empty($_POST["searchPhrase"]))
	{
	 $query .= 'WHERE (cliente.idCliente LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR cliente.Nombre LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR ejecutivo.Nombre LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR ejecutivo.Apellido1 LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR ejecutivo.Apellido2 LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR cliente.email LIKE "%'.$_POST["searchPhrase"].'%" ) ';
	}
	$order_by = '';
	if(isset($_POST["sort"]) && is_array($_POST["sort"]))
	{
	 foreach($_POST["sort"] as $key => $value)
	 {
	  $order_by .= " $key $value, ";
	 }
	}
	else
	{
	 $query .= 'ORDER BY cliente.idCliente DESC ';
	}
	if($order_by != '')
	{
	 $query .= ' ORDER BY ' . substr($order_by, 0, -2);
	}

	if($records_per_page != -1)
	{
	 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}
//echo $query;
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_assoc($result))
	{
	 $data[] = $row;
	}

	$query1 = "SELECT * FROM cliente";
	$result1 = mysqli_query($con, $query1);
	$total_records = mysqli_num_rows($result1);
}
else if ($idGrid == "data-propiedad") 
{
/*
SELECT propiedad.*, provincia.idProvincia,  provincia.Descripcion as nombreProvincia,  canton.idCanton, canton.Nombre as nombreCanton,  distrito.idDistrito, distrito.Nombre as nombreDistrito,  sucursal.idSucursal, sucursal.Nombre as nombreSucursal,  ejecutivo.idEjecutivo, ejecutivo.Nombre as nombreEjecutivo, ejecutivo.Apellido1 as apellido1Ejecutivo, ejecutivo.Apellido2 as apellido2Ejecutivo   FROM propiedad  INNER JOIN provincia ON propiedad.idProvincia = provincia.idProvincia  INNER JOIN canton ON propiedad.idCanton = canton.idCanton  INNER JOIN distrito ON propiedad.idDistrito = distrito.idDistrito  INNER JOIN sucursal ON propiedad.idSucursal = sucursal.idDistrito  INNER JOIN ejecutivo ON propiedad.idEjecutivo = ejecutivo.idEjecutivo ORDER BY propiedad.idPropiedad DESC  LIMIT 0, 10	

*/
	
	$query .= "SELECT propiedad.*, " . 
	          " IFNULL(provincia.Descripcion, '') as nombreProvincia, " . 
	          " IFNULL(canton.Nombre,'') as nombreCanton, " . 
			  " IFNULL(distrito.Nombre,'') as nombreDistrito, " . 
	          " IFNULL(ejecutivo.Nombre,'') as nombreEjecutivo, IFNULL(ejecutivo.Apellido1,'') as apellido1Ejecutivo, IFNULL(ejecutivo.Apellido2,'')  as apellido2Ejecutivo  " . 
			  " FROM propiedad " . 
	          " LEFT OUTER JOIN provincia ON propiedad.idProvincia = provincia.idProvincia " . 
			  " LEFT OUTER JOIN canton ON propiedad.idCanton = canton.idCanton " . 
			  " LEFT OUTER JOIN distrito ON propiedad.idDistrito = distrito.idDistrito " . 
			  " LEFT OUTER JOIN ejecutivo ON propiedad.idEjecutivo = ejecutivo.idEjecutivo " ;
	if(!empty($_POST["searchPhrase"]))
	{
	 $query .= 'WHERE (propiedad.Ciudad LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR propiedad.Direccion LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR propiedad.NumeroRotulo LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR propiedad.Titulo LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR propiedad.Barrio LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR provincia.Descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR canton.Nombre LIKE "%'.$_POST["searchPhrase"].'%" ';
	 $query .= 'OR distrito.Nombre LIKE "%'.$_POST["searchPhrase"].'%" )';
	}
	$order_by = '';
	if(isset($_POST["sort"]) && is_array($_POST["sort"]))
	{
	 foreach($_POST["sort"] as $key => $value)
	 {
	  $order_by .= " $key $value, ";
	 }
	}
	else
	{
	  $query .= 'ORDER BY propiedad.idPropiedad DESC ';
	}
	if($order_by != '')
	{
	  $query .= ' ORDER BY ' . substr($order_by, 0, -2);
	}

	if($records_per_page != -1)
	{
	  $query .= " LIMIT " . $start_from . ", " . $records_per_page;
	}

//echo $query;
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_assoc($result))
	{
	 $data[] = $row;
	}

	$query1 = "SELECT * FROM propiedad";
	$result1 = mysqli_query($con, $query1);
	$total_records = mysqli_num_rows($result1);
	
}

$output = array(
 'current'  => intval($_POST["current"]),
 'rowCount'  => 10,
 'total'   => intval($total_records),
 'rows'   => $data
);

echo json_encode($output);

?>
