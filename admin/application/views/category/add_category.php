<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Input Size -->
                    <div class="card">
                        <div class="card-header">
                            Add
                            <strong>Category</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Category</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="input-normal" name="input-normal" placeholder="Type here..." class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <!-- <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button> -->
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
            <div class="modal-body">
            Are you sure to submit?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>