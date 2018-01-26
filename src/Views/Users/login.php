<div class="row">
    <div class="col-sm-4 col-sm-push-4">
        <form action="<?= \Banana\Helper\htmlHelper::url('users', 'login') ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>