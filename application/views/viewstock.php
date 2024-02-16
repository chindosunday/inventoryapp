    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

                            <?php if ($this->session->flashdata('success_msg')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>


                                    <tr>
                                        <th>
                                            Product Name
                                        </th>
                                        <th>QTY</th>
                                        <th>Unit Price</th>
                                        <th> Date</th>
                                        <?php if ($this->session->userdata('user_role') != 3) : ?>
                                            <th>Action</th>
                                        <?php endif; ?>

                                    </tr>


                                </thead>
                                <tbody>

                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product['prod_name']; ?></td>
                                            <td><?= $product['quantity']; ?></td>
                                            <td><?= $product['amount']; ?></td>
                                            <td><?= $product['datee']; ?></td>

                                            <?php if ($this->session->userdata('user_role') != 3) : ?>
                                                <td> <a href="" class="btn btn-primary"> Update</a>

                                                    <form action="" method="post">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>


                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <?php if ($this->session->userdata('user_role') == 3) : ?>

                                <a href=" <?php echo site_url('requestpage/show'); ?>" class="btn btn-primary"> Make a Stock Request </a>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->



    </body>

    </html>