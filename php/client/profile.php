<?php

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


<div class="modal-dialog" role="document">
      <div class="modal-content" style="color:black;">
        <div class="modal-header">
            <img src="image/avatar/default.png" style="width:150px;height:150px;margin-left:20px;">
            <h5 class="modal-title" style="margin-left:15px;"><?php echo $_GET['username']?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:13px;">Modifier</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
<p>TEST</p>