<?php

return [
    'tblname'    => [
        'field1','field2'
    ],
    
    'kategori'=>[
        'nama',
        'bobot',
    ],

    'skor'=>[
        'kategori_id'=>[
            'label'=>"Kategori",
            'type'=>'options-obj:kategori,id,nama'
        ],
        'nama',
        'nilai',
        'warna'=>[
            'label'=>"Warna",
            'type'=>'color'
        ],
    ],

    'hasil'=>[
        'nama',
        'nilai_awal',
        'nilai_akhir',
    ],

    'subjek'=>[
        'nama',
        'lat',
        'lng',
        'shape',
    ],

    'penilaian'=>[
        'subjek_id'=>[
            'label'=>"Subjek",
            'type'=>'options-obj:subjek,id,nama'
        ],
    ],
];