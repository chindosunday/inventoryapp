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
                Newly supplied or manufactured goods goes here
            </h5>

            <!-- Custom Styled Validation with Tooltips -->
            <form method="post" action="<?php echo site_url('createproduct'); ?>" class="row g-3 needs-validation" novalidate>
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip04" class="form-label">Choose a Category</label>
                    <select class="form-select" name="code" id="validationTooltip04" required>
                        <option selected value=""> Select a Category</option>

                        <?php

                        if (!empty($categories)) :

                            foreach ($categories as $category) : ?>
                                <option value="<?= $category['cat_ID']; ?>"><?= $category['name']; ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option selected value=""> No Categories Found</option>
                        <?php endif; ?>
                    </select>
                    <div class="invalid-tooltip">
                        Please select a valid state.
                    </div>
                    <div>
                        <a href=" <?php echo site_url('addcategory'); ?>"> Add a category</a>
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip01" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip01" value="John" required />
                    <div class="valid-tooltip">Looks good!</div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip02" class="form-label">Amount Per Unit</label>
                    <input type="number" name="amount" class="form-control" id="validationTooltip02" value="Doe" required />
                    <div class="valid-tooltip">Looks good!</div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip02" class="form-label">Qty</label>
                    <input type="number" name="qty" class="form-control" id="validationTooltip02" value="Doe" required />
                    <div class="valid-tooltip">Looks good!</div>
                </div>



                <div class="col-12">
                    <button class="btn btn-primary" type="submit">
                        Submit form
                    </button>
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