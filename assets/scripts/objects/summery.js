$(document).ready(function(){
    $.getJSON("facature.json", function (data) {

        let column1 = data[2].sectionContent[0].sectionContent[0].columnContent
        column1.forEach(row => {
            document.getElementById('colOneJSON').innerHTML += `<li><span class="fa-li"><i class="${row.objectClass}"></i></span>${row.objectText}</li>`;
        });
    });
});

$(document).ready(function(){
    $.getJSON("facature.json", function (data) {

        let column2 = data[2].sectionContent[0].sectionContent[1].columnContent

        column2.forEach(row => {
            
            document.getElementById('colTwoJSON').innerHTML += `<li><span class="fa-li"><i class="${row.objectClass}"></i></span>${row.objectText}</li>`;
        
        });
        
    });
});