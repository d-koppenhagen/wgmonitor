var clientID = createClientID();
var hfasID = "13247";
var url = "http://hn1.the-agent-factory.de/easygo2/rest/regions/MDV/modules/stationmonitor?con10=1&con01=1&sm10=0&sm01=0&source=HISTORY&cStyle=0&transportFilter=00011111&hafasID="+hfasID+"&mode=DEP";

$.ajax({
    type: 'POST',
    url: url,
    headers: {
        //"User-Agent":"easy.GO Client Android v4.0.3_easyGO_4.0.7 Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36;",
        //"Access-Control-Request-Method":"GET",
        //"Access-Control-Request-Method":"*",
        "Access-Control":"http://",
        "Accept":"application/json",
        "EasyGO-Client-ID":clientID
    }
    //OR
    //beforeSend: function(xhr) {
    //  xhr.setRequestHeader("My-First-Header", "first value");
    //  xhr.setRequestHeader("My-Second-Header", "second value");
    //}
}).done(function(data) {
    console.log(data);
});

function createClientID(){
	out = "";
    for(i = 0; i < 23; i++){
        out += Math.floor((Math.random() * 10)); //random Number between 0 and 9
    }
    return out;
}
