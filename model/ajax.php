<?php


$action = $_REQUEST['action'];


if(!empty($action))
{

    require_once('crud.php');
    $obj=new user();


}





// Adding user action
if ($action == 'addC' && isset($_POST)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    $photo = $_FILES['photo'];

    $playerid = (!empty($_POST['userid'])) ? $_POST['userid'] : "";
    $imagename = "";

    if (!empty($photo['name'])) {
        $imagename = $obj->upTof($photo);
        $playerData = ['name' => $name, 'email' => $email, 'phone' => $phone, 'adress' => $adress, 'photo' => $imagename];
    } else {
        $playerData = ['name' => $name, 'email' => $email, 'phone' => $phone, 'adress' => $adress];
    }

    $playerid = $obj->add($playerData,"clients");

    if (!empty($playerid)) {
        $player = $obj->getRow('id', $playerid,"clients");

        // Delay the redirection by 25 seconds
        sleep(3);

        // Redirect after the delay
        header("Location: ../client/client.php");
        exit();
    }
}
else{
if ($action=='upd' && isset($_POST)) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    $photo = $_FILES['photo'];
    $id=$_GET["id"]; // test erreur


    $playerid = (!empty($_POST['userid'])) ? $_POST['userid'] : "";
    $imagename = "";
    if (!empty($photo['name'])) {
        $imagename = $obj->upTof($photo);
        $playerData = ['name' => $name, 'email' => $email, 'phone' => $phone, 'adress' => $adress, 'photo' => $imagename,];


    } else {
        $playerData = ['name' => $name, 'email' => $email, 'phone' => $phone, 'adress' => $adress,];
    }

    $playerid = $obj->update($playerData,$id,"clients");
    header("location:../client/client.php");
    if (!empty($playerid)) {
        $player = $obj->getRow('id', $playerid,"clients");
        header("location:../client/client.php");
        exit();

    }

}else{

    if ($action=='deluser' && isset($_POST)) {
$id=$_GET["id"];
echo $id;//3arfek bch tes2el a3leha ya oumaima mfhimtch lweh

        $playerid = $obj->deleteR($id,"clients");
        header("location:../client/client.php");



    }
}









}