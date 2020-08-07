function buscador(){
    var query=$('#query').val();
    var APIkey='5aecb144012c46d3620347ed06c3c7cd';
    var url='http://api.serpstack.com/search?access_key='+APIkey+'&type=web&query='+query;
    var html;
    $.get(url,function(data){
        data.organic_results.slice(0,5).forEach(res => {
            html+='<h5>'+res.title+'</h5><a href="'+res.url+'">'+res.url+'</a><br><p>'+res.snippet+'</p>';
            $('#noticias').html(html);
        });
    })
}