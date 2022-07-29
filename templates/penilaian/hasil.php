<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-success-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Hasil <?=_ucwords($table)?></h2>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('penilaian/index',['table'=>$table])?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>

                            <iframe src="https://www.google.com/maps?q=2.7214303,99.6147077&z=15&output=embed" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            <div class="table-responsive table-hover table-sales mt-5">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <?php 
                                            foreach(config('fields')[$table] as $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <th><?=$label?></th>
                                            <?php endforeach ?>
                                            <?php foreach($kategori as $kt): ?>
                                                <th class="text-center"><?=$kt->nama?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <?php 
                                            foreach(config('fields')[$table] as $key => $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                    $data_value = Form::getData($field['type'],$data->{$key});
                                                    $field = $key;
                                                }
                                                else
                                                {
                                                    $data_value = $data->{$field};
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <td><?=$data_value?></td>
                                            <?php endforeach ?>
                                            <?php 
                                                foreach($kategori as $kt): 
                                                $penilaian = $db->single('penilaian',['kategori_id'=>$kt->id,'subjek_id'=>$data->subjek_id]);
                                                $skor = $db->single('skor',['id'=>$penilaian->skor_id]);
                                            ?>
                                                <td class="text-center"><?=$kt->bobot*$skor->nilai?></td>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>