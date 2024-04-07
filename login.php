



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login 10</title>
    <link rel="icon" href="img/hot-coffees.jpg" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="asset-login/css/style.css">

</head>

<body class="img"
    style="background: linear-gradient(rgba(36, 32, 27, 0.5), rgba(58, 46, 36, 0.5)), url('img/background.jpeg'); background-position: center -130px;">
    <a href="index.php" style="margin-left: 20px;">Back</a>

    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <?php
                        // Ambil pesan kesalahan dari URL
                        $error_message = isset($_GET['error']) ? $_GET['error'] : '';
                        ?>

                        <!-- Menampilkan pesan kesalahan jika ada -->
                        <?php if ($error_message): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                            <script>
                                // Menambahkan script JavaScript untuk menampilkan alert
                                setTimeout(function () {
                                    document.querySelector('.alert').style.display = 'none';
                                }, 3000); // Hilangkan alert setelah 3 detik
                            </script>
                        <?php endif; ?>

                        <h3 class="mb-4 text-center">Welcome Admin</h3>

                        <form action="" method="post" class="signin-form" id="loginForm">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control"
                                    placeholder="Password" required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="button" class="form-control btn btn-primary submit px-3"
                                    onclick="submitForm()">Sign
                                    In</button>
                            </div>
                        </form>
                        <br>
                        <p class="w-100 text-center">&mdash; <a href="register.php">Sign up</a> &mdash;</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function submitForm() {
            // Menggunakan jQuery untuk menangkap nilai formulir
            var formData = $("#loginForm").serialize();

            // Menggunakan AJAX untuk mengirim data formulir ke login_proses.php
            $.ajax({
                type: "POST",
                url: "config/login_proses.php",
                data: formData,
                dataType: "json", // Tentukan bahwa respons yang diharapkan adalah JSON

                success: function (response) {
                    console.log(response);

                    if (response.status === 'success') {
                        if (response.status_user === 'admin') {
                            window.location.href = "mainpage.php";
                        } else if (response.status_user === 'user') {
                            window.location.href = "shop_user.php";
                        } else {
                            // Handle the case when status_user is not 'admin' or 'user'
                            alert("Unknown user status");
                        }
                    } else if (response.status === 'failed') {
                        alert("Username atau password salah");
                    } else if (response.status === 'error') {
                        alert("Terjadi kesalahan: " + response.message);
                    }
                },


                error: function (error) {
                    // Handle kesalahan (jika diperlukan)
                    console.error(error);
                }
            });
        }

    </script>
    <script src="asset-login/js/jquery.min.js"></script>
    <script src="asset-login/js/popper.js"></script>
    <script src="asset-login/js/bootstrap.min.js"></script>
    <script src="asset-login/js/main.js"></script>

</body>

</html>