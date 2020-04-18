<script>
window.onload = function () {
 
    var chart1 = new CanvasJS.Chart("chartContainer", {
     exportEnabled: true,
     theme: "light1",
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
         dataPoints: <?php echo json_encode($dataPoints, 
                        JSON_NUMERIC_CHECK); ?> 
                 
            }]
    });
chart1.render();

// ----- tableau 2 ------

var chart2 = new CanvasJS.Chart("chartContainer2", {
     exportEnabled: true,
     theme: "light1",
     animationEnabled: true,
     title:{
        text: "Chiffre d'affaire par utilisateur"
     },
     legend:{
        cursor: "pointer",
        itemclick: explodePie
     },
     data: [{
         type: "pie",
         showInLegend: true,
         toolTipContent: "{name}: <strong>{y}</strong>",
         indexLabel: "{name} - {y} €",
         dataPoints: <?php echo json_encode($dataPoints2, 
                        JSON_NUMERIC_CHECK); ?> 
                 
            }] 
    });
chart2.render();
}

function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();
}
</script>

