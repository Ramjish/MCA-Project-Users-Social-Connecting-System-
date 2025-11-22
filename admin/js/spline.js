window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Spline Chart with Marker Customization"
				},
				
				data: [{
					type: "spline",
					markerSize: 10,
					dataPoints: [
					  { x: "total connectors", y: a },
					  { x: "male connectors", y: b, markerType: "triangle" },
					  // { x: "female connectors", y: c },
					  // { x: "total post", y: d, markerColor: "red" },
					  // { x: "total likes", y: e },
					  // { x: "total unlikes", y: f },
					  // { x: "total comments", y: g },
					  
					]
				}]
			});
			chart.render();
		}