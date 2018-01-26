<!--<pre>--><?php //var_dump($artist) ?><!--</pre>-->

<dl class="dl-horizontal">
    <dt>id:</dt>
    <dd><?= $artist->id ?></dd>
    <dt>name:</dt>
    <dd><?= $artist->name ?></dd>
    <dt>primary:</dt>
    <dd><?= $artist->primary ?></dd>
    <dt>created:</dt>
    <dd><?= $artist->created ?></dd>
    <dt>modified:</dt>
    <dd><?= $artist->modified ?></dd>
</dl>

<h2>Morceaux:</h2>
<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <!--        <th>youtube_link</th>-->    
        <th>album</th>
        <th>year</th>
        <!--        <th>user_id</th>-->
        <!--        <th>artist_id</th>-->
        <th>created</th>
        <th>modified</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php foreach ($tracks as $t): ?>
            <td><?= $t->id ?></td>
            <td><?= $t->name ?></td>
            <!--            <td>< ?= $t->youtube_link ?></td>-->
            <td><?= $t->album ?></td>
            <td><?= $t->year ?></td>
            <!--            <td>< ?= $t->user_id ?></td>-->
            <!--            <td>< ?= $t->artist_id ?></td>-->
            <td><?= $t->created ?></td>
            <td><?= $t->modified ?></td>
        <?php endforeach ?>
    </tr>
    </tbody>
</table>