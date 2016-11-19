<html>
<body>
<p> resultados</p>
<?php	
	$patient_id = $_REQUEST['patient_id'];
	$doctor_name = $_REQUEST['doctor_name'];
	$date = $_REQUEST['date'];
	$office = $_REQUEST['office'];
	

	$host = 'db.ist.utl.pt';
	$user = 'ist175346';
	$pass = 'gndc3355';
	$dsn = "mysql:host=$host;dbname=$user";
	$connection = new PDO($dsn, $user, $pass);

				$sql = "SELECT * FROM doctor where doctor.doctor_name='$doctor_name'";
				$result = $connection->query($sql);


				foreach($result as $row)
				{
					$id = $row['doctor_id'];
				}
				echo $patient_id;
				echo $id;
				echo $date;
				echo $office;
				$day=strftime("%A",strtotime($date));
				echo $day;
				if($day== "Saturday" or $day =="Sunday" ){
					echo("Data apontada nao e um dia util");
					$connection = NULL;
					exit();

				}else{
				
					$sql = "INSERT INTO appointment VALUES ('$patient_id','$id', '$date','$office')";
					$nrows = $connection->exec($sql);
					echo("<p>Rows inserted: $nrows</p>");

				}
	#$sql = "SELECT max(patient_id) FROM patient";
	#$last_pid = $connection->query($sql);
	#$patient_id = $last_pid +1;
	
	
?>
</body>



</html>