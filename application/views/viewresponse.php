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
                View Response & Pay Now
            </h5>

            <div class="col-md-12 position-relative">
                <?php echo $response_result->message; ?>
            </div>
            <!-- Custom Styled Validation with Tooltips -->

            <div class="col-md-12 position-relative">
                <table class="table">
                    <thead>
                        <tr>
                            <th> Prodcuct Name</th>
                            <th>Amount per Unit</th>
                            <th>Quantity</th>
                            <th>invoice Number</th>
                            <th>Total Amount due</th>



                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>

                            <td> <?php echo $invoice_result[0]->prod_name; ?> </td>
                            <td> <?php echo $invoice_result[0]->amount; ?> </td>
                            <td> <?php echo $invoice_result[0]->qty; ?> </td>
                            <td> <?php echo $invoice_result[0]->invoice_number; ?> </td>
                            <td> <?php echo $total = $invoice_result[0]->amount * $invoice_result[0]->qty; ?> </td>


                        </tr>


                    </tbody>
                </table>
            </div>
            <!-- End Custom Styled Validation with Tooltips -->

        </div>



    </div>
    <form action="">
        <button type="button" onclick="payWithPaystack()">Check Out</button>

    </form>


    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->



</body>

</html>