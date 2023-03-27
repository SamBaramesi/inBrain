if (jsonData) {

    let bannerHeader = jsonData[1].sectionContent[0]
    let companyName = jsonData[1].sectionContent[1]
    let companyLocation = jsonData[1].sectionContent[2]
    let button = jsonData[1].sectionContent[3]

    if (document.getElementById("banJSON") != null) {
        document.getElementById('banJSON').innerHTML = `
        
        <div id="hero">${bannerHeader.objectValue}</div><br>
        <div class="p1">${companyName.objectValue}</div>
        <div class="p1">${companyLocation.objectValue}</div>
        <a href="http://inbrain.nl">
        <button type="button" class="zoom"><span class="p1">${button.objectValue}</span></button></a>
        `;
    }

}