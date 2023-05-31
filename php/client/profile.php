<?php
session_start();
// if ($_GET['username'] != $_SESSION['username']) {

// }
include_once "../server/utils.php";
include_once "../server/profile_infos.php";
// print_r($userInfos);
// echo $_GET['username'];
?>

<script>
    const navOne = document.getElementById("nav-one");navOne.classList.remove(navOne.classList.item(1));
    const navTwo = document.getElementById("nav-two");navTwo.classList.remove(navTwo.classList.item(1));
    const navThree = document.getElementById("nav-three");navThree.classList.remove(navThree.classList.item(1));

    var profileImage = document.getElementById("profile-main-picture");
    profileImage.style.border = "2px solid white";
    profileImage.style.borderRadius = "50%";

    function showFriendslist(name) {
        console.log('test')
        $.ajax({
            url: "php/client/friends.php",
            dataType: "html",
            data: { username: name }, // Variable à envoyer au script PHP
            success: function(response) {
                $("#comments-stats").html(response);
                // history.pushState(null, null, "/profile/"+name); // Modifie l'URL en "/profile" sans recharger la page
            }
        });
    }

    function editProfile(name) {
        $.ajax({
            url: "php/client/edit_profile.php",
            dataType: "html",
            data: { username: name }, // Variable à envoyer au script PHP
            success: function(response) {
                $("#comments-stats").html(response);
                // history.pushState(null, null, "/profile/"+name); // Modifie l'URL en "/profile" sans recharger la page
            }
        });
    }

    function logout() {
        $.ajax({
            url: "php/server/logout.php",
            dataType: "html",
            success: function(response) {
                window.location.href='http://localhost/chess/';
                // history.pushState(null, null, "/profile/"+name); // Modifie l'URL en "/profile" sans recharger la page
            }
        });
    }

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

    #friends {
        cursor: pointer;
    }
</style>

<div class="modal-dialog" role="document" style="max-width: 700px;">
  <div class="modal-content" style="color:black; border-radius:10px;">
    <div class="modal-header" style="border-bottom:none;">
        <img src="image/avatar/default.png" style="width:180px;height:180px;margin-left:20px;margin-top:22px;">
        <div style="display:block;margin-left:15px;">
            <div class="card-body">
                <h5 class="modal-title" style="font-size:25px;font-weight:bold;margin-top:10px;"><?php echo $userInfos->username?></h5>
                <?php echo getRank($userInfos->permission); ?>
                <!-- <p class="badge badge-secondary">Secondary</p> -->
            </div>
            <div class="card-body" style="margin-top:-45px;margin-left:-25px;display:flex;width:111%;">
                <div class="card-body" style="text-align:center;">
                    <img src="image/calendar.png" alt="Date d'inscription" title="Date d'inscription" style="width:45px;height:45px;">
                    <p style="margin-top:5px;"><?php echo $userInfos->date; ?></p>
                </div>
                <div class="card-body" style="text-align:center;" onclick="showFriendslist('<?php echo $userInfos->username;?>')">
                    <img src="image/friends.png" alt="Amis" title="Amis" style="width:45px;height:45px;" id="friends">
                    <p style="margin-top:5px;">5</p>
                </div>
                <div class="card-body" style="text-align:center;">
                    <img src="image/games_number.png" alt="Parties jouées" title="Parties jouées" style="width:45px;height:45px;">
                    <p style="margin-top:5px;"><?php echo $userInfos->nbDuelJoue; ?></p>
                </div>
                <div class="card-body" style="text-align:center;">
                    <img src="image/wins_number.png" alt="Parties gagnées" title="Parties gagnées" style="width:45px;height:45px;">
                    <p style="margin-top:5px;"><?php echo $userInfos->nbDuelGagne; ?></p>
                </div>
                
            </div>    
        </div>

        <div style="display:block">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-30px;">
                <?php if ($_GET['uuid'] == $_SESSION['uuid']){echo '<span aria-hidden="true" style="font-size:13px;" onclick="logout()">Se déconnecter</span>';} ?>
            </button>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:200px;">
                <?php if ($_GET['uuid'] == $_SESSION['uuid']){echo '<span aria-hidden="true" style="font-size:13px;" onclick="editProfile()">Modifier</span>';} ?>
            </button>

        </div>
    </div>
  </div>
</div>

<div class="modal-dialog" role="document" style="max-width: 700px;">

    <div class="modal-content" style="color:black; border-radius:10px; height:350px;" id="comments-stats">
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
                            <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">

                            <input type="text" name="comment" class="form-control" placeholder="Commentez le profil de XXX" style="margin-left:7px;margin-top:5px;">
                            <button type="submit" class="btn btn-primary" style="margin-left:10px;height:40px;margin-top:5px;">Publier</button>
                        </form>
                        <div class="chatdiv">
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
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>