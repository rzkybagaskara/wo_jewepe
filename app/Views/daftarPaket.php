<?php include('sidebar.php') ?>
<style>
td.clickable {
    cursor: pointer;
}
</style>

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
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paket as $index => $paket) : ?>
                    <?php $image_url = '../upload/post/' ?>
                    <th scope="row"><?= $index + 1 ?></th>
                    <!-- <td class="clickable" -->
                    <!-- onclick="window.location='<?= base_url('viewPaket/' . $paket['id_paket']) ?>'"> -->
                    <!-- <?= $paket['id_paket'] ?></td> -->
                    <td class="clickable"
                        onclick="window.location='<?= base_url('viewPaket/' . $paket['id_paket']) ?>'">
                        <?= $paket['jenis'] ?></td>
                    <td class="clickable"
                        onclick="window.location='<?= base_url('viewPaket/' . $paket['id_paket']) ?>'">
                        <?= $paket['fasilitas'] ?></td>
                    <td class="clickable"
                        onclick="window.location='<?= base_url('viewPaket/' . $paket['id_paket']) ?>'">
                        <img src="<?= $image_url . $paket['gambar'] ?>" alt="Gambar Paket"
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteData = document.querySelectorAll('form[data-delete-form]');

    deleteData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Apakah anda ingin menghapus data tersebut?",
                text: "Sekali dihapus maka data akan hilang selamanya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        })
    })
})
</script>