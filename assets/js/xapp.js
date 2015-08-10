/*
function getContacts(){

    $("#results").empty().load("views/contacts.html", function () {
  //    console.log("table added");
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
*/
/*
function displaySearch(){

  $("#results").empty().load("views/search.html", function () {
    console.log("search mask successfully added");
    $('#keywords').on('change', function() {
      var keyword= $(this).val() // get the current value of the input field.
      console.log(keyword);
      executeSearch(keyword);
    });
  });
}

function executeSearch(keyword){
  $.getJSON( "search/" + keyword, function( data ) {
    $('.searchResults').empty().append(searchTable);
    console.log(data);
    var items = '';
    $("#searchFab").append(data.users.total);
    $.each( data.users.items, function(key,val) {
    items += "<tr><!--<td>" + val.user.id + "</td>--><td>" + val.user.first_name + "</td><td>" + val.user.last_name + "</td><td>" + val.user.professional_experience.primary_company.name + "</td><<td>" + val.user.professional_experience.primary_company.title + "</td><</tr>";
    });
    $('#contacts > tbody:last-child').append(items);
  });
}
*/
