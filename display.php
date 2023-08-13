<?php
 include("connection.php");
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>crud operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="comntainer">
	<button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a>
	</button>
	    <table class="table">
            <thead class="dark">
                <tr>
                <th scope="col">sl no</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Password</th>
				<th scope="col">operations</th>
            </thead>
            <tbody>
			<?php
			$sql = "SELECT * FROM crud";
					$result = $connection->query($sql);
					
					if(!$result){
						die("Invalud query:" .$connection->error);
					}
					
					//read data of each row
					while($row = $result->fetch_assoc()){
					$id=$row['id'];
					$name=$row['name'];
					$email=$row['email'];
					$mobile=$row['mobile'];
					$password=$row['password'];
					echo "<tr>
					<th>$row[id]</th>
					<td>$row[name]</td>
					<td>$row[email]</td>
					<td>$row[mobile]</td>
					<td>$row[password]</td>
					<td>
			          <a class='btn btn-primary btn-sm' href='/project6/update.php?id=$row[id]'>Update</a>
					  <a class='btn btn-danger btn-sm' href='/project6/delete.php?id=$row[id]'>Delete</a>
                    </td>
					</tr>";
				}
			?>
            </tbody>
        </table>
	</div>
  </body>
 </html>