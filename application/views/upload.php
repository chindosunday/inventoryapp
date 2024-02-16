<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add a profile picture </h1>

    </div>
    <!-- End Page Title -->


    <div class="card">
        <div class="card-body">


            <!-- Custom Styled Validation with Tooltips -->



            <form method="post" action="<?php echo site_url('upload_controller/do_upload'); ?>" class="row g-3 needs-validation" enctype="multipart/form-data">


                <div class="col-md-3 position-relative">
                    <label for="validationTooltip01" class="form-label">Upload an image</label>
                    <input type="text" name="img" class="form-control" id="img" value="" />
                </div>
        </div>





        <div class="col-12">
            <button class="btn btn-primary" type="submit">
                Submit form
            </button>
        </div>
        </form>
        <!-- End Custom Styled Validation with Tooltips -->
    </div>

    </section>
</main><!-- End #main -->