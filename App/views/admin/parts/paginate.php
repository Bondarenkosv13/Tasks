<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($paginate['page'] != 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=1")?>"><<</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href=<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] - 1))?>><</a>
                    </li>
                <?php else: ?>
                    <li class="page-item active">
                        <a class="page-link" href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=1")?>"><<</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=1")?>"><</a>
                    </li>
                <?php endif; ?>

                <?php if ($paginate['page'] - 2 > 0): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] - 2))?>"><?php echo($paginate['page'] - 2) ?></a>
                    </li>
                <?php endif; ?>
                <?php if ($paginate['page'] - 1 > 0): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] - 1))?>"><?php echo($paginate['page'] - 1) ?></a>
                    </li>
                <?php endif; ?>
                <li class="page-item active">
                    <a class="page-link"
                       href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . $paginate['page'])?>"><?php echo $paginate['page'] ?></a>
                </li>
                <?php if ($paginate['page'] + 1 <= $paginate['total']): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] + 1))?>"><?php echo($paginate['page'] + 1) ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($paginate['page'] + 2 <= $paginate['total']): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] + 2))?>"><?php echo($paginate['page'] + 2) ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($paginate['page'] != $paginate['total']): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page=" . ($paginate['page'] + 1))?>?>">></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page={$paginate['total']}")?>">>></a>
                    </li>
                <?php else: ?>
                    <li class="page-item active">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page={$paginate['total']}")?>">></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link"
                           href="<?php echo route("dashboard?name={$name}&filter={$filter}&page={$paginate['total']}")?>">>></a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>