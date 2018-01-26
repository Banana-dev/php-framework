<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>primary</th>
        <th>created</th>
        <th>modified</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($artists->entities as $a): ?>
        <tr>
            <td><?= $a->id ?></td>
            <td><?= \Banana\Helper\htmlHelper::link($a->name, 'artists', 'view', ['id' => $a->id]) ?></td>
            <td><?= $a->primary ?></td>
            <td><?= $a->created ?></td>
            <td><?= $a->modified ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
?>