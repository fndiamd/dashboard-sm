$(document).ready(function () {
    const ctxMain = document.getElementById('mainChart')
    let title = "Target Bulan Ini";
    let typeChart = "bar";
    let dataChart = {
        labels: ['SBF', 'Tomo', 'Minimarket', 'Top 500', 'Top 600', 'Travel', 'Ekspedisi', 'H2H', 'Top 15 H2H'],
        datasets: [{
            data: [10, 20, 30, 40, 50, 60, 70, 80, 90],
            fill: true,
            backgroundColor: [
                'rgba(219, 48, 86, .6)',
                'rgba(15, 76, 117, .6)',
                'rgba(255, 204, 0, .6)',
                'rgba(145, 109, 213, .6)',
                'rgba(18, 202, 214, .6)',
                'rgba(2, 168, 168, .6)',
                'rgba(255, 115, 21, .6)',
                'rgba(0, 68, 69, .6)',
                'rgba(1, 0, 56, .6)'
            ]
        }],
    };

    let optionsChart = {
        scales: {
            yAxes: [{ ticks: { beginAtZero: true, display: true } }]
        },
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Target Bulan Ini'
        },
        onClick: function (evt) {
            var activePoints = mainChart.getElementAtEvent(evt);
            console.log(activePoints);
        }
    }

    $('#reportType').on('change', function () {
        const value = this.value
        switch (value) {
            case 'bulan_ini':
                title = "Target Bulan Ini";
                break;
            case 'bulan_lalu':
                title = "Target Bulan Lalu";
                break;
            case 'bulan_sekarang':
                title = "Target Bulan Ini (On Progress)"
                break;
            case 'deviasi_bulan':
                title = "Deviasi Bulan"
                break;
            case 'deviasi_okr':
                title = "Deviasi OKR"
                break;
            case 'persentase_okr':
                title = "Persentase OKR"
                break;
            default:
                title = "Undefined"
        }
        document.getElementById('grafikTitle').innerHTML = title
        mainChart.options.title.text = title;
        mainChart.update();
    });

    let mainChart = new Chart(ctxMain, {
        type: typeChart,
        data: dataChart,
        options: optionsChart
    })

    $('#chartType').on('change', function () {
        typeChart = this.value

        mainChart.destroy()
        mainChart = new Chart(ctxMain, {
            type: typeChart,
            data: dataChart,
            options: optionsChart
        })
        
        if (typeChart == 'pie' || typeChart == 'doughnut' || typeChart == 'polarArea') {
            mainChart.options.legend.display = true;
            mainChart.options.legend.position = 'right'
        }
        
        if (typeChart == 'line') {
            dataChart.datasets[0].fill = false
            dataChart.datasets[0].borderColor = 'black'
        }else{
            dataChart.datasets[0].fill = true
        }

        if(typeChart == 'radar'){
            dataChart.datasets[0].backgroundColor = 'blue'
        }

        mainChart.update();

    });


})
