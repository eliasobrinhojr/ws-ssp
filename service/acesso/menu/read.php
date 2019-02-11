<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/dbclass.php';
include_once '../../../entities/menu.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$menu = new Menu($connection);
$stmt = $menu->read();

$count = $stmt->rowCount();

if ($count > 0) {

    $menus = array();
    $menus["body"] = array();
    $menus["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $menu = array(
            "menIdmenu" => $menIdMenu,
            "menDescricao" => $menDescricao,
            "modIdModulo" => $modIdModulo
        );

        array_push($menus["body"], $menu);
    }

    echo json_encode($menus);
} else {

    echo json_encode(
            array("body" => array(), "count" => 0)
    );
}
?>