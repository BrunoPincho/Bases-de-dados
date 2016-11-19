<html>
	<body>
	<html>
	<body>



	<form action="schedule.php"> 
	<h3>Appointment Form</h3>
	<p>Patient id: <input type="text" name="patient_id"/></p>
	<p>Doctor:
		<select name="doctor_name">
			<?php
					$host = 'db.ist.utl.pt';
					$user = 'ist175346';
					$pass = 'gndc3355';
					$dsn = "mysql:host=$host;dbname=$user";
				
				$connection = new PDO($dsn, $user, $pass);
				$sql = "SELECT doctor_name FROM doctor";
				$result = $connection->query($sql);
				
				foreach($result as $row)
					{
						$doctor_name = $row['doctor_name'];
						echo("<option value=\"$doctor_name\">$doctor_name</option>");
					}
			?>
		</select>
	</p>
	
	<p>Date: <input type="text" name="date"/></p>
	<p>Office: <input type="text" name="office"/></p>
	
	<p><input type="submit" value="Submit"/></p>
	</form>





	</body>
</html>	




	