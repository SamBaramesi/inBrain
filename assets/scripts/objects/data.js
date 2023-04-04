let jsonData = null;

$.ajax({
    async: false,
    global: false,
    url: "vacaturejson.php?id=1",
    dataType: "json",
    success: function (data) {
        jsonData = data;
    }
});