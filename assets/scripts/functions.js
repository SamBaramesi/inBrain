function readMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read More";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read Less";
        moreText.style.display = "inline";
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