<?php
include '../models/model.php';
$activation = new Model;

$activation->getActivationFromUrl();
$activation->selectRow();
$activation->compareCodes();
$activation->updateVerification();
$activation->recordSession();
?>
