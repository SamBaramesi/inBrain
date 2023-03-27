if (jsonData) {

    let column1 = jsonData[2].sectionContent[0].sectionContent[0].columnContent
    column1.forEach(row => {
        document.getElementById('colOneJSON').innerHTML += `<li><span class="fa-li"><i class="${row.objectClass}"></i></span>${row.objectText}</li>`;
    });

    let column2 = jsonData[2].sectionContent[0].sectionContent[1].columnContent
    column2.forEach(row => {
        document.getElementById('colTwoJSON').innerHTML += `<li><span class="fa-li"><i class="${row.objectClass}"></i></span>${row.objectText}</li>`;
    });

}