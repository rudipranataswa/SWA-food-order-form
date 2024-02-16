<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Order Summary</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Viga&display=swap" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <!-- Title -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Input Size -->
                        <?php if ($this->session->flashdata('thank_you_note')) : ?>
                            <p class="thanks_label alert alert-success"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error_message')) : ?>
                            <p class="thanks_label"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="font-weight-bold">Order Summary</span>
                            </div>
                            <div class="card-body card-block body-text">
                                <p>Email: <?php echo $order_details->email; ?></p>
                                <p>Student Name: <?php echo $order_details->student_name; ?></p>
                                <p>Grade Level: <?php echo $order_details->grade_level; ?></p>
                                <p>Parent Phone Number: <?php echo $order_details->parent_phone_number; ?></p>




                                <p style="font-weight:bold; font-style: italic;">
                                    Thank you for submitting Pre Order Purchase, our canteen team will prepare your requested order and you can pick up your order at Bamboo Court or request delivery to the classroom (only for EYES Students).
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    There is NO CANCELLATION for the food that has been ordered.
                                </p>

                                <p style="font-weight: bold; font-style: italic;">
                                    You need to pay your food order directly at Canteen's cashier by using your ID card or do transfer payment to School Account:
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    0000554103 (Bank Sinarmas)
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    or
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    4970350018 (BCA).
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    Please view the total amount which needs to be transferred in the pre order form.
                                </p>

                                <p style="font-weight: bold; font-style: italic;">
                                    Orders will only be processed & prepared by the Canteen Staff when the proof of payment has been received, don't forget to send the proof of transfer to following email finance@swa-jkt.com and ervi_liu@swa-jkt.com.
                                </p>

                                <p style="font-weight:bold; font-style: italic;">
                                    Thank you for your kind understanding & cooperation.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>