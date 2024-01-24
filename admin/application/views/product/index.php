<style>
  .pagination-link a {
    padding: 10px;
  }
</style>
<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="title-5 m-b-35">Menu List</h3>
              <!-- DATA TABLE -->
              <div class="table-data__tool">
                <div class="table-data__tool-left">
                  <a
                    class="au-btn au-btn-icon au-btn--green au-btn--small"
                    href="<?= base_url(); ?>product/add_product"
                  >
                    <i class="zmdi zmdi-plus"></i>Create New
                  </a>
                </div>
              </div>
              <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-info" id="flashdata" >
                  <?php echo $this->session->flashdata('flash'); ?>
                </div>
              <?php endif; ?> 
              <div class="table-responsive table-responsive-data2">
                <table
                  id="zero_config"
                  class="display table table-striped table-bordered table-data2"
                  width="100%"
                >
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>category</th>
                      <th>name</th>
                      <th>edit</th>
                      <th>delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($product as $pro) : ?>
                        <tr class="tr-shadow">
                          <td><?= $no; ?></td>
                          <td><?= $pro['category']; ?></td>
                          <td><?= $pro['name']; ?></td>
                          <td>
                            <div class="table-data-feature">
                              <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" 
                                href="<?= base_url(); ?>Product/edit_product/<?= $pro['id']; ?>?category=<?= $pro['category']; ?>&name=<?= $pro['name']; ?>">
                                <i class="zmdi zmdi-edit"></i>
                              </a>
                            </div>
                          </td>
                          <td>
                            <div class="table-data-feature">
                              <form action="<?= base_url('Product/delete_product'); ?>" method="post" class="form-horizontal">
                                <input type="hidden" name="id" value="<?= $pro['id']; ?>">
                                <button type="button" class="btn item" data-toggle="modal" data-target="#exampleModalCenter" title="Delete">
                                  <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                          </td>
                        </tr>
                        <tr class="spacer"></tr>
                      <?php 
                      $no++;
                    endforeach; ?>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure to delete it?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          No
        </button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>