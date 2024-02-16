<script src="<?php echo base_url(); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/quill/quill.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    function updateAmount() {
        let qty = document.getElementById('qty').value
        let amtperunit = document.getElementById('amount').value
        let amount = document.getElementById('price')
        amount.value = qty * amtperunit

    }

    function updateUserStatus(element) {
        let userId = element.getAttribute('data-userid');
        let status = element.value;

        // AJAX request to a CodeIgniter controller method
        $.ajax({
            url: '<?= base_url("user/update_status") ?>',
            type: 'POST',
            dataType: 'json', // Expecting JSON response
            data: {
                userID: userId,
                status: status
            },
            success: function(response) {
                alert(response.message); // Alert or handle the response message
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    }
    he

    function payWithPaystack() {

        event.preventDefault();
        var handler = PaystackPop.setup({
            key: '<?php echo $paystack_public_key; ?>', // Replace with your public key
            email: '<?php echo $user->email; ?>',
            first_name: '<?php echo $user->name; ?>',
            last_name: '',
            amount: '<?php echo $invoice_result[0]->amount * $invoice_result[0]->qty; ?>' * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            ref: '<?php echo $invoice_result[0]->invoice_number; ?>', // Replace with a reference you generated
            callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference
                alert('Payment complete! Reference: ' + reference);
                // Make an AJAX call to your server with the reference to verify the transaction
                window.location.href = '<?php echo site_url("verify_transaction/"); ?>' + reference;
            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            },
        });

        handler.openIframe();
    }


    $(document).ready(function() {

        $(document).on('click', '.addmore', function() { // Use event delegation for dynamically added elements

            alert('hello')
            // Clone the last .formresponse
            var $newSection = $('.formresponse:last').clone();

            // Clear the values of the inputs in the cloned section
            $newSection.find('input').val('');

            // Append the new section to the container
            $('#form-container').append($newSection);

            // We no longer move the "Add More" button since each cloned section will have its own button.
        });

        $('#productId').change(function() {
            var productId = $(this).val(); // Get selected product ID
            if (productId != '') {
                $.ajax({
                    url: '<?= base_url('ProductController/fetch_product_amount'); ?>', // Adjust URL as needed
                    type: 'POST',
                    data: {
                        product_id: productId
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data.amount)
                        $('input[name="amount"]').val(data.amount); // Assuming 'amount_per_unit' is the field you want
                    },
                    error: function(request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }
        });
    });

    // document.addEventListener('DOMContenotLoaded', function() {



    //     const amountPerUnit = document.querySelector('#amount');
    //     const qtyInput = document.querySelector('#qty');
    //     const totalPrice = document.querySelector('#total');


    //     // Function to calculate and update the price
    //     function totalPrice() {

    //         const amount = parseFloat(amountPerUnit).value
    //         const qty = parseFloat(qty).value
    //         const totalPrice = amountPerUnit * qty

    //     }

    //     // Event listeners for change in Qty or Amount Per Unit

    //     qtyInput.addEventListener('blur', updateTotalPrice);
    //     amountPerUnitInput.addEventListener('blur', updateTotalPrice);


    //     const productSelector = document.querySelector('#productId');
    //     productSelector.addEventListener('change', function() {

    //         totalPrice();
    //     });
    // });
</script>