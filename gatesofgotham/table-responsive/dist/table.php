<?php include("conn.php");
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Registered Complaints</title>
	  <!-- Favicons -->
	  <link href="../../../assets/img/gate.png" rel="icon">
  		<link href="../../../assets/img/gate.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="style.css">

</head>

<body>

	<!-- partial:index.partial.html -->
	<h1><span class="blue">&lt;</span>Registered<span class="blue">&gt;</span> <span class="yellow">Complaints</pan>
	</h1>
	<h2>Want to <a href="../../../index-page.html" target="_blank">Logout</a> ? </h2>
	<table class="container">
		<thead>
			<tr>
				<th>
					<h1>Sr.No</h1>
				</th>
				<th>
					<h1>Name</h1>
				</th>
				<th>
					<h1>Email</h1>
				</th>
				<th>
					<h1>Gender</h1>
				</th>
				<th>
					<h1>Age</h1>
				</th>
				<th>
					<h1>Contact</h1>
				</th>
				<th>
					<h1>Aadhar</h1>
				</th>
				<th>
					<h1>Location</h1>
				</th>
				<th>
					<h1>Description</h1>
				</th>
				<th>
					<h1>Doc</h1>
				</th>
				<th>
					<h1>Status</h1>
				</th>
			</tr>
		</thead>
		<?php
		$selectquery;
          
		if ($_POST['submit']) {
		  $name = $_POST['find_aadhar'];
		  $selectquery = "select * from reports where name='$name' ";
		}
		elseif(isset($_GET['sortby'])){
		  $sort=$_GET['sortby'];
		  $selectquery = "select * from reports order by $sort";
		}
		else{
		  $selectquery = "select * from reports ";
		}
		
		// $selectquery = "select * from reports ";
		$query = mysqli_query($connection, $selectquery);
		$num = mysqli_num_rows($query);

		while ($res = mysqli_fetch_array($query)) {

		?>

			<tbody>
				<tr>
					<td><?php echo $res['id']; ?></td>
					<td><?php echo $res['name']; ?></td>
					<td><?php echo $res['email']; ?></td>
					<td><?php echo $res['age']; ?></td>
					<td><?php echo $res['gender']; ?></td>
					<td><?php echo $res['contact']; ?></td>
					<td><?php echo $res['aadhar']; ?></td>
					<td><?php echo $res['location']; ?></td>
					<td><?php echo $res['description']; ?></td>
					<td><a href="<?php echo $res['file']; ?>">Click here</a></td>
					<td><?php
						if ($res['resolve'] == '0') { ?><a href="resolved.php?id=<?php echo $res['id']; ?>"> Resolve </a></td>
				            <?php
						} else {
				            ?><p>Resolved</p><?php
						} ?></td>

				</tr>
			<?php } ?>
			</tbody>
	</table>
	<!-- partial -->

	<script src="./script.js"></script>
	<!-- <table class="container">
		<thead>
			<tr>
				<th>
					<h1>Want to find a report ?</h1>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="find_aadhar"></td>
				<td><input type="submit" value="Submit" name="submit"></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th>
					<h1>Sort by: </h1>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Sort By:
		<select name="formal" onchange="javascript:handleSelect(this)">
		<option value="">select here</option>
		<option value="location">location</option>
		<option value="resolve">Resolve</option></td></select>
			</tr>
		</tbody>
	</table> -->

	<table class="container">
		<form action="#" method="POST" enctype="multipart/form-data">
			<thead>
                <th>
                    <h1>Find A Report : - </h1>
                </th>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="find_aadhar" id=""></td>
					<td><input type="submit" value="Submit" name="submit"></td>
				</tr>
			</tbody>
    	</form>
	</table>
	
	<table class="container">
		<thead>
            <th>
                <h1>Sort By : - </h1>
            </th>
		</thead>
		<tbody>
			<tr>
				<td >
					<select class="sortby" name="formal" onchange="javascript:handleSelect(this)">
					<option value="" >Select here: </option>
					<option value="location">Location</option>
					<option value="resolve">Resolve</option>
				</td>
			</tr>
		</tbody>
	</table>

	</select>

	<script type="text/javascript">
	function handleSelect(elm)
	{
		window.location = "table.php?sortby="+elm.value;
	}
	</script>

    </select>

	</form>

	<script type="text/javascript">
		function handleSelect(elm) {
			window.location = "table.php?sortby=" + elm.value;
		}
	</script>

</body>

</html>