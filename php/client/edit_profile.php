<?php 
session_start();
?>
<script>
function closEditForm(name) {
        inProfile = false
        showProfile(name)
    }    
</script>
            <form action="post">
                <div class="modal-header" style="height:50px;">
                  <h6>Modifier le profil</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" onclick="closEditForm('<?php echo $_SESSION['username'];?>')">×</span>
                  </button>
                </div>
                <div class="modal-body" style="margin-top:-10px;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="test@gmail.com">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group" style="margin-top:-10px;">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" name="oldpassword" placeholder="Mot de passe" required>
                        <div style="display:flex;width:100%;margin-top:15px;">
                            <input type="password" class="form-control" name="newpassword" placeholder="Nouveau mot de passe" style="width:48%;">
                            <input type="password" class="form-control" name="confirmnewpassword" placeholder="Confirmer nouveau mot de passe"style="width:48%;margin-left:4%;">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" style="margin-left:82%;" name="update" value="Mettre à jour">

                </div>
                </form>