<?php
session_start();
include_once "constant.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validate($_POST)) {
        $_SESSION["user"] = $_POST;
        header("Location:login.php");
    }
}

//Hiển thị lỗi
//Đầu tiên lấy lỗi ra, sau đó thêm thẻ <p> để check (dùng toán tử 3 ngôi)
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    session_destroy(); //để ko hiển thị lại lỗi ở lần sau thì lấy ra rồi thì xóa luôn session đó
}

function validate($data) {
    $errors = []; //mảng chứa lỗi
    //Vì nhiều task nên dùng const hoặc define (biến)
//    define("EMAIL_REQUIRE", "Email must not be empty");
//    define("PASSWORD_REQUIRE", "Email must not be empty");
//    define("PASSWORD_REPEAT_REQUIRE", "Email must not be empty");

    if ($data["email"] == "") {
        $errors["email"] = EMAIL_REQUIRE; //"Email must not be empty";
    } else if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = EMAIL_INVALID; //"Email is not a valid email";
    }

    if ($data["password"] == "") {
        $errors["password"] = PASSWORD_REQUIRE; //"Password must to be empty";
    } else if (!checkPassword($data["password"])) { //Ko đủ mạnh thì $errors
        $errors["password"] = PASSWORD_INVALID;
    }
//    else if (!filter_var($data["password"], FILTER_VALIDATE_PASSWORD)) {
//        $errors["password"] = "Password is not a valid password";
//    }

    if ($data["password-repeat"] == "") {
        $errors["password-repeat"] = PASSWORD_REPEAT_REQUIRE; //"password-repeat must not be empty";
    } else if ($data["password-repeat"] !== $data["password"]) {
        $errors["password-repeat"] = PASSWORD_REPEAT_NOTMATCH;
    }
//    else if (!filter_var($data["password-repeat"], FILTER_VALIDATE_PASSWORD_REPEAT)) {
//        $errors["password-repeat"] = "Password-repeat is not a valid password-repeat";
//    }

    if (count($errors) > 0) {
        $_SESSION["errors"] = $errors; //Điều kiện để dùng session là phải có session_start
    }
    return count($errors) == 0;
}

function checkPassword($password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number ||strlen($password) < 8) {
//        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        return false;
    } else {
        return true; //'Strong password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
    }

    * {
        box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
        background-color: white;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 10px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    .invalid{
        color: #f44336;
        margin-bottom: 23px;
        margin-top: 0;
    }

    /* Set a style for the submit button */
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
</style>
<body>
<form action="" method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email">
        <p class="invalid"><?php echo isset($errors['email'])? $errors['email']:""?></p>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw">
        <p class="invalid"><?php echo isset($errors['password'])? $errors['password']:""?></p>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password-repeat" id="psw-repeat">
        <p class="invalid"><?php echo isset($errors['password-repeat'])? $errors['password-repeat']:""?></p>
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>
</body>
</html>
