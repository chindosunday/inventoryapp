    <main id="main" class="main">
        <div class="pagetitle">
            <h1>General Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Staff</li>
                    <li class="breadcrumb-item active">All staff</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Default Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $counter = 1;
                                    foreach ($staff as $user) : ?>
                                        <tr>
                                            <th scope="row"><?= $counter++; ?></th>
                                            <td><?= $user['name']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td><?= $user['address']; ?></td>
                                            <td><?= $user['phone']; ?></td>
                                            <td><?= $user['userRoleName']; ?></td>
                                            <td><?= $user['status']; ?>
                                            <td> <select class="form-select" aria-label="Take an action" onChange="updateUserStatus(this)" data-userid="<?= $user['userID']; ?>">>
                                                    <option selected>Take action</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>

                                                </select></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>


        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->



    </body>

    </html>