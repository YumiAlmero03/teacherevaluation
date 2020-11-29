
var q = $('li.blog-post');
q.each(function() {
  var e = $(this),
    indexnumber = Math.random(),
    domain = 'http://bloggerever.com',
    f = e.attr('data-label'),
    g = domain + '/feeds/posts/summary/-/' + f + '?max-results=4&alt=json-in-script';
  e.append('<div class="nav-item"></div>');
  $.ajax({
    type: 'GET',
    url: g,
    async: false,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(json) {
      for (var i = 0; i < json.feed.entry.length; i++) {
        var h = json.feed.entry[i];
        for (var j = 0; j < h.link.length; j++) {
          if (h.link[j].rel == 'alternate') {
            var l = h.link[j].href;
            break;
          }
        }
        try {
          var k = h.media$thumbnail.url.replace("s72-c", "s250-no");
        } catch (m) {
          var k= 'https://lh4.googleusercontent.com/-sEsEVEIbC_A/VC75LXVY_9I/AAAAAAAAFjw/3IMVKlywmmE/s500/No%2520image.jpg';
        }
        var z = h.title.$t;
        var nnitem = "<div class='item'><img src='"+k+"'/><h3><a href='"+l+"'>"+z+"</a></h3></div>";
        e.find('.nav-item').append(nnitem);
      }
    }
  });
});