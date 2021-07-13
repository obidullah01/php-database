<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
</head>

<body>

<?php 

    $isFound = false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['uname']) && empty($_POST['password']))
        {
            echo "Please enter a username and password";
        }
        else
        {
            $uname = $_POST["uname"];
            $pswd = $_POST["password"];
            $conn = new mysqli("localhost","root","","wtk");

            $statement = "SELECT * FROM user WHERE username = '$uname' AND password = '$pswd'";
            $result = $conn->query($statement);

            if(mysqli_num_rows($result) > 0)
            {
                header('location: welcome.php');
            }
            else
            {
                echo "No such user exists";
            }
        }
        // $data_file = fopen("data.txt", "r") or die("Unable open file");
        // $existing_data = json_decode(fread($data_file, filesize("data.txt")));


        // foreach($existing_data as $user) {
        //     if ($uname == $user->username && $pswd == $user->password) {
        //         $isFound = true;
        //         break;
        //     }
        // }
        // echo $isFound ? "WELCOME" : "FAILED!";
    }

 ?>

     <form action="Login.php" method="POST">

        <h2>LOGIN</h2>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name" /><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password" /><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>