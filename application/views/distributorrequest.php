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

                                    <th></th>

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Message Title</th>
                                        <th scope="col"> Message Body</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($requests)) : ?>
                                        <?php
                                        $counter = 1;
                                        foreach ($requests as $request) : ?>


                                            <tr>
                                                <td scope="row"><?= $counter++; ?></td>
                                                <td><?= $request['title']; ?></td>
                                                <td><?= $request['request_msg']; ?></td>
                                                <td>
                                                    <?= ($request['status'] == 'Responded') ? '<a href="' . site_url('requestpage/viewresponse') . '?id=' . $request['id'] . '">' . $request['status'] . '</a>' : $request['status']; ?>

                                                </td>


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