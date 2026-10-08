<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Rental Mobil</title>
    <link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Aplikasi Rental Mobil</h2>
                <h4>Login</h4>
            </div>
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
                }else if($_GET['pesan'] == "logout"){
                    echo "<div class='alert alert-info'>Anda telah logout.</div>";
                }else if($_GET['pesan'] == "belumlogin"){
                    echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
                }
            }
            ?>
            <div class="login-body">
                <form method="post" action="<?php echo base_url('welcome/login')?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control"
                            value="<?php echo get_cookie('remember_username'); ?>"
                            placeholder="Masukkan Username" />
                        <?php echo form_error('username'); ?>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control"
                            value="<?php echo get_cookie('remember_password'); ?>"
                            placeholder="Masukkan Password" />
                        <?php echo form_error('password'); ?>
                    </div>       
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                <?php echo get_cookie('remember_username') ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn-login">
                    </div>
                    <div class="text-center">
                            <a class="small" href="<?= base_url('auth/lupa_password'); ?>">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('register/index'); ?>">Belum punya akun? Daftar!</a>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .login-body .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 90%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        .form-group input:focus {
            border-color: #0072ff;
            outline: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        .alert-danger { background-color: #f8d7da; color: #721c24; }
        .alert-info { background-color: #d1ecf1; color: #0c5460; }
        .alert-success { background-color: #d4edda; color: #155724; }
    </style>
</body>
</html>
