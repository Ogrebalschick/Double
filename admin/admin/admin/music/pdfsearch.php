<?php
$pdo = new PDO('mysql:host=localhost;dbname=c291470u_double', 'c291470u_double', 'FhHhbqi8');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$stmt = $pdo->prepare('SELECT * FROM pdf WHERE name LIKE :name');
$search = $_POST['search'];
$stmt->bindValue(':name', '%' . $search . '%');
$data = $stmt->execute();
$list = $stmt->fetchAll();
?>
<?php
$count = count($list);
for ($i=0; $i < $count; $i++) { 
    if ($data[$i]['hide'] == "false") {
        $hid = "Не скрыто";
    }else {
        $hid = "Скрыто";
    }
    echo "<div class='files__pdf__items'><label>".$list[$i]['name']."</label>"."<a href='?del=".$list[$i]['id']."'>Удалить</a>"."<a href='?hide=".$list[$i]['id']."'>".$hid."</a></a>"."</div>";
}
?>