(function($){

    /*
    * Insert form
    *
    */
    var form = $('#addform'),
        input = $('#text').focus(),
        list = $('#item-list');

    /*
    * settings
    * 
    */
    var animation = {
        startColor: '#0ce3ac',
        endColor: list.find('li').css('backgroundColor') || '#303030',
        delay: '200'
    };

    form.on('submit',function (e) {
        e.preventDefault();
    
        if(input.val().trim() === '')
        {
            return;
        }

        var req = $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json'
        })
        .done(function(data){
            if(data.status === "success"){

                $.ajax({url: baseUrl}).done(function(html){

                    var newItem = $(html).find('li:last-child');
                    newItem.appendTo(list)
                        .css({backgroundColor: animation.startColor })
                        .delay(animation.delay)
                        .animate({backgroundColor: animation.endColor},500);
                    input.val('').focus();
                });
            }
        });
    });


    input.on('keypress', function(e) {
        if( e.which === 13 )
        {
            form.trigger('submit');
            return false;
        }
    });


    /*
    *   editform
    */
    $('#editform').find('textarea').select();

    /*
    * Delete form
    */
    $('#deleteform').on('submit',function(event){
        return confirm('for sure?');
    });

}(jQuery));