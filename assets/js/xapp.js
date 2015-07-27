$(function() {
    $( "#contacts" ).click(function() {
      //alert( "Handler for .click() called." );
      getContacts();
    });
});


function getContacts(){

    $("#results").empty().load("views/contacts.html", function () {
      console.log("table added");
      $.getJSON( "contacts", function( data ) {
        console.log(data);
        var items = '';
        $.each( data, function( key, val ) {
          items += "<tr><td><img src='" +val.photoURL +"' /></td><td>" + val.displayName + "</td><td>" + val.profileURL + " | "+ val.email + "</td></tr>";
        }        );
        console.log(items);
        $('#contacts > tbody:last-child').append(items);
      });
    });
}
