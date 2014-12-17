
var webrtc = new SimpleWebRTC({
    // the id/element dom element that will hold "our" video
    localVideoEl: 'localVideo',
    // the id/element dom element that will hold remote videos
    remoteVideosEl: 'remoteVideos',
    // immediately ask for camera access
    autoRequestMedia: true
});

webrtc.on('readyToCall', function () {
    // you can name it anything
    $('#modalInvite').modal();

    webrtc.joinRoom('wg_call');

    $("#AcceptButton").click(function () {
        console.log("call accepted");
    });
    $("#RejectButton, #modalInvite .close").click(function () {
        $('#modalInvite').modal('hide');
    });
});
