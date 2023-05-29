<?php
session_start();
include_once "../server/utils.php";
// echo $_GET['username'];
?>

<script>
    const navOne = document.getElementById("nav-one");navOne.classList.remove(navOne.classList.item(1));
    const navTwo = document.getElementById("nav-two");navTwo.classList.remove(navTwo.classList.item(1));
    const navThree = document.getElementById("nav-three");navThree.classList.remove(navThree.classList.item(1));

    var profileImage = document.getElementById("profile-main-picture");
    profileImage.style.border = "2px solid white";
    profileImage.style.borderRadius = "50%";
</script>

<style>
    .chatdiv {
        width:100%;
        height:200px;
        margin-top:10px;
        flex-direction: column-reverse;
        overflow-y: auto;
    }

    .chatrow {
        display:flex;
        height:70px;
        padding-top:10px;
        border-top: solid 1px #62626285;
    }

    .chatbox {
        width:87%;
        display:flex;
    }

    /* width */
    ::-webkit-scrollbar {
    width: 5px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #007bff; 
    border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #004c9d; 
    }
</style>

<div class="modal-dialog" role="document" style="max-width: 700px;">
  <div class="modal-content" style="color:black; border-radius:10px;">
    <div class="modal-header" style="border-bottom:none;">
        <img src="image/avatar/default.png" style="width:180px;height:180px;margin-left:20px;margin-top:22px;">
        <div style="display:block;margin-left:15px;">
            <div class="card-body">
                <h5 class="modal-title" style="font-size:25px;font-weight:bold;margin-top:10px;"><?php echo $_GET['username']?></h5>
                <?php echo getRank(3); ?>
                <!-- <p class="badge badge-secondary">Secondary</p> -->
            </div>
            <div class="card-body" style="margin-top:-45px;margin-left:-40px;display:flex;width:111%;">
                <div class="card-body" style="text-align:center;">
                    <img src="image/calendar.png" alt="Date d'inscription" title="Date d'inscription" style="width:45px;height:45px;">
                    <p style="margin-top:5px;">29 mai 2023</p>
                </div>
                <div class="card-body" style="text-align:center;">
                    <img src="image/friends.png" alt="Amis" title="Amis" style="width:45px;height:45px;">
                    <p style="margin-top:5px;">5</p>
                </div>
                <div class="card-body" style="text-align:center;">
                    <img src="image/games_number.png" alt="Parties jouées" title="Parties jouées" style="width:45px;height:45px;">
                    <p style="margin-top:5px;">113</p>
                </div>
                <div class="card-body" style="text-align:center;">
                    <img src="image/wins_number.png" alt="Parties gagnées" title="Parties gagnées" style="width:45px;height:45px;">
                    <p style="margin-top:5px;">58</p>
                </div>
                
            </div>    
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <?php if ($_GET['username'] == $_SESSION['username']){echo '<span aria-hidden="true" style="font-size:13px;">Modifier</span>';} ?>
        </button>
    </div>
  </div>
</div>

<div class="modal-dialog" role="document" style="max-width: 700px;">

    <div class="modal-content" style="color:black; border-radius:10px; height:350px;">
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
                    <div class="tab-pane fade" id="comments" style="width:110%;">
                        <form method="post" style="display:flex;">
                            <img src="image/avatar/default.png" style="width:50px;height:50px;">

                            <input type="text" name="comment" class="form-control" placeholder="Commentez le profil de XXX" style="margin-left:7px;margin-top:5px;">
                            <button type="submit" class="btn btn-primary" style="margin-left:10px;height:40px;margin-top:5px;">Publier</button>
                        </form>
                        <div class="chatdiv">
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            <div class="chatrow">
                                <div class="chatbox">
                                    <img src="image/avatar/default.png" style="width:50px;height:50px;">
                                    <div class="card-body" style="margin-top:-20px;">
                                        <a>ArcPro</a>
                                        <p>Commentaire en question qui est censé pas etre trop long</p>
                                    </div>
                                </div>
                                <a style="margin-top:12px;margin-left:-15px;border-left:solid 2px;height:28px;padding-left:10px;">13/04/2023</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p>TEST</p>