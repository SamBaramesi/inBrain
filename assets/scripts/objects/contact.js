window.startContact = function startContact(jsonData) {

    // Get the data thats going to be used!
    let title = jsonData[2].sectionContent[1].sectionContent[0].objectValue;
    let contactName = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactName;
    let contactTitle = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactTitle;
    let contactEmail = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactEmail;
    const sectionDiv = document.querySelector(".contact");

    //Create DIV with class = "conFloat F1"
    const headerDiv = document.createElement("div");
    headerDiv.classList.add("conFloat");
    headerDiv.classList.add("F1");
    // Create h3 tag
    let h3 = document.createElement("h3");
    // insert text into the h3 tag
    h3.innerText = title;
    // insert the h3 tag into the div that we created earlier
    headerDiv.appendChild(h3);


    //create new div
    const contentDiv = document.createElement("div");
    contentDiv.classList.add("conFloat");
    contentDiv.classList.add("F2");
    // create an h5 element
    let h5 = document.createElement("h5");
    // insert text into the h5 tag
    h5.innerText = contactName;
    // insert h5 into newly made div
    contentDiv.appendChild(h5);
    // create p tag with class p3
    let p = document.createElement("p");
    p.classList.add("p3");
    // add P inner text
    p.innerText = contactTitle;
    // insert P tag into our DIV
    contentDiv.appendChild(p,);
    // create a tag with class and style adjustments
    let a = document.createElement("a");
    a.setAttribute("href", `mailto:${contactEmail}`);
    // create i tag with class adjustments
    let i = document.createElement("i");
    i.style.marginTop = "5px";
    i.classList.add("fa");
    i.classList.add("icon-size");
    i.classList.add("fa-envelope");
    i.classList.add("pc");
    // insert i element into a element
    a.appendChild(i);
    // insert a into div
    contentDiv.appendChild(a);
    //insert everything into the contact section
    sectionDiv.appendChild(headerDiv);
    sectionDiv.appendChild(contentDiv);

}