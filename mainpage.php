<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <link rel="icon" href="img/hot-coffees.jpg" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="data/img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="data/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="data/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="data/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white"> <span class="display-3 text-primary">Coffe</span>
                    Shop</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">

                    <a href="index.php" class="nav-item nav-link">Home</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Lainya</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="#" class="dropdown-item active">logout</a>
                            <a href="#" class="dropdown-item">Setting</a>
                        </div>
                    </div>
                    <a href="shop.php" class="nav-item nav-link">shop</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">

            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">HOME</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Add Data</p>
            </div>
            <?php
            // Ambil pesan kesalahan dari URL
            $success = isset($_GET['success']) ? $_GET['success'] : '';
            ?>

            <!-- Menampilkan pesan kesalahan jika ada -->
            <?php if($success): ?>
                <div class="alert alert-light" role="alert">
                    <?php echo $success; ?>
                </div>
                <script>
                    // Menambahkan script JavaScript untuk menampilkan alert
                    setTimeout(function () {
                        document.querySelector('.alert').style.display = 'none';
                    }, 3000); // Hilangkan alert setelah 3 detik
                </script>
            <?php endif; ?>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Reservation Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">Input Data</h1>
                                <h1 class="text-white">welcome abdulah sidik</h1>
                            </div>
                            <p class="text-white">"Kita tidak bisa mengubah arah angin, tetapi kita bisa menyesuaikan layar kapal kita." - Bertrand Russell

                            </p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Input Data</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Pilih Foto</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>CLick SImpan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Tambah data</h1>
                            <form class="mb-5" method="post" action="config/create.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control text-white bg-transparent border-primary p-4 " name="nama"
                                        placeholder="nama" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control text-white bg-transparent border-primary p-4"
                                        name="rating" id="ratingInput" placeholder="rating" required="required"
                                        pattern="\d+" title="Rating harus berupa angka" />
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        var ratingInput = document.getElementById('ratingInput');

                                        ratingInput.addEventListener('input', function () {
                                            var rating = parseInt(ratingInput.value);

                                            if (rating > 6) {
                                                alert('Rating tidak boleh lebih dari 6');
                                                ratingInput.value = ''; // Mengosongkan nilai jika melebihi batas
                                            }
                                        });
                                    });
                                </script>

                                <div class="form-group">
                                    <div class="text" id="text" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control text-white bg-transparent border-primary p-4 datetimepicker-input"
                                            id="hargasaatini" name="hargasaatini" placeholder="harga saat ini"
                                            data-target="#date" data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text" id="text" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control text-white bg-transparent border-primary p-4 datetimepicker-input"
                                            id="hargadiskon" name="hargadiskon" placeholder="hargadiskon"
                                            data-target="#time" data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select text-primary bg-transparent border-primary px-4"
                                        style="height: 49px;" name="status" id="status">
                                        <option value="1">coffee</option>
                                        <option value="2">machines</option>
                                        <option value="3">sweets</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="time text-white" id="time" data-target-input="nearest">
                                        <input type="file" class="form-control-file" name="foto" id="foto"
                                            accept="image/*" />
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary btn-block font-weight-bold py-3"
                                        type="submit">simpan</button>
                                </div>
                            </form>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    var hargasaatiniInput = document.getElementById('hargasaatini');
                                    var hargadiskonInput = document.getElementById('hargadiskon');

                                    function containsK(value) {
                                        return value.includes('k') || value.includes('K');
                                    }

                                    hargasaatiniInput.addEventListener('input', function () {
                                        if (!containsK(hargasaatiniInput.value)) {

                                            alert('Tambahkan huruf K terlebih dahulu \n input Harga saat ini harus mengandung huruf "k" \n contoh 50k');
                                            hargasaatiniInput.value = ''; // Mengosongkan nilai jika tidak mengandung 'k'
                                        }
                                    });

                                    hargadiskonInput.addEventListener('input', function () {
                                        if (!containsK(hargadiskonInput.value)) {
                                            alert('Tambahkan huruf K terlebih dahulu \n input Harga diskon harus mengandung huruf "k"  \n  contoh 50k');
                                            hargadiskonInput.value = ''; // Mengosongkan nilai jika tidak mengandung 'k'
                                        }
                                    });
                                });
                            </script>


                        </div>

                    </div>

                </div>

            </div>

            <!-- Tabel untuk menampilkan data -->
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Harga Saat Ini</th>
                        <th>Harga Diskon</th>
                        <th>Foto</th>
                        <th>status barang</th>
                        <th>ACTION</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    // Sertakan file koneksi di sini
                    include 'config/koneksi.php';

                    // Tentukan jumlah item per halaman
                    $items_per_page = 5;

                    // Ambil halaman saat ini dari parameter URL, atau default ke halaman 1
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Hitung offset berdasarkan halaman saat ini
                    $offset = ($current_page - 1) * $items_per_page;

                    // Query untuk mengambil data dengan LIMIT dan OFFSET
                    $query = "SELECT * FROM datacofe LIMIT $items_per_page OFFSET $offset";
                    $stmt = $koneksi->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if(!$result) {
                        die("Query error: ".$stmt->errorInfo()[2]);
                    }

                    $no = $offset + 1; // Nomor awal pada setiap halaman
                    
                    // Loop untuk menampilkan data
                    foreach($result as $row) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$row['nama'].'</td>';
                        echo '<td>'.$row['rating'].'</td>';
                        echo '<td>'.$row['hargasaatini'].'K</td>';
                        echo '<td>'.$row['hargadiskon'].'K</td>';

                        // Tampilkan gambar dari data BLOB (pastikan content-type diatur sebagai gambar)
                        echo '<td><img src="config/'.$row['foto'].'" width="100" height="100"/> </td>';
                        echo '<td>'.$row['status'].'</td>';
                        // Tambahkan tombol edit dan hapus
                        echo '<td>';
                        echo '<a href="edit.php?nama='.$row['nama'].'" id="editBtn_" class="btn btn-primary" style="margin-right:10px;" onclick="return confirm(\'Anda yakin ingin edit data ini?\');" >Edit</a>';
                        echo '<a href="config/delete.php?nama='.$row['nama'].'" class="btn btn-danger" onclick="return confirm(\'Anda yakin ingin menghapus data ini?\');">Hapus</a>';
                        echo '</td>';

                        echo '</tr>';

                        $no++;
                    }

                    // Hitung total halaman
                    $total_pages_query = "SELECT COUNT(*) as total FROM datacofe";
                    $stmt_total_pages = $koneksi->prepare($total_pages_query);
                    $stmt_total_pages->execute();
                    $total_pages_result = $stmt_total_pages->fetch(PDO::FETCH_ASSOC);
                    $total_pages = ceil($total_pages_result['total'] / $items_per_page);

                    // Tutup koneksi
                    $koneksi = null;
                    ?>
                </tbody>

            </table>



            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for($page = 1; $page <= $total_pages; $page++): ?>
                        <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page; ?>">
                                <?php echo $page; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>

        </div>
        <!-- Reservation End -->


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
                        <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i
                                class="fab fa-instagram"></i></a>
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
                <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">ABDULAH SIDIK</a></p>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>




        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="data/lib/easing/easing.min.js"></script>
        <script src="data/lib/waypoints/waypoints.min.js"></script>
        <script src="data/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="data/lib/tempusdominus/js/moment.min.js"></script>
        <script src="data/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="data/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="data/mail/jqBootstrapValidation.min.js"></script>
        <script src="data/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="data/js/main.js"></script>
</body>

</html>