<?php
$pdo = new PDO('mysql:host=localhost;dbname=c291470u_double', 'c291470u_double', 'FhHhbqi8');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$hide = "false";
if (isset($_POST['submit'])) {
if (empty($_FILES['file']['tmp_name'])) {

}else {
$uploaddir = 'pdf/';
$file = $uploaddir . basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $file);
$stmt=$pdo->prepare("INSERT INTO pdf (name, file, hide) VALUES (:name, :file, :hide)");
$stmt->bindParam(':name', $_FILES['file']['name']);
$stmt->bindParam(':file', $file);
$stmt->bindParam(':hide', $hide);
$stmt->execute();
}}
$stmt = $pdo->query('SELECT * FROM pdf');
$data = $stmt->fetchAll();

if (isset($_GET['del'])) {
    $sql = "SELECT * FROM pdf WHERE id= :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_GET['del']));
    $fl = $stmt->fetch();
    if ($fl == false) {

    }else {
    unlink($fl['file']);
    $sql = "DELETE FROM pdf WHERE id= :id";
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['del']);
    $stmt->execute();
    header("Refresh:0; url=pdf.php");
    }
}

if (isset($_GET['hide'])) {
    $sql = "SELECT * FROM pdf WHERE id= :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(':id' => $_GET['hide']));
    $fl = $stmt->fetch();
    if ($fl['hide'] == "false") {
        $hide = "true";
    }else {
        $hide = "false";
    }
    $sql = "UPDATE pdf SET hide= :hide WHERE id= :id";
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['hide']);
    $stmt->bindParam(':hide', $hide);
    $stmt->execute();
    header("Refresh:0; url=pdf.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>PDF</title>
</head>
<style>
    #upload__file {
        display: none;
    }
    .form__pdf {
        width: 50%;
        margin: 0 auto;
        border: solid 1px;
    }
    .nav__pdf {
        display: flex;
        justify-content: space-between;
    }
    .files__pdf {
        width: 50%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }
    .files__pdf__items {
        display: flex;
        justify-content: space-between;
    }
    label{
        min-width: 350px;
    }
</style>
<body>
<form class="form__pdf" action="pdf.php" method="post" enctype="multipart/form-data">
<div class="nav__pdf">
<div class="nav__pdf__items">
    <input type="text" placeholder="Поиск" oninput="search(this.value)">
</div>
<div class="nav__pdf__items">
<label for="upload__file">Добавить файл</label>
<input type="file" name="file" id="upload__file" />
</div>
<div class="nav__pdf__items">
<input type="submit" name="submit" value="Загрузить">
</div>
</div>
</form>
<?php
$count = count($data);
echo "<div class='files__pdf'>";
for ($i=0; $i < $count; $i++) { 
    if ($data[$i]['hide'] == "false") {
        $hid = "Не скрыто";
    }else {
        $hid = "Скрыто";
    }
    echo "<div class='files__pdf__items'><label>".$data[$i]['name']."</label>"."<input type='text' value='".$data[$i]['name']."' oninput='change(this.value, ".$data[$i]['id'].")'>"."<a href='?del=".$data[$i]['id']."'>Удалить</a>"."<a href='?hide=".$data[$i]['id']."'>".$hid."</a></a>"."</div>";
}
echo "</div>";
?>
<script>
    function search(value){
  $.post("pdfsearch.php", {search:value}, function(data){
    $(".files__pdf").html(data);
  });
}

function change(name, id){
  $.post("pdfname.php", {id:id,name:name}, function(data){
    console.log('OK');
  });
}
</script>
</body>

</html>