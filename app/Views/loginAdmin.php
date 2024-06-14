<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="bg-info bg-gradient">
    <section class="section vh-100">
        <div class="pt-5">
            <div class="login-box py-5 w-25 bg-white container-fluid border rounded">
                <!-- Welcome Message -->
                <div class="message text-center">
                    <h3>Selamat Datang</h3>
                    <h3>Admin WO JeWePe</h3>
                </div>

                <!-- Login Box -->
                <div class="d-flex justify-content-center mt-2 w-10">
                    <form method="POST" action="<?= base_url('loginAdmin') ?>">
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" name="user_input">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="pw_input">
                        </div>
                        <button type="submit" class="btn btn-primary text-center w-100">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
</body>