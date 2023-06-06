<?php session_start();?>
<script>console.log("test")</script>
<script>
  clearFooter()
    navOne = document.getElementById("nav-one");navOne.classList.remove(navOne.classList.item(1));
    navTwo = document.getElementById("nav-two");navTwo.classList.add("active");
    navThree = document.getElementById("nav-three");navThree.classList.remove(navThree.classList.item(1));
    profileImage = document.getElementById("profile-main-picture");
    profileImage.style.border = "0px";

    
  </script>

<div style="display:flex;width:150%;margin-left:-200px;height:100%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:140%;">
      <div class="modal-header" style="justify-content:start;color:black;">
          <img src="../chess/image/avatar/default.png" style="width:50px;">
          <h6 style="margin-left:10px;font-weight:bold;">Joueur</h6> 
          <button type="button" class="btn btn-success" style="margin-left:70%;margin-top:7px;">10:00</button>
      </div>
      <div class="modal-body">
        <div style="width: 665px; height: 665px; display: flex; flex-wrap: wrap;">
          <?php
            $pawns = ["br", "bn", "bb", "bq", "bk", "bb", "bn", "br", "bp", "bp", "bp", "bp", "bp", "bp", "bp", "bp", "wr", "wn", "wb", "wq", "wk", "wb", "wn", "wr", "wp", "wp", "wp", "wp", "wp", "wp", "wp", "wp",];
            for ($row = 7; $row >= 0; $row--) {
              for ($col = 0; $col < 8; $col++) {
                $isFirstColumn = $col === 0;
                $isFirstRow = $row === 0;
                $color = ($row + $col) % 2 === 0 ? '#432161a5' : '#e9e9e9';
                $letter = chr(ord('a') + $col);
                $number = $row + 1;
                $textColor = $color === '#432161a5' ? 'white' : '#432161d6';
                
                echo '<div style="position: relative; width: 83.125px; height: 83.125px; text-align: center; border-radius:3px; background-color: '.$color.';">'
                . ($isFirstColumn ? '<a style="position: absolute; top: 0; left: 0;margin-left:3px;color:'.$textColor.'">'.$number.'</a>' : '')
                . ($isFirstRow ? '<a style="position: absolute; bottom: 0; right: 0;margin-right:3px;color:'.$textColor.'">'.$letter.'</a>' : '');
                if ($row == 7) {
                  echo '<img id="'.$letter.$number.'" src="../chess/image/chess/'.$pawns[$col].'.png" style="width: 60px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                } else if ($row == 6) {
                    echo '<img id="'.$letter.$number.'" src="../chess/image/chess/'.$pawns[$col+8].'.png" style="width: 60px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                } else if ($row == 1) {
                  echo '<img id="'.$letter.$number.'" src="../chess/image/chess/'.$pawns[$col+24].'.png" style="width: 60px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                } else if ($row == 0) {
                  echo '<img id="'.$letter.$number.'" src="../chess/image/chess/'.$pawns[$col+16].'.png" style="width: 60px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
                }
                echo '</div>';
              }
            }
          ?>
        </div>
      </div>
      <div class="modal-footer" style="justify-content:start;color:black;flex-wrap:nowrap;">
          <img src="../chess/image/avatar/arcpro.png" style="width:50px;">
          <h6 style="margin-left:10px;font-weight:bold;margin-top:-25px;">ArcPro</h6> 
          <button type="button" class="btn btn-success" style="margin-left:68%;">10:00</button>
      </div>
    </div>
  </div>
  <div class="modal-dialog" role="document" style="width:350px;margin-left:200px;">
    <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="btn btn-secondary" style="background-color:#6c757d;color:white;width:300px;margin-left:7px;margin-top:20px;">Original 10 minutes</button>
      <button id="createGame" type="button" class="btn btn-success" style="width:300px;margin-left:7px;margin-top:20px;margin-bottom:20px;" onclick="createNewGame()">Créer une partie</button>
      </div>
    </div>
  </div>
</div>