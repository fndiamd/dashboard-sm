$(document).ready(function () {
    if ($('#mainChart').length) {
        const ctxMain = document.getElementById('mainChart')
        let title = "Target Bulan Ini";
        let typeChart = "bar";
        let dataChart = {
            labels: ['SBF', 'Tomo', 'Minimarket', 'Top 500', 'Top 600', 'Travel', 'Ekspedisi', 'H2H', 'Top 15 H2H'],
            datasets: [{
                data: [
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,  
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                    Math.floor(Math.random() * 200) + 10,
                ],
                fill: true,
                backgroundColor: [
                    'rgba(242, 232, 24, .6)',
                    'rgba(246, 183, 54,  .6)',
                    'rgba(7, 218, 24,  .6)',
                    'rgba(25, 123, 84, .6)',
                    'rgba(156, 222, 246, .6)',
                    'rgba(58, 135, 242, .6)',
                    'rgba(121, 103, 215, .6)',
                    'rgba(160, 69, 165, .6)',
                    'rgba(220, 58, 64, .6)'
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
                dataChart.datasets[0].borderColor = 'grey'
                dataChart.datasets[0].pointRadius = 5
                dataChart.datasets[0].borderWidth = 2
                dataChart.datasets[0].pointBorderColor = [
                    'rgba(242, 232, 24, 1)',
                    'rgba(246, 183, 54,  1)',
                    'rgba(7, 218, 24,  1)',
                    'rgba(25, 123, 84, 1)',
                    'rgba(156, 222, 246, 1)',
                    'rgba(58, 135, 242, 1)',
                    'rgba(121, 103, 215, 1)',
                    'rgba(160, 69, 165, 1)',
                    'rgba(220, 58, 64, 1)',
                ]
            } else {
                dataChart.datasets[0].fill = true
                dataChart.datasets[0].borderColor = false
            }

            mainChart.update();
        });
    }

})
