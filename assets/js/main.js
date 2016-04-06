$(document).ready(function(){


    document.onkeydown = checkKey;

    var owl = $(".slider-top");
    owl.owlCarousel({
        items : 1,
        singleItem:true,
        transitionStyle : "fade"
    });
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })


    // Func Tombol Slider
    function checkKey(e) {

        e = e || window.event;

        if (e.keyCode == '37') {
           owl.trigger('owl.prev');
        }
        else if (e.keyCode == '39') {
           owl.trigger('owl.next');
        }

    }



});
