<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Input Size -->
                    <h3 class="title-5 m-b-35">Report Detail</h3>
                    <div class="card">
                        <div class="card-header">                                       
                            <strong>Report Detail</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php if (!empty($detail_report)) : ?>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Customer Name</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: <?= $detail_report[0]['student_name'] ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Order Date</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: <?= $detail_report[0]['date_only'] ?></label>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Customer Name</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: Not Found</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Order Date</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: Not Found</label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="row form-group">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-responsive">
                        <table class="table table-data2">
                            <!-- Week 1 -->
                            <thead>
                                <tr>
                                <th rowspan="2" class="align-middle">Week 1</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thrusday</th>
                                <th>Friday</th>
                                </tr>
                                <tr>
                                    <?php foreach ($dates as $item) : ?>
                                        <?php
                                            $date = new DateTime($item['begin_date']);
                                            $days_added = 0;

                                            for ($i = 0; $days_added < 5; $i++) :
                                                echo '<th>' . $date->format('j M Y') . '</th>';
                                                $date->modify('+1 day');
                                                $days_added++;
                                            endfor;
                                    endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td class="align-middle">Daily Set</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 0; $i < 5; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify("+$i day");
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }
                                            
                                            if ($is_holiday) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;
                                                
                                                foreach ($menu_daily_set as $menu) {
                                                    $menu_date = new DateTime($menu['date']);

                                                    if ($menu_date == $date_to_check) {
                                                        echo '<td>';
                                                        echo '<span class="' . $background . '">' . $menu['name'] . '</span><br>';
                                                        echo '<b class="' . $background . '">' . $menu['price'] / 1000 . 'k' . '</b><br>';
                                                        
                                                        if(isset($child_menus[$menu['id']])){
                                                            foreach ($child_menus[$menu['id']] as $child_menu) {
                                                                echo '<hr>';
                                                                echo '<span class="' . $background . '">' . $child_menu['name'] . '</span><br>';
                                                                echo '<b class="' . $background . '">' . $child_menu['price'] / 1000 . 'k' . '</b><br>';
                                                            }
                                                        }
                                                        echo '</td>';
                                                        $menu_found = true;
                                                        break;
                                                    }
                                                }
                                                if (!$menu_found) {
                                                    echo '<td></td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        ?>
                                        <?php
                                        endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Pasta</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 0; $i < 5; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify("+$i day");
                                            $menu_id = '';
                                            $menu_name = '';
                                            $menu_price = '';

                                            foreach ($menu_pasta as $menu) {
                                                $menu_date = new DateTime($menu['date']);

                                                if ($menu_date == $date_to_check) {
                                                    $menu_id = $menu['id'];
                                                    $menu_name = $menu['name'];
                                                    $menu_price = $menu['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }
                                    ?>
                                            <td>
                                                <?php echo $menu_name; ?><br>
                                                <?php echo "<b>".$menu_price."</b>"; ?>
                                            </td>
                                    <?php
                                        endfor;
                                    endforeach;
                                    ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Breakfast & Stall</td>
                                    <?php foreach ($dates as $item) :
                                            $begin_date = new DateTime($item['begin_date']);
                                            $end_date = clone $begin_date;
                                            $end_date->modify('+5 day');

                                            for ($i = 0; $i < 5; $i++) :
                                                $date_to_check = clone $begin_date;
                                                $date_to_check->modify("+$i day");
                                                $menu_id = '';
                                                $menu_name = '';
                                                $menu_price = '';

                                                foreach ($menu_breakfast as $menu) {
                                                    $menu_date = new DateTime($menu['date']);

                                                    if ($menu_date == $date_to_check) {
                                                        $menu_id = $menu['id'];
                                                        $menu_name = $menu['name'];
                                                        $menu_price = $menu['price'] / 1000 . 'k';
                                                        break;
                                                    }
                                                }
                                        ?>
                                            <td>
                                                <?php echo $menu_name; ?><br>
                                                <?php echo $menu_price; ?>
                                            </td>
                                        <?php
                                            endfor;
                                        endforeach;
                                    ?>
                                </tr>
                            </tbody>
                            <!-- Week 2 -->
                            <thead>
                                <tr>
                                <th rowspan="2" class="align-middle">Week 2</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thrusday</th>
                                <th>Friday</th>
                                </tr>
                                <tr>
                                    <?php foreach ($dates as $item) : ?>
                                        <?php
                                            $date = new DateTime($item['begin_date']);
                                            $date->modify('+7 day');
                                            $days_added = 0;

                                            for ($i = 0; $days_added < 5; $i++) :
                                                echo '<th>' . $date->format('j M Y') . '</th>';
                                                $date->modify('+1 day');
                                                $days_added++;
                                            endfor;
                                        endforeach; 
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td class="align-middle">Daily Set</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 7; $i < 12; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify("+$i day");
                                            // $menu_id = '';
                                            $menu_name = '';
                                            $menu_price = '';
                                            $menu1_name = '';
                                            $menu1_price = '';
                                            $menu2_name = '';
                                            $menu2_price = '';
                                            $menu3_name = '';
                                            $menu3_price = '';
                                            $menu4_name = '';
                                            $menu4_price = '';


                                            foreach ($menu_daily_set as $menu) {
                                                $menu_date = new DateTime($menu['date']);

                                                if ($menu_date == $date_to_check) {
                                                    $menu_id = $menu['id'];
                                                    $menu_name = $menu['name'];
                                                    $menu_price = $menu['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }

                                            foreach ($menu_soup as $menu1) {
                                                $menu1_date = new DateTime($menu1['date']);

                                                if ($menu1_date == $date_to_check) {
                                                    $menu1_id = $menu1['id'];
                                                    $menu1_name = $menu1['name'];
                                                    $menu1_price = $menu1['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }

                                            foreach ($menu_protein as $menu2) {
                                                $menu2_date = new DateTime($menu2['date']);

                                                if ($menu2_date == $date_to_check) {
                                                    $menu2_id = $menu2['id'];
                                                    $menu2_name = $menu2['name'];
                                                    $menu2_price = $menu2['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }

                                            foreach ($menu_rice as $menu3) {
                                                $menu3_date = new DateTime($menu3['date']);

                                                if ($menu3_date == $date_to_check) {
                                                    $menu3_id = $menu3['id'];
                                                    $menu3_name = $menu3['name'];
                                                    $menu3_price = $menu3['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }

                                            foreach ($menu_fruit as $menu4) {
                                                $menu4_date = new DateTime($menu4['date']);

                                                if ($menu4_date == $date_to_check) {
                                                    $menu4_id = $menu4['id'];
                                                    $menu4_name = $menu4['name'];
                                                    $menu4_price = $menu4['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }
                                        ?>
                                            <td>
                                                <?php echo $menu_name; ?><br>
                                                <?php echo $menu_price; ?><br>
                                                <hr>
                                                <?php echo $menu1_name; ?><br>
                                                <?php echo $menu1_price; ?><br>
                                                <?php echo $menu2_name; ?><br>
                                                <?php echo $menu2_price; ?><br>
                                                <?php echo $menu3_name; ?><br>
                                                <?php echo $menu3_price; ?><br>
                                                <?php echo $menu4_name; ?><br>
                                                <?php echo $menu4_price; ?><br>
                                            </td>
                                            
                                        <?php
                                            endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Pasta</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 7; $i < 12; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify("+$i day");
                                            $menu_id = '';
                                            $menu_name = '';
                                            $menu_price = '';

                                            foreach ($menu_pasta as $menu) {
                                                $menu_date = new DateTime($menu['date']);

                                                if ($menu_date == $date_to_check) {
                                                    $menu_id = $menu['id'];
                                                    $menu_name = $menu['name'];
                                                    $menu_price = $menu['price'] / 1000 . 'k';
                                                    break;
                                                }
                                            }
                                        ?>
                                            <td>
                                                <?php echo $menu_name; ?><br>
                                                <?php echo $menu_price; ?>
                                            </td>
                                        <?php
                                            endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Breakfast & Stall</td>
                                    <?php foreach ($dates as $item) :
                                            $begin_date = new DateTime($item['begin_date']);
                                            $end_date = clone $begin_date;
                                            $end_date->modify('+5 day');

                                            for ($i = 7; $i < 12; $i++) :
                                                $date_to_check = clone $begin_date;
                                                $date_to_check->modify("+$i day");
                                                $menu_id = '';
                                                $menu_name = '';
                                                $menu_price = '';

                                                foreach ($menu_breakfast as $menu) {
                                                    $menu_date = new DateTime($menu['date']);

                                                    if ($menu_date == $date_to_check) {
                                                        $menu_id = $menu['id'];
                                                        $menu_name = $menu['name'];
                                                        $menu_price = $menu['price'] / 1000 . 'k';
                                                        break;
                                                    }
                                                }
                                        ?>
                                                <td>
                                                <?php echo $menu_name; ?><br>
                                                <?php echo $menu_price; ?>                                                </td>
                                        <?php
                                            endfor;
                                    endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-warning btn-lg float-right"
                            type="">
                        Total : <?php $sum ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>