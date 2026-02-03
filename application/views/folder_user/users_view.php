<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile text-center">

                        <img class="profile-user-img img-fluid img-circle mb-3"
                             src="<?= base_url('uploads/users/'.$user->image) ?>"
                             alt="User profile picture"
                             style="width:150px;height:150px;object-fit:cover;">

                        <h3 class="profile-username text-center">
                            <?= $user->name ?>
                        </h3>

                        <p class="text-muted text-center">
                            <?= $user->address ?>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3 text-left">
                            <li class="list-group-item">
                                <b>Username</b> <span class="float-right"><?= $user->username ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Level</b>
                                <span class="float-right">
                                    <?= $levels[$user->level]; ?>
                                </span>
                            </li>

                        </ul>

                        <a href="<?= site_url('users') ?>" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
