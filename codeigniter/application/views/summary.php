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

                                <div class="card-body card-block body-text">
                                    <form>
                                        <?php if (!empty($summary)) : ?>
                                            <?php
                                            $counter = 1;
                                            $total_price = 0;
                                            $week = 1;
                                            $no = 1;
                                            foreach ($dates as $item) {
                                                // print_r($item); exit;
                                                // ambil tanggal dan order_hdr melalui link, 
                                                // utk tanggal dari po_hdr, utk order customer ambil dari id_order_hdr
                                                $begin_date = new DateTime($item['begin_date']);
                                                $day_of_week = $begin_date->format('N');
                                                $end_date = clone $begin_date;
                                                $end_date->modify('+12 day');

                                                $period = new DatePeriod($begin_date, new DateInterval('P1D'), $end_date);
                                                $date_range = [];
                                                $exclude_days = [5, 6];
                                                foreach ($period as $date) {
                                                    // $date_range[] = $date->format('Y-m-d');
                                                    $day_from_begin = $begin_date->diff($date)->days;
                                                    if (!in_array($day_from_begin, $exclude_days)) {
                                                        $date_range[] = $date->format('Y-m-d');
                                                    }
                                                }

                                                foreach ($po_dates as $v) {
                                                    if (in_array($v, $date_range)) {
                                                        // The date is in date_range
                                                        foreach ($summary as $detail) {
                                                            // print_r($detail); exit;
                                                            echo '<div class="form-group">';
                                                            if ($detail['po_date'] == $v) {
                                                                $is_holiday = false;
                                                                $holiday_description = '';

                                                                foreach ($holidays as $holiday) {
                                                                    $holiday_date = new DateTime($holiday['date']);

                                                                    if ($holiday_date == $detail['po_date']) {
                                                                        $is_holiday = true;
                                                                        $holiday_description = $holiday['description'];
                                                                        break;
                                                                    }
                                                                }
                                                                if ($is_holiday == true) {
                                                                    echo $holiday_description . '</br>';
                                                                } else {
                                                                    $date = DateTime::createFromFormat('Y-m-d', $v);
                                                                    $formatted_date = $date->format('d M');
                                                                    $menu_found = false;
                                                                    $total_price += $detail['price'];
                                                                    $price = 'IDR ' . number_format($detail['price'], 0, ',', '.');
                                                                    echo $no . '. ' . $formatted_date . ' - ' . $detail['menu'] . ' - ' . $price . '';
                                                                    $menu_found = true;
                                                                    $no++;
                                                                }
                                                            }
                                                            echo '</div>';
                                                        }
                                                        // Removing the date in date_range
                                                        $key = array_search($v, $date_range);
                                                        unset($date_range[$key]);
                                                    }
                                                }
                                                foreach ($date_range as $date) {
                                                    $formatted_dates[] = date('d M', strtotime($date));
                                                }
                                                $count = count($formatted_dates);
                                                $result = '';
                                                foreach ($formatted_dates as $index => $date) {
                                                    if ($index === $count - 1) {
                                                        // Last array value, use "&" instead of ","
                                                        $result .= '& ' . $date;
                                                    } else {
                                                        $result .= $date . ', ';
                                                    }
                                                }

                                                echo "No Meals for : " . $result . "<br>";
                                                // print_r($date_range); exit;
                                                // Convert $po_dates[0] to 'd M' format
                                                $date_start = DateTime::createFromFormat('Y-m-d', $po_dates[0]);
                                                $formatted_date_start = $date_start->format('d M');

                                                // Convert end($po_dates) to 'd M' format
                                                $date_end = DateTime::createFromFormat('Y-m-d', end($po_dates));
                                                $formatted_date_end = $date_end->format('d M Y');
                                                // echo '<div class="form-group">';
                                                $total = 'IDR ' . number_format($total_price, 0, ',', '.');
                                                echo '<label class="form-control-label">Sub Total : ' . $total . '</label></br></br>';
                                                echo '<label class="form-control-label">The total amount need to be transferred to our School Account 0000554103 (Bank Sinarmas) or 4970350018 (BCA) is ' . $total . '</label></br></br>';
                                                echo '<label class="form-control-label">Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , 
                                                so we can proceed to prepare your requested meal starting ' . $formatted_date_start . ' - ' . $formatted_date_end . ' and deliver to ' . $summary[0]['student_name'] . '\'s Class.</label>';
                                                // echo '</div>';
                                            }
                                            $no++;
                                            ?>
                                        <?php endif; ?>
                                    </form>

                                    <!-- No empty text -->
                                    <!-- <div class="row form-group">
                                <?php
                                $counter = 1;
                                $total_price = 0;
                                $prev_date = null;
                                foreach ($po_dates as $v) {
                                    // Convert $v to 'dd Month' format
                                    $date = DateTime::createFromFormat('Y-m-d', $v);
                                    $formatted_date = $date->format('d F');

                                    foreach ($summary as $detail) {
                                        echo '<div class="col col-sm-8">';
                                        if ($detail['po_date'] == $v) {
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $detail['po_date']) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }
                                            echo '<label class="form-control-label">';
                                            if ($is_holiday == true) {
                                                echo $holiday_description . '</br>';
                                            } else {
                                                $menu_found = false;
                                                $total_price += $detail['price'];
                                                echo $detail['menu'] . ' - ' . $formatted_date . ' - IDR ' . $detail['price'] . '</br>';
                                                $menu_found = true;
                                            }
                                            echo '</label>';
                                        }
                                        echo '</div>';
                                    }
                                }
                                echo '<div class="col col-sm-10">';
                                echo '<label class="form-control-label mb-2">Sub Total : IDR ' . $total_price . '<label><br/>';
                                echo "The total amount need to be transferred to our School Account 0000554103 (Bank Sinarmas) or 4970350018 (BCA) is IDR " . $total_price . "<br/>";
                                echo 'Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , so we can proceed to prepare your requested meal starting ' . $po_dates[0] . ' - ' . end($po_dates) . ' and deliver to ' . $summary[0]['student_name'] . '\'s Class.';
                                echo '</div>';
                                ?>
                            </div> -->
                                </div>

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