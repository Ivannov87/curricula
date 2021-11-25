function DF(bid) {
    //producción
    // var url=atob('aHR0cHM6Ly93d3cuZmVwYWMuY29tLm14Lw==');
    //local
    var url = atob('aHR0cDovL2xvY2FsaG9zdC9jdXJyaWN1bGEv');
    var id = atob(bid);
    window.open('' + url + id + '', '_blank');
}


function DL(blink) {

    var url = atob(blink);
    window.open('' + url + '', '_blank');
}
