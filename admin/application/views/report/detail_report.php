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
                            <div class="row form-group">
                                <div class="col col-sm-5">
                                    <label for="input-normal" class=" form-control-label">Customer Name</label>
                                </div>
                                <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">: Tomiko Gunkan</label>
                                    <!-- <input type="text" id="input-normal" name="input-normal" placeholder="Indonesia Chinese Food" class="form-control" disabled> -->
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5">
                                    <label for="input-normal" class=" form-control-label">Begin Date</label>
                                </div>
                                <div class="col col-sm-6">
                                    <label for="input-normal" class=" form-control-label">: 11 Nov 2023</label>
                                    <!-- <input type="text" id="input-normal" name="input-normal" placeholder="12-12-2012" class="form-control" disabled> -->
                                </div>
                            </div>
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
                            <th>6/11/2023</th>
                            <th>7/11/2023</th>
                            <th>8/11/2023</th>
                            <th>9/11/2023</th>
                            <th>10/11/2023</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_report as $drpt) : ?>
                                <tr class="tr">
                                    <td rowspan="2" class="align-middle">Daily Set</td>
                                    <td>
                                        <?= $drpt['name']; ?>
                                    </td>
                                    <td>
                                        <?= $drpt['name']; ?>
                                    </td>
                                    <td>
                                        <?= $drpt['name']; ?>
                                    </td>
                                    <td>
                                        <?= $drpt['name']; ?>
                                    </td>
                                    <td>
                                        <?= $drpt['name']; ?>
                                    </td>
                                </tr>
                                <tr class="tr">
                                    <td class="number">
                                        <?= $drpt['price']; ?>
                                    </td>
                                    <td class="number">
                                        <?= $drpt['price']; ?>
                                    </td>
                                    <td class="number">
                                        <?= $drpt['price']; ?>
                                    </td>
                                    <td class="number">
                                        <?= $drpt['price']; ?>
                                    </td>
                                    <td class="number">
                                        <?= $drpt['price']; ?>
                                    </td> 
                                </tr>
                                <tr class="spacer"></tr>
                            <?php endforeach; ?>
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
                        Submit 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>