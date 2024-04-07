<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Coffee Shop Item</title>
    <link rel="icon" href="img/hot-coffees.jpg" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom styles -->
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 1000px;
            margin-bottom: 50px;
        }

        .card-header {
            background-color: burlywood;
            color: #fff;
            text-align: center;
        }

        .btn-primary {
            background-color: burlywood;
            border-color: rgb(63, 48, 21)
        }

        .btn-primary:hover {
            background-color: #2c571a;
            border-color: #18532a;
        }

        .alert-danger {
            margin-top: 20px;
        }

        body {
            background: #000;
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
            <li><a href="shop.php" style="text-decoration: underline;">shop</a></li>
            <li><a href="login.php">login</a></li>
        </nav>
        <div class="bars">
            <img src="pic/menu.png" alt="" class="bar">
        </div>
    </header>
    <?php
    // Include the database connection file
    include 'config/koneksi.php';

    // Check if the 'nama' parameter is set in the URL
    if(isset($_GET['nama'])) {
        $nama = $_GET['nama'];

        // Query to retrieve the data based on the 'nama' parameter
        $query = "SELECT * FROM datacofe WHERE nama = :nama";
        $stmt = $koneksi->prepare($query);

        // Bind the parameter to the statement
        $stmt->bindParam(':nama', $nama);

        // Execute the statement
        $stmt->execute();

        // Fetch the data as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the statement
        $stmt = null;
        ?>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Coffee Shop </h2>
                </div>
                <div class="card-body">
                    <form method="post" action="config/update.php" enctype="multipart/form-data">
                        <input type="hidden" name="old_nama" value="<?php echo $row['nama']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?php echo $row['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <input type="text" class="form-control" id="rating" name="rating"
                                value="<?php echo $row['rating']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hargasaatini">Harga Saat Ini:</label>
                            <input type="text" class="form-control" id="hargasaatini" name="hargasaatini"
                                value="<?php echo $row['hargasaatini']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hargadiskon">Harga Diskon:</label>
                            <input type="text" class="form-control" id="hargadiskon" name="hargadiskon"
                                value="<?php echo $row['hargadiskon']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" <?php if($row['status'] == 1)
                                    echo 'selected'; ?>>Coffee</option>
                                <option value="2" <?php if($row['status'] == 2)
                                    echo 'selected'; ?>>Machines</option>
                                <option value="3" <?php if($row['status'] == 3)
                                    echo 'selected'; ?>>Sweets</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <img src="config/<?php echo $row['foto']; ?>" alt="Current Image" width="100" height="100"
                                class="mb-3">
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                            <!-- Menambahkan input tersembunyi untuk menyimpan nilai old_foto -->
                            <input type="hidden" name="old_foto" value="<?php echo $row['foto']; ?>">
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="alert alert-danger" role="alert">Invalid item selected for editing.</div>';
    }
    // Close the database connection
    $koneksi = null;
    ?>


    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>