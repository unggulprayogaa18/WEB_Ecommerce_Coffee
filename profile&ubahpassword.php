<?php
// beranda.php

// Pastikan sesi sudah dimulai
session_start();

// Periksa apakah pengguna sudah login (sesi username sudah ada)
if (isset($_SESSION['session_token'])) {
    $session_token = $_SESSION['session_token'];

    include 'config/koneksi.php';

    // Gunakan binding parameter untuk mencegah SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE session_token = :session_token");
    $stmt->bindParam(':session_token', $session_token);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $data_user = array(
            'username' => $result['username'],
            'foto' => $result['foto'],
            'nama' => $result['nama'],
            'email' => $result['email'],
            'no_telpon' => $result['no_telpon']
        );
    } else {
        $response = array('status' => 'error', 'message' => 'Error in query: ' . $koneksi->errorInfo()[2]);
    }
} else {
    // Jika tidak ada sesi username, mungkin pengguna belum login, arahkan ke halaman login
    header("Location: login.php");
    exit(); // Pastikan untuk keluar agar kode di bawah tidak dijalankan
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: rgb(82, 73, 59)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: rgb(82, 73, 59)
        }

        .profile-button {
            background: rgb(82, 73, 59);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #2ca121a9
        }

        .profile-button:focus {
            background: #19cc09;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #fce306;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: goldenrod;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="<?php
                        if ($data_user['foto'] == null || empty($data_user['foto'])) {
                            echo 'asset-login/images/man.png';
                        } else {
                            echo 'config/uploads/' . $data_user['foto'];
                        }
                        ?>"><span class="font-weight-bold">
                        <?= $data_user['username']; ?>
                    </span><span class="text-black-50">
                        <?= $data_user['email']; ?>
                    </span><span> </span></div>
            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings </h4> <span class="border px-3 p-1 add-experience"><i
                                class="fa float-xl-left"></i>&nbsp;<a href="shop_user.php"
                                style="text-decoration:none; color:black;">back</a></span>
                    </div>
                    <form action="config/edit_profile.php" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="nama" class="labels">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="first name"
                                    value="<?= $data_user['nama']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="labels">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="enter email"
                                    value="<?= $data_user['email']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="nomer_telpon" class="labels">Nomer telpon</label>
                                <input type="text" name="nomer_telpon" class="form-control"
                                    placeholder="enter phone number" value="<?= $data_user['no_telpon']; ?>">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4>ubah account</h4>
                    </div><br>

                    <form action="config/ubah_password.php" method="POST">
                        <div class="col-md-12"><label class="labels">username</label><input type="text"
                                class="form-control" name="username" placeholder="username"
                                value="<?= $data_user['username']; ?>">
                        </div> <br>
                        <div class="col-md-12" style="margin-top:-20px;">
                            <label class="labels">New Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordInput"
                                    placeholder="password" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="togglePassword" style="height :40px;">
                                        <i class="far fa-eye" id="eyeIcon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button id="button_simpan" class="btn btn-primary profile-button"
                                type="submit">Save account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        // Check if there's a notification in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const notification = urlParams.get('notif');

        // Display notification if present
        if (notification) {
            alert(notification);
        }
        // Ambil elemen input dan ikon
        var passwordInput = document.getElementById('passwordInput');
        var eyeIcon = document.getElementById('eyeIcon');

        // Tambahkan event listener pada ikon
        eyeIcon.addEventListener('click', function () {
            // Ganti tipe input menjadi 'text' atau 'password'
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

            // Ganti ikon sesuai dengan tipe input
            eyeIcon.className = passwordInput.type === 'password' ? 'far fa-eye' : 'far fa-eye-slash';
        });
    </script>
</body>

</html>