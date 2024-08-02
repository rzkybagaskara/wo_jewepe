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
                        <th scope="col">No Telp</th>
                        <th scope="col">Alamat Bisnis</th>
                        <th scope="col">Email Bisnis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk tampil halaman -->
                    <?php if (!empty($error)): ?>
                    <p><?php echo $error; ?></p>
                    <?php else: ?>
                    <tr>
                        <?php foreach ($info as $item): ?>
                        <td><?= $item['notelp_website']; ?></td>
                        <td><?= $item['alamat_website']; ?></td>
                        <td><?= $item['email_website']; ?></td>
                        <td>
                            <form action="<?= base_url('admin/updateWebInfo/' . $item['id_webinfo']) ?>" method="POST"
                                style="display: inline;">
                                <input type="hidden" name="_update" value="POST">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <?php endforeach; ?>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>