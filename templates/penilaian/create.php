<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Buat <?=_ucwords($table)?> Baru</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data <?=_ucwords($table)?></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('crud/index',['table'=>$table])?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($error_msg): ?>
                            <div class="alert alert-danger"><?=$error_msg?></div>
                            <?php endif ?>
                            <form action="" method="post">
                                
                                <div class="form-group">
                                    <label for="">Subjek</label>
                                    <select name="penilaian[subjek_id]" class="form-control">
                                        <option selected readonly value="">- Pilih Subjek -</option>
                                        <?php foreach($subjeks as $subjek):?>
                                        <option value="<?=$subjek->id?>"><?=$subjek->nama?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <?php $i=0;foreach($kategori as $kt): 
                                $skors = $db->all('skor',['kategori_id'=>$kt->id]);    
                                ?>
                                <div class="form-group">
                                    <label for=""><?=$kt->nama?></label>
                                    <select name="kategori[<?=$i?>]" class="form-control">
                                        <option selected readonly value="">- Pilih Skor -</option>
                                        <?php foreach($skors as $sk):?>
                                            <option value="<?=$kt->id?>-<?=$sk->id?>"><?=$sk->nama?> (<?=$sk->nilai?>)</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php $i++; endforeach ?>
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>