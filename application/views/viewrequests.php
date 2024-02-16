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
                                        <th>#</th>
                                        <th> Customer Name</th>
                                        <th>Message Title</th>

                                        <th>Status</th>
                                        <th>Date</th>


                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($requests)) : ?>
                                        <?php
                                        $counter = 1;
                                        foreach ($requests as $request) : ?>
                                            <tr>
                                                <td scope="row"><?= $counter++; ?></td>
                                                <td><?= $request['name']; ?></td>
                                                <td><?= $request['title']; ?></td>
                                                <td><a class="nav-link collapsed" href="<?php echo site_url('requestpage/request/details?id=' . $request['id']); ?>"> <?= $request['status']; ?> </a></td>
                                                <td><?= $request['date']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6"> No requests found.</td>
                                        </tr>

                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>


        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->