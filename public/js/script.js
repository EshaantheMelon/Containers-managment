$(function () {



    // select position
    $('[class^=at-]').hide();
    $('[class^=depot-]').hide();
    $('.' + $('.position').val()).show();
    $('.position').on('change', function () {
        $('[class^=at-]').hide();
        $('.' + this.value).show();
    });

    $('.status-depot').on('change', function () {
        $('[class^=depot-]').hide();
        if (this.value == 'TOTAL LOSS') {
            $('.depot-loss').show();
        }
        else if (this.value == 'IN REPARATION') {
            $('.depot-reparation').show();
        }
    });

    // select city by country
    $('select.country').change(function () {
        console.log('start');
        var countryCode = $(this).val();
        $('.cityItems').remove();
        $.get('/ContainersManagement/public/cities/' + countryCode, function (data) {

            $.each(data, function (index, element) {
                //console.log(element);
                $('select.city').append('<option value="' + element.id + '" class="cityItems">' + element.name + '</option>')
            });

        }, 'json');
    });


});


$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    $('#user_id').val($(this).data("id"));
    
    //$('#user_id').val($(this).data("name"));
    $('.panel-title').html('<span class="glyphicon glyphicon-comment"> </span> ' + $(this).data("name"));
    $("#chat_window_1").find('h3').val();
    $("#chat_window_1").show();

    var url = $(this).data("url");
    
    getMessages(url);
});
$(document).on('click', '.icon_close', function (e) {
    $("#chat_window_1").hide();
    var url = 'http://localhost/ContainersManagement/public/message';

    $.ajax({

        type: "GET",
        url: url
    });
});


// send message
$(document).on('click', '#btn-chat', function (e) {
    e.preventDefault();
    sendMsg();

    $( "#btn-input" ).val('');
});
function getMessages(url){

    $.ajax({

        type: "GET",
        url: url,
        dataType: "json",
        success: function (data) {
            var cloneS = $('#base_sent').clone();
            var cloneR = $('#base_receive').clone();

            $('#msg_container_base').empty();

            $.each(data, function(i, item) {
                if (item.send == 1) {
                    clone  = cloneS.clone();
                    clone.find('.msg_sent p').text(item.message);
                    clone.find('.msg_sent time').text(item.created_at);
                    $('#msg_container_base').append(clone);
                } else {
                    clone  = cloneR.clone();
                    clone.find('.msg_receive p').text(item.message);
                    clone.find('.msg_receive time').text(item.created_at);
                    $('#msg_container_base').append(clone);
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
}
function sendMsg() {
    var clone = $('#base_sent').clone();
    if ($("#btn-input").val() != '') {
        clone.find('.msg_sent p').text($("#btn-input").val());
        $('#msg_container_base').append(clone);

        var data = $('#form_chat').serialize();
        var url = $('#form_chat').prop('action');//'http://localhost/ContainersManagement/public/message';

        $.ajax({

            type: "POST",
            url: url,
            data: data,
            success: function (data) {
                console.log('k');
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

}