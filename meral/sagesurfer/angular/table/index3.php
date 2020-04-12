
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="Description" content="angular html table sorting sortable pagination paging page ng-table angular-table bootstrap">

    <title>angular-table : sortable tables with pagination for angularjs</title>

    <script type="text/javascript" src="./js/angular.js"></script>
    <script type="text/javascript" src="./js/angular-table.min.js"></script>
    <script type="text/javascript" src="./js/angular-tabs.min.js"></script>
    <script type="text/javascript" src="./js/examplesModule.js"></script>

    <link rel="stylesheet" type="text/css" href="./css/syntax.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

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
  

      <div class="main-container" ng-app="angular-table-example" ng-controller="example-ctrl">
        <div class="container">
  <h1>Therapist's on duty</h1>
  <br>
  <angular-tabs id="mainTabs" active-tab="Interactive Example">
   
    <div tab-title="Interactive Example"><br>
     
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
