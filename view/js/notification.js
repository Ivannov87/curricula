
function notifylogin(type, message) {

    var head = '';
    var ico = '';
    var bg = '';
    switch (type) {
        case 'success':
            head = 'Sucess';
            ico = 'success';
            bg = '#f96868';
            break;
        case 'warning':
            head = 'Warning';
            ico = 'warning';
            bg = '#57c7d4';
            break;
        case 'info':
            head = 'Info';
            ico = 'info';
            bg = '#46c35f';
            break;
        case 'error':
            head = 'Danger';
            ico = 'error';
            bg = '#f2a654';
            break;
        default:
            head = 'No Definido';
            ico = 'info';
            bg = '#46c35f';
            break;
    }

    $.toast({
        heading: head,
        text: message,
        position: 'bottom-center',
        icon: ico,
        stack: false,
        loaderBg: bg
    })

}

function notifyportal(type, message) {

    var head = '';
    var ico = '';
    var bg = '';
    switch (type) {
        case 'success':
            head = 'Sucess';
            ico = 'success';
            bg = '#f96868';
            break;
        case 'warning':
            head = 'Warning';
            ico = 'warning';
            bg = '#57c7d4';
            break;
        case 'info':
            head = 'Info';
            ico = 'info';
            bg = '#46c35f';
            break;
        case 'error':
            head = 'Danger';
            ico = 'error';
            bg = '#f2a654';
            break;
        default:
            head = 'No definido';
            ico = 'info';
            bg = '#46c35f';
            break;
    }

    $.toast({
        heading: head,
        text: message,
        position: 'bottom-right',
        icon: ico,
        stack: false,
        loaderBg: bg
    })

  
}