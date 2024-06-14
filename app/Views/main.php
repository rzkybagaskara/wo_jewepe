<?php include('header.php') ?>

<div class="header-text text-center pb-3 pt-3">
    <h3 class="mt-2 ml-1 pb-2">Wedding Organizer JeWePe</h3>
    <p class="mt-2">Make your wedding more special!</p>
</div>

<div class="container-card">
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


<div class="container-form">
    <section class="order-form m-4">
        <div class="container pt-4">
            <h4 class="text-center">Order Form</h4>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row mx-4">
                        <div class="col-12">
                            <label class="order-form-label">Nama</label>
                        </div>
                        <div class="col-12">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form1" class="form-control order-form-input" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-4">
                        <div class="col-12">
                            <label class="order-form-label">Email</label>
                        </div>
                        <div class="col-12">
                            <div data-mdb-input-init class="form-outline">
                                <input type="email" id="form3" class="form-control order-form-input" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-4">
                        <div class="col-12">
                            <label class="order-form-label">Alamat Pemesanan</label>
                        </div>
                        <div class="col-12">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form4" class="form-control order-form-input" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row mx-4">
                        <div class="col-12">
                            <label class="order-form-label">Jenis Paket</label>
                        </div>
                        <div class="col-12">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form5" class="form-control order-form-input" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-4">
                        <div class="col-12">
                            <label class="order-form-label" for="date-picker-example">Tanggal Pernikahan</label>
                        </div>
                        <div class="col-12">
                            <div data-mdb-input-init class="form-outline datepicker" data-mdb-toggle-button="false">
                                <input type="text" class="form-control order-form-input" id="datepicker1"
                                    data-mdb-toggle="datepicker" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="button" data-mdb-button-init id="btnSubmit" data-mdb-ripple-init
                        class="btn btn-primary d-block mx-auto btn-submit">Order Paket</button>
                </div>
            </div>
        </div>
    </section>
</div>