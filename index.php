<?php
error_reporting(0);

$host = "localhost";
$username = "root";
$password = "";
$database = "tugas6";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("koneksi database gagal: " . mysqli_connect_error());
}

$kode_barang = $_POST['kode'];
if ($kode_barang == 'BRG001') {
    $nama_barang = "TOPI";
    $harga = 15000;
    $jumlah_beli = $_POST['jumlah_beli'];
    $total_barang = $jumlah_beli * $harga;

    if ($total_barang >= 500000) {
        $diskon = $total_barang * 5 / 100;
        $total_bayar = $total_barang - $diskon;
        $ket = "Selamat Anda Mendapatkan Diskon 5%";
    } elseif ($total_barang < 500000) {
        $total_bayar = $total_barang;
        $ket = "Maaf Anda Tidak Mendapatkan Diskon";
    } else {
        $total_barang = 0;
        $diskon = 0;
        $total_bayar = 0;
        $ket = "Kode Yang Anda Masukkan Salah";
    }
} elseif ($kode_barang == 'BRG002') {
    $nama_barang = "TSHIRT";
    $harga = 96000;
    $jumlah_beli = $_POST['jumlah_beli'];
    $total_barang = $jumlah_beli * $harga;

    if ($total_barang >= 500000) {
        $diskon = $total_barang * 5 / 100;
        $total_bayar = $total_barang - $diskon;
        $ket = "Selamat Anda Mendapatkan Diskon 5%";
    } elseif ($total_barang < 500000) {
        $total_bayar = $total_barang;
        $ket = "Maaf Anda Tidak Mendapatkan Diskon";
    } else {
        $total_barang = 0;
        $diskon = 0;
        $total_bayar = 0;
        $ket = "Kode Yang Anda Masukkan Salah";
    }
} elseif ($kode_barang == 'BRG003') {
    $nama_barang = "JEANS";
    $harga = 320000;
    $jumlah_beli = $_POST['jumlah_beli'];
    $total_barang = $jumlah_beli * $harga;

    if ($total_barang >= 500000) {
        $diskon = $total_barang * 5 / 100;
        $total_bayar = $total_barang - $diskon;
        $ket = "Selamat Anda Mendapatkan Diskon 5%";
    } elseif ($total_barang < 500000) {
        $total_bayar = $total_barang;
        $ket = "Maaf Anda Tidak Mendapatkan Diskon";
    } else {
        $total_barang = 0;
        $diskon = 0;
        $total_bayar = 0;
        $ket = "Kode Yang Anda Masukkan Salah";
    }
} else {
    $nama_barang = "-";
    $harga = "-";
    $total_barang = "-";
    $diskon = "-";
    $total_bayar = "-";
    $ket = "Kode Yang Anda Masukkan Salah";
}

// Query SQL untuk menyimpan data
$sql = "INSERT INTO kasir (kode_barang, nama_barang, harga, jumlah_beli, total_bayar)
        VALUES ('$kode_barang', '$nama_barang', '$harga', '$jumlah_beli', '$total_bayar')";

if (mysqli_query($koneksi, $sql)) {
    echo "Data berhasil disimpan ke database.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

// OUTPUT
echo "<br>";
echo "Kode Barang           :" . $kode_barang . "<br><br>";
echo "Nama Barang           :" . $nama_barang . "<br><br>";
echo "Harga                 :Rp. " . number_format($harga, 0, ',', '.') . "<br><br>";
echo "Jumlah Beli           :" . $jumlah_beli . "<br><br>";
echo "Total Per-Barang      :Rp. " . number_format($total_barang, 0, ',', '.') . "<br><br>";
echo "Keterangan            :" . $ket . "<br><br>";
echo "Total Bayar           :Rp. " . number_format($total_bayar, 0, ',', '.') . "<br><br>";
?>
