<?php require_once("../config/autoload.php"); ?>
<?php if(!isLogged()){header("Location: " . URL); exit();} ?>
<?php require_once("layouts/default/header.php"); ?>
    <div class="container">

        <div class="card card-default" style="margin-bottom: 10px;margin-top:10px;">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2">
                        <img width="128" height="128" style="border-radius:50%;" src="<?php echo 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $_SESSION['u_data']['email'] ) ) ) ?>" width="32" height="32" alt="<?php echo ( ($_SESSION['u_data']['username'] == null) ? $_SESSION['u_data']['email'] : $_SESSION['u_data']['username'] ); ?>" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h4 id="profile-nickname"><?php echo ( ($_SESSION['u_data']['username'] == null) ? 'Brak nicku <small id="editNickname" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-alt"></i></small>' : $_SESSION['u_data']['username'] ); ?></h4>
                        <span class="badge badge-<?php if($_SESSION['u_data']['permission'] == 'USER'){echo "success";}else if($_SESSION['u_data']['permission'] == 'ADMIN'){echo "danger";} ?>"><?php echo $_SESSION['u_data']['permission']; ?></span><br>
                        <small><?php echo $_SESSION['u_data']['email']; ?></small><br><br>
                        <small><a href="<?php echo route("logout"); ?>">Wyloguj się</a></small>
                        <hr class="text-secondary">
                    </div>
                    <div class="col-md-2">
                        <h6>Konto stworzone:</h6>
                        <small class="text-secondary"><?php echo $_SESSION['u_data']['created_at']; ?></small><br><br>
                        <h6>Aktualizacja:</h6>
                        <small id="profile-update" class="text-secondary"><?php echo (($_SESSION['u_data']['updated_at'] == null) ? "Brak" : $_SESSION['u_data']['updated_at']); ?></small>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card card-default">
                    <div class="card-header"><i class="fa fa-sticky-note"></i> Moje notatki</div>
                    <div class="card-body">
                        <?php if(count(getAllNotes()) > 0): ?>
                            <?php foreach(getAllNotes() as $item): ?>
                                <div class="card card-body" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-md-6"><h6><?=$item['title']?></h6></div>
                                        <div class="col-md-6"><small class="text-muted"><?=$item['created_at']?></small></div>
                                    </div>
                                    <div class="col-md-12"><i><?=explode(",", $item['content'])[0]?> <a href="<?=U_VIEWS . 'desktop/dashboard.php'?>">(...)</a></i></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h4 class="text-muted" style="text-align:center;">Brak notatek</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="margin-bottom: 10px;">

                <div class="card card-default">
                    <div class="card-header"><i class="fa fa-comment"></i> Wiadomości</div>
                    <div class="card-body">
                        <small>Brak wiadomości</small>
                    </div>
                </div>

            </div>

            <div class="col-md-4" style="margin-bottom: 10px;">

                <div class="card card-default">
                    <div class="card-header"><i class="fa fa-thumbtack"></i> Przypięte notatki</div>
                    <div class="card-body text-white">
                        <?php if(count(getAllPinnedNotes()) > 0): ?>
                            <?php foreach(getAllPinnedNotes() as $item): ?>
                                <div class="card card-body bg-danger" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-md-6"><h6><?=$item['title']?></h6></div>
                                        <div class="col-md-6"><small class="text-white"><?=$item['created_at']?></small></div>
                                    </div>
                                    <div class="col-md-12"><i><?=explode(",", $item['content'])[0]?> <a href="<?=U_VIEWS . 'desktop/dashboard.php'?>">(...)</a></i></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h4 class="text-muted" style="text-align:center;">Brak notatek</h4>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?php require_once("layouts/default/footer.php"); ?>

<?php require_once("layouts/default/modals.php"); ?>