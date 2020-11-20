<?php

require_once '../model/getHandler.php';

$dropDown = "SELECT productCode, name FROM products;";

$out = get($dropDown);

