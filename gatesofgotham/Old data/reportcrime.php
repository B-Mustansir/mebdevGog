<?php include("conn.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Crime</title>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://unpkg.com/moralis-v1/dist/moralis.js"></script>
    <SCript type="text/javascript" src="jquery.js"></SCript>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<style>
    nav a {
        font-weight: 700;
        text-align: center;
        font-size: 40px;
        font-family: Hack, sans-serif;
        text-transform: uppercase;
        background: linear-gradient(90deg, #000, #fff, #000);
        letter-spacing: 5px;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        background-repeat: no-repeat;
        background-size: 80%;
        animation: shine 4s linear infinite;
        position: relative;
    }

    @keyframes shine {
        0% {
            background-position-x: -500%;
        }

        100% {
            background-position-x: 500%;
        }
    }

    body {
        background-color: #130f40;
        background-image: linear-gradient(300deg, #393660 0%, #000000 95%);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        background-position: center;
        color: aliceblue;
    }

    nav {

        height: 40px;
        padding-top: 15px;
        background-blend-mode: lighten;
    }

    nav a {
        color: whitesmoke;
    }

    .nav {
        float: right;
        margin-right: 10%;

    }

    header {
        display: flex;
        font-size: larger;
        border: solid;
        height: 100px;
        font-size: 50px;
        align-items: center;
        padding-left: 15px;
        border-radius: 5px;
    }

    nav a {
        margin: 10px;
        font-family: 'Source Serif 4', sans-serif;
        padding: 10px;
        text-decoration: none;
        color: rgb(17, 17, 17);
        font-size: 20px;

        border-radius: 4px;
    }

    select {
        border-radius: 10px;
        border-bottom: 2px white;
        padding: 10px;
        margin-left: 20%;
    }

    ::placeholder {
        color: antiquewhite;
        font-size: 15px;
    }

    textarea,
    input[type="text"] {
        width: 95%;
        color: azure;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid white;
        background-color: transparent;
    }

    .form {
        border: solid;
        border-radius: 5px;
        border-color: white;
        font-size: 15px;
        margin-left: 50px;
        width: 500px;
        padding: 20px;
        font-size: 20px;
        padding-left: 40px;

    }

    input[type="text"]:hover {
        transform: scale(1.05);
    }

    input[type="reset"] {
        width: 10%;
        padding: 5px;
        margin-top: 5px;
    }

    input[type="submit"] {
        width: 95%;
        padding: 8px;
        font-size: 20px;
    }

    h1 {
        font-weight: 700;
        text-align: center;
        font-size: 40px;
        font-family: 'Courier New', Courier, monospace;
        text-transform: uppercase;
        background: linear-gradient(90deg, #000, #fff, #fff);
        letter-spacing: 5px;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        background-repeat: no-repeat;
        background-size: 80%;
        animation: forwards;
        position: relative;
    }

    .form1 {
        margin-left: 50px;
        display: flex;
        justify-content: center;
    }

    img {
        height: fit-content;
        margin-top: 150px;
    }

    .file {
        all: none;
        font-weight: 200;
        text-align: center;
        font-size: 20px;
        font-family: 'Source Serif 4', sans-serif;
        animation: none;
        color: #000;
        padding: 15px;
        margin-top: 15px;
        /* margin-bottom: 5px; */
        background: linear-gradient(90deg, #fff, #fff, #fff);
    }
</style>

<body>
    <header>Crime Reporting-App</header>
    <nav>
        <a href="index1.html" class="title">Home</a>
        <a href="about.html">About</a>
        <a href="login.html" id="1">Login</a>
        <a href="faq.html">FAQ</a>

    </nav>
    <hr>
    <h1>Report Crime Here..</h1>
    <!-- <button id="btn-login" onclick=login()>login</button> -->
    <div class="form1">
        <img src="image-removebg-preview.png" alt="">
        <!-- <form action=""> -->
        <div class="form">
            <form action="#" method="POST" enctype="multipart/form-data">
                Name:
                <br>
                <input type="text" placeholder="Enter your Name" required name="name1" id="name">
                <br>
                Email id:
                <br>
                <input type="text" placeholder="Enter your Email" required name="email" id="email">
                <br>
                Age:
                <br>
                <input type="text" placeholder="Enter your Age" required name="age" id="age">
                <br>
                Gender:
                <br>
                <select name="gender" id="M/F">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <br><br>
                Contact Number:
                <br>
                <input type="text" placeholder="Enter your  Mobile Number" required name="contact" id="contact">
                <br>
                Aadhar Number:
                <br>
                <input type="text" placeholder="Enter your Aadhar Number" required name="aadhar" id="aadhar">
                <br>
                <!-- Location of crime:
                <br>
                <button onclick="getLocation()">Location</button> -->
                <input type="text" placeholder="Enter Location of crime " required name="location" id="location">
                <br>
                Description :
                <br>
                <input type="text" placeholder="Describe here" required name="description" id="description">
                <br>
                <!-- <input type="submit" value="Submit" onclick="submit"> -->
                <br>
                <!-- <input type="reset" value="Reset">
                <br> -->
                <!-- Download FIR file format:
                <br>
                <br>
                <a href="Fir_Format.docx" download id="file" class="file">Click here</a>
                <br> -->

                <br>
                <br>
                Upload file:
                <br>
                <input type="file" name="fileInput" id="fileInput"><br>
                <br>
                <input type="submit" value="submit" name="submit">
                <!-- <button onclick=asif()>Submit</button> -->
            </form>
            <!-- </form> -->
        </div>
    </div>
    <div id="result"></div>
   
</body>

<!-- <script type="text/javascript">
    var locLong;
    var locLat;

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Browser dont support grolaction");
        }

        function showPosition(position) {
            locLong = position.coords.longitude
            locLat = position.coords.latitude
            console.log(locLong, locLat)
            alert("Live location received")
        }


    }
    console.log(locLong, locLat)



    var hash;
    Moralis.initialize("vnwfK8neMxiH5D3VCZUUCZbT42GuHZ5Ykuezkj78");
    Moralis.serverURL = "https://dtw3vvtqurby.usemoralis.com:2053/server";

    Moralis.Web3.authenticate().then(function() {
        console.log(user.get('ethAdress'));
    })

    login = async () => {
        Moralis.Web3.authenticate().then(function(user) {
            console.log('logged in')
        })
    }

    //upload file

    uploadImage = async () => {
        const data = fileInput.files[0]
        const file = new Moralis.File(data.name, data)
        await file.saveIPFS();
        console.log(file.ipfs(), file.hash());
        return file.ipfs();
    }

    uploadMetadata = async (fir) => {
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const age = document.getElementById("age").value;
        const contact = document.getElementById("contact").value;
        const aadhar = document.getElementById("aadhar").value;
        const location = document.getElementById("location").value;
        const description = document.getElementById("description").value;


        const metadata = {
            "name": name,
            "email": email,
            "age": age,
            "contact": contact,
            "aadhar": aadhar,
            "location": location,
            "description": description,
            "latitude": locLat,
            "longitude": locLong,
            "FIR": fir
        }
        const file = new Moralis.File("file.json", {
            base64: btoa(JSON.stringify(metadata))
        });
        await file.saveIPFS();
        var hashy = file.ipfs();
        console.log(hashy);

        function createCookie(name, value, days) {
            var expires;

            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }

            document.cookie = escape(name) + "=" +
                escape(value) + expires + "; path=/";
        }

        createCookie("gfg", hashy, "10");;

        // Function to create the cookie
    }

    asif = async () => {
        const x = await uploadImage();
        await uploadMetadata(x);
    }
</script> -->

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
      
        $destinationfile = 'imgupload/' . $imgname;
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