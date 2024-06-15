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
            <h1>Update Paket Wedding</h1>
            <form action="<?= base_url('updatePaket/' . $data['id_paket'])?>" method="POST"
                enctype="multipart/form-data" data-update-form>
                <input type="hidden" name="_method" value="POST">

                <!-- Jenis -->
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jenis</label>
                    <input type="text" class="form-control" name="jenis"
                        value="<?= isset($data['jenis']) ? $data['jenis'] : '' ?>" required>
                </div>

                <!-- Harga -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Harga (Rp)</label>
                    <input type="number" class="form-control" name="harga"
                        value="<?= isset($data['harga']) ? $data['harga'] : '' ?>" required>
                </div>

                <!-- Fasilitas -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Fasilitas</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="fasilitas" required>
                        <?= isset($data['fasilitas']) ? htmlspecialchars($data['fasilitas'], ENT_QUOTES, 'UTF-8') : '' ?>
                    </textarea>
                </div>

                <!-- Upload Gambar -->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Gambar Paket</label>
                    <input class="form-control" type="file" id="formFile" name="upload_gambar_paket">
                </div>

                <!-- Button -->
                <div class="button-placements grid">
                    <button type="submit" class="btn btn-primary text-center w-100 mb-3">Update Paket</button>
                </div>

            </form>
        </div>
    </section>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const updateData = document.querySelectorAll('form[data-update-form]');

    updateData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Update berhasil",
                text: "Data berhasil di-update!",
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