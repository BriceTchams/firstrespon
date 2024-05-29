$(document).ready(function () {
    
    $('.ToggleBtn').click(function () { 
        // $(this).toggleClass('fa-solid fa-message')


        
        $('.bt').toggle()
        $('.sd').toggleClass('col-md-2 ')
        $('.sd').toggleClass('col-md-1 ')


        $('.sdBig').toggleClass('col-md-10')
        $('.sdBig').toggleClass(' col-sm-11')


        // centrage des elements de la side barre avec l'effet toggle 

        $('.bgSideItem').toggleClass('bgSide1')
        
        // $('.sd').toggleClass('')


    });

});


// caroussel

