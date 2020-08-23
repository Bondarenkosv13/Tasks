<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >Edit task</div>
                <form method="POST" action="<?php echo route("/admin/task/{$id}/update") ?>">
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
                                   disabled
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
                                   disabled
                                   value="<?php echo !empty($data['email'])?htmlspecialchars($data['email']):'' ?>"
                                   <?php if($data['status'] == 'on') : ?>
                                      checked
                                   <?php endif;?>
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
                            > <?php echo !empty($data['task'])?htmlspecialchars($data['task']):'' ?></textarea>

                            <?php if(!empty($error['task_error'])) { ?>
                                <div class="alert alert-danger" role = "alert" ><?= $error['task_error'] ?></div >
                            <?php }?>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-md-1">
                            <input id="status"
                                   class="form-control"
                                   type="checkbox"
                                   name="status"
                                   style="width: 20px"
                                    <?php if($data['status'] == 'on') : ?>
                                    checked
                                    <?php endif;?>
                            >
                        </div>

                        <label for="status" class="col-md-6 col-form-label">Enter if you checked the task!</label>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href="<?php echo route('/admin')?>" class="btn btn-secondary" style="margin-left: 10px">Back</a>
                        </div>
                    </div>

                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>