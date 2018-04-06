<?php

class Model
{
    public $username;
    public $email;
    public $password;
    public $old_password;
    public $new_password;
    public $gender;
    public $phone;
    public $age;
    public $info;
    public $db;
    public $result;
    public $myrow;
    public $activation;
    public $result_edit;

    function isEmptyFieldsSignup($username, $email, $password)
    { // проверка на пустые поля формы регистрации
        if (empty($username) || empty($email) || empty($password)) {
            exit ("You haven't filled all fields <br> 
				<input type='button' onclick='history.back();'value='Go back and fill all fields'/>");
        }
    }

    function isEmptyFieldsLogin($username, $password)
    { // проверка на пустые поля формы входа
        if (empty($username) || empty($password)) {
            exit ("You haven't filled all fields <br> <input type='button' 
					  onclick='history.back();' value='Go back and fill all fields'/>");
        }
    }

    function cleanFieldsSignup($username, $email, $password)
    { // чистка данных полей формы регистрации и присвоение их переменным
        $username = stripcslashes($username);
        $username = htmlspecialchars($username);
        $username = trim($username);
        $email = stripcslashes($email);
        $email = htmlspecialchars($email);
        $email = trim($email);
        $password = stripcslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    function cleanFieldsLogin($username, $password)
    { // чистка данных полей формы входа и присвоение их переменным
        $username = stripcslashes($username);
        $username = htmlspecialchars($username);
        $username = trim($username);
        $password = stripcslashes($password);
        $password = htmlspecialchars($password);
        $password = trim($password);

        $this->username = $username;
        $this->password = $password;
    }

    function lengthUsername()
    { // проверка длины поля имя пользователя
        if ((strlen($this->username) < 4) || ((strlen($this->username) > 16))) {
            exit ("Your username is less than 4 vars or more than 16 vars<br> <input type='button' 
					  onclick='history.back();' value='Go back and try again'/>");
        }
    }

    function lengthPassword()
    { // проверка длины поля пароль
        if ((strlen($this->password) < 7) || ((strlen($this->password) > 16))) {
            exit ("Your password is less than 7 vars or more than 16 vars<br> <input type='button' 
					   onclick='history.back();' value='Go back and try again'/>");
        }
    }

    function isValidateEmail()
    { // проверка на валидность email
        if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
            exit ("E-mail is not validate <br> 
				<input type='button' onclick='history.back();'value='Go back and enter validate E-mail'/>");
        }
    }

    function testLogin()
    { // проверка: 1.на существование имени пользователя в БД 2.на активацию пользователя 3.на совпадение пароля. Вызов записи сессии
        if (empty($this->myrow['password'])) {
            exit("There is no registered username " . $this->username . "<br> 
				<form action='../views/signup.php'><button type='submit'>Sign up</button></form>");
        } else {
            if ($this->myrow['verification'] == 0) {
                exit ("Your account is not activated, check your E-mail and confirm registration<br>
					<form action='../views/main.php'><button type='submit'>Main page</button></form>");
            } else {

                if ($this->myrow['password'] != $this->password) {
                    exit ("Sorry, your password is not correct<br>
						<form action='../views/login.php'><button type='submit'>Log in</button></form>");
                } else {
                    self::recordSession();
                }
            }
        }
    }

    function sendConfirmMessage()
    {  // генерирование уникального кода, отправка письма с кодом на почту
        include "config.php";
        $salt = "834u50g0aUdLdfa22opwMgx3z";
        $activation = md5($this->username . $this->email . $salt);

        $subject = "confirm registration";
        $message = "Thank you for your registration\n
								Your username: " . $this->username . "\n 
								You need to activate your account.\n
								For activation go to:\n
								" . $projectLocation . "controllers/activation.php?username=" . $username . "&activation=" . $activation . "";
        mail($this->email, $subject, $message);

        // если по каким-либо причинам нет возможности отправить письмо, ссылка ниже (раскомментировать)
        // echo $projectLocation . "controllers/activation.php?username=" . $this->username . "&activation=" . $activation . "";

        echo "<h3>Check your e-mail and confirm registration<br>
							<form action='../views/main.php'><button type='submit'>Main page</button></form></h3>";
    }

    function isUsernameOrEmailExist()
    { // проверка на существование имени пользователя и email в БД при регистрации
        include "db.php";
        $result_username = mysql_query("SELECT id FROM users WHERE username='$this->username'", $db);
        $result_email = mysql_query("SELECT id FROM users WHERE email='$this->email'", $db);
        $myrow_username = mysql_fetch_array($result_username);
        $myrow_email = mysql_fetch_array($result_email);

        if (!empty($myrow_username['id'])) {
            exit ("Sorry, username have been already registered <br>
					<input type='button' onclick='history.back();' value='Go back and try again'/>");
        }

        if (!empty($myrow_email['id'])) {
            exit ("Sorry, e-mail have been already registered <br>
					<input type='button' onclick='history.back();' value='Go back and try again'/>");
        }
    }

    function insertSignup()
    { // добавление имени пользователя, email и пароля в БД после формы регистрации
        include "db.php";
        $result_add = mysql_query("INSERT INTO users (username, email, password) VALUES 
										 ('$this->username', '$this->email', '$this->password')");
        if ($result_add) {
            echo "<h3>Succesful registration!</h3><br>";
        }
    }

    function selectRow()
    { // выбор строки с БД по имени пользователя
        include "db.php";
        $result = mysql_query("SELECT * FROM users WHERE username='$this->username'", $db);

        $this->myrow = mysql_fetch_array($result);
    }

    function selectRowByEmail($set_email)
    { // выбор строки с БД по email
        include "db.php";
        $result = mysql_query("SELECT * FROM users WHERE email='$set_email'", $db);

        $this->myrow = mysql_fetch_array($result);
        $this->password = $this->myrow['password'];
    }

    function updateInfo($set_username, $set_email, $set_gender, $set_age, $set_phone, $set_info)
    { // добавление/обновление информации в БД из формы личного кабинета
        include "db.php";
        if ($set_username != '') {
            $result_edit = mysql_query("UPDATE users SET username='$set_username' WHERE email='$set_email'");
        }
        if ($set_gender != '') {
            $result_edit = mysql_query("UPDATE users SET gender='$set_gender' WHERE email='$set_email'");
        }
        if ($set_age != '') {
            $result_edit = mysql_query("UPDATE users SET age='$set_age' WHERE email='$set_email'");
        }
        if ($set_phone != '') {
            $result_edit = mysql_query("UPDATE users SET phone='$set_phone' WHERE email='$set_email'");
        }
        if ($set_info != '') {
            $result_edit = mysql_query("UPDATE users SET info='$set_info' WHERE email='$set_email'");
        }

        $this->result_edit = $result_edit;
    }

    function updatePassword($set_old_password, $set_new_password, $set_email)
    { // проверка введенного из формы личного кабинета пароля с паролем с БД
        // и обновлени пароля в БД
        if ($set_old_password == $this->password) {
            $result_edit = mysql_query("UPDATE users SET password='$set_new_password' WHERE email='$set_email'");
        } else {
            exit ("You have entered incorrect old password 
						<br><input type='button' onclick='document.location.reload()' value='Try again' />");
        }
    }

    function isOkUpdate()
    { // проверка на добавление/обновление информации введенной из формы личного кабинета
        if ($this->result_edit) {
            echo "<h3>Succesful update information!<br>
			<input type='button' onclick='document.location.reload()' value='OK' />";
        } else {
            exit ("Update did't happen");
        }
    }

    function getActivationFromUrl()
    { // получение имени пользователя и кода активации из URL
        if (isset($_GET['username']) && isset($_GET['activation'])) {
            $this->username = $_GET['username'];
            $this->activation = $_GET['activation'];
        } else {
            exit ("You have entered to site without activation code<br>
				<form action='../views/main.php'><button type='submit'>Main page</button></form>");
        }
    }

    function compareCodes()
    { // сравнение кодов активации
        $salt = "834u50g0aUdLdfa22opwMgx3z";
        $activation_check = md5($this->username . $this->myrow['email'] . $salt);
        if ($this->activation != $activation_check) {
            exit ("Your activation code is wrong<br>
							<form action='../views/main.php'><button type='submit'>Main page</button></form>");
        }
    }

    function updateVerification()
    { // обновление отметки об активации пользователя в БД
        include "db.php";
        mysql_query("UPDATE users SET verification='1' WHERE username='$this->username'");
    }

    function recordSession()
    { // запись сессии и перенаправление в личный кабинет
        include "../models/config.php";
        session_start();
        $_SESSION['id'] = $this->myrow['id'];
        $_SESSION['username'] = $this->myrow['username'];
        $_SESSION['email'] = $this->myrow['email'];
        $_SESSION['password'] = $this->myrow['password'];
        $_SESSION['gender'] = $this->myrow['gender'];
        $_SESSION['age'] = $this->myrow['age'];
        $_SESSION['phone'] = $this->myrow['phone'];
        $_SESSION['info'] = $this->myrow['info'];

        header("Location: " . $projectLocation . "views/account.php");
    }

    function updateSession($set_username, $set_email, $set_gender, $set_age, $set_phone, $set_info)
    { // обновление сессии после редактирования
        session_start();
        $_SESSION['username'] = $set_username;
        $_SESSION['email'] = $set_email;
        $_SESSION['gender'] = $set_gender;
        $_SESSION['age'] = $set_age;
        $_SESSION['phone'] = $set_phone;
        $_SESSION['info'] = $set_info;
    }
}

?>
