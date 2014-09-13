$(document).ready(function(){
		//temperature refresh
        $("#temp").load("../common/curTemp.php?get=temp");
        var tempRefreshId = setInterval(function(){
            $("#temp").load("../common/curTemp.php?get=temp");
        }, 500000); //time in ms
        showTime();
});

//show system time
function showTime(){
	var date=new Date();
	var h = date.getHours();
	var m = date.getMinutes();

	//always show two digits
	h = checkTime(h);
	m = checkTime(m);
	$("#curTime").text(h + ":" + m);
	t = setTimeout('showTime()',1000);
}

//helper function: add 0 so that there are always two digits
function checkTime(i){
	if(i < 10){
		i = "0" + i;
	}
	return i;
}

// Script to disable mark-text
function disableselect(e){
    return false;
}
function reEnable(){
    return true;
}
document.onselectstart = new Function ("return false")
    if (window.sidebar){
            document.onmousedown=disableselect
            document.onclick=reEnable
    }

// swaping stylesheets
function swapStyleSheet(sheet){
	document.getElementById('pagestyle').setAttribute('href', sheet);
}
