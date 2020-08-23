<?php foreach ($tasks as $task): ?>

    <tr>
        <th scope="row"><?php echo !empty($task['name'])?$task['name']:''; ?></th>
        <td><?php echo !empty($task['email'])?$task['email']:''; ?></td>
        <td><?php echo !empty($task['task'])?nl2br($task['task']):''; ?></td>
        <td style="text-align: center">
            <?php if($task['status'] == 'off'):?>
                <input  type="checkbox" disabled>
            <?php else:?>
                <input type="checkbox" checked disabled><h6 style="font-size: 70%">edited by admin</h6>
            <?php endif; ?>
        </td>
    </tr>

<?php endforeach; ?>