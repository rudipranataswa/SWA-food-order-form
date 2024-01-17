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
    background-color: #4ba0b5;
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
    border-color: #4ba0b5 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
    }

    @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
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
                    <h3 class="title-5 m-b-35">Report Detail</h3>
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <span class="font-weight-bold">Report Summary</span>
                            <!-- <button type="" class="btn btn-info ml-auto btn-copy popup">Copy</button> -->
                            <div class="btn btn-info ml-auto btn-copy popup" onclick="myFunction()">Copy
                                <span class="popuptext" id="myPopup">Copied</span>
                            </div>
                        </div>
                        <div class="card-body card-block body-text">
                            <label class="form-control-label">Dear SWA Parents</label></br></br>
                            <?php if (!empty($detail_report)) : ?>
                                <label class="form-control-label"> 
                                    Thank you for ordering and submitting the Pre  Order Meal for <?= $detail_report[0]['student_name'] 
                                    ?> (Student Name)</label><br/></br>
                                <label class="form-control-label">Please kindly confirm and recheck the revise Pre Order Meal details:</label><br/>
                                <label class="form-control-label text-uppercase"> <?= $detail_report[0]['student_name'] ?> - <?= $detail_report[0]['grade'] ?></label><br/><br/>
                            <?php endif; ?>
                            <div class="row form-group">
                                <?php 
                                    $counter = 1;
                                    $total_price = 0;
                                    $prev_date = null;
                                    $week = 1;
                                    foreach ($dates as $item) {
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');
                                        foreach ($po_dates as $v) {
                                            // Convert $v to 'dd Month' format
                                            $date = DateTime::createFromFormat('Y-m-d', $v);
                                            $formatted_date = $date->format('d F');


                                            if ($prev_date != null) {
                                                $interval = $prev_date->diff($date);
                                                if ($interval->days > 1 && $prev_date->format('N') < 6) {
                                                    for ($i = 1; $i < $interval->days; $i++) {
                                                        $no_meal_date = $prev_date->modify('+1 day');
                                                        if ($no_meal_date->format('N') < 6) { // Check if it's not weekend
                                                            echo "No Meal for " . $no_meal_date->format('d F');
                                                            if ($no_meal_date->format('N') == 5) { // If it's Friday
                                                                $week++;
                                                                echo " (Week " . $week . ")";
                                                            }
                                                            echo "<br/>";
                                                        }
                                                    }
                                                }
                                            }

                                            $prev_date = $date;

                                            foreach ($detail_report as $detail) {
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
                                                    echo '</label><br/>';
                                                }
                                                echo '</div>';
                                            }
                                        }
                                        echo '<div class="col col-sm-10">';
                                        echo '<label class="form-control-label">Sub Total : IDR ' . $total_price . '<label><br/>';
                                        echo "The total amount need to be transferred to our School Account 0000554103 (Bank Sinarmas) or 4970350018 (BCA) is IDR " . $total_price . "<br/>";
                                        echo 'Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , so we can proceed to prepare your requested meal starting ' . $po_dates[0] . ' - ' . end($po_dates) . ' and deliver to ' . $detail_report[0]['student_name'] . '\'s Class.';
                                        echo '</div>';
                                    }
                                ?>
                            </div>

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

                                        foreach ($detail_report as $detail) {
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
                                    echo 'Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , so we can proceed to prepare your requested meal starting ' . $po_dates[0] . ' - ' . end($po_dates) . ' and deliver to ' . $detail_report[0]['student_name'] . '\'s Class.';
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