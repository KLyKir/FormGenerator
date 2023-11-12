<?php
require __DIR__.'/../vendor/autoload.php';

use \src\Input as input;
use \src\Select as select;
use \src\Checkbox as checkbox;
use \src\Button as button;
use \src\Option as option;
use \src\Submit as submit;
use \src\Text as text;
use \src\Radiobutton as radiobutton;
use \src\FormGenerator as FormGenerator;

$formArr = $_POST['form'];
$FormGen = new FormGenerator($formArr);
$form = $FormGen->getForm();
echo $form;
?>
