        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="title-5 m-b-35">Holiday List</h3>
                      <!-- DATA TABLE -->
                      <div class="table-data__tool">
                        <div class="table-data__tool-left">
                          <a
                            class="au-btn au-btn-icon au-btn--green au-btn--small"
                            href="<?= base_url(); ?>holiday/add_holiday"
                          >
                            <i class="zmdi zmdi-plus"></i>Create New
                          </a>
                        </div>
                      </div>
                      <div class="table-responsive table-responsive-data2">
                        <table
                          id="zero_config"
                          class="display table table-striped table-bordered table-data2"
                          width="100%"
                        >
                          <thead>
                            <tr>
                              <th>no</th>
                              <th>date</th>
                              <th>description</th>
                              <th>edit</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($holiday as $hdy) : ?>
                              <tr class="tr-shadow">
                                
                                  <td><?= $hdy['id']; ?></td>
                                  <td><?= $hdy['date']; ?></td>
                                  <td><?= $hdy['description']; ?></td>
                                  <td>
                                      <div class="table-data-feature">
                                      <a
                                          class="item"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          title="Edit"
                                          href="<?= base_url(); ?>holiday/edit_holiday"
                                      >
                                          <i class="zmdi zmdi-edit"></i>
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

        <!-- Modal Pop-up -->
        <div
          class="modal fade"
          id="exampleModalCenter"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">Are you sure to delete it?</div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  No
                </button>
                <button type="button" class="btn btn-primary">Yes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>