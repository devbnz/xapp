/**
* Created by Erik Woitschig on 3/9/15.
* http://www.sourcloud.com
*/

(function(){

  var xappControllers = angular.module('xappControllers', []);

  xappControllers.controller('HomeCtrl', ['$scope', '$routeParams', '$location',
  function($scope, $routeParams, $location) {

    $scope.project = {
      title: 'SourSound',
    };

    $scope.milestones = [
    {     id    :   1,
      body  : "project started",
      date  : "2015-03-07"
    },
    {     id    :   2,
      body  : "GET /users endpoint + subres finished",
      date  : "2015-03-09" },
      {     id    :   3,
        body  : "GET /tracks + /playlists + /groups + /comments finished",
        date  : "2015-03-13"
      },
      {     id    :   4,
        body  : "GET /users can now be used as API explorer - just fill in your SC username",
        date  : "2015-03-14"
      },
      { id    :   5,
        body  : "Project cleanup - renaming, removing old code - refactoring",
        date  : "2015-03-15"
      }
      ];



    }
    ]);

    xappControllers.controller('ContactsCtrl', ['$scope', '$routeParams', '$location', '$http',
    function($scope, $routeParams, $location, $http) {

      $scope.contacts = '';

      $http.get('/contacts').
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.contacts = response;
        console.log($scope.contacts);
      }, function(response) {
        console.log('error while fetching the contacts');
      });

      }
      ]);


      xappControllers.controller('SearchCtrl', ['$scope', '$routeParams', '$location', '$http',
      function($scope, $routeParams, $location, $http) {

        $scope.test = function() {

          keyword = $scope.user.name;

        //  var resolveId = 0;

          $http.get('/search/' + keyword).
          then(function(response) {
            // this callback will be called asynchronously
            // when the response is available
            $scope.searchResult = response;
            console.log($scope.searchResult);
          }, function(response) {
            console.log('error while fetching search responses');
          });
          };


        }
        ]);


})();
