<?php 
session_start();
if(!isset($_SESSION['admin'])) {
    header('location: http://localhost/drill1/login.php');
    exit();
}

include '../include/function.php';
include '../include/koneksi.php';
include '../part/header.php';

$gudang=getGudangAll();
if(isset($_GET['delete'])){
    $id_gudang = $_GET['delete'];
    deletegud($id_gudang);
    header('location: http://localhost/drill1/views/gudang.php');
    exit();
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Gudang List</h1>

            <div class="card mt-3">
                <div class="card-header">
                    <h5>Gudang List</h5>
                    <a href="addgud.php" class="btn btn-primary float-right">Add Gudang</a>
                </div>
                <div class="card-body">
        <table class="table table-bordered table-light table-striped">
            <tr class="border-black">
                <th>Nomer</th>
                <th>Nama Gudang</th>
                <th>Lokasi</th>
                <th>Aksi </th>
            </tr>
            <?php $no = 1; 
                foreach($gudang as $g): ?>
                    <tr>
                <td><?= $no++ ?></td>
                <td><?= $g['nama_gudang'] ?></td>
                <td><?= $g['lokasi'] ?></td>
                <td>
                    <a class="btn btn-warning" href="editgud.php?updategud=<?= $gg['nama_gudang'] ?>">edit</a>
                    <a class="btn btn-danger" href="gudang.php?delete=<?= $g['id_gudang'] ?>">delete</a>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>
            </div>
        </div>
    </div>
 </div>
 

 <?php include '../part/footer.php';?>