<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Kategori Outlet</label>
                                <select id="kategori_outlet" class="form-control" autofocus>
                                    <?php foreach ($kategori as $kategori) : ?>
                                        <option value="<?= $kategori->id_kategori . '|' . $kategori->kategori ?>"><?= $kategori->kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-8">
                                <h3 class="text-right outlet-title">Target Outlet - <span id="outlet_span">SBF</span></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-hover dataTable" style="min-width:100wh" id="data-tables" role="grid">
                                    <thead>
                                        <tr>
                                            <th>Periode</th>
                                            <th>Total Revenue</th>
                                            <th>Total Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>