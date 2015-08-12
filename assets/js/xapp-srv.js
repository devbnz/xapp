/**
* xappsrv
* AngularJS Service for Xapp
*
* Created by Erik Woitschig on 03/07/15.
* http://twitter.com/devbnz

*/

(function(){


  var xappsrv = angular.module('xappSrv', []);

  xappsrv.service("xappSrv",
  function( $http, $q) {
    var baseUrl = 'http://xapp.bnz-power.com';
    return({
      getUserByKeyword  : getUserByKeyword
    });


    function getUserByKeyword(keyword, offset) {

      var request = $http({
        method: "get",
        url: baseUrl + "/offsearch/" + keyword + "/" + offset 
      });

      return( request.then( handleSuccess, handleError ) );

    }


    function handleError( response ) {

      // The API response from the server should be returned in a
      // nomralized format. However, if the request was not handled by the
      // server (or what not handles properly - ex. server error), then we
      // may have to normalize it on our end, as best we can.
      if (
        ! angular.isObject( response.data ) ||
        ! response.data.message
      ) {

        return( $q.reject( "An unknown error occurred." ) );

      }

      // Otherwise, use expected error message.
      return( $q.reject( response.data.message ) );

    }

    function handleSuccess( response ) {

      return( response.data );

    }

  }
);


})();
