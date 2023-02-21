$(document).ready(function () {
    $.getJSON("facature.json", function (data) {

        const ul = document.createElement("ul");
        ul.classList.add("p4");
        
        let li = data[0].sectionContent;
        
        li.forEach(row => {
            const li = document.createElement("li");
            ul.appendChild(li);
            const a = document.createElement("a");
            a.setAttribute('href', row.contentLink);
            a.innerText = row.contentPlaceholder;
            li.appendChild(a);
        })

        document.getElementById("nav").appendChild(ul);
        
    });

});
