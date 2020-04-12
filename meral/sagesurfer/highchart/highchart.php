

	<!--page specific plugin styles-->		
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="//code.highcharts.com/highcharts.js"></script>
	




<div id="container-01" style="width: 50%; height: 350px; font-size: 11px;" class="pull-left"></div>
	







<script>

$( document ).ready(function() {

	$('#container-01').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });

});


</script>
