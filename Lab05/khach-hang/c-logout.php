<?php

require_once __DIR__ . '/../Models/Authenticate.php';

$model = new Authenticate();
$model->logout();

header('Location: ../index.php');