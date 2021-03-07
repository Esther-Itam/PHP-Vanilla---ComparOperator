<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=comparoperator;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$id_location = $_GET['id'];
/* $id_tour_operator = $_GET['id']; */

$showComments = $pdo->prepare('SELECT * FROM reviews WHERE id_location = ?');
$showComments->execute([$_GET['id']]);
$comments = $showComments->fetchAll();


$getDestinations = $pdo->query('SELECT * 
                                FROM destinations
                                INNER JOIN tour_operators
                                ON destinations.id_tour_operator = tour_operators.id');

$destinations = $getDestinations->fetchAll();

?>

<!-- --------------------------------------Laisser un commentaire-------------------------------------- -->
<li>
    <div class="collapsible-header"><i class="material-icons">chat_bubble_outline</i>Laisser un commentaire</div>
    <div class="collapsible-body">
        <span>
            <div class="container">
                <div class="col l4 s6 center">
                    <div>
                        <h4>Poster un commentaire</h4>
                        <form method='POST' action="./partials/destinationPage/comment-inc.php">
                            <input type='hidden' name='id_location' value="<?= $id_location ?>">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">
                                    <font color="#26a69a">account_box</font>
                                </i>
                                <input id="icon_prefix" type="text" class="validate" name="author" placeholder="Pseudo">
                                <label for="icon_prefix">Pseudo</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">format_align_center</i>
                                <textarea id="message" name="message" class="materialize-textarea" data-length="100"></textarea>
                                <label for="message">Laisser votre commentaire</label>
                            </div>

                            <button class="btn btn-info" class="favorite styled" type="submit">Comment <i class="material-icons">chat_bubble_outline</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </span>
    </div>
</li>

<!-- --------------------------------------Voir les commentaires-------------------------------------- -->
<li>
    <div class="collapsible-header"><i class="material-icons">chat_bubble_outline</i><?= count($comments) ?> commentaires</div>
    <div class="collapsible-body">
        <span>

            <div class="container">
                <div class="col l4 s6 center">
                    <div>
                        <h4>Voir les commentaires</h4>

                        <form>
                            <?php foreach ($comments as $comment) { ?>
                                <input hidden type='text' name='id_location'>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">
                                        <font color="#26a69a">account_box</font>
                                    </i>
                                     <input id="disabled" type="text" class="validate" name="name" placeholder="Pseudo" disabled value="<?= $comment["author"] ?>">
                                    <label for="disabled"><font color="#26a69a">Pseudo</font></label> 
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">format_align_center</i>
                                    <input id="disabled" type="text" class="validate" name="message" placeholder="Commentaire" disabled value="<?= $comment["message"] ?>">
                                    <label for="disabled"><font color="#26a69a">Commentaire</font></label>
                                </div>
                                <div class="input-field col s6">
                                 <input id="disabled" name="created_at" class="validate" disabled value="<?= $comment["created_at"] ?>">
                                </div>
                                </br>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

        </span>
    </div>
</li>