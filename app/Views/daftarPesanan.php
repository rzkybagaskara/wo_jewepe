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
            <h3>Daftar Pesanan Paket Wedding</h3>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Paket</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Status Pemesanan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk tampil daftar pesanan -->
                    <?php foreach ($pesan as $index => $pesanan) :
                        //Set status default pesanan menjadi Requested
                            if (!isset($pesanan['status']) || empty($pesanan['status'])) {
                                $pesanan['status'] = 'Requested';
                            }
                        ?>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $pesanan['nama_cust'] ?></td>
                    <td><?= $pesanan['email_cust'] ?></td>
                    <td><?= $pesanan['alamat'] ?></td>
                    <td><?= $pesanan['jenis'] ?></td>
                    <td><?= $pesanan['tanggal'] ?></td>
                    <!-- set default status pesanan yakni Requested dan di sort berdasarkan status -->
                    <td><?= $pesan['status'] ?></td>
                    <td>
                        <form action="<?= base_url('updatePesanan/' . $pesan['email_cust']) ?>" method="POST"
                            style="display: inline;">
                            <input type="hidden" name="_update" value="POST">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action="<?= base_url('deletePesanan/' . $pesan['email_cust']) ?>" method="POST"
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