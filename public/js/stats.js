window.onload = function () {
    var dataPoints = [];
    var chart1 = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        theme: "light1",
        animationEnabled: true,
        title:{
            text: "Nombre de vente par article"
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
            dataPoints: dataPoints, 
                    
                }] 
    });
    $.getJSON("http://monprojet.test/projetweb/stats_amountOfArticle", function (data) {  
	$.each(data, function(key, value){
		dataPoints.push({name: value[0], y: parseInt(value[1])});
	});	
	chart1.render();
});
    dataPoints2 = [];
    var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
	theme: "light2",
	title: {
		text: "Montant total des commandes par utilisateur"
	},
	axisY: {
		title: "Montant total",
		titleFontSize: 24
	},
	data: [{
        type: "column",
        toolTipContent: "{label}: <strong>{y}</strong>",
        indexLabel: "{label} - {y}",
		yValueFormatString: "#,### €",
		dataPoints: dataPoints2
	}]
});
                    $.getJSON("http://monprojet.test/projetweb/stats_orderByUser", function (data) { 
                    $.each(data, function(key, value){
                        dataPoints2.push({label: value[0], y: parseInt(value[1])});
                    });	
                
                
    chart2.render();
});
}
    
    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    
    }

    document.getElementById("chartContainer").style.display;
    document.getElementById("chartContainer2").style.display;