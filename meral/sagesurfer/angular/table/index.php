<?php


$x[] = array("index"=>1,"name"=>"meral","email"=>"himeral@gmail.com");
$x[] = array("index"=>2,"name"=>"ankit","email"=>"ankit@gmail.com");


foreach($x as $x1)
	$y[] = $x1;



//echo $z;



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="Description" content="angular html table sorting sortable pagination paging page ng-table angular-table bootstrap">

    <title>Sage Surfer HealthCare : Doctor </title>

    <script type="text/javascript" src="./js/angular.js"></script>
    <script type="text/javascript" src="./js/angular-table.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

  </head>
    <body>
   

      <div class="main-container" ng-app="angular-table-example" ng-controller="example-ctrl">
  
     
       
         <div class="row" ng-controller="basicExampleCtrl">
			<div class="col-md-12">
             <table class="table table-striped" at-table at-paginated at-list="list" at-config="config">
			  <thead></thead>
			  <tbody>
				<tr>
				  <td at-implicit at-sortable at-attribute="index" width="150" at-initial-sorting="asc"></td>
				  <td at-implicit at-sortable at-attribute="name"  width="250"></td>
				  <td at-implicit at-sortable at-attribute="email"></td>
				</tr>
			  </tbody>
			</table>

			<at-pagination at-list="list" at-config="config"></at-pagination>

			</div>
         </div>
     

      </div>
    </body>

    <script type="text/javascript">
	
	
	var datascope = <?= json_encode($y); ?>;
	
	//angular.module("angular-table-example", ["angular-table"]);


	angular.module("angular-table-example", ["angular-table"]).controller("example-ctrl", ["$scope", "$filter", function($scope, $filter) {

		
	}
	]);
    
	angular.module("angular-table-example").controller("basicExampleCtrl", ["$scope", function($scope,$http) {
	   $scope.list = datascope
	   $scope.config = {
		itemsPerPage: 10,
		fillLastPage: true
	  }
	}]);
    </script>
</html>
