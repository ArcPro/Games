<?php

// Generate UUIDV4
function format_uuidv4($data)
{
  assert(strlen($data) == 16);

  $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function getRank($rank) {
 if ($rank == 0) {return '<p class="badge badge-secondary">Membre</p>';}
 else if ($rank == 1) { return '<span class="badge badge-warning" style="color:white;">Contributeur</span>';}
 else if ($rank == 2) { return '<span class="badge badge-success">Modérateur</span>';}
 else if ($rank == 3) { return '<span class="badge badge-danger">Administrateur</span>';}
}