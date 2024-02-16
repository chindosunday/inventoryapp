<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add a New Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Name</a></li>
                <li class="breadcrumb-item">Description</li>

            </ol>
        </nav>
    </div>
    <!-- End Page Title -->


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Newl categories of goods goes here
            </h5>

            <!-- Custom Styled Validation with Tooltips -->
            <form method="post" action="<?php echo site_url('createcategory'); ?>" class="row g-3 needs-validation" novalidate>

                <div class="col-md-3 position-relative">
                    <label for="validationTooltip01" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" value="Omo" required />
                    <div class="valid-tooltip">Looks good!</div>
                </div>

                <div class="col-md-3 position-relative">
                    <label for="validationTooltip01" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="description" value="detergent" required />
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