function readMore() {
    let moreText = document.getElementById("more");
    let btnText = document.getElementById("myBtn");

        if (moreText.style.display == "none"){
            moreText.style.display = "inline";
            btnText.innerHTML = "Read Less";
        } else {
            moreText.style.display = "none";
            btnText.innerHTML = "Read More";
        }
}


function readMoreDiv() {
    var btn = document.getElementById("showMoreBtn");
    var showMore = document.getElementById("showMore");

    if (showMore.style.display === "none") {
        showMore.style.display = "inline";
        btn.innerHTML = "Minder Zien";
    } else {
        showMore.style.display = "none";
        btn.innerHTML = "Meer Zien";
    }
}