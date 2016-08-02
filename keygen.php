<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 08/07/2016
 * Time: 17:41
 */
include("license_key.class.php");
if(isset($_POST['name']) && isset($_POST['pro'])) {
$pass=new license_key();
$pass->keylen=16;
$pass->software='NotifyPro';
$pass->formatstr='4444';
$newkey= $pass->codeGenerate($_POST['name']);
echo $newkey;
} elseif(isset($_POST['name'])) {
    $pass=new license_key();
    $pass->keylen=16;
    $pass->software='Notify';
    $pass->formatstr='4444';
    $newkey= $pass->codeGenerate($_POST['name']);
    echo $newkey;
}
else {
    ?>
<form action="keygen.php" method="post">
    <input name="name">
    <input type="checkbox" name="pro">
    <input type="submit">
</form>
<?php } ?>