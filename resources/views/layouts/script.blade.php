 <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
 <!-- simplebar js -->
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
  <!-- sidebar-menu js -->
  <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
  <!-- loader scripts -->
  <script src="{{ asset('assets/js/jquery.loading-indicator.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/app-script.js') }}"></script>
  <!-- Chart js -->
  
  <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
  <!-- Easy Pie Chart JS -->
  <script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  
  <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
  
   
   <script>
   $(function() {
    "use strict";
	  
	
			
		// chart 1
	 
		  var ctx = document.getElementById('chart1').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["11 Jun", "12 Jun", "13 Jun", "14 Jun", "15 Jun", "16 Jun", "17 Jun"],
					datasets: [{
						label: 'Export',
						data: [10, 40, 20, 80, 40, 80, 40],
						backgroundColor: '#02ba5a',
						borderColor: "transparent",
						pointRadius :"0",
						lineTension :'0',
						borderWidth: 3
					}, {
						label: 'Import',
						data: [30, 60, 30, 85, 60, 100, 50],
						backgroundColor: "rgba(2, 186, 90, 0.52)",
						borderColor: "transparent",
						pointRadius :"0",
						lineTension :'0',
						borderWidth: 1
					}, {
						label: 'Total',
						data: [40, 80, 50, 95, 80, 110, 60],
						backgroundColor: "rgba(2, 186, 90, 0.32)",
						borderColor: "transparent",
						pointRadius :"0",
						lineTension :'0',
						borderWidth: 1
					}]
				},
			options: {
				maintainAspectRatio: false,
				legend: {
				  display: true,
				  labels: {
					fontColor: '#585757',  
					boxWidth:40
				  }
				},
				tooltips: {
				  displayColors:false
				},	
			  scales: {
				  xAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(0, 0, 0, 0.05)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#585757'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(0, 0, 0, 0.05)"
					},
				  }]
				 }

			 }
			}); 	
			
			/// Chart 2

			var ctx = document.getElementById("chart2").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["ICD1", "ICD2", "ICD3", "ICD4"],
					datasets: [{
						backgroundColor: [
							"#14abef",
							"#02ba5a",
							"#d13adf",
							"#fba540"
						],
						data: [5856, 2602, 1802, 1105],
						borderWidth: [0, 0, 0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: false,
				    labels: {
					  fontColor: '#ddd',  
					  boxWidth:15
				   }
				}
				,
				tooltips: {
				  displayColors:false
				}
			   }
			});
	
	  });	
   </script>
