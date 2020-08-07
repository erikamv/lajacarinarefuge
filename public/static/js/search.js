// After the API loads, call a function to enable the search box.
function handleAPILoaded() {
    $('#search-button').attr('disabled', false);
  }  
  // Search for a specified string.
  function search() {
    var q = $('#query').val();
    var request = gapi.client.youtube.search.list({
      q: q,
      part: 'snippet'
    });
  
    request.execute(function(response) {
      var urlVideo;
      var html;
      for (var k in response.items) {
        var tituloVideo=response.items[k]["snippet"].title;
        urlVideo="https://www.youtube.com/embed/" + response.items[k]["id"].videoId;
        var fechaVideo=response.items[k]["snippet"].publishedAt;
        console.log(urlVideo);
        html+='<br><iframe class="embed-responsive-item" src="'+urlVideo+'" allowfullscreen></iframe><br>'
        $('#search-container').html(html);
      }
    });
     
  }