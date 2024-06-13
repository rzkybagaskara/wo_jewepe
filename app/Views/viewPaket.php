<?php include('header.php') ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Paket Wedding Details
                </div>
                <div class="card-body">
                    <?php $image_url = '../../upload/post/' ?>
                    <h5 class="card-title">Jenis: <?= $paket['paket']['jenis'] ?></h5>
                    <p class="card-text">Harga: <?= $paket['harga'] ?></p>
                    <p class="card-text">Fasilitas: <?= $paket['fasilitas'] ?></p>
                    <img src="<?= $image_url . $paket['gambar'] ?>" class="card-img-top"
                        alt=<?= $image_url . $paket['gambar'] ?>>
                </div>
                <div class="card-footer">
                    <form action="<?= base_url('updatePaket/' . $paket['id_paket']) ?>" method="POST"
                        style="display: inline;">
                        <input type="hidden" name="_update" value="POST">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form action="<?= base_url('deletePaket/' . $paket['id_paket']) ?>" method="POST" data-delete-form
                        style="display: inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>