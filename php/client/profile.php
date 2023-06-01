<?php
session_start();
// if ($_GET['username'] != $_SESSION['username']) {

// }
include_once "../server/utils.php";
include_once "../server/database.php";
include_once "../server/profile_infos.php";
$userInfos = getProfileInfos($_GET['uuid']);
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

    function showFriendslist(uuid, username, avatar) {
        console.log('test')
        $.ajax({
            url: "php/client/friends.php",
            dataType: "html",
            data: { uuid, username, avatar }, // Variable à envoyer au script PHP
            success: function(response) {
                $("#comments-stats").html(response);
                // history.pushState(null, null, "/profile/"+name); // Modifie l'URL en "/profile" sans recharger la page
            }
        });
    }

    function editProfile(uuid, username, avatar) {
        $.ajax({
            url: "php/client/edit_profile.php",
            dataType: "html",
            data: { uuid, username, avatar }, // Variable à envoyer au script PHP
            success: function(response) {
                $("#comments-stats").html(response);
                // history.pushState(null, null, "/profile/"+name); // Modifie l'URL en "/profile" sans recharger la page
            }
        });
    }
    function showDefaultStats(uuid, username, avatar) {
        console.log(username);
        $.ajax({
            url: "php/client/profile_bottom.php",
            dataType: "html",
            data: { uuid, username, avatar }, // Variable à envoyer au script PHP
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
  <div class="modal-content" style="color:black; border-radius:10px;height:300px;">
    <div class="modal-header" style="border-bottom:none;">
        <img src="image/avatar/<?php echo $userInfos->avatar; ?>.png" style="width:180px;height:180px;margin-left:20px;margin-top:22px;">
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
                <div class="card-body" style="text-align:center;" onclick="showFriendslist('<?php echo $userInfos->uuid;?>','<?php echo $userInfos->username;?>','<?php echo $userInfos->avatar;?>')">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:190px;">
                <?php if ($_GET['uuid'] == $_SESSION['uuid']){echo '<span aria-hidden="true" style="font-size:13px;" onclick="editProfile(\''. $userInfos->uuid .'\',\''. $userInfos->username .'\',\''. $userInfos->avatar .'\')">Modifier</span>';} ?>
            </button>

        </div>
    </div>
  </div>
</div>

<div class="modal-dialog" role="document" style="max-width: 700px;">

    <div class="modal-content" style="color:black; border-radius:10px; height:350px;" id="comments-stats">
    </div>
</div>
<?php

// echo $userInfos->uuid;
// echo $userInfos->username;
// echo $userInfos->avatar;
    echo "<script>showDefaultStats('".$userInfos->uuid.", ".$userInfos->username.", ".$userInfos->avatar."')</script>";