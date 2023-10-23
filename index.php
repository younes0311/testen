<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
    
<div class="big-box">


<div class="box">
    <a href="index.php?page=start">Start</a>
    <a href="index.php?page=contacts">Kontakte</a>
    <a href="index.php?page=addcontact">Kontakt hinzufügen</a>
    <a href="index.php?page=Impressum">Impressum</a>
</div>

<div class="okay">
<?php 

$headline = 'Herzlich willkommen';
$contacts = [];
if(file_exists('contacts.txt')){
 $text = file_get_contents('contacts.txt', true);
 $contacts =json_decode($text);

}

if(isset ($_POST['name'])&& isset($_POST['telefon'])){
    echo 'contact '. $_POST['name'] . 'wurde hinzugefügt';
    $newContact=[
        'name'=> $_POST['name'],
 'telefon' => $_POST ['telefon'] ];
 array_push($contacts, $newContact);
 file_put_contents('contacts.txt',json_encode($contacts, JSON_PRETTY_PRINT));
}

echo '<h1 class="text1">' , $_GET['page'] . '</h1>';

if($_GET['page']=='start'){
    echo "du bist auf der startseite";
}
if($_GET['page']=='addcontact'){
    echo "<p>hier hast du einen blick über deine <b>Kontakte </b>haben</p>
   
   <form action='?page=contacts' method='POST'>
    <input placeholder='telefon' name='name'>
    <input placeholder='name' name='telefon'>
    <button type='submit'>Send</button>
    </form>
    
    ";



}
 elseif($_GET['page']=='contacts'){
    echo "du bist auf der contactseite";
}

?>
</div>
</div>

</body>
</html>