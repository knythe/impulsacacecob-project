document.addEventListener("DOMContentLoaded", function() {
    // Gráfico de área (ventas por mes)
    var areaChartDataElement = document.getElementById('area-chart-data');
    var areaLabels = JSON.parse(areaChartDataElement.getAttribute('data-labels'));
    var areaData = JSON.parse(areaChartDataElement.getAttribute('data-data'));

    var ctxArea = document.getElementById("myAreaChart").getContext('2d');
    var myAreaChart = new Chart(ctxArea, {
        type: 'line',
        data: {
            labels: areaLabels,
            datasets: [{
                label: 'Total Ventas',
                data: areaData,
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: 'rgba(78, 115, 223, 1)',
                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'category',
                    ticks: {
                        maxTicksLimit: 12
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        maxTicksLimit: 5
                    }
                }
            }
        }
    });

    // Gráfico de pastel (ventas por estado)
    var pieChartDataElement = document.getElementById('pie-chart-data');
    var pieLabels = JSON.parse(pieChartDataElement.getAttribute('data-labels'));
    var pieData = JSON.parse(pieChartDataElement.getAttribute('data-data'));

    var ctxPie = document.getElementById("myPieChart").getContext('2d');
    var myPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieData,
                backgroundColor: ['#FFD700', '#008000', '#8B0000', '#87CEEB'],
                hoverBackgroundColor: ['#FFFF00', '#00FF00', '#FF0000', '#00FFFF'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
});
