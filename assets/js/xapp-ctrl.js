/**
* Created by Erik Woitschig on 3/9/15.
* http://www.sourcloud.com
*/

(function(){

  var xappControllers = angular.module('xappControllers', []);

  xappControllers.controller('HomeCtrl', ['$scope', '$routeParams', '$location',
  function($scope, $routeParams, $location) {

    console.log('hello world');

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

        xappControllers.controller('OffSearchCtrl', ['$scope', '$routeParams', '$location', '$http', 'xappSrv',
        function($scope, $routeParams, $location, $http, xappSrv) {

          /*
          var keyword = 'havas media';
          var offset = 100;
          */

          $scope.test = function() {

            keyword = $scope.user.name;
            offset  = $scope.user.offset;


            //  var resolveId = 0;

            xappSrv.getUserByKeyword(keyword, offset)
            .then(
              function( response ) {
                $scope.searchResult = response;
                console.log($scope.searchResult);
              }
            );
          };


        }
        ]);


})();
