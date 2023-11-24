<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                <a href="#">
                    <img src="https://www.swa-jkt.com/uploads/logo/logo.png" alt="SWA" />
                </a>
                </div>
                <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                    <label class="font-weight-bold">Current Password <span class="text-danger">*</span></label>
                    <input
                        class="au-input au-input--full"
                        type="password"
                        name="password"
                        placeholder="Password"
                    />
                    </div>
                    <div class="form-group">
                    <label class="font-weight-bold">New Password <span class="text-danger">*</span></label>
                    <input
                        class="au-input au-input--full"
                        type="password"
                        name="password"
                        placeholder="Password"
                    />
                    </div>
                    <div class="form-group">
                    <label class="font-weight-bold">Confirm New Password <span class="text-danger">*</span></label>
                    <input
                        class="au-input au-input--full"
                        type="password"
                        name="password"
                        placeholder="Password"
                    />
                    </div>
                    <a
                    class="au-btn au-btn-lg au-btn--block btn-danger text-center m-b-20"
                    data-toggle="modal" 
                    data-target="#exampleModalCenter"
                    type="submit"
                    href="<?= base_url(); ?>"
                    >
                    change password
                    </a>
                </form>
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
