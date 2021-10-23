<?php

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/LoaiSua.php';

$model = new LoaiSua();

$id = $_GET['id'];

$model->delete($id);

header('Location: index.php');
