<?php
include 'koneksi.php';

// gudang
function addgud($nama_gudang,$lokasi){
    global $conn;
    $query = "INSERT INTO gudang (nama_gudang,lokasi) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss',$nama_gudang,$lokasi);
    $stmt->execute();
    return true;
}

function getGudangAll(){
    global $conn;
    $query = "SELECT *  FROM gudang";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deletegud($id_gudang){
    global $conn;
    $query = "DELETE FROM gudang WHERE id_gudang=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i',$id_gudang);
    $stmt->execute();
}

// vendorrr
function getVendorByName($nama_vendor) {
    global $conn;
    $query = "SELECT * FROM vendor WHERE nama_vendor = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_vendor);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
function getBarangByName($nama_barang) {
    global $conn;
    $query = "SELECT * FROM vendor WHERE nama_barang = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getvendorBybarangName($nama_barang) {
    global $conn;
    $query = "SELECT nama_vendor FROM vendor WHERE nama_barang = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nama_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}


function addVendor($nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv) {
    global $conn;
    $query = "INSERT INTO vendor (nama_vendor, nama_barang, stok_barang, kontak_vendor, no_inv) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiis', $nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv);
    $stmt->execute();
    return true;
}

function deleteVendor($id_vendor) {
    global $conn;
    $query = "DELETE FROM vendor WHERE id_vendor = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_vendor);
    $stmt->execute();
}

function getVendorAll() {
    global $conn;
    $query = "SELECT * FROM vendor";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateVendor($nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv, $id_vendor) {
    global $conn;
    $query = "UPDATE vendor SET 
             nama_vendor  = ?, nama_barang  = ?, stok_barang  = ?, kontak_vendor  = ?, no_inv  = ?
              WHERE id_vendor  = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssiisi',$nama_vendor, $nama_barang, $stok_barang, $kontak_vendor, $no_inv, $id_vendor);
    $stmt->execute();
}


// inventory

function addInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO inventoryy (nama_barang, jenis_barang, stok_barang, barcode, harga, lokasi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssiiis', $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi);
    $stmt->execute();
    return true;
}

function updateInv($nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi, $id_inv) {
    global $conn;
    $query = "UPDATE inventoryy SET nama_barang = ?, jenis_barang = ?, stok_barang = ?, barcode = ?, harga = ?, lokasi = ? WHERE id_inv = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiiisi", $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $lokasi, $id_inv);
    return $stmt->execute();
}

function deleteInv($id_inv) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM inventoryy WHERE id_inv = ?");
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
    return true;
}

function getInvById($id_inv) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM inventoryy WHERE id_inv = ?");
    $stmt->bind_param('i', $id_inv);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getAllInv() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM inventoryy");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>