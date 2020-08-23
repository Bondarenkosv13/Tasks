<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >Admin login</div>
                <form method="POST" action="<?php echo route('/admin/auth') ?>">
                    <?php $token = csrf() ?>
                    <?php include_once dirname(__DIR__) . '/parts/token.php'; ?>
                    <br>
                    <div class="form-group row">

                        <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>

                        <div class="col-md-6">
                            <input id="login"
                                   type="text"
                                   class="form-control"
                                   name="login"
                                   value="<?php echo !empty($data['login'])?htmlspecialchars($data['login']):'' ?>"
                                   placeholder="White your login"
                                   required
                                   autofocus
                            >

                            <?php if(!empty($error['login_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['login_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password"
                                   class="form-control"
                                   type="password"
                                   name="password"
                                   required
                            >

                            <?php if(!empty($error['password_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['password_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>

                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>