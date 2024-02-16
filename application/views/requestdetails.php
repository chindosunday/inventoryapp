<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add a New Stockssssssss</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Price</a></li>
                <li class="breadcrumb-item">Amount</li>
                <li class="breadcrumb-item active">Quantity</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Make a stock request
            </h5>

            <!-- Custom Styled Validation with Tooltips -->
            <form method="post" action="<?php echo site_url(''); ?>" class="row g-3 needs-validation" novalidate>

                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="validationTooltip01" value="<?= $request->title; ?>" readonly />
                    <div class="valid-tooltip">Looks good!</div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Message body</label>
                    <!-- <input type="number" name="amount" class="form-control" id="validationTooltip02" value="Doe" required /> -->
                    <textarea name="request_msg" class="form-control" id="validationTooltip02" readonly><?= $request->request_msg; ?></textarea>
                    <div class="valid-tooltip">Looks good!</div>
                </div>



                <div class="col-12">
                    <a href="<?php echo site_url('requestpage/response?id=' . $request->id); ?>" class="btn btn-primary"> Respond</a>
                </div>
            </form>
            <!-- End Custom Styled Validation with Tooltips -->
        </div>
    </div>
    </div> -->
    </div>
    </section> -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->



</body>

</html>