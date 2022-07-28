<?php

$table = 'penilaian';
Page::set_title('Edit '.ucwords($table));
$conn = conn();
$db   = new Database($conn);
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');

$kategori = $db->all('kategori');
$subjek = $db->single('subjek',['id'=>$_GET['subjek_id']]);

if(request() == 'POST')
{
    if(file_exists('../actions/'.$table.'/before-edit.php'))
        require '../actions/'.$table.'/before-edit.php';

    foreach($_POST['kategori'] as $cat){
        $cats = explode('-',$cat);
        $_POST[$table]['skor_id'] = $cats[1];
        $edit = $db->update($table,$_POST[$table],[
            'subjek_id' => $_GET['subjek_id'],
            'kategori_id' => $cats[0],
        ]);
    }

    if(file_exists('../actions/'.$table.'/after-edit.php'))
        require '../actions/'.$table.'/after-edit.php';

    set_flash_msg(['success'=>$table.' berhasil diupdate']);
    header('location:'.routeTo('penilaian/index'));
}

return [
    'db' => $db,
    'kategori' => $kategori,
    'subjek' => $subjek,
    'error_msg' => $error_msg,
    'old' => $old,
    'table' => $table
];