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
            <h1>Update Website Info</h1>
            <form action="<?= base_url('admin/updateWebInfo/' . $data['id_webinfo'])?>" method="POST"
                enctype="multipart/form-data" data-update-form>
                <input type="hidden" name="_method" value="POST">

                <!-- No Telp Website -->
                <div class="form-group">
                    <label for="exampleFormControlInput1">No Telp</label>
                    <input type="number" class="form-control" name="notelp_bisnis"
                        value="<?= isset($data['notelp_website']) ? $data['notelp_website'] : '' ?>" required>
                </div>

                <!-- Alamat Bisnis -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Alamat Bisnis</label>
                    <input type="text" class="form-control" name="alamat_bisnis"
                        value="<?= isset($data['alamat_website']) ? $data['alamat_website'] : '' ?>" required>
                </div>

                <!-- Email Bisnis -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email Bisnis</label>
                    <input type="email" class="form-control" name="email_bisnis"
                        value="<?= isset($data['email_website']) ? $data['email_website'] : '' ?>" required>
                </div>

                <!-- Button -->
                <div class="button-placements grid">
                    <button type="submit" class="btn btn-primary text-center w-100 mb-3">Update Web Info</button>
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
                text: "Data info website berhasil di-update!",
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