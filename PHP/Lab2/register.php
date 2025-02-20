
<?php 
// include_once("./data.php");
// required($_POST);
//     if(empty($errors)){
//         header("Location:table.php");
//     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="parent">
        <div class="container">

            <h1>Register</h1>
            <form action="./data.php" method="post">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter Your First Name">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter Your First Name">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" id="gender" value="male">Male
                    <input type="radio" name="gender" id="gender" value="female">Female
                </div>
                <button type="submit" name="register">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>