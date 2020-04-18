window.onload = function () {
 
var dataPoints = 

    var chart = new CanvasJS.Chart("chartContainer", {
     exportEnabled: true,
     theme: "dark1",
     animationEnabled: true,
     title:{
        text: "Ventes par article"
     },
     legend:{
        cursor: "pointer",
        itemclick: explodePie
     },
     data: [{
         type: "pie",
         showInLegend: true,
         toolTipContent: "{name}: <strong>{y}</strong>",
         indexLabel: "{name} - {y}",
         dataPoints: 
                 
            }] 
    });
chart.render();
}

function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();
}