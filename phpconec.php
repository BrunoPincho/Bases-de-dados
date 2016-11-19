<html>
 <body>
 

<?php


$patient = $_REQUEST['patient_id'];
$birthday = $_REQUEST['birthday'];
$address = $_REQUEST['address'];

$host = 'db.ist.utl.pt';
$user = 'ist175346';
$pass = 'gndc3355';
$dsn = "mysql:host=$host;dbname=$user";
$connection = new PDO($dsn, $user, $pass);


$sql = "SELECT * FROM patient where patient.patient_name='$patient' and patient.birthday = '$birthday' and patient.address='$address'";
$result = $connection->query($sql);

$nrows = $result->rowCount();

if ($nrows == 0)
{	

	echo("<h3>");
	echo("Nao existe paciente");
	echo("</h3>");
}else{

	$result = $connection->query($sql);
	$nrows = $result->rowCount();
	echo("<p>Number of rows: $nrows</p>");
	$ncols = $result->columnCount();
	echo("<p>Number of columns: $ncols</p>");

	echo("<table border=\"1\">");
	echo("<tr><td>patient_id</td><td>patient_name</td>
	<td>birthday</td><td>address</td></tr>");
	foreach($result as $row)
	{
		echo("<tr><td>");
		echo($row['patient_id']);
		echo("</td><td>");
		echo($row['patient_name']);
		echo("</td><td>");
		echo($row['birthday']);
		echo("</td><td>");
		echo($row['address']);
		echo("</td></tr>");

	}
	echo("</table>");
}
?>

<form>
<input type="button" value="Schedule" onclick="window.location.href='http://web.ist.utl.pt/ist175346/appointment.php'" />
</form>

<form>
<input type="button" value="Register Patient" onclick="window.location.href='http://web.ist.utl.pt/ist175346/reg&appoit.php'" />
</form>

 </body>
</html>
