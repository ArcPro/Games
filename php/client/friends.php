<?php 
session_start();
?>

<script>
    var dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(function(item) {
    item.addEventListener('click', function() {
        var selectedText = item.textContent.trim();
        
        var dropdownButton = document.querySelector('.dropdown-toggle');
        dropdownButton.textContent = selectedText;
    });
    });

    function closeFriends(name) {
        console.log(name)
        inProfile = false
        showProfile(name)
    }
</script>

<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Amis</h5><span class="badge badge-dark" style="width:30px;height:30px;font-size:13px;font-weight:bold;text-align:center;padding-top:7px;margin-left:10px;">12</span>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" onclick="closeFriends('<?php echo $_GET['username'];?>')">×</span>
      </button>
    </div>


    <div style="display:flex;border-bottom:solid 1px black;">
        <input type="text" style="width:450px;margin-left:5px;" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ajouter un ami par nom d'utilisateur">
        <div class="dropdown" style="margin-left:50px;">
            <button style="width:173px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dernière connexion
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Dernière connexion</a>
                <a class="dropdown-item" href="#">Date d'arrivée</a>
                <a class="dropdown-item" href="#">Alphabétique</a>
            </div>
        </div>
    </div>
    <div class="chatdiv" style="height:200px;">
        <div style="width:99%;height:55px;margin-left:0.8%;margin-top:5px;display:flex;border-bottom:solid 1px #00000063;">
            <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
            <div class="card-body" style="margin-top:-20px;width:80%;">
                <a>ArcPro</a>
                <p style="color:#00000063;">Ami depuis le 24/03/2023</p>
            </div>
            <form class="card-body" style="display:flex;margin-top:-15px;">
                <input type="image" src="image/gamefriend.png" style="width:50px;height:40px;" class="form-control">
                <input type="image" src="image/messagefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
                <input type="image" src="image/removefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
            </form>
        </div>
        <div style="width:99%;height:55px;margin-left:0.8%;margin-top:5px;display:flex;border-bottom:solid 1px #00000063;">
            <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
            <div class="card-body" style="margin-top:-20px;width:80%;">
                <a>ArcPro</a>
                <p style="color:#00000063;">Ami depuis le 24/03/2023</p>
            </div>
            <form class="card-body" style="display:flex;margin-top:-15px;">
                <input type="image" src="image/gamefriend.png" style="width:50px;height:40px;" class="form-control">
                <input type="image" src="image/messagefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
                <input type="image" src="image/removefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
            </form>
        </div>
        <div style="width:99%;height:55px;margin-left:0.8%;margin-top:5px;display:flex;border-bottom:solid 1px #00000063;">
            <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
            <div class="card-body" style="margin-top:-20px;width:80%;">
                <a>ArcPro</a>
                <p style="color:#00000063;">Ami depuis le 24/03/2023</p>
            </div>
            <form class="card-body" style="display:flex;margin-top:-15px;">
                <input type="image" src="image/gamefriend.png" style="width:50px;height:40px;" class="form-control">
                <input type="image" src="image/messagefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
                <input type="image" src="image/removefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
            </form>
        </div>
        <div style="width:99%;height:55px;margin-left:0.8%;margin-top:5px;display:flex;border-bottom:solid 1px #00000063;">
            <img src="image/avatar/default.png" style="width:50px;height:50px;border-radius:5px;">
            <div class="card-body" style="margin-top:-20px;width:80%;">
                <a>ArcPro</a>
                <p style="color:#00000063;">Ami depuis le 24/03/2023</p>
            </div>
            <form class="card-body" style="display:flex;margin-top:-15px;">
                <input type="image" src="image/gamefriend.png" style="width:50px;height:40px;" class="form-control">
                <input type="image" src="image/messagefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
                <input type="image" src="image/removefriend.png" style="width:50px;height:40px;margin-left:20px;" class="form-control">
            </form>
        </div>
        
    </div>
</div>