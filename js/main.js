/* ######## Start: Global configurations ########### */
var refresh_lvb_plan = Math.floor((Math.random() * 350) + 260) * 1000 ; //random refresh time in s
var refresh_time = 1800000; //refresh sidebar every 30 Minutes

// lat and lon for current weather
var lat = "51.3145737"; //latitude
var lon = "12.37689257"; //longitude

var max_stations = 8;

/* ######## End: Global configurations ########### */

$(document).ready(function(){

        getWeatherData();
        showTime();

        $('#contentLeftColumn').load('start.php');

        $('#sidebarRefresh').load('sidebar.php');
        setInterval(function(){
            $('#sidebarRefresh').load('sidebar.php');
        },refresh_time);
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

// get the weather data from openweathermap
function getWeatherData() {
    var url = "http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lon+"&units=metric"
    $.getJSON(url, function(data){
        var curTemp = Math.round(data.main.temp); //get current temp
        var curCity = data.name.split(",",1);
        $('#temp').text(curCity+", Aktuelle Temperatur: "+curTemp+" \u00B0 C");
        var tempRefreshId = setInterval(function(){
            $('#temp').text(curCity+", Aktuelle Temperatur: "+curTemp+" \u00B0 C");
        }, refresh_time); //time in ms
    });
}
