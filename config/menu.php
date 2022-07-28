<?php

return [
    'dashboard' => 'default/index',
    'kategori'=>'crud/index?table=kategori',
    'skor'=>'crud/index?table=skor',
    'hasil'=>'crud/index?table=hasil',
    'subjek'=>'crud/index?table=subjek',
    'penilaian'=>'penilaian/index',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];