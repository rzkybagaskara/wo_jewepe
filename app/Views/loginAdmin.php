<?php include('header.php') ?>

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
                    <form method="POST">
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