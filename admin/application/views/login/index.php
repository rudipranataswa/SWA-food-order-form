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
                    <label class="font-weight-bold">
                        Email Address
                        <span class="text-danger">*</span> 
                    </label>
                    
                    <input
                        class="au-input au-input--full"
                        type="email"
                        name="email"
                        placeholder="Email"
                    />
                    </div>
                    <div class="form-group">
                    <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                    
                    <input
                        class="au-input au-input--full"
                        type="password"
                        name="password"
                        placeholder="Password"
                    />
                    </div>
                    <a
                    class="au-btn au-btn-lg au-btn--block btn-danger text-center m-b-20"
                    type="submit"
                    href="<?= base_url(); ?>login/forget_password"
                    >
                    forget password
                    </a>
                    <a
                    class="au-btn au-btn-lg au-btn--block btn-danger text-center m-b-20"
                    type="submit"
                    href="<?= base_url(); ?>"
                    >
                    sign in
                    </a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>