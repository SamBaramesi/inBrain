let jsonData = null;

$.ajax({
    async: false,
    global: false,
    url: "vacaturejson.php",
    dataType: "json",
    success: function (data) {
        jsonData = data;
    }
});