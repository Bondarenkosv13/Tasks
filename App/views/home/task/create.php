<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >Create task</div>
                <form method="POST" action="<?php echo route('/task/store') ?>">
                   <?php $token = csrf() ?>
                   <?php include_once dirname(__DIR__, 2) . '/parts/token.php'; ?>
                    <br>
                    <div class="form-group row">

                        <label for="name" class="col-md-4 col-form-label text-md-right">User name</label>

                        <div class="col-md-6">
                            <input id="name"
                                   type="text"
                                   class="form-control"
                                   name="name"
                                   value="<?php echo !empty($data['name'])?htmlspecialchars($data['name']):'' ?>"
                                   placeholder="White your name"
                                   required
                                   autofocus
                            >

                            <?php if(!empty($error['name_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['name_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email"
                                   class="form-control"
                                   type="email"
                                   name="email"
                                   placeholder="White your email"
                                   value="<?php echo !empty($data['email'])?htmlspecialchars($data['email']):'' ?>"
                                   required
                            >

                            <?php if(!empty($error['email_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['email_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="task" class="col-md-4 col-form-label text-md-right">Task</label>

                        <div class="col-md-6">
                            <textarea
                                class="form-control"
                                name="task"
                                required
                            > <?php echo !empty($data['task'])?htmlspecialchars($data['task']):'' ?></textarea>

                            <?php if(!empty($error['task_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['task_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                            <a href="<?php echo route('/')?>" class="btn btn-secondary" style="margin-left: 10px">Back</a>
                        </div>
                    </div>

                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>