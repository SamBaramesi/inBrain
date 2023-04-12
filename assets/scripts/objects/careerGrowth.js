window.startCareerGrowth = function startCareerGrowth(jsonData) {

    let section = document.getElementById("careerGrowth");
    let title = jsonData[2].sectionContent[6].sectionContent[0].objectValue
    let paragraph = jsonData[2].sectionContent[6].sectionContent[1].objectValue[0].objectValue
    let circle = jsonData[2].sectionContent[6].sectionContent[1].objectValue[1].objectValue

    // create container div for section
    let contDiv = document.createElement("div");
    contDiv.classList.add("groeipad");
    section.appendChild(contDiv);

    // add h1 to container div
    let h1 = document.createElement("h1");
    h1.innerText = title;
    contDiv.appendChild(h1);

    // add p to container div
    let p = document.createElement("p");
    p.classList.add("p2");
    p.innerText = paragraph;
    contDiv.appendChild(p);

    // create second container div
    let secondContDiv = document.createElement("div");
    secondContDiv.style.marginTop = "10vh";
    section.appendChild(secondContDiv);

    // create container for circles
    let contCircle = document.createElement("div");
    contCircle.classList.add("flexDot");
    secondContDiv.appendChild(contCircle);

    // create circles
    // circle.forEach(row => {
    //     let span = document.createElement("span");
    //     span.classList.add("dot");
    //     span.innerText = row.objectText;
    //     span.style.backgroundImage = row.objectImage;
    //     contCircle.appendChild(span);
    // });


    // // create Line container
    // let contLine = document.createElement("div");
    // contLine.classList.add("line");
    // secondContDiv.appendChild(contLine);

    // // create Line
    // let line = document.createElement("span");
    // line.id = "line";
    // contLine.appendChild(line);

}
