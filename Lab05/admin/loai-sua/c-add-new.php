<?php

if (!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/LoaiSua.php';

$model = new LoaiSua();

$ten = $_POST['ten'];
$mota = $_POST['mo-ta'];

$model->save([
    LoaiSua::COL_TEN_LOAI => $ten,
    LoaiSua::COL_MO_TA => $mota
]);

header('Location: index.php');