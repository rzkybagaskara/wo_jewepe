<?php include('sidebar.php') ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<!-- Content Wrapper-->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid box">
            <h1>Update Pesanan Paket Wedding</h1>
            <form action="<?= base_url('updatePesanan/' . $data['email_cust'])?>" method="POST"
                enctype="multipart/form-data" data-update-form>
                <input type="hidden" name="_method" value="POST">

                <!-- Nama -->
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" class="form-control" name="nama_customer"
                        value="<?= isset($data['nama_cust']) ? $data['nama_cust'] : '' ?>" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <input type="text" class="form-control" name="email_customer"
                        value="<?= isset($data['email_cust']) ? $data['email_cust'] : '' ?>" required>
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat_customer" required>
                        <?= isset($data['alamat_cust']) ? htmlspecialchars($data['alamat_cust'], ENT_QUOTES, 'UTF-8') : '' ?>
                    </textarea>

                </div>

                <!-- No Telp -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">No Telp</label>
                    <input type="text" class="form-control" name="notelp_customer"
                        value="<?= isset($data['notelp_cust']) ? $data['notelp_cust'] : '' ?>" required>
                </div>

                <!-- Jenis Paket -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Paket</label>
                    <input type="text" class="form-control" name="jenis_paket"
                        value="<?= isset($data['jenis']) ? $data['jenis'] : '' ?>" required>
                </div>

                <!-- Tanggal Pernikahan -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tanggal Pemesanan</label>
                    <div data-mdb-input-init class="form-outline datepicker" data-mdb-toggle-button="false">
                        <input type="date" class="form-control order-form-input" id="datepicker1"
                            data-mdb-toggle="datepicker" name="tanggal_pemesanan"
                            value="<?= isset($data['tanggal']) ? $data['tanggal'] : '' ?>" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Status Pemesanan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_pemesanan_radio" id="radioButtonDraft"
                            <?php echo (isset($data['status_pesan']) && $data['status_pesan'] == 'Requested') ? 'checked' : ''; ?>
                            value="Requested">
                        <label class="form-check-label" for="radioButtonRequested">
                            Requested
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_pemesanan_radio"
                            id="radioButtonPublish"
                            <?php echo (isset($data['status_pesan']) && $data['status_pesan'] == 'Accepted') ? 'checked' : ''; ?>
                            value="Accepted">
                        <label class="form-check-label" for="radioButtonAccepted">
                            Accepted
                        </label>
                    </div>
                </div>


                <!-- Button -->
                <div class="button-placements grid">
                    <button type="submit" class="btn btn-primary text-center w-100 mb-3">Update Data Pesanan</button>
                </div>

            </form>
        </div>
    </section>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const insertData = document.querySelectorAll('form[data-update-form]');

    insertData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Update data pesanan berhasil",
                text: "Klik OK untuk menampilkan update",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    })
})
</script>