<?php
header("refresh:0;url=".base_url()."" );

session_unset();
session_destroy();
die();
?>
