<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="Description" content="angular html table sorting sortable pagination paging page ng-table angular-table bootstrap">

    <title>SS HealthCare : Therapist</title>

    <script type="text/javascript" src="./js/angular.js"></script>
    <script type="text/javascript" src="./js/angular-table.min.js"></script>
    <script type="text/javascript" src="./js/angular-tabs.min.js"></script>
    <script type="text/javascript" >
	angular.module("angular-table-example", ["angular-table", "angular-tabs"]);


	angular.module("angular-table-example")
	.controller("example-ctrl", ["$scope", "$filter", function($scope, $filter) {

		$scope.personList = [
		  {
			index: 1,
			name: "Kristin Hill",
			email: "kristin@hill.com"
		  },
		  {
			index: 2,
			name: "Valerie Francis",
			email: "valerie@francis.com"
		  },
		  {
			index: 3,
			name: "Bob Abbott",
			email: "bob@abbott.com"
		  },
		  {
			index: 4,
			name: "Greg Boyd",
			email: "greg@boyd.com"
		  },
		  {
			index: 5,
			name: "Peggy Massey",
			email: "peggy@massey.com"
		  },
		  {
			index: 6,
			name: "Janet Bolton",
			email: "janet@bolton.com"
		  },
		  {
			index: 7,
			name: "Maria Liu",
			email: "maria@liu.com"
		  },
		  {
			index: 8,
			name: "Anne Warren",
			email: "anne@warren.com"
		  },
		  {
			index: 9,
			name: "Keith Steele",
			email: "keith@steele.com"
		  },
		  {
			index: 10,
			name: "Jerome Lyons",
			email: "jerome@lyons.com"
		  },
		  {
			index: 11,
			name: "Jacob Stone",
			email: "jacob@stone.com"
		  },
		  {
			index: 12,
			name: "Marion Dunlap",
			email: "marion@dunlap.com"
		  },
		  {
			index: 13,
			name: "Stacy Robinson",
			email: "stacy@robinson.com"
		  },
		  {
			index: 14,
			name: "Luis Chappell",
			email: "luis@chappell.com"
		  },
		  {
			index: 15,
			name: "Kimberly Horne",
			email: "kimberly@horne.com"
		  },
		  {
			index: 16,
			name: "Andy Smith",
			email: "andy@smith.com"
		  }
		]
	}
	]);
	</script>

    <link rel="stylesheet" type="text/css" href="./css/syntax.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
    <style>
      .main-container {
        margin: 30px;
        /*margin: auto;*/
        /*margin-top: 60px;*/
        /*margin: 20px 0px 20px 0px;*/
      }

      .redBg {
        background-color: red;
      }

      .custom-table-style {
        width: 100%;
      }

      .custom-table-style td, .custom-table-style th {
        color: white;
        background-color: black;

        border: solid;
        border-color: red;

        text-align: center;
      }

    </style>


  </head>
   
<body>
<div id="wrapper">
  <div id="header">
    <h1>DogCare</h1>
    <div id="nav-top">
      <ul>
        <li id="tab-faq">
          <div><a href="#">faq</a></div>
        </li>
        <li id="tab-map">
          <div><a href="#">site maps</a></div>
        </li>
      </ul>
    </div>
    <div id="nav">
      <ul>
        <li class="home"><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">History</a></li>
        <li><a href="#">Our Cost</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Training Tips</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div id="content" >
		<div class="main-container" ng-app="angular-table-example" ng-controller="example-ctrl">
        <div class="container">
  <h1>Therapist's on duty</h1>
  <br>
  <angular-tabs id="mainTabs" active-tab="Active on call">
   
    <div tab-title="Active on call"><br>
     
        <div tab-title="Result">
          <div class="row"ng-controller="doctorCtrl">
            <div class="col-md-7">
              <table class="table table-striped" at-table at-paginated at-list="filteredList" at-config="config">
  <thead></thead>
  <tbody>
    <tr>
      <td at-implicit at-attribute="name" width="250"></td>
    </tr>
  </tbody>
</table>

<at-pagination at-list="filteredList" at-config="config"></at-pagination>
            </div>
            <div class="col-md-5">
              <h4>Add</h4>
<div class="input-group col-lg-6">
  <input type="text" class="form-control" ng-model="nameToAdd">
  <span class="input-group-btn">
    <button class="btn btn-default btn-success" type="button" ng-click="add()">Add</button>
  </span>
</div>

<h4>Filter</h4>
<input type="text" class="form-control" ng-model="query" ng-change="updateFilteredList()">


            </div>
          </div>
        </div>
     
    </div>

    </div>
  </angular-tabs>
</div>
      </div>
  </div>
  <div class="clear" id="footc"> </div>
  <div id="footer"> Copyright statement goes here. All rights reserved</a></div>
</div>

</body>
<script type="text/javascript">
      angular.module("angular-table-example").controller("doctorCtrl", ["$scope", "$filter", function($scope, $filter) {
  $scope.originalList = $scope.$parent.personList;

  $scope.filteredList = $scope.originalList;

  $scope.config = {
    itemsPerPage: 5,
    maxPages: 5,
    fillLastPage: "yes"
  };

  $scope.add = function() {
    $scope.originalList.push({name: $scope.nameToAdd});
    $scope.updateFilteredList();
  }

  $scope.updateFilteredList = function() {
    $scope.filteredList = $filter("filter")($scope.originalList, $scope.query);
  };
}])
       </script>
</html>
