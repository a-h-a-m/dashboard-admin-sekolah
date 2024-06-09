<?php
    //session_start();
    if(isset($_POST['submit']))
    {
        include 'koneksidb.php';

        $username =  $_POST['username'];
        $pass = md5($_POST['password']);

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$pass."' "); 

       


        if (mysqli_num_rows($query)>0) 
        {
            $data = mysqli_fetch_array($query);
            $user_login = $data['username'];
            $user_role = $data['user_role'];
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $user_role;

            //echo "berhasil login";
            if ($user_role == 'admin') 
            {
                header('Location: admin/admin.php');
                exit;
            }
            elseif ($user_role == 'staff') 
            {
                header('location: nasabah/staff.php');
            }
        } 
        else 
        {
            $error = true;
        }
    }
?>

<html>
    <head>
        <script type="text/javascript" src="aset/bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="aset/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="aset/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="aset/font-awesome/css/font-awesome.min.css">
        <title>Login RKH</title>
    </head>
    <body>
        <div align="center">
            <br>
            <div align="center" style="width:100%;">
                <form name="login_form" method="post" class="well well-lg" action="../HASAN/admin/proses_login.php">
                    <i class="fa fa-university fa-4x"></i>
                    <h4>Login Sistem Informasi</h4>
                    <br>
                    <?php if (isset($error)) { ?>
                        <p style="font-style: italic; color: red;">Username / Password anda salah</p>
                    <?php } ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input require name="username" id="username" class="form-control" type="text" placeholder="Username" autocomplete="off" />
                    </div>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input require name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                    </div>
                    <br />
                    <input name="submit" type="submit" value="Login" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
        <br>

        <footer align="center">
            
        </footer>
    </body>

    <!--<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;       
        if (username != "" && password!="") {
            return true;
        }else{
            alert('Username dan Password harus di isi !');
            return false;
        }
    }
    </script>-->

</html>