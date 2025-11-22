		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Sky-Connector Column Chart"
				},
				exportFileName: "CanvasJS Chart",
				exportEnabled: true,
				axisX: {
					interval: 1
				},
				dataPointWidth: 60,
				data: [{
					type: "column",
					indexLabelLineThickness: 1,

					dataPoints: [
						{ y: a, label: "total Connectors" },
						{ y: b, label: "Male Connectors" },
						{ y: c, label: "Female connectors" },
						{ y: d, label: "Total post" },
						{ y: e, label: "Total like" },
						{ y: f, label: "Total unlike" },
						{ y: g, label: "Total comments" },

						
					]
				}]
			});
			chart.render();
		}
