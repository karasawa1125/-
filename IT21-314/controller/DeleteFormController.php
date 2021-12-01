
<?php
require_once("../model/db.php");

$account = read_account_by_account_id($_GET["account_id"]);

include_once("../view/delete_form.php");
?>
