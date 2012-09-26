$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'username'  : 'username',
            'password'  : 'password',
            'room'  : 'room',
            'day'  : 'day',
            'date'  : 'date',
            'time' : 'time',
            'position' : 'position',
            'event' : 'event' ,
            'email'  : 'email'
    };
 
    //inputfocus
    $('input#username').inputfocus({ value: field_values['username'] });
    $('input#password').inputfocus({ value: field_values['password'] });
    $('input#room').inputfocus({ value: field_values['room'] }); 
    $('input#day').inputfocus({ value: field_values['day'] });
    $('input#date').inputfocus({ value: field_values['date'] });
    $('input#email').inputfocus({ value: field_values['email'] }); 
    $('input#time').inputfocus({ value: field_values['time'] });
    $('input#position').inputfocus({ value: field_values['position'] });
    $('input#event').inputfocus({ value: field_values['event'] });


   //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');  
                //update progress bar
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','113px');
                
                //slide steps
                $('#first_step').slideUp();
                $('#second_step').slideDown();                 
    });


    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     

    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','339px');

        //prepare the fourth step
        var fields = new Array(
            $('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#day').val(),
            $('#date').val(),
            $('#position').val(),
            $('#room').val()
            $('#time').val()
            $('#event').val()                     
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            
    });



});