<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Category List</h3>
                            <?php if ($this->session->flashdata('error_message')) : ?>
                                <div class="alert alert-info">
                                    <?php echo $this->session->flashdata('error_message'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= base_url(); ?>category/add_category">
                                        <i class="zmdi zmdi-plus"></i>create new
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>category</th>
                                            <th>edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($category_item as $cat) : ?>
                                            <tr class="tr-shadow">
                                                <td><?= $cat['id']; ?></td>
                                                <td><?= $cat['category']; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url(); ?>category/edit_category/<?= $cat['id']; ?>">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <form action="<?= base_url(); ?>category/delete_category" method="post" id="deleteForm<?= $cat['id']; ?>">
                                                            <input type="hidden" name="id_number" value="<?= $cat['id']; ?>">
                                                            <button type="button" class="btn item" data-toggle="modal" data-target="#deleteModal<?= $cat['id']; ?>" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-link text-center">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pop-up -->
<?php foreach ($category_item as $cat) : ?>
    <div class="modal fade" id="deleteModal<?= $cat['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLongTitle">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" form="deleteForm<?= $cat['id']; ?>">Yes</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>