<?php
include_once("assets/php/dbconnect.php");

$vacatureID = $_GET['id'];
// echo $vacatureID;

// Execute the query and fetch the results
$stmt = $pdo->prepare("SELECT * FROM vacature WHERE id = :id");
$stmt->bindParam(":id", $vacatureID);
$stmt->execute();
$vacatures = $stmt->fetchAll(PDO::FETCH_ASSOC);

function fetchData($table){
    global $pdo, $vacatureID;
    $stmt = $pdo->query("SELECT * from $table where vacature_id={$vacatureID}");
    $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $table = array();
    foreach ($tableData as $tableRow) {
        foreach ($tableRow as $key => $value) {
            $table[] = array("id" => count($table) + 1, "objectName" => $key, "objectValue" => $value);
        }
    }
    return $table;
}

// Loop through the results and build the JSON structure
foreach ($vacatures as $vacature) {

    // Fetch banner
    // $stmt = $pdo->query("SELECT header,companyName,companyLocation,button from banner where vacature_id={$vacatureID}");
    // $bannerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $banner = array();
    // foreach ($bannerData as $bannerRow) {
    //     foreach ($bannerRow as $bannerKey => $bannerValue) {
    //         $banner[] = array("id" => count($banner) + 1, "objectName" => $bannerKey, "objectValue" => $bannerValue);
    //     }
    // }

    $banner = fetchData('banner');

    // Fetch qualifications
    $stmt = $pdo->query("SELECT id,icon,icon_class,icon_text from qualifications where vacature_id={$vacatureID}");
    $qualificationsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $qualifications = array();
    foreach ($qualificationsData as $qualificationsRow) {
        $qualifications[] = array("id" => $qualificationsRow["id"], "objectIcon" => $qualificationsRow["icon"], "objectClass" => $qualificationsRow["icon_class"], "objectText" => $qualificationsRow["icon_text"]);
    }

    // Fetch benefits
    $stmt = $pdo->query("SELECT id,icon,icon_class,icon_text from benefits where vacature_id={$vacatureID}");
    $benefitsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $benefits = array();
    foreach ($benefitsData as $benefitsRow) {
        $benefits[] = array("id" => $benefitsRow["id"], "objectIcon" => $benefitsRow["icon"], "objectClass" => $benefitsRow["icon_class"], "objectText" => $benefitsRow["icon_text"]);
    }

    // Fetch activity
    $stmt = $pdo->query("SELECT id,activity_name,activity_value from activity where vacature_id={$vacatureID}");
    $activityData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $activity = array();
    foreach ($activityData as $activityRow) {
        $activity[] = array("id" => $activityRow["id"], "label" => $activityRow["activity_name"], "value" => $activityRow["activity_value"]);
    }

    // Fetch contact
    $stmt = $pdo->query("SELECT contact_header,contact_name,contact_title,contact_email from contact where vacature_id={$vacatureID}");
    $contactData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $contact = array();
    $contactHeader = isset($contactData[0]["contact_header"]) ? $contactData[0]["contact_header"] : "";
    foreach ($contactData as $contactRow) {
        $contact[] = array("id" => count($contact) + 1, "contactName" => $contactRow["contact_name"], "contactTitle" => $contactRow["contact_title"], "contactEmail" => $contactRow["contact_email"]);
    }

    // fetch vacancy header
    $stmt = $pdo->query("SELECT vacancy_header from vacancy where vacature_id={$vacatureID}");
    $vacancyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $vacHead = isset($vacancyData[0]['vacancy_header']) ? $vacancyData[0]['vacancy_header'] : "";

    // Fetch vacancy
    $stmt = $pdo->query("SELECT Paragraaph1,Paragraaph2 from vacancy where vacature_id={$vacatureID}");
    $vacancyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $vacancy = array();
    foreach ($vacancyData as $vacancyRow) {
        foreach ($vacancyRow as $vacancyKey => $vacancyValue) {
            $vacancy[] = array("id" => count($vacancy) + 1, "objectName" => $vacancyKey, "objectValue" => $vacancyValue);
        }
    }

    // Fetch quote
    $stmt = $pdo->query("SELECT quote_text from quote where vacature_id={$vacatureID}");
    $quoteData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $quote = isset($quoteData[0]["contact_header"]) ? $quoteData[0]["contact_header"] : "";


    // Fetch weekday
    $stmt = $pdo->query("SELECT `day`, id, event_title, event_timeStart, event_dateStart, event_timeEnd, event_dateEnd, event_color, event_textColor, event_description from `weekday` where vacature_id={$vacatureID}");
    $weekdayData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $week = array("monday" => [], "tuesday" => [], "wednesday" => [], "thursday" => [], "friday" => []);
    foreach ($weekdayData as $weekdayRow) {
        $week[$weekdayRow["day"]][] = array("id" => $weekdayRow["id"], "title" => $weekdayRow["event_title"], "timeStart" => "T" . $weekdayRow["event_timeStart"], "dateStart" => $weekdayRow["event_dateStart"], "timeEnd" => "T" . $weekdayRow["event_timeEnd"], "dateEnd" => $weekdayRow["event_dateEnd"], "evColor" => $weekdayRow["event_color"], "textColor" => $weekdayRow["event_textColor"], "description" => $weekdayRow["event_description"]);
    }

    // Fetch practicalExample
    $stmt = $pdo->query("SELECT id, peHead, quote, paragraaph FROM practicalexample WHERE vacature_id = {$vacatureID}");
    $peData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pe = array();
    foreach ($peData as $peRow) {
        foreach ($peRow as $peKey => $peValue) {
            $pe[] = array("id" => $peRow["id"], "objectName" => $peKey, "objectValue" => $peValue);
        }
    }

    // Fetch careerGrowth
    $stmt = $pdo->query("SELECT header,paragraaph from careergrowth where vacature_id={$vacatureID}");
    $careergrowthData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $careergrowthHead = "";
    $careergrowthDesc = "";
    foreach ($careergrowthData as $careergrowthRow) {
        $careergrowthHead = $careergrowthRow["header"];
        $careergrowthDesc = $careergrowthRow["paragraaph"];
    }

    // Fetch growthpath
    $stmt = $pdo->query("SELECT id,objectText, objectImage from growthpath where vacature_id={$vacatureID}");
    $growthpathData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $growthpath = array();
    foreach ($growthpathData as $growthpathRow) {
        $growthpath[] = array("id" => $growthpathRow["id"], "objectText" => $growthpathRow["objectText"], "objectImage" => $growthpathRow["objectImage"]);
    }

    // Fetch video
    $stmt = $pdo->query("SELECT link from video where vacature_id={$vacatureID}");
    $videoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $video = array();
    foreach ($videoData as $videoRow) {
        $videoLink = "<iframe src=\"" . $videoRow["link"] . "\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>";
        $video = $videoLink;
    }

    // Fetch workWithUs
    $stmt = $pdo->query("SELECT header,paragraaph from workwithus where vacature_id={$vacatureID}");
    $workwithusData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $workwithusHead = "";
    $workwithusDesc = "";
    foreach ($workwithusData as $workwithusRow) {
        $workwithusHead = $workwithusRow["header"];
        $workwithusDesc = $workwithusRow["paragraaph"];
    }

    // Fetch workWithUsIcons
    $stmt = $pdo->query("SELECT id,icon_name,icon_text,icon_class from workwithusicons where vacature_id={$vacatureID}");
    $workwithusiconsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $workwithusicons = array();
    foreach ($workwithusiconsData as $workwithusiconsRow) {
        $workwithusicons[] = array("id" => $workwithusiconsRow["id"], "objectName" => $workwithusiconsRow["icon_name"], "objectText" => $workwithusiconsRow["icon_text"], "objectIcon" => $workwithusiconsRow["icon_class"]);
    }

    // Add each field to the array
    $item = array(
        [
            'sectionId' => 1,
            'sectionName' => 'navBar',
            'sectionContent' => array(
                [
                    'id' => 1,
                    'name' => 'anchorLink1',
                    'contentLink' => '#banner',
                    'contentPlaceholder' => 'Banner'
                ],
                [
                    'id' => 2,
                    'name' => 'anchorLink2',
                    'contentLink' => '#summery',
                    'contentPlaceholder' => 'Summery'
                ],
                [
                    'id' => 3,
                    'name' => 'anchorLink3',
                    'contentLink' => '#contact',
                    'contentPlaceholder' => 'Contact'
                ],
                [
                    'id' => 4,
                    'name' => 'anchorLink4',
                    'contentLink' => '#vacancy',
                    'contentPlaceholder' => 'Vacancy'
                ],
                [
                    'id' => 5,
                    'name' => 'anchorLink5',
                    'contentLink' => '#calendar',
                    'contentPlaceholder' => 'Calendar'
                ],
                [
                    'id' => 6,
                    'name' => 'anchorLink6',
                    'contentLink' => '#practicalExample',
                    'contentPlaceholder' => 'Practical Example'
                ],
                [
                    'id' => 7,
                    'name' => 'anchorLink7',
                    'contentLink' => '#careerGrowth',
                    'contentPlaceholder' => 'Career Growth'
                ],
                [
                    'id' => 8,
                    'name' => 'anchorLink8',
                    'contentLink' => '#video',
                    'contentPlaceholder' => 'Video'
                ],
                [
                    'id' => 9,
                    'name' => 'anchorLink9',
                    'contentLink' => '#workWithUs',
                    'contentPlaceholder' => 'WorkWithUs'
                ]
            )
        ],
        [

            "sectionId" => 2,
            "sectionName" => "banner",
            "sectionContent" => $banner
        ],
        [
            "sectionId" => 2,
            "sectionName" => "mainContent",
            "sectionContent" => array(
                [
                    "id" => 1,
                    "sectionName" => "summary",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "columnName" => "Wat is vereist?",
                            "columnContent" => $qualifications
                        ],
                        [
                            "id" => 2,
                            "columnName" => "Wat krijg je?",
                            "columnContent" => $benefits
                        ],
                        [
                            "id" => 3,
                            "columnName" => "Wat doe je?",
                            "columnContent" => array(
                                [
                                    "id" => 1,
                                    "objectName" => "Pie Chart",
                                    "objectContent" => $activity
                                ]
                            )
                        ],
                    )
                ],
                [
                    "id" => 2,
                    "sectionName" => "contact",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "objectName" => "header",
                            "objectValue" => $contactHeader
                        ],
                        [
                            "id" => 2,
                            "objectName" => "contactInfo",
                            "objectValue" => $contact
                        ]
                    )
                ],
                [
                    "id" => 3,
                    "sectionName" => "vacancy",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "objectName" => "vacHead",
                            "objectValue" => $vacHead
                        ],
                        [
                            "id" => 2,
                            "objectName" => "vacDescription",
                            "objectValue" => $vacancy
                        ]
                    )
                ],
                [
                    "id" => 4,
                    "sectionName" => "quote",
                    "sectionContent" => $quote
                ],
                [
                    "id" => 5,
                    "sectionName" => "WorkWeek",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "weekDay" => "Monday",
                            "values" => $week["monday"]
                        ],
                        [
                            "id" => 2,
                            "weekDay" => "Tuesday",
                            "values" => $week["tuesday"]
                        ],
                        [
                            "id" => 3,
                            "weekDay" => "Wednesday",
                            "values" => $week["wednesday"]
                        ],
                        [
                            "id" => 4,
                            "weekDay" => "Thursday",
                            "values" => $week["thursday"]
                        ],
                        [
                            "id" => 5,
                            "weekDay" => "Friday",
                            "values" => $week["friday"]
                        ]
                    )
                ],
                [
                    "id" => 6,
                    "sectionName" => "practicalExample",
                    "sectionContent" => $pe
                ],
                [
                    "id" => 7,
                    "sectionName" => "careerGrowth",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "objectName" => "cgHead",
                            "objectValue" => $careergrowthHead
                        ],
                        [
                            "id" => 1,
                            "objectName" => "cgDescription",
                            "objectValue" => array(
                                [
                                    "id" => 1,
                                    "objectName" => "Paragraaph",
                                    "objectValue" => $careergrowthDesc
                                ],
                                [
                                    "id" => 2,
                                    "objectName" => "Circle",
                                    "objectValue" => $growthpath
                                ]
                            )
                        ]
                    )
                ],
                [
                    "id" => 8,
                    "sectionName" => "video",
                    "sectionContent" => $video
                ],
                [
                    "id" => 9,
                    "sectionName" => "workWithUs",
                    "sectionContent" => array(
                        [
                            "id" => 1,
                            "objectName" => "wwuHead",
                            "objectValue" => $workwithusHead
                        ],
                        [
                            "id" => 2,
                            "objectName" => "wwuDescription",
                            "objectValue" => array(
                                [
                                    "id" => 1,
                                    "objectName" => "Paragraaph",
                                    "objectValue" => $workwithusDesc
                                ],
                                [
                                    "id" => 2,
                                    "objectName" => "Icons",
                                    "objectValue" => $workwithusicons
                                ]
                            )
                        ]
                    )
                ],
            )
        ]
    );

    // Add the array to the JSON data
    $json = $item;
}

// Encode the JSON data as a string
$json_string = json_encode($json, JSON_PRETTY_PRINT);
echo $json_string;


exit();
