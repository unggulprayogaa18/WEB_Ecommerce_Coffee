<?php
// beranda.php

// Pastikan sesi sudah dimulai
session_start();

// Periksa apakah pengguna sudah login (sesi username sudah ada)
if (isset($_SESSION['session_token'])) {
    $session_token = $_SESSION['session_token'];
    // $foto = $_SESSION['foto'];

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
            'nama' => $result['nama']

        );
        $_SESSION['status_home'] = $session_status = 'sudah_login';
        $_SESSION['status_login'] = $session_login = 'sudah_login';

    } else {
        $response = array('status' => 'error', 'message' => 'Error in query: ' . $koneksi->errorInfo()[2]);
    }

    // Sekarang, Anda dapat menggunakan nilai $username sesuai kebutuhan
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
    <title>Shop user</title>
    <link rel="icon" href="img/hot-coffees.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
    <link href="data/css/fotter.css" rel="stylesheet">
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        .notification-badge {
            background-color: burlywood;
            color: white;
            padding: 4px 8px;
            border-radius: 50%;
            font-size: 12px;
        }

        .notification-badge2 {
            background-color: red;
            color: white;
            padding: 4px 8px;
            border-radius: 50%;
            font-size: 12px;
        }

        /* Gaya CSS untuk dropdown user */
        .user-dropdown {
            display: none;
            position: absolute;
            color: black;
            background-color: #fff;
            /* Sesuaikan dengan warna latar yang diinginkan */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Efek bayangan (optional) */
            z-index: 1;
            right: 0;
            /* Arah ke kiri */
        }

        .dropdown:hover .user-dropdown {
            display: block;
            width: 200px;

        }

        .user-dropdown li {
            display: block;
            padding: 10px;
            color: black;
            width: 200px;

        }

        .user-dropdown li:hover {
            background-color: burlywood;
            /* Warna latar saat dihover (optional) */

        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="pic/logo.png" alt="">
        </div>
        <nav class="navigation">

            <li><a href="index.php">home</a></li>
            <li><a href="shop_user.php" style="text-decoration: underline;">shop</a></li>


            <li class="dropdown" style="">

                <a href="#" style="color: darkgoldenrod; font-weight: bold;">
                    <?php echo $data_user['nama']; ?>
                </a>
                <ul class="dropdown-menu user-dropdown">
                    <li style="display: flex; align-items: center;">
                        <a href="#" style="color: black; margin-right: 80px;">Profile</a>
                        <img id="userImage" src="<?php
                        if ($data_user['foto'] == null || empty($data_user['foto'])) {
                            echo 'asset-login/images/man.png';
                        } else {
                            echo 'config/uploads/' . $data_user['foto'];
                        }
                        ?>" style="border-radius: 100px; background-color: #c0c0c0; box-shadow: 0 0 0 2px white, 0 0 0 3px rgb(70, 50, 37); margin-right: 10px;"
                            width="20px" alt="">
                    </li>


                    <li><a href="keranjang.php" style="color: black;">keranjang</a></li>
                    <li><a href="#" style="color: black;">Logout</a></li>
                    <!-- Tambahkan submenu sesuai kebutuhan -->

                </ul>
            </li>
            <!-- ... -->
            <li>
                <img id="userImage" src="<?php
                if ($data_user['foto'] == null || empty($data_user['foto'])) {
                    echo 'asset-login/images/man.png';
                } else {
                    echo 'config/uploads/' . $data_user['foto'];
                }
                ?>" style="border-radius: 100px; background-color: #c0c0c0; box-shadow: 0 0 0 2px white, 0 0 0 3px rgb(70, 50, 37); margin-right: 350px;"
                    width="20px" alt="">
            </li>
            <!-- ... -->

            <li><a href=""><img src="asset-login/images/chat-bubbles.png" alt="" width="30px "> <span id="chatBadge"
                        class="notification-badge2">0</span></a></li>

            <li><a href=""><img src="asset-login/images/shopping-cart.png" alt="" width="30px "> <span
                        id="keranjangBadge" class="notification-badge">0</span></a></li>
            <button id="cancelButton" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times"></i> Cancel
            </button>

        </nav>
        <div class="bars">
            <img src="pic/menu.png" alt="" class="bar">
        </div>
    </header>
    <!-- start section three  -->

    <div class="bg-shop" id="shop">
        <div class="shop-links">
            <div>
                <h2>products</h2>
            </div>
            <div class="links">
                <li data-filter="all">all</li>
                <li data-filter=".coffee">coffee</li>
                <li data-filter=".machines">machines</li>
                <li data-filter=".sweets">sweets</li>
            </div>
        </div>

        <div class="shop-flex consts">

            <?php
            // Sertakan file koneksi di sini
            include 'config/koneksi.php';

            // Ambil data dari database
            $query = "SELECT nama, rating, hargasaatini, hargadiskon, status, foto FROM datacofe";
            $result = $koneksi->query($query); // Menggunakan PDO untuk mengeksekusi query
            
            // Periksa apakah ada data yang ditemukan
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    // Loop melalui setiap baris data dan tampilkan di HTML
                    $status = $row['status'];
                    if ($status === 'coffee' || $status === 'machines' || $status === 'sweets') {
                        echo '<div class="shop1 mix ' . $status . '">';
                        echo '<div class="shop-image">';

                        // ambil data foto
                        $fotoData = $row['foto']; // Ambil data foto dari database
                        // Tampilkan gambar
            
                        echo '<img data-foto="' . $row['foto'] . '" src="config/' . $row['foto'] . '" /> ';

                        echo '<div class="price">';
                        // Tampilkan harga atau informasi lainnya di sini
                        echo '</div>';
                        echo '<div class="social">';
                        echo '<a href="#"><i class="far fa-heart"></i></a>';
                        echo '<a ><i data-nama="' . $row['nama'] . '"  class="fas fa-shopping-cart"></i></a>';
                        echo '<script>console.log("' . $row['foto'] . '");</script>';

                        echo '<a href="#"><i class="fas fa-share-alt"></i></a>';
                        echo '<a href="#"><i class="fas fa-search"></i></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '<h2>' . $row['nama'] . '</h2>';
                        echo '<div class="stars">';
                        // Tampilkan rating di sini
                        $rating = $row['rating']; // Ambil nilai rating dari data
                        // Loop untuk menampilkan bintang sesuai dengan nilai rating
                        for ($i = 1; $i <= $rating; $i++) {
                            echo '<i class="fas fa-star gold"></i>';
                        }
                        echo '</div>';
                        echo '<article data-hargasaatini="' . $row['hargasaatini'] . '" data-hargadiskon="' . $row['hargadiskon'] . '">' . " Rp." . $row['hargasaatini'] . 'K</article>';
                        echo '<span>' . " Rp." . $row['hargadiskon'] . 'K</span>';

                        echo '</div>';
                    }
                }
            } else {
                // Tampilkan pesan jika tidak ada data
                echo "Tidak ada data yang ditemukan";
            }

            // Tutup koneksi
            $koneksi = null;
            ?>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>indonesia, Bandung , java/p>
                <p><i class="fa fa-phone-alt mr-2"></i>+62895376555179</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>abdulahsidik@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Kopi Pagi, Senyum Seharian</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Kopi: Karya Seni dalam Setiap Cangkir</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;"
                            placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5"
            style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">21552011215_ABDULAH
                    SIDIK_</a>.TIF
                221PB
                </a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">ABDULAH
                    SIDIK</a></p>
        </div>
    </div>
    <!-- Footer End -->
    <script src="mixitup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shoppingCartIcons = document.querySelectorAll('.fas.fa-shopping-cart');
            const cancelButton = document.getElementById('cancelButton');

            shoppingCartIcons.forEach(function (icon) {
                icon.addEventListener('click', function (event) {
                    event.preventDefault();

                    const productName = this.getAttribute('data-nama');
                    const productImage = getProductImage(this);
                    const hargaSaatIni = getHargaSaatIni(this);
                    const hargaDiskon = getHargaDiskon(this);




                    const keranjangItems = JSON.parse(localStorage.getItem('keranjangItems')) || {};

                    keranjangItems[productName] = {
                        count: (keranjangItems[productName] && keranjangItems[productName].count || 0) + 1,
                        image: productImage,
                        hargasaatini: hargaSaatIni,
                        hargadiskon: hargaDiskon
                    };

                    localStorage.setItem('keranjangItems', JSON.stringify(keranjangItems));

                    updateKeranjangBadge();
                    updateSessionData();
                    toggleCancelButton();
                });
            });


            cancelButton.addEventListener('click', function () {
                localStorage.setItem('keranjangItems', JSON.stringify({}));
                updateKeranjangBadge();
                toggleCancelButton();
            });

            function getHargaDiskon(iconElement) {
                const relatedElement = iconElement.closest('.shop1').querySelector('article'); // Assuming 'article' contains 'data-hargadiskon'
                return relatedElement ? relatedElement.dataset.hargadiskon || '' : '';
            }

            function getHargaSaatIni(iconElement) {
                const relatedElement = iconElement.closest('.shop1').querySelector('article'); // Assuming 'article' contains 'data-hargasaatini'
                return relatedElement ? relatedElement.dataset.hargasaatini || '' : '';
            }

            function getProductImage(iconElement) {
                const relatedImage = iconElement.closest('.shop1').querySelector('img');
                return relatedImage ? relatedImage.getAttribute('data-foto') : '';
            }

            function updateKeranjangBadge() {
                const keranjangBadge = document.getElementById('keranjangBadge');
                const keranjangItems = JSON.parse(localStorage.getItem('keranjangItems')) || {};
                const keranjangcount = Object.values(keranjangItems).reduce((acc, item) => acc + item.count, 0);

                keranjangBadge.textContent = keranjangcount;
                keranjangBadge.style.display = keranjangcount > 0 ? 'inline-block' : 'none';
            }

            function updateSessionData() {
                const keranjangItems = JSON.parse(localStorage.getItem('keranjangItems')) || {};

                for (const [namaProduk, dataProduk] of Object.entries(keranjangItems)) {
                    console.log(`${namaProduk} \t\t\t ${dataProduk.count} \t\t\t ${dataProduk.image}`);
                }
            }

            function toggleCancelButton() {
                const keranjangItems = JSON.parse(localStorage.getItem('keranjangItems')) || {};
                const keranjangcount = Object.values(keranjangItems).reduce((acc, item) => acc + item.count, 0);

                cancelButton.style.display = keranjangcount > 0 ? 'inline-block' : 'none';
            }

            updateKeranjangBadge();
            toggleCancelButton();
        });




        let chatCount = 2; // Ganti dengan jumlah chat yang sesuai

        // // Fungsi untuk memperbarui badge chat
        function updateChatBadge() {
            const chatBadge = document.getElementById('chatBadge');
            chatBadge.textContent = chatCount;
            chatBadge.style.display = chatCount > 0 ? 'inline-block' : 'none';
        }

        // // Panggil fungsi pertama kali untuk menginisialisasi badge
        updateChatBadge();
        var mixer = mixitup('.consts');
    </script>
    <!-- links for jquery and bootstrap4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>