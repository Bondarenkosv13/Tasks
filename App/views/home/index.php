<br><h1 class="text-center">Tasks</h1><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name<br>
                        <a href="<?php echo route("/home?name=name&filter=asc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px; transform:rotate(180deg)"></a>
                        <a href="<?php echo route("/home?name=name&filter=desc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px"></a>
                    </th>
                    <th scope="col">E-mail<br>
                        <a href="<?php echo route("/home?name=email&filter=asc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px; transform:rotate(180deg)"></a>
                        <a href="<?php echo route("/home?name=email&filter=desc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px"></a>
                    </th>
                    <th scope="col">Task<br><br></th>
                    <th scope="col">Status<br>
                        <a href="<?php echo route("/home?name=status&filter=asc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px; transform:rotate(180deg)"></a>
                        <a href="<?php echo route("/home?name=status&filter=desc&page={$paginate['page']}")?>"><img src="/image/arrow.jpg" style="width: 18px"></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php include_once 'parts/index.php' ?>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php if (!($countPages <= $paginate['limit'])): ?>
    <?php include_once 'parts/paginate.php' ?>
<?php endif; ?>