<?php

session_start(); // start session

require_once "/xampp/htdocs/inBrain/assets/php/dbconnect.php";

if (isset($_GET['id'])) {
    $vacatureID = $_GET['id'];
}

?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>

    var url_string = window.location.href;
    var url = new URL(url_string);

    var vacatureID = url.searchParams.get("id");
    let jsonData = null;

    $.ajax({
        async: false,
        global: false,
        url: "../../../vacaturejson.php?id=" + vacatureID,
        dataType: "json",
        success: function (data) {
            jsonData = data;
        }
    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Data</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<style>
    .tooltip-inner img {
        max-width: 500px;
        max-height: 500px;
        position: absolute;
    }
</style>

<?php
// ---------------------------- Function ----------------------------------------- //

function isSubmitButtonClicked($name, $value)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST[$name]) && $_POST[$name] === $value) {
            return true;
        }
    }
    return false;
}

function createVacancyRow($table)
{
    global $pdo, $vacatureID;

    $stmt = $pdo->prepare("INSERT INTO $table (`vacature_id`) VALUES (?)");
    $stmt->execute([$vacatureID]);
}

?>
<?php
// --------------------------- Banner ------------------------- //

if (isSubmitButtonClicked('updateBanner', 'clicked')) {

    $bannerHeader = $_POST["bannerHeader"];
    $companyName = $_POST["companyName"];
    $companyLocation = $_POST["companyLocation"];
    $buttonText = $_POST["buttonText"];

    $vacatureID = $_GET['id']; // Get the value of the id parameter from the URL

    $stmt = $pdo->prepare("UPDATE banner SET header = :header, companyName = :companyName, companyLocation = :companyLocation, button = :button WHERE vacature_id = :vacatureID");
    $stmt->execute(['header' => $bannerHeader, 'companyName' => $companyName, 'companyLocation' => $companyLocation, 'button' => $buttonText, 'vacatureID' => $vacatureID]);
}

?>

