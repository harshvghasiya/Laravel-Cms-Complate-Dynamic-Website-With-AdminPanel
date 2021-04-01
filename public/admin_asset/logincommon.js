$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('form.FromSubmit').submit(function (event) {


    var formId = $(this).attr('id');

   
    if ($('#'+formId).valid()) {
       
        var formAction = $(this).attr('action');
        var buttonText = $('#'+formId+' button[type="submit"]').text();
        var $btn = $('#'+formId+' button[type="submit"]').attr('disabled','disabled').html("Loading...");
        
        var redirectURL = $(this).attr("redirect_url");
        
        $.ajax({
            type: "POST",
            url: formAction,
            data: new FormData(this),
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.status == 1 && response.msg !="") {
                  
                    $('#'+formId+' button[type="submit"]').text(buttonText);
                    $('#'+formId+' button[type="submit"]').removeAttr('disabled','disabled');
                  if (redirectURL != null) {
                    window.location=redirectURL;
                    }
                }
            },
            error: function (jqXhr) {

                var errors = $.parseJSON(jqXhr.responseText);
                showErrorMessages(formId, errors);
                $('#'+formId+' button[type="submit"]').text(buttonText);
                $('#'+formId+' button[type="submit"]').removeAttr('disabled','disabled');
            }
        });

        return false;

    }else{
    

        return false;
    }
   
});
function showErrorMessages(formId, errorResponse) {
    var msgs = "";
 
    $.each(errorResponse.errors, function(key, value) {
      
        msgs += value + " <br>";
    });
    flashMessage('danger', msgs,formId);
}
 function flashMessage($type,messages,formId) {
        /* https://github.com/ifightcrime/bootstrap-growl */
(function(e){e.bootstrapGrowl=function(t,n){var n=e.extend({},e.bootstrapGrowl.default_options,n),r=e("<div>");r.attr("class","bootstrap-growl alert"),n.type&&r.addClass("alert-"+n.type),n.allow_dismiss&&r.append('<a class="close" data-dismiss="alert" href="#">&times;</a>'),r.append(t),n.top_offset&&(n.offset={from:"top",amount:n.top_offset});var i=e(".bootstrap-growl",n.ele);offsetAmount=n.offset.amount,e.each(i,function(){offsetAmount=offsetAmount+e(this).outerHeight()+n.stackup_spacing}),css={position:"absolute",margin:0,"z-index":"9999",display:"none"},css[n.offset.from]=offsetAmount+"px",r.css(css),n.width!=="auto"&&r.css("width",n.width+"px"),e(n.ele).append(r);switch(n.align){case"center":r.css({left:"50%","margin-left":"-"+r.outerWidth()/2+"px"});break;case"left":r.css("left","20px");break;default:r.css("right","20px")}r.fadeIn(),n.delay>=0&&r.delay(n.delay).fadeOut("slow",function(){e(this).remove()})},e.bootstrapGrowl.default_options={ele:"body",type:null,offset:{from:"top",amount:20},align:"right",width:250,delay:4e3,allow_dismiss:!0,stackup_spacing:10}})(jQuery);

                $.bootstrapGrowl(messages, {
                      type: $type,
                      delay: 5000,
                     
                  });
 }


