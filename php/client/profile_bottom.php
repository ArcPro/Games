<?php
session_start();
include_once "../server/profile_infos.php";
$dataArray = explode(',', $_GET["uuid"]); // Utilise la fonction explode pour diviser la chaîne en fonction des virgules
$dataArray = array_map('trim', $dataArray); // Supprime les espaces en début et en fin de chaque élément du tableau

?>

        <div class="modal-header" style="border-bottom:none;">
            <div class="bs-component">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#awards" style="color:black;">Récompenses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#comments" style="color:black;">Commentaires</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content" style="margin-top:10px;margin-left:5px;">
                    <div class="tab-pane fade active show" id="awards">
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro
                        synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                        butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex
                        squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                        voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane fade" id="comments" style="width:190%;">
                        <form method="post" action="php/client/send_comment.php" style="display:flex;">
                            <img src="image/avatar/<?php if (isset($dataArray[2])) {echo $dataArray[2];} else {echo $_GET["avatar"];}?>.png" style="width:50px;height:50px;border-radius:5px;">

                            <input type="hidden" name="uuid" value="<?php echo $dataArray[0]; ?>"> 
                            <input type="text" name="comment" class="form-control" placeholder="Commentez le profil de <?php if (isset($dataArray[1])) {echo $dataArray[1];} else {echo $_GET["username"];}?>" style="margin-left:7px;margin-top:5px;">
                            <input type="submit" name="sendComment" class="btn btn-primary" style="margin-left:10px;height:40px;margin-top:5px;" value="Publier">
                        </form>
                        <div class="chatdiv">
                            <?php 
                            getComments($dataArray[0]);
                            ?>
                            
                            <!-- <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
