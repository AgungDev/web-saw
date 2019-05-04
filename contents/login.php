<?php
session_start();
require_once 'services/check_auth.php';

cek_session_before_login('user_login');

if (isset($_POST['user']) && isset($_POST['password'])) {
    # code...

    $username = $_POST['user'];
    $password = sha1($_POST['password']);

    //untuk mencegah sql injection
    $username = $Func->SQLINJECT($username);
    $password = $Func->SQLINJECT($password);

    $Query = mysql_query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1");

    // Chech Query And Run
    $PutArray = mysql_fetch_array($Query);

    if (mysql_num_rows($Query) == 1) {
        # code...

        $_SESSION['user_login'] = $PutArray['level'];
        $_SESSION['user_name'] = $PutArray['username'];
        $_SESSION['id_user'] = $PutArray['id_user'];
        
        header('location:on-admin');

    }else{
        echo "<script>alert('Salah Memasukan Username Dan Password!!')</script>";
    }
}
?>

<div class="margin_box">
    <div class="smooth-box box-body" style="width: 30%;">
        <div class="box-margin">
            <center><h1><?php echo "LOGIN"; ?></h1></center>
                
            <div style="text-align: center;">
                <form method="POST" action="" name="login">
                    <input type="text" name="user" placeholder="Email" /><br>
                    <input type="password" name="password" placeholder="Password" /><br>
                    Forget Password <a href="#">Hare</a> !!<br>
                    <input type="submit" value="Login" class="btnGreen"/>
                <!--<tr>
                    <th>Don't have account?</th>
                    <td> : </td>
                    <td>
                        <a href="./register.php"><b>Register Now</b></a> <br>
                    </td>
                </tr> -->
                </form>
            </div>
        </div>
    </div>
</div>