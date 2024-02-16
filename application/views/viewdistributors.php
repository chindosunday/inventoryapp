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
                                        <th scope="col"> Business Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $counter = 1;
                                    foreach ($distributors as $distributor) : ?>
                                        <tr>
                                            <th scope="row"><?= $counter++; ?></th>
                                            <td><?= $distributor['name']; ?></td>
                                            <td><?= $distributor['email']; ?></td>
                                            <td><?= $distributor['address']; ?></td>
                                            <td><?= $distributor['phone']; ?></td>
                                            <td><?= $distributor['company']; ?></td>
                                            <td><?= $distributor['status']; ?>

                                            <td></td>
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