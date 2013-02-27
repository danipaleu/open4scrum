

jQuery(document).ready(function($){

    //disbaling some functions for Internet Explorer
    /*if($.browser.msie)
    {
        $('#is-ajax').prop('checked',false);
        $('#for-is-ajax').hide();
        $('#toggle-fullscreen').hide();
        $('.login-box').find('.input-large').removeClass('span10');
    }*/

    //highlight current / active link
    $('ul.main-menu li a').each(function(){
        if($($(this))[0].href==String(window.location))
            $(this).parent().addClass('active');
    });

    //animating menus on hover
    $('ul.main-menu li:not(.nav-header)').hover(function(){
            $(this).animate({'margin-left':'+=5'},300);
        },
        function(){
            $(this).animate({'margin-left':'-=5'},300);
        });

    //other things to do on document ready, seperated for ajax calls
    //docReady();
});

function docReady(){

    //prevent # links from moving to top
    $('a[href="#"][data-top!=true]').click(function(e){
        e.preventDefault();
    });

    //rich text editor
    $('.cleditor').cleditor();

    //datepicker
    $('.datepicker').datepicker();

    //notifications
    $('.noty').click(function(e){
        e.preventDefault();
        var options = $.parseJSON($(this).attr('data-noty-options'));
        noty(options);
    });

    //uniform - styler for checkbox, radio and file input
    $("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

    //chosen - improves select
    $('[data-rel="chosen"],[rel="chosen"]').chosen();

    //tabs
    $('#myTab a:first').tab('show');
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    //makes elements soratble, elements that sort need to have id attribute to save the result
    $('.sortable').sortable({
        revert:true,
        cancel:'.btn,.box-content,.nav-header',
        update:function(event,ui){
            //line below gives the ids of elements, you can make ajax call here to save it to the database
            //console.log($(this).sortable('toArray'));
        }
    });

    //slider
    $('.slider').slider({range:true,values:[10,65]});

    //tooltip
    $('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

    //auto grow textarea
    $('textarea.autogrow').autogrow();

    //popover
    $('[rel="popover"],[data-rel="popover"]').popover();

    //file manager
    var elf = $('.file-manager').elfinder({
        url : 'misc/elfinder-connector/connector.php'  // connector URL (REQUIRED)
    }).elfinder('instance');

    //iOS / iPhone style toggle switch
    $('.iphone-toggle').iphoneStyle();

    //star rating
    $('.raty').raty({
        score : 4 //default stars
    });

}