<body>
    <!-- --------------------------- Banner ------------------------- -->
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <a href="data.php" class="btn btn-secondary mb-4"> Go Back</a>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Banner</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="banner">
                <script>
                    if (jsonData) {

                        let bannerHeaderJSON = jsonData[1].sectionContent[0].objectValue
                        let companyNameJSON = jsonData[1].sectionContent[1].objectValue
                        let companyLocationJSON = jsonData[1].sectionContent[2].objectValue
                        let buttonJSON = jsonData[1].sectionContent[3].objectValue

                        document.getElementById("banner").innerHTML = `
                        <label for="bannerHeader">Function Name</label>
                        <input type="text" class="form-control mb-2" name="bannerHeader" value="${bannerHeaderJSON}"></input>
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control mb-2" name="companyName" value="${companyNameJSON}"></input>
                        <label for="companyLocation">Company Location</label>
                        <input type="text" class="form-control mb-2" name="companyLocation" value="${companyLocationJSON}"></input>
                        <label for="buttonText">Button Text</label>
                        <input type="text" class="form-control mb-2" name="buttonText" value="${buttonJSON}"></input>
                        <button type="submit" name="updateBanner" value="clicked" class="btn btn-primary">Update Section</button>
                        `;
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- ---------------------------------------------------- Qualifications --------------------------------------------------------------- -->

    <?php

    if (isSubmitButtonClicked('updateQualifications', 'clicked')) {

        global $vacatureID, $newId;

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;
        $iconClass = isset($_POST['iconClass']) ? $_POST['iconClass'] : null;
        $iconText = isset($_POST['iconText']) ? $_POST['iconText'] : null;

        if ($id && $iconClass && $iconText) {
            $stmt = $pdo->prepare("UPDATE qualifications SET icon_class = :iconClass, icon_text = :iconText WHERE id = :id");
            $stmt->execute(['id' => $id, 'iconClass' => $iconClass, 'iconText' => $iconText]);
        } else {
            // handle error here
            error_log('something wrong');
        }
    }


    if (isSubmitButtonClicked('addInput', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("INSERT INTO qualifications (vacature_id, icon_class, icon_text) VALUES (:vacature_id, '', '')");
        $stmt->execute(['vacature_id' => $vacatureID]);

    }

    if (isSubmitButtonClicked('deleteQualificationsRow', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("DELETE FROM qualifications WHERE vacature_id = :vacature_id AND id = :id");
        $stmt->execute(['vacature_id' => $vacatureID, 'id' => $id]);
    }

    ?>
    <!-- --------------------------- Qualifications ------------------------- -->
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Qualifications</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="qualifications">
                <script>

                    if (jsonData) {

                        let column1 = jsonData[2].sectionContent[0].sectionContent[0].columnContent

                        column1.forEach(row => {
                            // Append the HTML string for each row to the variable

                            document.getElementById('qualifications').innerHTML +=
                                `
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="iconClass" class="form-label">Icon Class</label>
                                        <input type="text" name="iconClass" class="form-control" id="iconClass" value="${row.objectClass}">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="iconText" class="form-label">Icon Text</label>
                                        <input type="text" name="iconText" class="form-control" id="iconText" value="${row.objectText}">
                                        <input type="hidden" name="rowID" class="form-control" value="${row.id}">
                                    </div>
                                </div>
                            `;
                        });

                        document.getElementById('qualifications').innerHTML +=
                            `
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" name="updateQualifications" value="clicked" class="btn btn-primary col-md-12">Update Section</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="addInput" value="clicked" class="btn btn-success col-md-12">Add Input</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="deleteQualificationsRow" value="clicked" class="btn btn-danger col-md-12">Delete Last Row</button>
                                </div>
                            </div>
                        `;
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Benefits ------------------------- -->
    <?php
    if (isSubmitButtonClicked('updateBenefits', 'clicked')) {

        global $vacatureID, $newId;

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;
        $iconClass = isset($_POST['iconClass']) ? $_POST['iconClass'] : null;
        $iconText = isset($_POST['iconText']) ? $_POST['iconText'] : null;

        if ($id && $iconClass && $iconText) {
            $stmt = $pdo->prepare("UPDATE benefits SET icon_class = :iconClass, icon_text = :iconText WHERE id = :id");
            $stmt->execute(['id' => $id, 'iconClass' => $iconClass, 'iconText' => $iconText]);
        } else {
            // handle error here
            error_log('something wrong');
        }
    }


    if (isSubmitButtonClicked('addInputBenefits', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("INSERT INTO benefits (vacature_id, icon_class, icon_text) VALUES (:vacature_id, '', '')");
        $stmt->execute(['vacature_id' => $vacatureID]);

    }

    if (isSubmitButtonClicked('deleteBenefitsRow', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("DELETE FROM benefits WHERE vacature_id = :vacature_id AND id = :id");
        $stmt->execute(['vacature_id' => $vacatureID, 'id' => $id]);
    }

    ?>




    <!-- --------------------------- Benefits ------------------------- -->
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Benefits</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="benefits">
                <script>
                    if (jsonData) {

                        let column2 = jsonData[2].sectionContent[0].sectionContent[1].columnContent

                        column2.forEach(row => {
                            // Append the HTML string for each row to the variable
                            document.getElementById('benefits').innerHTML +=
                                `
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="iconClass" class="form-label">Icon Class</label>
                                        <input type="text" name="iconClass" class="form-control" id="iconClass" value="${row.objectClass}">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="iconText" class="form-label">Icon Text</label>
                                        <input type="text" name="iconText" class="form-control" id="iconText" value="${row.objectText}">
                                        <input type="hidden" name="rowID" class="form-control" value="${row.id}">
                                    </div>
                                </div>
                            `;
                        });

                        document.getElementById('benefits').innerHTML +=
                            `
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" name="updateBenefits" value="clicked" class="btn btn-primary col-md-12">Update Section</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="addInputBenefits" value="clicked" class="btn btn-success col-md-12">Add Input</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="deleteBenefitsRow" value="clicked" class="btn btn-danger col-md-12">Delete Last Row</button>
                                </div>
                            </div>
                        `;
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Activity ------------------------- -->

    <?php

    if (isSubmitButtonClicked('updateActivity', 'clicked')) {

        global $vacatureID, $newId;

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;
        $activityName = isset($_POST['activityName']) ? $_POST['activityName'] : null;
        $activityValue = isset($_POST['activityValue']) ? $_POST['activityValue'] : null;

        if ($id && $activityName && $activityValue) {
            $stmt = $pdo->prepare("UPDATE activity SET activity_name = :activityName, activity_value = :activityValue WHERE id = :id");
            $stmt->execute(['id' => $id, 'activityName' => $activityName, 'activityValue' => $activityValue]);
        } else {
            // handle error here
            error_log('something wrong');
        }
    }


    if (isSubmitButtonClicked('addInputActivity', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("INSERT INTO activity (vacature_id, activity_name, activity_value) VALUES (:vacature_id, '', '')");
        $stmt->execute(['vacature_id' => $vacatureID]);

    }

    if (isSubmitButtonClicked('deleteActivityRow', 'clicked')) {

        $id = isset($_POST['rowID']) ? $_POST['rowID'] : null;

        $stmt = $pdo->prepare("DELETE FROM activity WHERE vacature_id = :vacature_id AND id = :id");
        $stmt->execute(['vacature_id' => $vacatureID, 'id' => $id]);
    }

    ?>

    <!-- --------------------------- Activity ------------------------- -->
    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Activity</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="activity">
                <script>
                    if (jsonData) {

                        let content = jsonData[2].sectionContent[0].sectionContent[2].columnContent[0].objectContent

                        content.forEach(row => {
                            // Append the HTML string for each row to the variable
                            document.getElementById('activity').innerHTML +=
                                `
                                <div class="col-sm-6">
                                    <label for="iconClass">Activity</label>
                                    <input type="text" name="activityName" class="form-control mb-2" value="${row.label}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="iconText">Value (In %)</label>
                                    <input type="text" name="activityValue" class="form-control mb-2" value="${row.value}">
                                    <input type="hidden" name="rowID" class="form-control" value="${row.id}">
                                </div>
                            `;
                        });

                        document.getElementById('activity').innerHTML +=
                            `
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" name="updateActivity" value="clicked" class="btn btn-primary col-md-12">Update Section</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="addInputActivity" value="clicked" class="btn btn-success col-md-12">Add Input</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="deleteActivityRow" value="clicked" class="btn btn-danger col-md-12">Delete Last Row</button>
                                </div>
                            </div>
                        `;
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Contact ------------------------- -->

    <?php
    if (isSubmitButtonClicked('updateContact', 'clicked')) {

        $contactHeader = $_POST["contactHeader"];
        $contactName = $_POST["contactName"];
        $contactTitle = $_POST["contactTitle"];
        $contactEmail = $_POST["contactEmail"];

        $vacatureID = $_GET['id']; // Get the value of the id parameter from the URL
    
        $stmt = $pdo->prepare("UPDATE contact SET contact_header = :contactHeader, contact_name = :contactName, contact_title = :contactTitle, contact_email = :contactEmail WHERE vacature_id = :vacatureID");
        $stmt->execute(['contactHeader' => $contactHeader, 'contactName' => $contactName, 'contactTitle' => $contactTitle, 'contactEmail' => $contactEmail, 'vacatureID' => $vacatureID]);
    }

    ?>

    <!-- --------------------------- Contact ------------------------- -->

    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="contact">
                <script>
                    if (jsonData) {

                        let title = jsonData[2].sectionContent[1].sectionContent[0].objectValue;
                        let contactName = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactName;
                        let contactTitle = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactTitle;
                        let contactEmail = jsonData[2].sectionContent[1].sectionContent[1].objectValue[0].contactEmail;

                        document.getElementById("contact").innerHTML = `
                        <label for="iconClass">Title</label>
                        <input type="text" name="contactHeader" class="form-control mb-2" value="${title}"></input>
                        <label for="iconClass">Contact Name</label>
                        <input type="text" name="contactName" class="form-control mb-2" value="${contactName}"></input>
                        <label for="iconClass">Contact Title</label>
                        <input type="text" name="contactTitle" class="form-control mb-2" value="${contactTitle}"></input>
                        <label for="iconClass">Contact Email</label>
                        <input type="text" name="contactEmail" class="form-control mb-2" value="${contactEmail}"></input>
                        <button type="submit" name="updateContact" value="clicked" class="btn btn-primary">Update Section</button>
                        `
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Vacancy ------------------------- -->
    <?php

    if (isSubmitButtonClicked('updateVacancy', 'clicked')) {

        $vacancyHead = $_POST["vacancyHead"];
        $firstP = $_POST["firstP"];
        $secondP = $_POST["secondP"];

        $vacatureID = $_GET['id']; // Get the value of the id parameter from the URL
    
        $stmt = $pdo->prepare("UPDATE vacancy SET vacancy_header = :vacancyHead, Paragraaph1 = :Paragraaph1, Paragraaph2 = :Paragraaph2 WHERE vacature_id = :vacatureID");
        $stmt->execute(['vacancyHead' => $vacancyHead, 'Paragraaph1' => $firstP, 'Paragraaph2' => $secondP, 'vacatureID' => $vacatureID]);
    }

    ?>

    <!-- --------------------------- Vacancy ------------------------- -->

    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Vacature</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="vacature">
                <script>
                    if (jsonData) {

                        let vacancyHead = jsonData[2].sectionContent[2].sectionContent[0].objectValue
                        let firstP = jsonData[2].sectionContent[2].sectionContent[1].objectValue[0].objectValue
                        let secondP = jsonData[2].sectionContent[2].sectionContent[1].objectValue[1].objectValue

                        document.getElementById("vacature").innerHTML = `
                        <label for="iconClass">Vacancy Title</label>
                        <input type="text" name="vacancyHead" class="form-control mb-2" value="${vacancyHead}"></input>
                        <label for="iconClass">First Paragraaph</label>
                        <input type="text" name="firstP" class="form-control mb-2" value="${firstP}"></input>
                        <label for="iconClass">Second Paragraaph</label>
                        <input type="text" name="secondP" class="form-control mb-2" value="${secondP}"></input>
                        <button type="submit" name="updateVacancy" value="clicked" class="btn btn-primary">Update Section</button>
                        `
                    }
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Work Week ------------------------- -->
    <?php

    if (isSubmitButtonClicked('updateWorkWeek', 'clicked')) {

        global $vacatureID;

        $eventName = isset($_POST['eventName']) ? $_POST['eventName'] : null;
        $st = isset($_POST['startTime']) ? $_POST['startTime'] : null;
        list($event_dateStart,$event_timeStart) = explode("T", $st);
        $et = isset($_POST['endTime']) ? $_POST['endTime'] : null;
        list($event_dateEnd,$event_timeEnd) = explode("T", $et);
        $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : null;
        $evColor = isset($_POST['evColor']) ? $_POST['evColor'] : null;
        $txtColor = isset($_POST['txtColor']) ? $_POST['txtColor'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $eventDay = isset($_POST['eventDay']) ? $_POST['eventDay'] : null;

        if ($eventName && $eventDay && $event_dateStart && $event_timeStart && $event_dateEnd && $event_timeEnd && $eventId && $evColor && $txtColor && $desc) {
            $stmt = $pdo->prepare("UPDATE weekday SET day = :eventDay, event_title = :eventName, event_timeStart = :startTime, event_dateStart = :startDate, event_timeEnd = :endTime, event_dateEnd = :endDate, event_color = :evColor, event_textColor = :txtColor, event_description = :desc WHERE id = :eventId AND vacature_id = :vacature_id");
            $stmt->execute(['eventDay' => $eventDay,'eventName' => $eventName,'startTime' => $event_timeStart,'startDate' => $event_dateStart,'endTime' => $event_timeEnd,'endDate' => $event_dateEnd,'evColor' => $evColor,'txtColor' => $txtColor,'desc' => $desc,'eventId' => $eventId,'vacature_id' => $vacatureID]);
        } else {
            // handle error here
            error_log('something wrong');
        }
    }


    if (isSubmitButtonClicked('addInputWorkWeek', 'clicked')) {

        $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : null;

        $stmt = $pdo->prepare("INSERT INTO weekday (vacature_id, day, event_title, event_timeStart, event_dateStart, event_timeEnd, event_dateEnd, event_color, event_textColor, event_description) VALUES (:vacature_id, '', '', '', '', '', '', '', '', '')");
        $stmt->execute(['vacature_id' => $vacatureID]);

    }

    if (isSubmitButtonClicked('deleteWorkWeekRow', 'clicked')) {

        $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : null;

        $stmt = $pdo->prepare("DELETE FROM weekday WHERE vacature_id = :vacature_id AND id = :id");
        $stmt->execute(['vacature_id' => $vacatureID, 'id' => $eventId]);
    }

    ?>

    <!-- --------------------------- Work Week ------------------------- -->

    <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                        title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Work Week</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php?id=<?php echo $vacatureID ?>" method="POST">
            <div class="row form-group" id="workWeek">
                <script>
                    if (jsonData) {
                        let week = jsonData[2].sectionContent[4].sectionContent;

                        week.forEach(day => {
                            const dayId = `workWeekData-${day.weekDay}`;
                            let colClass = day.weekDay === 'Friday' ? 'col-sm-12 ' : 'col-sm-6'; // check if day is Friday

                            document.getElementById("workWeek").innerHTML += `
                                <div class="${colClass} border rounded bg-light my-3">
                                    <h3 class="text-center mt-2">${day.weekDay}</h3>
                                    <br>
                                    <div id="${dayId}"></div>
                                </div>
                            `;

                            for (let i = 0; i < day.values.length; i++) {
                                const element = day.values[i];

                                let name = element.title;
                                let startTime = element.dateStart + element.timeStart;
                                let endTime = element.dateEnd + element.timeEnd;
                                let eventId = element.id;
                                let evColor = element.evColor;
                                let txtColor = element.textColor;
                                let desc = element.description;

                                document.getElementById(dayId).innerHTML += `
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="iconClass">Event Name</label>
                                            <input type="text" name="eventName" class="form-control mb-2" value="${name}"></input>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="iconClass">Event Start</label>
                                            <input type="text" name="startTime" class="form-control mb-2" value="${startTime}"></input>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="iconClass">Event End</label>
                                            <input type="text" name="endTime" class="form-control mb-2" value="${endTime}"></input>
                                            <input type="hidden" name="eventId" class="form-control mb-2" value="${eventId}"></input>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="iconClass">Event day</label>
                                            <input type="text" name="eventDay" class="form-control mb-2"></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="iconClass">Event Color</label>
                                            <input type="text" name="evColor" class="form-control mb-2" value="${evColor}"></input>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="iconClass">Text Color</label>
                                            <input type="text" name="txtColor" class="form-control mb-2" value="${txtColor}"></input>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="iconClass">Description</label>
                                            <input type="text" name="desc" class="form-control mb-2" value="${desc}"></input>
                                        </div>
                                    </div>
                                    <hr>
                                `;
                            }

                            document.getElementById(dayId).innerHTML +=
                            `
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" name="updateWorkWeek" value="clicked" class="btn btn-primary col-md-12">Update Section</button>
                                        </div>                                        <div class="col-md-4">
                                        <button type="submit" name="addInputWorkWeek" value="clicked" class="btn btn-success col-md-12">Add Input</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="deleteWorkWeekRow" value="clicked" class="btn btn-danger col-md-12">Delete Last Row</button>
                                    </div>
                                </div>
                            `;
                        });
                    };
                </script>
            </div>
        </form>
    </div>

    <!-- --------------------------- Practical Example ------------------------- -->
    <!-- <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Practical Example</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php" method="POST">
            <div class="row form-group" id="practicalExample">
                <script>
                    if (jsonData) {

                        let title = jsonData[2].sectionContent[5].sectionContent[0].objectValue
                        let quote = jsonData[2].sectionContent[5].sectionContent[1].objectValue
                        let paragraph = jsonData[2].sectionContent[5].sectionContent[2].objectValue

                        document.getElementById("practicalExample").innerHTML = `
                        <label for="iconClass">Title</label>
                        <input type="text" class="form-control mb-2" placeholder="${title}"></input>
                        <label for="iconClass">Quote</label>
                        <input type="text" class="form-control mb-2" placeholder="${quote}"></input>
                        <label for="iconClass">Paragraaph</label>
                        <input type="text" class="form-control mb-2" placeholder="${paragraph}"></input>
                        `
                    }
                </script>
            </div>
        </form>
    </div> -->

    <!-- --------------------------- Career Growth ------------------------- -->
    <!-- <div class="container mt-5 toolTipContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="<img src='../../img/banner.png'>">Don't Know What You're editing?</button>
                </div>
                <div class="col-md-6 text-md-end">
                    <h1>Career Growth</h1>
                </div>
            </div>
        </div>
        <hr>
        <form action="editData.php" method="POST">
            <div class="row form-group" id="careerGrowth">
                <script>
                    if (jsonData) {

                        let title = jsonData[2].sectionContent[6].sectionContent[0].objectValue
                        let paragraph = jsonData[2].sectionContent[6].sectionContent[1].objectValue[0].objectValue

                        document.getElementById("careerGrowth").innerHTML = `
                        <label for="iconClass">Title</label>
                        <input type="text" class="form-control mb-2" placeholder="${title}"></input>
                        <label for="iconClass">paragraph</label>
                        <input type="text" class="form-control mb-2" placeholder="${paragraph}"></input>
                        `;
                    }
                </script>
                <div class="row">
                    <script>
                        if (jsonData) {

                            let circle = jsonData[2].sectionContent[6].sectionContent[1].objectValue[1].objectValue

                            circle.forEach(row => {

                                document.getElementById("careerGrowth").innerHTML += `
                            
                                    <div class="col-sm-3">
                                        <label for="iconClass">Object Text</label>
                                        <input type="text" class="form-control mb-2" placeholder="${row.objectText}"></input>
                                    </div>
                                    
                                    `;
                            });

                            circle.forEach(row => {

                                document.getElementById("careerGrowth").innerHTML += `

                                <div class="col-sm-3">
                                    <label for="iconClass">Object Image</label>
                                    <img type="image" class="form-control mb-2">${row.objectImage}</img>
                                    <input type="file" class="form-control mb-2"></input>
                                    </div>
                                
                                `;
                            });
                        }
                    </script>
                </div>
            </div>
        </form>
    </div> -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body',
                boundary: '.toolTipContainer',
                html: true,
                placement: 'bottom'
            });
        });
    </script>
</body>

</html>