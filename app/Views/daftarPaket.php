<?php include('sidebar.php') ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h3>Daftar Paket Wedding</h3>
            <a href="<?= base_url('tambahPaket') ?>" class="btn btn-success mb-2">Tambah Paket</a>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">ID Paket</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Uploader (ID)</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>