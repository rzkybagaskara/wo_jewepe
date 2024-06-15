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
            <h3>Website Info</h3>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Nomor</th>
                        <th scope="col">Hero Image</th>
                        <th scope="col">Logo Website</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Alamat Bisnis</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk tampil daftar paket -->
                    <?php foreach ($paket as $index => $paket) : ?>
                    <?php $image_url = '../upload/post/' ?>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $paket['jenis'] ?></td>
                    <td><?= $paket['fasilitas'] ?></td>
                    <td><img src="<?= $image_url . $paket['gambar'] ?>" alt="Gambar Paket"
                            style="width:150px; height:150px;">
                    </td>
                    <td>
                        <form action="<?= base_url('updatePaket/' . $paket['id_paket']) ?>" method="POST"
                            style="display: inline;">
                            <input type="hidden" name="_update" value="POST">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="<?= base_url('deletePaket/' . $paket['id_paket']) ?>" method="POST"
                            data-delete-form style="display: inline;">
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>