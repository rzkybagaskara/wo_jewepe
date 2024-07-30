<?php include('header.php') ?>

<h2 class="text-center mt-5">Cek Status Pesanan</h2>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap4.css">
</head>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered text-center" id="myTable">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Jenis Paket</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Status Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk tampil daftar pesanan -->
                    <?php foreach ($statusPesan as $index => $pesanan) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $pesanan['nama_cust'] ?></td>
                        <td><?= $pesanan['email_cust'] ?></td>
                        <td><?= $pesanan['alamat_cust'] ?></td>
                        <td><?= $pesanan['notelp_cust'] ?></td>
                        <td><?= $pesanan['jenis'] ?></td>
                        <td><?= $pesanan['tanggal'] ?></td>
                        <td style="background-color: <?= $pesanan['color'] ?>;"><?= $pesanan['status_pesan'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- DataTable JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script>
//Initialize DataTable
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>