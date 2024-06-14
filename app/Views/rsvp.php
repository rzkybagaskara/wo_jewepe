<div class="container-form">
    <section class="order-form m-4">
        <div class="container pt-4">

            <form action="<?= base_url('rsvp') ?>" method="POST" enctype="multipart/form-data" data-insert-form>
                <h4 class="text-center">Order Form</h4>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Nama</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form1" class="form-control order-form-input"
                                        name="nama_customer" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Email</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="email" id="form3" class="form-control order-form-input"
                                        name="email_customer" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Alamat Pemesanan</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form4" class="form-control order-form-input"
                                        name="alamat_customer" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Nomor Telepon</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form5" class="form-control order-form-input"
                                        name="notelp_customer" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Jenis Paket</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="form5" class="form-control order-form-input"
                                        name="jenis_paket" />
                                </div>
                            </div>
                            <!-- <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> -->
                        </div>
                        <div class="row mt-3 mx-4">
                            <div class="col-12">
                                <label class="order-form-label" for="datepicker1">Tanggal Pernikahan</label>
                            </div>
                            <div class="col-12">
                                <div data-mdb-input-init class="form-outline datepicker" data-mdb-toggle-button="false">
                                    <input type="text" class="form-control order-form-input" id="datepicker1"
                                        data-mdb-toggle="datepicker" name="tanggal_nikah" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="button" data-mdb-button-init id="btnSubmit" data-mdb-ripple-init
                        class="btn btn-primary d-block mx-auto btn-submit">Order Paket</button>
                </div>
            </form>

        </div>
</div>
</section>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Include Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Include Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
<!-- Initialize Datepicker -->
<script>
$(document).ready(function() {
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap4'
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const insertData = document.querySelectorAll('form[data-insert-form]');

    insertData.forEach(form => {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Tambah data berhasil",
                text: "Klik OK untuk menampilkan data",
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