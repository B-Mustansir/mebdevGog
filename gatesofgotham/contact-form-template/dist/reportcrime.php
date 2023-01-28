<?php include("conn.php");?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
    <!-- Favicons -->
	<link href="../../../assets/img/gate.png" rel="icon">
  	<link href="../../.../assets/img/gate.png" rel="apple-touch-icon">
  <title>Report Crime</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-social/ss-social.css" rel="stylesheet" />

<link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-standard/ss-standard.css" rel="stylesheet" /><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<section id="hire">
    <h1 style="font: bold;">Report Crime</h1>
    
    <form action="#" method="POST" enctype="multipart/form-data">
	      <div class="field name-box">
		        <input type="text" id="name" name="name1" placeholder="Write your name..." />
        		<label for="name">Name</label>
		        <span class="ss-icon">Name</span>
	      </div>
		  <div class="field name-box">
		        <input type="text" id="name" name="email" placeholder="Write your email..."/>
        		<label for="name">Email</label>
		        <span class="ss-icon">Email</span>
	      </div>
		  <div class="field name-box">
		        <input type="text" id="name" name="age" placeholder="Write your age..."/>
        		<label for="name">Age</label>
		        <span class="ss-icon">Age</span>
	      </div>
		  <div class="field name-box">
		        <input type="text" id="name" name="gender" placeholder="Write your gender..."/>
        		<label for="name">Gender</label>
		        <span class="ss-icon">Gender</span>
	      </div>
	      <div class="field name-box">
		        <input type="text" name="contact" placeholder="Write your contact number..."/>
		        <label for="email">Contact Number</label>
		        <span class="ss-icon">Contact</span>
	      </div>
		  <div class="field name-box">
		        <input type="text" name="aadhar" placeholder="Write your aadhar name..."/>
		        <label for="email">Aadhar Number</label>
		        <span class="ss-icon">Aadhar</span>
	      </div>		  
		  
		  <div class="field name-box">
		        <input type="text" name="location" placeholder="Enter your location..."/>
		        <label for="email">Location</label>
		        <span class="ss-icon">Location</span>
	      </div>

	      <div class="field name-box">
		        <textarea id="msg" rows="4" name="description" placeholder="Write crime description..."/></textarea>
		        <label for="msg">Description</label>
		        <span class="ss-icon">Description</span>
	      </div>
		  <br>
		  <p></p>
		  <div class="field msg-box">
		  		<label for="msg">File Upload</label>
				<span></span>		
		  	<input type="file" name="fileInput">
		  </div>

		  <br>
		  <p> <br> </p>	
		  <input class="button" type="submit" name="submit" value="Submit" />	
		  <p></p>
		  <p> <br> </p>	  
		  <a href="../../../index-page.html" class="backbutton" >Back</a>
		  	  
</form>
</section>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
<?php
if ($_POST['submit']) {
    $name1 = $_POST['name1'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $aadhar = $_POST['aadhar'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $file = $_FILES['fileInput'];

     $imgname = $file['name'];
     $imgerror = $file['error'];
     $imgtmp = $file['tmp_name'];

     $imgtext = explode('.', $imgname);
     $imgcheck = strtolower(end($imgtext));
      
        $destinationfile = 'C:\xampp\htdocs\Techie\gatesofgotham\imgupload' . $imgname;
        move_uploaded_file($imgtmp, $destinationfile);
     

    $query = "insert into reports (name,email,age,gender,contact,aadhar,location,description,file) values('$name1','$email','$age','$gender','$contact','$aadhar','$location','$description','$destinationfile')";

    $data = mysqli_query($connection, $query);
    if ($data) {
        echo "Data saved";
    } else {
        echo "Failed to save";
    }
}
?>
</html>
