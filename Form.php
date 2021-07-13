<!DOCTYPE html>
<html>

<head>
  <title>Form</title>
</head>

<body>

<?php

  class User {
    public $firstName;
    public $lastName;
    public $gender;
    public $birthdate;
    public $relegion;
    public $presentaddress;
    public $permenantaddress;
    public $phone;
    public $email;
    public $web;
    public $username;
    public $password;
  }

  $users = array();

  $firstname=$lastname=$gender=$birthdate=$relegion=$permenantaddress=$presentaddress=$phone=$email=$username=$password=$website="";
  $firstnameError=$lastnameError=$genderError=$birthdateError=$relegionError=$emailError=$usernameError=$passwordError="";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
      $firstnameError="First Name is Required!";
    } else {
      $firstname = $_POST["first_name"];
    }
    if (empty($_POST["last_name"])) {
      $lastnameError="Last Name is Required!";
    } else {
      $lastname = $_POST["last_name"];
    }
    if (empty($_POST["gender"])) {
      $genderError="gender is Required!";
    } else {
      $gender = $_POST["gender"];
    }
    if (empty($_POST["birthdate"])) {
      $birthdateError="Birthdate is Required!";
    } else {
      $birthdate = $_POST["birthdate"];
    }
    if (empty($_POST["relegion"])) {
      $relegionError="Relegion is Required!";
    } else {
      $relegion = $_POST["relegion"];
    }
    if (empty($_POST["email"])) {
      $emailError="Email is Required!";
    } else {
      $email = $_POST["email"];
    }
    if (empty($_POST["username"])) {
      $usernameError="User Name is Required!";
    } else {
      $username = $_POST["username"];
    }
    if (empty($_POST["password"])) {
      $passwordError="Pasword is Required!";
    } else {
      $password = $_POST["password"];
    }
    $permenantaddress = $_POST["permanent_adr"];
    $presentaddress = $_POST["present_adr"];
    $phone = $_POST["phone"];
    $website = $_POST["url"];
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(
      empty($firstnameError) &&
      empty($lastnameError)  &&
      empty($genderError)  &&
      empty($birthdateError)  &&
      empty($relegionError)  &&
      empty($userError)  &&
      empty($emailError)  &&
      empty($passwordError)
    ) {

      $newUser = new User();
      $newUser->firstName = $firstname;
      $newUser->lastName = $lastname;
      $newUser->gender = $gender;
      $newUser->birthdate = $birthdate;
      $newUser->relegion = $relegion;
      $newUser->username = $username;
      $newUser->email = $email;
      $newUser->password = $password;
      $newUser->permenantaddress = $permenantaddress;
      $newUser->presentaddress = $presentaddress;
      $newUser->phone = $phone;
      $newUser->web = $website;

      $conn=new mysqli("localhost","root","","wtk");
      $sql=$conn->prepare("INSERT INTO user(firstname, lastname, gender, birthdate, religion, presentadd, permanentadd, phone, email, weblink, username, password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"); 

      $sql -> bind_param("ssssssssssss", $newUser->firstName, $newUser->lastName, $newUser->gender, $newUser->birthdate, $newUser->relegion, $newUser->presentaddress, $newUser->permenantaddress, $newUser->phone, $newUser->email, $newUser->web, $newUser->username, $newUser->password);

      $response = $sql ->execute();
      if($response == true)
      {
        echo "Added user successfully!";
      }
      // echo $response;
      // echo "INSERT INTO user(firstname, lastname, gender, birthdate, religion, presentadd, permanentadd, phone, email, weblink, username, password) VALUES ('$newUser->firstName', '$newUser->lastName', '$newUser->gender', '$newUser->birthdate', '$newUser->relegion', '$newUser->presentaddress', '$newUser->permenantaddress', '$newUser->phone', '$newUser->email', '$newUser->web', '$newUser->username', '$newUser->password')";
      $conn ->close();

      // array_push($users, $newUser);
      // $json_data = json_encode($users);
      // $data_file = fopen("data.txt", "r+") or die("Unable to opne file!");
      // $existing_data = fread($data_file, filesize("data.txt"));
      // $existing_array = json_decode($existing_data);
      // array_push($existing_array, $newUser);
      // fwrite(fopen("data.txt", "w+"), json_encode($existing_array));
      // print_r("Save Success!");
      // fclose($data_file);
    }
  }

?>
  <h1>Basic information</h1>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    First Name
    <input type=”text” name='first_name'>
    <span><?php echo $firstnameError; ?></span>
    Last Name:
    <input type="text" name="last_name">
    <span><?php echo $lastnameError; ?></span>
    <br>
    Gender:
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>
    <span><?php echo $genderError; ?></span>
    <br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthday" name="birthdate">
    <span><?php echo $birthdateError; ?></span>

    <br>
    <br>
    <label for="Relegion">Relegion:</label>

    <select id="Relegion" name='relegion'>
      <option value="Islam">Islam</option>
      <option value="Hindu">Hindu</option>
      <option value="Christ">Christ</option>
      <option value="Buddah">Buddah</option>
    </select>
    <span><?php echo $relegionError; ?></span>
    <br>
    <h2>Contact Information</h2>
    Present Address
    <textarea name="present_adr" rows="10"></textarea>
    Permenant Address
    <textarea name="permanent_adr" rows="10"></textarea>
    <br>
    <br>
    <label for="phone">phone number:</label>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
    <br>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <span><?php echo $emailError; ?></span>

    <br>
    <br>
    <label for="Web Link">Web Link:</label>
    <input type="text" name="url" id="url">
    <br>
    <br>
    <label>Username:</label>
    <input type="text" name="username" id="username">
    <span><?php echo $usernameError; ?></span>
    <br>
    <br>
    <label>Password:</label>
    <input type="password" name="password" id="pass">
    <span><?php echo $passwordError; ?></span>
    <br>
    <input type="submit">

  </form>
</body>

</html>