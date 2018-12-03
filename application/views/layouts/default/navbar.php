<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="https://www.ach.edu/wp-content/uploads/2017/01/Notes2.png" width="64" height="64" class="navbar-brand">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php if(!isLogged()): ?>
                    <a class="nav-link" href="<?php echo URL; ?>" align="center">Home</a>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo U_VIEWS . 'desktop/dashboard.php'; ?>" align="center">Pulpit</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#aboutModal" href="<?php echo URL; ?>" align="center">Źródła</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <?php if(isLogged()): ?>
                <li class="nav-item">
                    <a href="<?php echo URL . "application/views/profile.php"; ?>" align="center" class="nav-link"><img style="border-radius: 50%;" src="<?php echo 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $_SESSION['u_data']['email'] ) ) ) ?>" width="32" height="32" alt="<?php echo ( ($_SESSION['u_data']['username'] == null) ? $_SESSION['u_data']['email'] : $_SESSION['u_data']['username'] ); ?>"></a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-link" data-toggle="modal" data-target="#loginModal" href="#"><i class="fa fa-lock"></i> Logowanie</a>
                </li>
                <li class="nav-item" style="margin-left: 5px;">
                    <a class="nav-link btn btn-link" data-toggle="modal" data-target="#registerModal" href="#"><i class="fa fa-pen"></i> Rejestracja</a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>