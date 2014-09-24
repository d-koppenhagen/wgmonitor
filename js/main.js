/* ######## Start: Global configurations ########### */
var refresh_lvb_plan = Math.floor((Math.random() * 350) + 260) * 1000 ; //random refresh time in s
var refresh_time = 1800000; //refresh sidebar every 30 Minutes

// lat and lon for current weather
var lat = "51.3145737"; //latitude
var lon = "12.37689257"; //longitude

var max_stations = 8;
/* ######## End: Global configurations ########### */

var stylesheet_path = {
            "1":"css/slate.min.css",
            "2":"css/bootstrap.min.css",
            "3":"css/darkly.min.css",
            "4":"css/superhero.min.css",
            "5":"css/flatly.min.css",
            "6":"css/sandstone.min.css",
            "7":"css/yeti.min.css"
        };
var stylesheet_value = $.jStorage.get("design", "1"); //get design, default value
swapStyleSheet(stylesheet_path[stylesheet_value]);

$(document).ready(function(){
        getWeatherData();
        showTime();

        $('#contentLeftColumn').load('start.html');

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
