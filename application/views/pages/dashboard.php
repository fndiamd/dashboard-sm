<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <label for="reportType">Grafik Laporan</label>
                <select id="reportType" class="form-control">
                    <option value="bulan_ini">Target Bulan Ini</option>
                    <option value="bulan_lalu">Target Bulan Lalu</option>
                    <option value="bulan_sekarang">Target Bulan Sekarang</option>
                    <option value="deviasi_bulan">Deviasi Bulan</option>
                    <option value="deviasi_okr">Deviasi OKR</option>
                    <option value="persentase_okr">Persentase OKR</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="chartType">Chart Type</label>
                <select id="chartType" class="form-control">
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="radar">Radar</option>
                    <option value="pie">Pie</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="polarArea">Polar Area</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-chart">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title" id="grafikTitle">Target Bulan Ini</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="mainChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>