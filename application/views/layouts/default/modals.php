<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logowanie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo route("login"); ?>" id="loginForm" method="POST">
            <div id="alertGroup"></div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                    </div>
                    <input type="email" class="form-control" name="login_email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-ellipsis-h"></i></div>
                    </div>
                    <input type="password" class="form-control" name="login_password">
                </div>
            </div>
            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6Lf0M34UAAAAAPpuNNAIHK7zZxE3YlFheooMHHmk"></div>
            </div>
            <input type="hidden" name="token" value="TOKEN">
            <button type="submit" name="login_button" class="btn btn-primary">Zaloguj się</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rejestracja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?php echo route("register"); ?>" id="registerForm" method="POST">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                    </div>
                    <input type="email" class="form-control" name="register_email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-ellipsis-h"></i></div>
                    </div>
                    <input type="password" class="form-control" name="register_password">
                </div>
            </div>
            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6Lf0M34UAAAAAPpuNNAIHK7zZxE3YlFheooMHHmk"></div>
            </div>
            <input type="hidden" name="token" value="TOKEN">
            <button type="submit" name="register_button" class="btn btn-danger">Zarejestruj się</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Edit Nickname Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edycja nazwy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="editAlerts"></div>

        <form action="<?php echo route("editNickname"); ?>" id="editForm" method="POST">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" name="edit_nickname">
                </div>
            </div>
            <input type="hidden" name="token" value="TOKEN">
            <button type="submit" name="edit_button" class="btn btn-warning">Zapisz zmiany</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- About Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Źródła</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Strona główna została stworzona przy pomocy szablonu <a href="https://startbootstrap.com/template-overviews/landing-page" target="_blank">Landing Page</a></p>

      </div>
    </div>
  </div>
</div>

<!-- Create Notes Modal -->
<div class="modal fade" id="createNotesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nowa notatka</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cnError"></div>
        <form action="<?php echo route("createNote"); ?>" id="createNoteForm" method="post">

          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="inlineFormInputGroupUsername">Tytuł</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-marker"></i></div>
                  </div>
                  <input type="text" class="form-control" name="n_title" placeholder="Tytuł notatki">
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label class="sr-only" for="inlineFormInputGroupUsername">Podtytuł</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-brush"></i></div>
                  </div>
                  <input type="text" class="form-control" name="n_subtitle" placeholder="Podtytuł notatki">
                </div>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label class="sr-only" for="inlineFormInputGroupUsername">Podtytuł</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-scroll"></i></div>
              </div>
              <textarea name="n_content" class="form-control" cols="30" rows="10" placeholder="Treść notatki"></textarea>
            </div>
          </div>

          <div class="form-group">
            <input type="hidden" name="token" value="TOKEN">
            <button type="submit" name="n_create" class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>