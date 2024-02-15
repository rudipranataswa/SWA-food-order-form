<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Viga&display=swap" rel="stylesheet">
    <!-- <title>Welcome to CodeIgniter</title> -->

    <style type="text/css">
        body {
            overflow-x: hidden;
            overflow-y: auto;
        }

        ::selection {
            background-color: #E13300;
            color: white;
        }

        textarea {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover {
            color: #97310e;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
            min-height: 96px;
        }

        p {
            margin: 0 0 10px;
            padding: 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        form div {
            margin-bottom: 10px;
        }

        form label {
            font-weight: bold;
        }

        form .submit-btn {
            margin-left: auto;
            margin-top: auto;
        }

        p.thanks_label {
            font-size: 34px;
            text-align: center;
        }
    </style>

    <!-- Style for table -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            padding-bottom: 0px;
        }

        table,
        th {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
            width: auto;
        }

        td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
            width: auto;
        }

        table {
            margin-bottom: 10px;
        }

        .block-display {
            display: block;
        }

        .block-display1 {
            display: block;
            width: 100%;
            height: 100%;
        }

        .center-text {
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 150px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-container {
            position: relative;
            width: 25%;
            max-width: 25%;
            margin: auto;
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 100%;
            max-width: 100%;
            position: relative;
            /* This makes .close position relative to .modal-content */
        }

        .close {
            position: absolute;
            top: 15px;
            /* Adjust as needed */
            right: 15px;
            /* Adjust as needed */
            color: #f1f1f1;
            font-size: 35px;
            font-weight: bold;
        }


        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        #noImage {
            font-size: 30px;
            color: white;
            text-align: center;
            margin-top: 5%;
        }

        .container {
            display: contents;
            justify-content: space-between;
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        .left {
            width: 10%;
            text-align: left;
            /* Align text to the left */
        }

        .right {
            width: 95%;
            text-align: right;
        }

        th {
            background-color: lightgray;
        }

        /* .col-md-3 {
			padding-top: 40px;
		} */

        .center-image {
            display: flex;
            justify-content: center;
        }

        .center-image img {
            width: 125px;
            height: 125px;
        }

        .daily_info {
            padding-top: 0px;
            padding-bottom: 10px;
            font-size: 16px;
        }

        .table-responsive {
            padding-bottom: 0px;
        }

        td {
            vertical-align: top;
            text-align: left;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .block-display1 textarea {
            width: 50%;
        }

        @media screen and (min-width: 201px) and (max-width: 600px) {
            .block-display1 textarea {
                width: 70%;
            }

            .modal-content {
                margin: auto;
                display: block;
                width: 75%;
                max-width: 75%;
                position: relative;
            }

            .modal-container {
                position: relative;
                width: 75%;
                max-width: 75%;
                margin: auto;
            }

            #noImage {
                font-size: 20px;
                color: white;
                text-align: center;
                margin-top: 10%;
            }
        }
    </style>

</head>

<style>
    /* Popup container - can be anything you want */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
        visibility: hidden;
        width: 70px;
        background-color: #666;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -35px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #666 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
<!-- MAIN CONTENT-->
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
                    <h3 class="title-5 m-b-35">Summary</h3>
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <span class="font-weight-bold">Report Summary</span>
                        </div>
                        <div class="card-body card-block body-text">
                            <form>
                                <?php if (!empty($summary)) : ?>
                                    <label class="form-control-label mt-1">Dear SWA Parents,</label></br></br>
                                    <label class="form-control-label mt-1">
                                        Thank you for ordering and submitting the Pre Order Meal for <?= $summary[0]['student_name']
                                                                                                        ?> (Student Name)</label><br /></br>
                                    <label class="form-control-label">Please kindly confirm and recheck the revise Pre Order Meal details:</label><br />
                                    <label class="form-control-label text-uppercase"> <?= $summary[0]['student_name'] ?> - <?= $summary[0]['grade'] ?></label><br />
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>