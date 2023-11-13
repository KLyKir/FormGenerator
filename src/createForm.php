<?php
require __DIR__.'/../vendor/autoload.php';

use \src\FormGenerator as FormGenerator;

$formArr = $_POST['form'];
$FormGen = new FormGenerator;
$form = $FormGen->createForm($formArr);
echo $form;
?>
