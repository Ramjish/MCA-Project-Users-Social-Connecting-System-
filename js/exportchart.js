window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "SKY-CONNECT"
				},
				exportFileName: "CanvasJS Chart",
				exportEnabled: true,
				animationEnabled: true,
				legend: {
					verticalAlign: "bottom",
					horizontalAlign: "center"
				},
				data: [
				{
					type: "pie",
					showInLegend: true,
					toolTipContent: "{legendText}: <strong>{y}%</strong>",
					indexLabel: "{label} {y}%",
					dataPoints: [
						{ y: a, legendText: "total post", exploded: true, label: "post" },
						{ y: b, legendText: "total friends", label: "Friends" },
						{ y: c, legendText: "total likes", label: "likes" },
						{ y: d, legendText: "total unlikes", label: "unlike" },
						{ y: e, legendText: "total comments", label: "comments" },
						{ y: f, legendText: "total messages", label: "messages" }

						
					]
				}
				]
			});
			chart.render();
		}