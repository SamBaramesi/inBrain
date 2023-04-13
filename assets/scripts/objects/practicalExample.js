window.startPracticalExample = function startPracticalExample(jsonData) {

    let title = jsonData[2].sectionContent[5].sectionContent[2].objectValue
    let quote = jsonData[2].sectionContent[5].sectionContent[3].objectValue
    let paragraph = jsonData[2].sectionContent[5].sectionContent[4].objectValue

    let section = document.getElementById("practicalExample");

    // make div
    let div1 = document.createElement("div");
    div1.id = "quoteH";
    section.appendChild(div1);

    // make title
    let h1 = document.createElement("h1");
    h1.innerText = title;
    div1.appendChild(h1);

    // make second div
    let div2 = document.createElement("div");
    div2.classList.add("p2");
    div2.classList.add("quote");
    div2.classList.add("quoteB");
    section.appendChild(div2);

    // make p
    let p1 = document.createElement("p");
    p1.id = "spacing";
    div2.appendChild(p1);

    // make q
    let q = document.createElement("q");
    q.innerText = quote;
    p1.appendChild(q);

    let br = document.createElement("br");
    p1.appendChild(br);

    let span = document.createElement("span");
    span.id = "showMore";
    div2.appendChild(span);

    let p2 = document.createElement("p");
    p2.classList.add("p2");
    p2.innerText = paragraph;
    span.appendChild(p2)

    let btn = document.createElement("button");
    btn.id = "showMoreBtn";
    btn.setAttribute("onclick", "readMoreDiv()");
    btn.innerText = "Meer Zien";
    div2.appendChild(btn);
}

