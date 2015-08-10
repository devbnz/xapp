var Xapp = angular.module('Xapp', [
'ngRoute',
'xappControllers'
]);

Xapp.config(['$routeProvider',
function($routeProvider) {
  $routeProvider.
  when('/home', {
    templateUrl: 'templates/start.html',
    controller: 'HomeCtrl'
  }).
otherwise({
  redirectTo: '/home'
});
}]);
