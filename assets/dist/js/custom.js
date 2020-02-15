
$(document).ready(function () {
    const url = window.location.pathname
    const page = url.substr(17)
    let dataTable;

    function generateDataTable(url) {
        dataTable = $('#data-tables').DataTable({
            "bAutoWidth": false,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "ajax": {
                url: url,
                type: "GET"
            },
            "columnDefs": [
                { "className": "dt-center", "targets": -1 }
            ]
        });
    }

    switch (page) {
        case 'target-bulanan':
            generateDataTable('TargetBulanan/load');
            break;
    }

    $('#kategori_outlet').on('change', function () {
        document.getElementById('outlet_span').innerHTML = this.value.split('|')[1];
        console.log(this.value.split('|')[1].toLowerCase());
        $.ajax({
            url: 'TargetBulanan/load',
            method: 'post',
            data: {
                outlet: this.value.split('|')[1].toLowerCase()
            },
            success: function (data) {
                //console.log(dataTable)
                dataTable.clear().draw()
                dataTable.rows.add(jQuery.parseJSON(data).data).draw()
            }
        })
    })
})