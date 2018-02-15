$(document).ready(function () {
    url = window.location.href;
    if(url.substring(7,16)=="localhost"){
        var base_url = "http://localhost:8888/figurinhas/trocadores/";
    } else {
        var base_url = "http://indra.slicedpixel.com/copa2018/figurinhas/trocadores/";
    }

    /*$('.img-profile').on("error", function () {
        $(this).attr('src', '/assets/users/simpleuser.png');
    });*/

    $("#estados").on("change", function(){
        window.location.href = base_url + this.value;
    });
});