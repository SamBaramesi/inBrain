if (jsonData) {

    // Get the data thats going to be used!
    let vacancyHead = jsonData[2].sectionContent[2].sectionContent[0].objectValue
    let firstP = jsonData[2].sectionContent[2].sectionContent[1].objectValue[0].objectValue
    let secondP = jsonData[2].sectionContent[2].sectionContent[1].objectValue[1].objectValue
    // calling section where data will be inserted
    let section = document.getElementById("vacancy");

    // making first div
    let headerDiv = document.createElement("div");
    headerDiv.classList.add("vacHead");
    // create h1 element
    let title = document.createElement("h1");
    title.innerText = vacancyHead;
    headerDiv.appendChild(title);
    //insert div into section
    section.appendChild(headerDiv);

    let bodyDiv = document.createElement("div");
    bodyDiv.classList.add("vacDesc");
    // insert frst paragraph
    let p1 = document.createElement("p");
    p1.classList.add("p2");
    p1.style.margin = "0px 0px 16px";
    p1.innerText = firstP;
    bodyDiv.appendChild(p1);
    // insert second paragraph
    let p2 = document.createElement("p");
    p2.classList.add("p2");
    p2.style.margin = "0px 0px 16px";
    p2.id = "more";
    p2.innerText = secondP;
    bodyDiv.appendChild(p2);
    //insert button
    let p3 = document.createElement("p");
    bodyDiv.appendChild(p3);
    let btn = document.createElement("button");
    btn.setAttribute("onclick", "readMore()");
    btn.id = "myBtn";
    btn.innerText = "Read More";
    p3.appendChild(btn);
    //insert div into section
    section.appendChild(bodyDiv);
}