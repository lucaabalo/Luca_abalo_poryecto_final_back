function abrirVentana(url){

		var windowSize = {
	    width: 500,
	    height: 500,
	};
	var windowLocation = {
	    left:  (window.screen.availLeft + (window.screen.availWidth / 2)) - (windowSize.width / 2),
	    top: (window.screen.availTop + (window.screen.availHeight / 2)) - (windowSize.height / 2)
	};
	window.open(url, '_blank', 'width=' + windowSize.width + ', height=' + windowSize.height + ', left=' + windowLocation.left + ', top=' + windowLocation.top);
}

function reload(){
    window.opener.location.reload();
    window.close();
}
