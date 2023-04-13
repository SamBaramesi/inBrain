// You can get url_string from window.location.href if you want to work with
// the URL of the current page

var url_string = window.location.href;

var url = new URL(url_string);

var vacatureID = url.searchParams.get("id");

$.ajax({
    url: "vacaturejson.php?id=" + vacatureID,
    dataType: "json",
    success: function (data) {
        
        startBanner(data);
        startCareerGrowth(data);
        startContact(data);
        startNavBar(data);
        startPracticalExample(data);
        startSummery(data);
        startVacancy(data);
        startVideo(data);
        startWorkWithUs(data);
        startCalendar(data);
        startPieChart(data);

    }
});