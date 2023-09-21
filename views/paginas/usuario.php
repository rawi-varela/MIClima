<?php

$id = "Azucena";
$contraseña = "131443";

$passwordHash = password_hash($contraseña, PASSWORD_BCRYPT);

$query = " INSERT INTO admin (id, contraseña) VALUES ('$id', '$passwordHash') ; ";

echo $query;
exit;


