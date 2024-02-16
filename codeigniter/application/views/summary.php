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
                                <?php if (!empty($order_data)) : ?>
                                    <?php foreach ($order_data as $order) : ?>
                                        <div>
                                            <h2>Order ID: <?php echo $order['id_order']; ?></h2>
                                            <p>Email: <?php echo $order['email']; ?></p>
                                            <p>Student Name: <?php echo $order['student_name']; ?></p>
                                            <p>Grade Level: <?php echo $order['grade_level']; ?></p>
                                            <p>Parent Phone Number: <?php echo $order['parent_phone_number']; ?></p>
                                            <p>Submitted Date: <?php echo $order['submitted_date']; ?></p>
                                            <p>Notes: <?php echo $order['notes']; ?></p>
                                            <!-- Add more fields as needed -->
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>No orders found.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>