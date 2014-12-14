google.load("visualization", "1", {packages:["corechart", "controls"]});
var vlacs_guardian_survey_piedata = null;
function vlacs_guardian_survey_draw_chart(Y, ids, barData, pieData, lineData) {
    var barOptions = {
        chart: {
            title: '',
            subtitle: '',
        },
        vAxis: {title: '',  titleTextStyle: {color: 'red'}},
        hAxis: {
            title: ''
        },
        bars: 'vertical'
    };

    var lineChartOptions = {
        title: 'Teacher performance',
        //curveType: 'None',
        curveType: 'function',
        hAxis: {
            title: 'Date'
        },
        vAxis: {
            title: 'Score'
        },
        legend: { position: 'bottom' }
    };

    var pieChartOptions = {
        title: '',
        //pieHole: 0.4,
        is3D: true
    };

    for (i in ids) {
        var pieid = 'piechart_'+ids[i];
        function drawPie(ev, type) {
            var index = 5;
            var pieChartId = 'piechart_' + index;
            var dashboard = new google.visualization.Dashboard(document.getElementById('surveyanswers_' + index)); 
            var rangeSlider = new google.visualization.ControlWrapper({
                'controlType': 'NumberRangeFilter',
                'containerId': 'filter_' + index,
                'options': {
                    'filterColumnLabel': 'Responses'
                }
            });
            // Create a pie chart, passing some options
            var pieChart = new google.visualization.ChartWrapper({
                'chartType': 'PieChart',
                'containerId': pieChartId,
                'options': pieChartOptions
            });
            dashboard.bind(rangeSlider, pieChart);
            dashboard.draw(google.visualization.arrayToDataTable(vlacs_guardian_survey_piedata[type]));
        }
        if (Y.one('#' + pieid)) {
            vlacs_guardian_survey_piedata = pieData[i];
            Y.one('#piesw_vlacs').on('click', function(ev){
                drawPie(ev, 'v');
            });
            Y.one('#piesw_course').on('click', function(ev){
                drawPie(ev, 'c');
            });
            Y.one('#piesw_teacher').on('click', function(ev){
                drawPie(ev, 't');
            });
            drawPie(null, 'v');
        }

        var barid ='barchart_'+ids[i];
        if (Y.one('#' + barid)) {
            var barchart = new google.visualization.ColumnChart(document.getElementById(barid));
            var barDataTable = google.visualization.arrayToDataTable(barData[i]);
            var barView = new google.visualization.DataView(barDataTable);
            var proc = function (col) {
                return {
                    calc:function(dataTable, row) {
                        var percent = dataTable.getValue(row, col);
                        var count = dataTable.getValue(row, col + 3);
                        return {v: percent, f: (percent).toFixed(2) + '%' + " Count: " + count};
                    },
                    type:'number',
                    label:barDataTable.getColumnLabel(col)
                }
            }
            barView.setColumns([0, proc(1), proc(2), proc(3)]);
            barchart.draw(barView, barOptions);
        }

        var linechart = new google.visualization.LineChart(document.getElementById('linechart_'+ids[i]));

        // build data for line chart
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('date', 'Week of the year');
        dataTable.addColumn('number', 'Score');
        for (row in lineData[i]) {
            dataTable.addRow([new Date(row*1000), lineData[i][row]]);
        }
        var dataView = new google.visualization.DataView(dataTable);
        dataView.setColumns([
                        {
                            calc: function(data, row) { return data.getFormattedValue(row, 0); },
                        type:'string'
                        },
                        1
                    ]);
        linechart.draw(dataView, lineChartOptions);
    }

}
