<?php 
include '../part/header.php';
include '../include/function.php';

$inventory = getAllInv();

if (isset($_GET['deleteInv'])) {
    $id_inv = $_GET['deleteInv'];
    deleteInv($id_inv);
    header('location: http://localhost/drill1/views/inventory.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Inventory List</h1>

            <div class="card mt-3">
                <div class="card-header">
                    <h5>Inventory List</h5>
                    <a href="addinv.php" class="btn btn-primary float-right">Add inventory</a>
                </div>
                <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok Barang</th>
                <th>Harga</th>
                <th>Barcode</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($inventory as $inv): ?>
            <tr class="<?php 
                if($inv['stok_barang'] == 0) {
                    echo 'table-danger';
                } elseif($inv['stok_barang'] <=  10 ){
                    echo 'table-info';
                }?>">
                <td><?= $no++ ?></td>
                <td><?= $inv['nama_barang'] ?></td>
                <td><?= $inv['jenis_barang'] ?></td>
                <td><?= $inv['stok_barang'] ?></td>
                <td><?= $inv['harga'] ?></td>
                <td><?= $inv['barcode'] ?></td>
                <td><?= $inv['lokasi'] ?></td>
                <td>
                    <a href="http://localhost/drill1/views/inventory.php?deleteInv=<?= $inv['id_inv'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a href="editInv.php?updateInv=<?= $inv['id_inv'] ?>" class="btn btn-warning btn-sm">Update</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../part/footer.php'; ?>

<!-- <div class="col-3 bg-dark m-auto">
        <p class="bg-light text-center">Jumlah Data: <?= count($inventory); ?></p>
    </div> -->