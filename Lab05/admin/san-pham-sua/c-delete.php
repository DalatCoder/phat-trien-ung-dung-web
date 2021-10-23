<?php

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/SanPhamSua.php';

$model = new SanPhamSua();

$id = $_GET['id'];

$model->delete($id);

header('Location: index.php');
