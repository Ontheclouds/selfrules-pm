$(document).ready(function() {


// Support for AJAX loaded modal window.
// Focuses on first input textbox after it loads the window.
$('[data-toggle="modal"]').bind('click',function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  if (url.indexOf('#') == 0) {
    $('#response_modal').modal('open');
  } else {
    $.get(url, function(data) { 
                        $('#response_modal').modal();
                        $('#response_modal').html(data);
    }).success(function() { $('input:text:visible:first').focus(); });
  }
});
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
//Ajax loaded content
$(document).on("click", '.ajax', function (e) {
  e.preventDefault();
  $(".message-sidebar ul.messages li").removeClass('active');
  $(this).parent().addClass('active');
  $('#ajax_content').fadeOut('fast', function () { $(".loader").show(); });
  
  //$("html, body").animate({ scrollTop: 0 }, 600);
  var url = $(this).attr('href');
  if (url.indexOf('#') == 0) {
    
  } else {
    $.get(url, function(data) { 
                        $('#ajax_content').html(data);
                        $(".message_content:gt(1)").hide();
                        $(".loader").hide();
                        $('#ajax_content').fadeIn('fast');
    }).success(function() { $(".message_content:gt(1)").fadeIn('slow'); });
  }
}); 

//Ajax background load
  $(document).on("click", '.ajax-silent', function (e) {
  e.preventDefault();
  var url = $(this).attr('href');
  
    $.get(url, function(data) { 
                        
    }).success(function() { $('#message-trigger').click(); });
  
}); 

//Project Notes
$(document).on("click", '.ajax-silent #send', function (e) {
$('#changed').fadeOut('slow');
  
}); 
$('#note').bind('input propertychange', function() {
$('#changed').fadeIn('slow');
}); 

//Ajax reply form submit
  $(document).on("click", '.ajaxform #send', function (e) {
    var url = $(this).closest('form').attr('action'); 
    $(".icon-loader-black").show();
    $.ajax({
           type: "POST",
           url: url,
           data: $(this).closest('form').serialize(),
           success: function(data)
           {
               $('ul.messages li.active a').click();
               $(".resetvalue").val('');
               $(".icon-loader-black").fadeOut('fast');
           }
         });

    return false;
});

$('.to_modal').click(function(e) {
    e.preventDefault();
    var href = $(e.target).attr('href');
    if (href.indexOf('#') == 0) {
        $(href).modal('open');
    } else {
        $.get(href, function(data) {
            $('<div class="modal fade" >' + data + '</div>').modal();
        });
    }
});

$(document).on("click", '.btn-loader', function (e) {
  $(this).html('<i class="icon-loader"></i>');
});
// message list ajax
$(document).on("click", '.message-list', function (e) {
  e.preventDefault();
  $(".message-sidebar ul.messages li").removeClass('active');
  $(this).parent().addClass('active');
  $('#message-list li').fadeOut('fast');
  //$("html, body").animate({ scrollTop: 0 }, 600);
  var url = $(this).attr('href');
  if (url.indexOf('#') == 0) {
    
  } else {
    $.get(url, function(data) { 
                        $('#message-list').html(data);
                        $('#message-list li').hide();
                        $('#message-list li').fadeIn('slow');
    }).success(function() {  $('ul.messages li a').first().click();  });
  }
});  
$('#message-trigger').click();


//message reply

$(document).on("click", '#reply', function (e) {
 
 $("#reply").animate({'height': '240px'}, {queue: false, complete: function(){ 
    $('#reply').wysihtml5({"size": 'small'});
    $('.reply #send').fadeIn('slow');

    } });


}); 



//Clickable rows
	$(document).on("click", 'table#projects td, table#clients td, table#invoices td, table#cprojects td, table#cinvoices td, table#quotations td, table#messages td, table#cmessages td, table#subscriptions td, table#csubscriptions td, table#tickets td, table#ctickets td', function (e) {
	    var id = $(this).parent().attr("id");
	    if(id){
	   		var site = $(this).closest('table').attr("rel")+$(this).closest('table').attr("id");
	    	if(!$(this).hasClass('option')){window.location = site+"/view/"+id;}
	    } 
  	});
      $(document).on("click", 'table#media td', function (e) {
	    var id = $(this).parent().attr("id");
	    if(id){
	    	var site = $(this).closest('table').attr("rel");
	    	if(!$(this).hasClass('option')){window.location = site+"/view/"+id;}
	    }
    });
      $(document).on("click", 'table#custom_quotations_requests td', function (e) {
      var id = $(this).parent().attr("id");
      if(id){
        var site = $(this).closest('table').attr("rel");
        if(!$(this).hasClass('option')){window.location = "quotations/cview/"+id;}
      }
    });
      $(document).on("click", 'table#quotation_form td', function (e) {
      var id = $(this).parent().attr("id");
      if(id){
        var site = $(this).closest('table').attr("rel");
        if(!$(this).hasClass('option')){window.location = "formbuilder/"+id;}
      }
    });


//Validation
	$("form").validate({
    submitHandler: function(form) {
      form.submit();
    } 
    });

//Mobile Menu
  $('#openmenu').click(function(e){
    $('#menu').toggleClass('hidden-phone hidden-tablet');
  }); 

//Tooltip
  $('.tt').tooltip();

// Nav Tabs
$('.nav-tabs').button();
//$('.nav-tabs .active').button('toggle');

//Popover
  $('.po').popover({ html : true });
  $(document).on("click", '.po-delete', function (e) { $('.po').popover('hide'); $('tr#'+$('input.id').val()).remove(); });
  $(document).on("click", '.po-close', function (e) {$('.po').popover('hide'); });

//Notification
  $('.notification').animate({'bottom' : '10px'}, 500).delay('4000').animate({'margin-bottom' : '-300px'}, 1500);

// WYSIWYG
  $('.wysiwyg').wysihtml5({"size": 'small'});

//add class to last ui li
  $("ul.todo li:last-child, ul.user-list li:last-child").addClass("last-item"); 

//Custom Selectmenu
  $("select").select2();

//Task Check
  $('.task-check').click(function(e){
    $(this).parent().toggleClass("done");
  }); 

//details no bottom border on last li
$('ul.details > li:last-child').css('border-bottom','0px');

//file upload
  $('#fileselectbutton').click(function(e){
    $("#file").trigger('click');
  });
 $('#file').change(function(e){
  var val = $(this).val(); 
  var file = val.split(/[\\/]/);
  $('#filename').val(file[file.length-1]);
 });

 $('#fileselectbutton2').click(function(e){
    $("#file2").trigger('click');
  });
 $('#file2').change(function(e){
  var val = $(this).val(); 
  var file = val.split(/[\\/]/);
  $('#filename2').val(file[file.length-1]);
 });

//submenu slider
/*$("ul.nav li.dropdown").hover(function() {
          
        //Following events are applied to the subnav itself (moving subnav up and down)  
        $("ul.dropdown-custom").slideDown('fast').show(); //Drop down the subnav on click  
  
        $(this).parent().hover(function() {  
        }, function(){    
            $(this).parent().find("ul.dropdown-custom").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
        });  
  
        //Following events are applied to the trigger (Hover events for the trigger)  
        }).hover(function() {   
            $(this).addClass("subhover"); //On hover over, add class "subhover"  
        }, function(){  //On Hover Out  
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    });  
*/

 $('.backlink').click(function(){
        parent.history.back();
        return false;
 });


});