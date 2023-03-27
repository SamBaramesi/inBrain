if (jsonData) {

    let section = document.getElementById("workWithUs");
    let title = jsonData[2].sectionContent[8].sectionContent[0].objectValue
    let paragraph = jsonData[2].sectionContent[8].sectionContent[1].objectValue[0].objectValue
    let icons = jsonData[2].sectionContent[8].sectionContent[1].objectValue[1].objectValue

    // create h1 element
    let h1 = document.createElement("h1");
    h1.style.textAlign = "center";
    h1.style.marginTop = "10vh";
    h1.innerText = title;
    section.appendChild(h1);

    // create p element
    let p = document.createElement("p");
    p.classList.add("p2");
    p.style.textAlign = "center";
    p.style.marginTop = "2.5vh";
    p.style.color = "gray";
    p.innerText = paragraph;
    section.appendChild(p);

    // create icon container
    let contIcon = document.createElement("div");
    contIcon.classList.add("flexICN");
    section.appendChild(contIcon);

    // create ul element
    let ul = document.createElement("ul");
    ul.classList.add("p2");
    ul.classList.add("proIcons");
    ul.style.textAlign = "center";
    contIcon.appendChild(ul);

    // add in the icons and text for each list item inside the ul element
    icons.forEach(row => {
        let liDiv = document.createElement("div");
        liDiv.classList.add("ListI");
        liDiv.innerHTML = `<li><i class="${row.objectIcon}"></i><li>${row.objectText}</li>`
        ul.appendChild(liDiv);
    });

}