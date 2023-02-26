$(document).ready(function () {
    $.getJSON("facature.json", function (data) {

        let title = data[2].sectionContent[6].sectionContent[0].objectValue
        console.log(title);
        let paragraph = data[2].sectionContent[6].sectionContent[1].objectValue
        console.log(paragraph);



    });
});
