<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: index.php");
}

?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Register</title>
    <style>
    .container{
        width:600px;
        height:400px;
        margin-top:50px
    }
    </style>
    </head>
    <body>
    
    <div class="container">
        <div class="card shadow" style="height:480px">
        <div class="card-body">
            <h5 class="text-center bg-transparent mb-3 mt-2">Create An Account!</h5>
            <form action="" method="POST">
            <div class="form-group">
                <label for="name" class="mb-1">Nama Lengkap</label>
                <input class="form-control rounded-pill mb-2" type="text" name="name" placeholder="Nama kamu" />
            </div>
            <div class="form-group">
                <label for="username" class="mb-1">Username</label>
                <input class="form-control rounded-pill mb-2" type="text" name="username" placeholder="Username" />
            </div>
            <div class="form-group">
                <label for="email" class="mb-1">Email</label>
                <input class="form-control rounded-pill mb-2" type="email" name="email" placeholder="Alamat Email" />
            </div>
            <div class="form-group">
                <label for="password" class="mb-1">Password</label>
                <input class="form-control rounded-pill mb-2" type="password" name="password" placeholder="Password" />
            </div>
                <input type="submit" class="btn btn-primary btn-block mt-2 mb-3 rounded-pill fs-6" name="register" value="Daftar" style="width:100%;"/>
                </form>
        </div>
        </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    </body>
</html>