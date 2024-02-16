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
                Respond to a stock request
            </h5>

            <!-- Custom Styled Validation with Tooltips -->
            <form method="post" action="<?php echo site_url('requestpage/createresponse'); ?>" class="row g-3 needs-validation">

                <div class="col-md-12 position-relative">

                    <input type="hidden" name="id" value=" <?php echo isset($item_id) ? $item_id : ''; ?>" />

                </div>

                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="validationTooltip01" value="" />
                    <div class="valid-tooltip">Looks good!</div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip02" class="form-label">Message body</label>
                    <!-- <input type="number" name="amount" class="form-control" id="validationTooltip02" value="Doe" required /> -->
                    <textarea name="request_msg" class="form-control" id="validationTooltip02"></textarea>
                    <div class="valid-tooltip">Looks good!</div>
                </div>





                <div id="form-container" class="row g-3 needs-validation" novalidate>
                    <div class="row formresponse">
                        <div class="col-md-3">
                            <label for="validationTooltip04" class="form-label">Product Name</label>
                            <select class="form-select" name="productId" id="productId" required>
                                <option selected value=""> Select a prodcut</option>

                                <?php

                                if (!empty($products)) :

                                    foreach ($products as $product) : ?>
                                        <option value="<?= $product['pro_ID']; ?>"><?= $product['prod_name']; ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option selected value=""> No products Found</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="validationTooltip02" class="form-label">Amount Per Unit</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="" readonly />

                        </div>
                        <div class="col-md-3">
                            <label for="validationTooltip02" class="form-label">Qty</label>
                            <input type="number" id="qty" onblur="updateAmount()" name="qty" class="form-control" value="" required />

                        </div>
                        <div class="col-md-3">
                            <label for="validationTooltip02" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="" readonly required />
                            <!-- <div class="mt-2"> <button class="btn btn-primary addmore" id="addmore" type="button">Add More</button></div> -->
                        </div>
                    </div>
                </div>





                <div class="col-12">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>
            <!-- End Custom Styled Validation with Tooltips -->

        </div>
    </div>


    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->



</body>

</html>