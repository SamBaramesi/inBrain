window.startNavBar = function startNavBar(jsonData) {


    const ul = document.createElement("ul");
    ul.classList.add("p3");

    let li = jsonData[0].sectionContent;

    li.forEach(row => {
        const li = document.createElement("li");
        ul.appendChild(li);
        const a = document.createElement("a");
        a.setAttribute('href', row.contentLink);
        a.innerText = row.contentPlaceholder;
        li.appendChild(a);
    })

    let admin = document.createElement("a");
    admin.setAttribute('href', "assets/php/login.php");
    admin.classList.add("login");
    admin.innerHTML = "Admin Login";
    ul.appendChild(admin);

    document.getElementById("nav").appendChild(ul);
    
}