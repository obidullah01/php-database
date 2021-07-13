<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
</head>

<body>

<?php 

    $isFound = false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["uname"];
        $pswd = $_POST["password"];
        $data_file = fopen("data.txt", "r") or die("Unable open file");
        $existing_data = json_decode(fread($data_file, filesize("data.txt")));
        foreach($existing_data as $user) {
            if ($uname == $user->username && $pswd == $user->password) {
                $isFound = true;
                break;
            }
        }
        echo $isFound ? "WELCOME" : "FAILED!";
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