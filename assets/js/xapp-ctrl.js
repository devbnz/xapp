/**
* Created by Erik Woitschig on 3/9/15.
* http://www.sourcloud.com
*/

(function(){

  var xappControllers = angular.module('xappControllers', []);

  // example user
  xappControllers.value('user', {
    name: 'bnzlovesyou',
    firstname: '',
    url: 'http://soundcloud.com/bnzlovesyou',
    id: 1672444,
    trackid: 13158665,
    playlistid: 751573,
    groupid: 28743,
    commentid: 211972068,
    genre: 'house'
  });

  xappControllers.controller('HomeCtrl', ['$scope', '$routeParams', '$location', 'user',
  function($scope, $routeParams, $location, user) {

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

})();
