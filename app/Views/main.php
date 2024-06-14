<?php include('header.php') ?>
<?php include('hero.php') ?>

<div class="container-card">
    <h3 class="mt-3 ml-1 pb-2 text-center">Paket Wedding</h3>
    <div class="row p-1">
        <?php foreach ($paket as $index => $paket) : ?>
        <?php $image_url = '../upload/post/' ?>

        <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch mb-4">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="<?= $image_url . $paket['gambar'] ?>" alt="Gambar Paket"
                    style="height: 290px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $paket['jenis'] ?></h5>
                    <a href="#" class="btn btn-primary mt-auto">Detail Paket</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('footer.php') ?>