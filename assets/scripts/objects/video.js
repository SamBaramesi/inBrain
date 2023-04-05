window.startVideo = function startVideo(jsonData) {

    let vid = document.getElementById("video");
    let videoURL = jsonData[2].sectionContent[7].sectionContent;

    vid.innerHTML = videoURL;
};