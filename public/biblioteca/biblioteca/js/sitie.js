/**
 * @author Orestes Pérez Mena <omena@upr.edu.cu>
 * @version 1.0
 * @description Script for the sitie
 */


$(function() {

    $('#marquesina-carrusel').carousel({
        interval: 5000
    });
    $('#carousel-home').carousel({
        interval: 8000
    });
    $('#content-serv a').popover();
    $('.modal').on('loaded.bs.modal', function () {
        
        $('#menu-ri a').click(function(){
           $('.navbar-collapse').collapse('hide');
        });
//        $(this).scroll(function(){
//           if($('#sticky').scrollTop(-1)){
//              $('#sticky').addClass('stick');
//           }
//        });
    });
    
//    $('.accordion-toggle').click(function(){       
//       if(acordion_all_closed()){
//           $('#banner-back').hide('slow');
//           $('#banner').addClass('banner-reduce');
//       }
//       else{
//       if(!is_opened(this))
//           $('#banner-back').show('slow');
//           $('#banner').removeClass('banner-reduce');
//      }
//    });
});

/**
 * @author Orestes Pérez Mena <omena@upr.edu.cu>
 * @version 1.0 
 * @description if all elements of accordion is closed
 */
function acordion_all_closed(){
    var open=$('#accordion').children('.panel').children('div.in').length;    
    return open===0;
}

/**
 * @author Orestes Pérez Mena <omena@upr.edu.cu>
 * @version 1.0 
 * @description if this acordion is aopened
 * @return {boolean} 
 * @param {DOM Node} panel panel of acordion
 */
function is_opened(panel){
    var open=$(panel).siblings('div.in').length;    
    return open===0;
}

function Public(element)
{
    var parent_ts= $(element).parent().parent();
    $.ajax(
        {
            type: "POST",
            url: $(element).attr('url'),
            data: { },
            beforeSend: function(){
                   data='<img class="text-center" src="'+$(element).attr('loading_url')+'">';
                   $(parent_ts).html(data);
            },
            error: function(){
                alert('error...');
            },
            success: function(data)
            {
               $(parent_ts).html(data);
            },
            complete: function()
            {
				
	    }
        });
}
function PublicComentario(element)
{
    var parent_ts= $(element).parent().parent();
    $.ajax(
        {
            type: "POST",
            url: $(element).attr('url'),
            data: { },
            beforeSend: function(){
                data='<img class="text-center" src="'+$(element).attr('loading_url')+'">';
                $(parent_ts).html(data);
            },
            error: function(){
                alert('error...');
            },
            success: function(data)
            {
                $(parent_ts).html(data);
            },
            complete: function()
            {

            }
        });
}

function PublicComentarioRespuesta(element1)
{
    var parent_ts= $(element1).parent().parent();
    $.ajax(
        {
            type: "POST",
            url: $(element1).attr('url'),
            data: { },
            beforeSend: function(){
                data='<img class="text-center" src="'+$(element1).attr('loading_url')+'">';
                $(parent_ts).html(data);
            },
            error: function(){
                alert('error...');
            },
            success: function(data1)
            {
                $(parent_ts).html(data1);
            },
            complete: function()
            {

            }
        });
}

