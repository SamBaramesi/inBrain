$(document).ready(function () {
    $.getJSON("facature.json", function (data) {

        let section = document.getElementById("video");
        let videoURL = data[2].sectionContent[7].sectionContent
        
        let vid = section.innerHTML = videoURL;
    });
});