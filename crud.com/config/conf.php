<?php
	//Start connection
	function dbConnect(){
		$servername = "localhost";							//rarely need to edit this
		$username = "";								//must edit this
		$password = "";								//edit if required
		$db = "id19307040_testdata";							//edit if required
		$conn = mysqli_connect($servername, $username, $password, $db);
		if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
		}
		else{
			return $conn;
		}
	}
	
	//Insert into db
	function dbInsert(){
		$conn = dbConnect();
		$name = htmlspecialchars($_POST['name']);					//edit according to your table
		$age = htmlspecialchars($_POST['age']);					//edit according to your table
		$sql = 'insert into users(name, age) values("'.$name.'", '.$age.');';	//edit according to your table
		if (mysqli_query($conn, $sql)) {
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	
	//Select ($col_list) from table;
	//the $col_list is an array so you have to create an array of columns in your table.
	//for eg. - dbSelect($col_list = array('id', 'name', 'age'));
	function dbSelect($col_list){
		$conn = dbConnect();
		$sql = 'select ';
		for ($i=0; $i <= count($col_list)-1; $i++) {
			$sql = $sql.$col_list[$i];
		}
		$sql = $sql.' from users;';

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo '<form method="post">
				        <tr>
				            <td>
				            	<input type="hidden" value="'.$row["id"].'" name="id">'.$row["id"].'
				            </td>
				            <td>
				            	<input type="text" name="name" value="'.$row["name"].'" placeholder="'.$row["name"].'">
				            </td>
				            <td>
				            	<input type="text" name="age" value="'.$row["age"].'" placeholder="'.$row["age"].'">
				            </td>
				            <td>
				            	<input type="submit" name="edit" value="Edit"> | <input type="submit" name="delete" value="Delete">
				            </td>
				        </tr>
				    </form>';	//This needs a lot of editing and might be the worst. Sorry. Edit according to your table
			}
		} else { echo "<tr><td colspan='4'>0 results</td></tr>"; }
		mysqli_close($conn);

	}

	function dbDelete(){
		$conn = dbConnect();
		$id = htmlspecialchars($_POST['id']);
		$sql = 'delete from users where id='.$id.';';
		if (mysqli_query($conn, $sql)) {
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

	function dbEdit(){
		$conn = dbConnect();
		$id = htmlspecialchars($_POST['id']);		//edit according to your table
		$name = htmlspecialchars($_POST['name']);	//edit according to your table
		$age = htmlspecialchars($_POST['age']);	//edit according to your table
		$sql = 'update users set name="'.$name.'", age='.$age.' where id='.$id.';';	//edit according to your table
		if (mysqli_query($conn, $sql)) {
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}

	function _goto($page){
		//This doesn't work in https://000.webhost.com, I don't know why
		header('Location: '.$page);
		exit;
	}
	
	function _goto_alt($page){
		//Sorry for the Jscript T.T, only use this if _goto function doesn't work, like in https://000.webhost.com
		echo '<script>window.location.replace("'.$page.'")</script>";';
	}

?>
