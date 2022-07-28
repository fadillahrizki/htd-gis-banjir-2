<?php

$table = 'penilaian';
Page::set_title('Tambah '.ucwords($table));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

$conn = conn();
$db   = new Database($conn);

$kategori = $db->all('kategori');

$db->query = "select subjek_id from $table group by subjek_id";
$subjeks = $db->exec('all');

$ids = [];
foreach($subjeks as $sbj){
    $ids[] = $sbj->subjek_id;
}

$db->query = "select * from subjek where id not in (".implode(",",$ids).")";
$subjeks = $db->exec('all');

if(request() == 'POST')
{
    if(file_exists('../actions/'.$table.'/before-insert.php'))
        require '../actions/'.$table.'/before-insert.php';

    foreach($_POST['kategori'] as $cat){
        $cats = explode('-',$cat);
        $_POST[$table]['kategori_id'] = $cats[0];
        $_POST[$table]['skor_id'] = $cats[1];
        $insert = $db->insert($table,$_POST[$table]);
    }

    if(file_exists('../actions/'.$table.'/after-insert.php'))
        require '../actions/'.$table.'/after-insert.php';

    set_flash_msg(['success'=>$table.' berhasil ditambahkan']);
    header('location:'.routeTo('penilaian/index'));
}

return compact('table','subjeks','kategori','db','error_msg','old');