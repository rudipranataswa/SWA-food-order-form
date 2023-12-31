<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <h3 class="title-5 m-b-35">View Report</h3>
                <!-- DATA TABLE -->
                <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                    <tr>
                        <th>no</th>
                        <th>customer name</th>
                        <th>order date</th>
                        <th>time</th>
                        <th>detail</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($view_report as $vrpt) : ?>
                            <tr class="tr-shadow">
                                <td><?= $vrpt['id']; ?></td>
                                <td><?= $vrpt['student_name']; ?></td>
                                <td><?= $vrpt['date_only']; ?></td>
                                <td><?= $vrpt['time_only']; ?></td>
                                <td>
                                <div class="table-data-feature">
                                    <a
                                    class="item"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="View"
                                    href="<?= base_url(); ?>report/detail_report/<?= $vrpt['id']; ?>"
                                    >
                                    <i class="zmdi zmdi-eye"></i>
                                    </a>
                                </div>
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
        </div>
        </div>
    </div>
    </div>
</div>  