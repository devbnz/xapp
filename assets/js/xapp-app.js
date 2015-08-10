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
  when('/contacts', {
    templateUrl: 'templates/contacts.html',
    controller: 'ContactsCtrl'
  }).
  when('/search', {
    templateUrl: 'templates/search.html',
    controller: 'SearchCtrl'
  }).
otherwise({
  redirectTo: '/home'
});
}]);
