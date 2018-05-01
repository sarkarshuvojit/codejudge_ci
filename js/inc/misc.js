'use strict';

var animationDuration;


//Welcome Message (not for login page)
function notify(message, type) {
    $.notify({
        message: message
    }, {
        type: type,
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-default',
        placement: {
            from: 'bottom',
            align: 'left'
        },
        delay: 2500,
        animate: {
            enter: 'animated fadeInUp',
            exit: 'animated fadeOutDown'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
}

/*--------------------------------------
 Animation
 ---------------------------------------*/
$('body').on('click', '.animation-demo .btn', function () {
    var animation = $(this).text();
    var cardImg = $(this).closest('.card').find('img');
    if (animation === "hinge") {
        animationDuration = 2100;
    }
    else {
        animationDuration = 1200;
    }

    cardImg.removeAttr('class');
    cardImg.addClass('animated ' + animation);

    setTimeout(function () {
        cardImg.removeClass(animation);
    }, animationDuration);
});


/*--------------------------------------
 Bootstrap Notify Notifications
 ---------------------------------------*/
function notify(type, message, url) {
    $.notify({
        message: message,
        url: url
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: "top",
            align: "right"
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 1031,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: "animated flipInX",
            exit: "animated flipOutX"
        },
        template: '<div data-notify="container" class="alert alert-dismissible alert-{0}" role="alert">' +
        '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
    });
}





