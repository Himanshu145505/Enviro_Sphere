<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviro Sphere Home</title>

    <!-- Links -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="footer.css">

    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles-light.css" id="theme-style">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>

body{
    background-color : black;
    overflow-x: hidden; /* Hide horizontal scroll bar */
    transition: background-color 0.3s, color 0.3s;
}

/* Unique hover effect for navbar list items */
header a:hover {
color: #14ff72cb; /* Change text color to green */
background: #14ff72cb; /* Change background color to green */
border-radius: 2px; /* Add border-radius */
}


/* Remove green color effect from cart and user icon */
.CART:hover,
.UserICON:hover {
color: inherit; /* Use the default text color */
background: none; /* Remove background color */
border-radius: inherit; /* Use the default border-radius */
}



/* Lighter variant of white */
#container a {
color: #f0f0f0; /* Lighter white */
}

/* Change color of "Enviro Sphere" */
#shopName {
color: #e0e0e0; /* Lighter variant of white */
font-family: 'Raleway', sans-serif;/* Use a different font, for example, Roboto */
}


/* Change color of cart icon */
.addedToCart {
color: #f0f0f0; /* Lighter white */
}

/* Change color of user icon */
.userIcon {
color: #f0f0f0; /* Lighter white */
}

#container {
    background-color:  rgb(6, 61, 80);
}

#containerSlider
{
    margin: auto;
    width: 90%;
    text-align: center;
    padding-top: 100px;
    box-sizing: border-box;
}
#containerSlider img
{
    width: 100%;
    height: 140%;
    text-align: center;
    align-content: center;
}
@media(max-width: 732px)
{
    #containerSlider img
    {
        height: 12em;
    }
}
@media(max-width: 500px)
{
    #containerSlider img
    {
        height: 10em;
    }
}



#input{
    width : 650px;
}

#homee{
    margin-left: -15px;
    margin-top : 8px;
}



#homee a,
#Category a,
#Awareness a {
font-size: 17px; /* Change the value as needed */
}

/* Unique hover effect for navbar list items */
#container a:hover {
color: #004d00; /* Change text color to green */
transform: scale(1.1); /* Scale the item slightly on hover */
transition: color 0.3s, transform 0.3s; /* Smooth transition for color and scale */
background: lightblue;
}

.form-label{
    color:white;
}

.marg{
    margin-top: 100px;
    margin-left: 600px;
}

#but{
    background-color:  rgb(6, 61, 80);
}

</style>

</head>

<body>

<header>
    <section>
        <!-- MAIN CONTAINER -->
        <div id="container">
            <!-- SHOP NAME -->
            <div id="shopName"><a href="DeHome.php"> <b>Enviro</b>Sphere</a></div>
            <!-- COLLECTION ON WEBSITE -->
            <div id="collection">
                <div id="homee"><a href="DeHome.php">Home</a></div>
                <div id="Category">
    <div class="dropdown-content">
    </div>
</div>
        

    </section>
</header>

<div id="upl" class="alert alert-secondary" role="alert">
        <h4 class="marg">Submit Your Design</h4>
    </div>

    <div class="container col-12 m-5">
       <div class="col-6 m-auto">

       <?php
if(isset($_POST['btn_upload']))
{
    // Database connection
    $con = mysqli_connect("127.0.0.1:3308", "root", "", "envirosphere");

    // Check if file was uploaded
    if(isset($_FILES["choosefile"]) && $_FILES["choosefile"]["error"] == 0)
    {
        $filename = $_FILES["choosefile"]["name"];
        $tempfile = $_FILES["choosefile"]["tmp_name"];

        // Check if file was successfully uploaded
        if(move_uploaded_file($tempfile, "uploads/".$filename))
        {
            // File was uploaded successfully, continue with database insert
            // Additional details
            $name = $_POST['name'];
            $moneyrequirement = $_POST['moneyrequirement'];
            $description = $_POST['description'];

            $sql = "INSERT INTO `designersubmit`(`image`, `name`, `moneyrequirement`, `description`) 
                    VALUES('$filename', '$name', '$moneyrequirement', '$description')";
            
            $result = mysqli_query($con, $sql);
            echo "<div class='alert alert-success' role='alert'><h4 class='text-center'>Design Submitted</h4></div>";
            echo "<div class='alert alert-success' role='alert'>Your data is successfully inserted. Thank you !!</div>";
            
        }
        else
        {
            // File upload failed
            echo "<div class='alert alert-danger' role='alert'><h4 class='text-center'>File upload failed</h4></div>";
            echo "<div class='alert alert-danger' role='alert'>File upload failed. Please try again.</div>";
        }
    }
    else
    {
        // File upload error
        echo "<div class='alert alert-danger' role='alert'><h4 class='text-center'>Error uploading file</h4></div>";
        echo "<div class='alert alert-danger' role='alert'>Error uploading file. PLease select the material and try again</div>";
    }
}
?>


        <form action="DesSub.php" method="post" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="choosefile" class="form-label">Choose File</label>
                <input type="file" class="form-control" name="choosefile" id="choosefile" required> 
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Project Name" required>
            </div>
            <div class="col-md-6">
                <label for="moneyrequirement" class="form-label">Money Requirement</label>
                <input type="text" class="form-control" name="moneyrequirement" id="moneyrequirement" placeholder="Money Requirement" required>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Project Description" required></textarea>
            </div>
            <div class="col-12">
                <button id="but" type="submit" name="btn_upload" class="btn btn-success">
                    Submit
                </button>
            </div>
        </form>
       </div>
    </div>

</body>
</html>