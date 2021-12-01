<?php
require_once("../model/db.php");

$image = read_image_by_image_id($_GET["image_id"]);

include_once("../view/contents.php");
?>
