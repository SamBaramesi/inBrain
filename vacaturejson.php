<?php

//welke vacature?
$vacatureID = $_GET['id'];

// Create a new PDO object to connect to the database
$db = new PDO('mysql:host=localhost;dbname=inBrain2', 'root', '');

// Build the query to fetch data from the database
$sql = "SELECT * FROM vacature WHERE id={$vacatureID}";

// Execute the query and fetch the results
$stmt = $db->query($sql);
$vacatures = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through the results and build the JSON structure
foreach ($vacatures as $vacature) {

    // Fetch banner
    $stmt = $db->query("SELECT header,companyName,companyLocation,button from banner where vacature_id={$vacatureID}");
    $bannerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $banner = array();
    foreach ($bannerData as $bannerRow) {
        foreach ($bannerRow as $bannerKey => $bannerValue) {
            $banner[] = array("id" => count($banner) + 1, "objectName" => $bannerKey, "objectValue" => $bannerValue);
        }
    }

    // Fetch qualifications
    $stmt = $db->query("SELECT icon,icon_class,icon_text from qualifications where vacature_id={$vacatureID}");
    $qualificationsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $qualifications = array();
    foreach ($qualificationsData as $qualificationsRow) {
        $qualifications[] = array("id" => count($qualifications) + 1, "objectIcon" => $qualificationsRow["icon"], "objectClass" => $qualificationsRow["icon_class"], "objectText" => $qualificationsRow["icon_text"]);
    }

    // Fetch benefits
    $stmt = $db->query("SELECT icon,icon_class,icon_text from benefits where vacature_id={$vacatureID}");
    $benefitsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $benefits = array();
    foreach ($benefitsData as $benefitsRow) {
        $benefits[] = array("id" => count($benefits) + 1, "objectIcon" => $benefitsRow["icon"], "objectClass" => $benefitsRow["icon_class"], "objectText" => $benefitsRow["icon_text"]);
    }

    // Fetch activity
    $stmt = $db->query("SELECT activity_name,activity_value from activity where vacature_id={$vacatureID}");
    $activityData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $activity = array();
    foreach ($activityData as $activityRow) {
        $activity[] = array("id" => count($activity) + 1, "label" => $activityRow["activity_name"], "value" => $activityRow["activity_value"]);
    }

    // Fetch contact
    $stmt = $db->query("SELECT contact_header,contact_name,contact_title,contact_email from contact where vacature_id={$vacatureID}");
    $contactData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $contact = array();
    foreach ($contactData as $contactRow) {
        $contact[] = array("id" => count($contact) + 1, "contactName" => $contactRow["contact_name"], "contactTitle" => $contactRow["contact_title"], "contactEmail" => $contactRow["contact_email"]);
    }
    $contactHeader = $contactRow["contact_header"];

    // Fetch vacancy
    $stmt = $db->query("SELECT Paragraaph1,Paragraaph2 from vacancy where vacature_id={$vacatureID}");
    $vacancyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $vacancy = array();
    foreach ($vacancyData as $vacancyRow) {
        foreach ($vacancyRow as $vacancyKey => $vacancyValue) {
            $vacancy[] = array("id" => count($vacancy) + 1, "objectName" => $vacancyKey, "objectValue" => $vacancyValue);
        }
    }

    // fetch vacancy head
    $stmt = $db->query("SELECT vacancy_header from vacancy where vacature_id={$vacatureID}");
    $vacHeadData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($vacHeadData as $vacHeadRow) {
        $vacHead = $vacHeadRow["vacancy_header"];
    }

    // Fetch quote
    $stmt = $db->query("SELECT quote_text from quote where vacature_id={$vacatureID}");
    $quoteData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($quoteData as $quoteRow) {
        $quote = $quoteRow["quote_text"];
    }

    // Fetch weekday
    $stmt = $db->query("SELECT `day`, id, event_title, event_timeStart, event_dateStart, event_timeEnd, event_dateEnd, event_color, event_textColor, event_description from `weekday` where vacature_id={$vacatureID}");
    $weekdayData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $week = array("monday" => [], "tuesday" => [], "wednesday" => [], "thursday" => [], "friday" => []);
    foreach ($weekdayData as $weekdayRow) {
        $week[$weekdayRow["day"]][] = array("id" => $weekdayRow["id"], "title" => $weekdayRow["event_title"], "timeStart" => "T" . $weekdayRow["event_timeStart"], "dateStart" => $weekdayRow["event_dateStart"], "timeEnd" => "T" . $weekdayRow["event_timeEnd"], "dateEnd" => $weekdayRow["event_dateEnd"], "evColor" => $weekdayRow["event_color"], "textColor" => $weekdayRow["event_textColor"], "description" => $weekdayRow["event_description"]);

        /*$day = $weekdayRow["day"];
        $$day[] = array("id"=>$weekdayRow["id"], "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);        
        */
        /*
        switch ($weekdayRow["day"]) {
            case "monday":
                // do something specific for Monday
                $monday[] = array("id"=>count($monday)+1, "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);
                break;
            case "tuesday":
                // do something specific for tuesday
                $tuesday[] = array("id"=>count($weekday)+1, "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);
                break;
            case "wednesday":
                // do something specific for wednesday
                $wednesday[] = array("id"=>count($weekday)+1, "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);
                break;
            case "thursday":
                // do something specific for thursday
                $thursday[] = array("id"=>count($weekday)+1, "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);
                break;
            case "friday":
                // do something specific for Friday
                $friday[] = array("id"=>count($weekday)+1, "title"=>$weekdayRow["event_title"], "timeStart"=> "T". $weekdayRow["event_timeStart"], "dateStart"=>$weekdayRow["event_dateStart"], "timeEnd"=> "T". $weekdayRow["event_timeEnd"], "dateEnd"=>$weekdayRow["event_dateEnd"], "evColor"=>$weekdayRow["event_color"], "textColor"=>$weekdayRow["event_textColor"], "description"=>$weekdayRow["event_description"]);
                break;
        }*/
    }

    // Fetch practicalExample
    $stmt = $db->query("SELECT peHead,quote,paragraaph from practicalexample where vacature_id={$vacatureID}");
    $peData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pe = array();
    foreach ($peData as $peRow) {
        foreach ($peRow as $peKey => $peValue) {
            $pe[] = array("id" => count($pe) + 1, "objectName" => $peKey, "objectValue" => $peValue);
        }
    }

    // Fetch careerGrowth
    $stmt = $db->query("SELECT header,paragraaph from careergrowth where vacature_id={$vacatureID}");
    $careergrowthData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($careergrowthData as $careergrowthRow) {
        $careergrowthHead = $careergrowthRow["header"];
        $careergrowthDesc = $careergrowthRow["paragraaph"];
    }

    // Fetch growthpath
    $stmt = $db->query("SELECT objectText, objectImage from growthpath where vacature_id={$vacatureID}");
    $growthpathData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $growthpath = array();
    foreach ($growthpathData as $growthpathRow) {
        $growthpath[] = array("id" => count($growthpath) + 1, "objectText" => $growthpathRow["objectText"], "objectImage" => $growthpathRow["objectImage"]);
    }

    // Fetch video
    $stmt = $db->query("SELECT link from video where vacature_id={$vacatureID}");
    $videoData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $video = array();
    foreach ($videoData as $videoRow) {
        $videoLink = "<iframe src=\"" . $videoRow["link"] . "\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>";
        $video = $videoLink;
    }

    // Fetch workWithUs
    $stmt = $db->query("SELECT header,paragraaph from workwithus where vacature_id={$vacatureID}");
    $workwithusData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($workwithusData as $workwithusRow) {
        $workwithusHead = $workwithusRow["header"];
        $workwithusDesc = $workwithusRow["paragraaph"];
    }

    // Fetch workWithUsIcons
    $stmt = $db->query("SELECT icon_name,icon_text,icon_class from workwithusicons where vacature_id={$vacatureID}");
    $workwithusiconsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $workwithusicons = array();
    foreach ($workwithusiconsData as $workwithusiconsRow) {
        $workwithusicons[] = array("id" => count($workwithusicons) + 1, "objectName" => $workwithusiconsRow["icon_name"], "objectText" => $workwithusiconsRow["icon_text"], "objectIcon" => $workwithusiconsRow["icon_class"]);
    }

    // Add each field to the array
    $item = array(
        [
            'sectionId' => '1',
            'sectionName' => 'navBar',
            'sectionContent' => array(
                [
                    'id' => 1,
                    'name' => 'anchorLink1',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 2,
                    'name' => 'anchorLink2',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 3,
                    'name' => 'anchorLink3',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 4,
                    'name' => 'anchorLink4',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 5,
                    'name' => 'anchorLink5',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 6,
                    'name' => 'anchorLink6',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 7,
                    'name' => 'anchorLink7',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
                ],
                [
                    'id' => 8,
                    'name' => 'anchorLink8',
                    'contentLink' => '(URL)',
                    'contentPlaceholder' => 'Vereisten'
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


?>