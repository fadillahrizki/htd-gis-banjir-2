<?php

$table = 'penilaian';
Page::set_title(ucwords($table));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');

if(file_exists('../actions/'.$table.'/override-index.php'))
    $data = require '../actions/'.$table.'/override-index.php';
else{
    $db->query = "select subjek_id from $table group by subjek_id";
    $data = $db->exec('all');
}

$kategori = $db->all('kategori');

return [
    'datas' => $data,
    'kategori'=>$kategori,
    'table' => $table,
    'db' => $db,
    'success_msg' => $success_msg
];