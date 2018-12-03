<?php require_once("../../config/autoload.php"); ?>
<?php require_once(LAYOUTS . "default/header.php"); ?>
    <style>
        body{
            background-color: #efefef;
        }
        .topNav a{
            color: black;
        }
        .topNav a:hover{
            color: gray;
        }
    </style>
    
    <ul class="nav justify-content-center topNav" style="font-size: 1.5em;">
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#createNotesModal"><i class="fa fa-plus-circle"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="refreshNote"><i class="fa fa-redo-alt"></i></a>
        </li>
    </ul>
    <hr>
    <div id="notes-box" class="container">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 10px;">
                <div class="card card-default">
                    <div class="card-header">Przypięte notatki <span class="badge badge-secondary"><?=count(getAllPinnedNotes())?></span></div>
                    <div class="card-body">
                    <?php if(count(getAllPinnedNotes()) > 0): ?>
                            <?php foreach(chunk(getAllPinnedNotes(), 2) as $row): ?>
                                <div class="row" style="margin: 0 10px;">
                                    <?php foreach($row as $item): ?>
                                        <div class="col-md-6" style="margin-bottom: 5px;">
                                
                                            <div class="card card-default bg-danger text-white">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?=$item['title']?></h5>
                                                    <small class="card-subtitle mb-2"><?=$item['subtitle']?></small>
                                                    <hr>
                                                    <p class="card-text"><?=$item['content']?></p>

                                                    <div class="row">
                                                        <form action="<?=route('removeNote')?>" class="rem-note" method="post">
                                                            <input type="hidden" name="rem_id" value="<?=$item['id']?>">
                                                            <button type="submit" class="card-link btn btn-link" style="color:white"><i class="fa fa-trash"></i></button>
                                                        </form>

                                                        <form action="<?=route('unpinNote')?>" class="repin-notes" method="post">
                                                            <input type="hidden" name="unpin_id" value="<?=$item['id']?>">
                                                            <button type="submit" class="card-link btn btn-link" style="color:white;"><i class="fa fa-unlink"></i></button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h4 class="text-muted" style="text-align:center;">Brak notatek</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">Nieprzypięte notatki <span class="badge badge-secondary"><?=count(getAllNotes())?></span></div>
                    <div class="card-body">
                        <?php if(count(getAllNotes()) > 0): ?>
                            <?php foreach(chunk(getAllNotes(), 2) as $row): ?>
                                <div class="row" style="margin: 0 10px;">
                                    <?php foreach($row as $item): ?>
                                        <div class="col-md-6" style="margin-bottom: 5px;">
                                
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?=$item['title']?></h5>
                                                    <small class="card-subtitle mb-2"><?=$item['subtitle']?></small>
                                                    <hr>
                                                    <p class="card-text"><?=$item['content']?></p>

                                                    <div class="row">
                                                        <form action="<?=route('removeNote')?>" class="rem-note" method="post">
                                                            <input type="hidden" name="rem_id" value="<?=$item['id']?>">
                                                            <button type="submit" class="card-link btn btn-link" style="color:black"><i class="fa fa-trash"></i></button>
                                                        </form>

                                                        <form action="<?=route('pinNote')?>" class="pin-notes" method="post">
                                                            <input type="hidden" name="pin_id" value="<?=$item['id']?>">
                                                            <button type="submit" class="card-link btn btn-link" style="color:black"><i class="fa fa-thumbtack"></i></button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    <?php endforeach; ?>
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

    

<?php require_once(LAYOUTS . "default/footer.php"); ?>

<?php require_once(LAYOUTS . "default/modals.php"); ?>