<?php

// Create a new PDO object to connect to the database
$db = new PDO('mysql:host=localhost;dbname=inBrain', 'root', '');

// Build the query to fetch data from the database
$sql = 'SELECT banner.banner_header, banner.company_name, banner.company_location, banner.banner_button FROM vacature
INNER JOIN banner ON vacature.vacature_id = banner.banner_id
-- INNER JOIN qualifications ON vacature.vacature_id = qualifications.vacature_id
-- INNER JOIN benefits ON vacature.vacature_id = benefits.vacature_id
-- INNER JOIN activity ON vacature.vacature_id = activity.vacature_id
-- INNER JOIN contact ON vacature.vacature_id = contact.contact_id
-- INNER JOIN vacancy ON vacature.vacature_id = vacancy.vacancy_id
-- INNER JOIN quote ON vacature.vacature_id = quote.quote_id
-- INNER JOIN monday ON vacature.vacature_id = monday.vacature_id
-- INNER JOIN tuesday ON vacature.vacature_id = tuesday.vacature_id
-- INNER JOIN wednesday ON vacature.vacature_id = wednesday.vacature_id
-- INNER JOIN thursday ON vacature.vacature_id = thursday.vacature_id
-- INNER JOIN friday ON vacature.vacature_id = friday.vacature_id
-- INNER JOIN practicalexample ON vacature.vacature_id = practicalexample.practicalexample_id
-- INNER JOIN growthpath ON careergrowth.careergrowth_id = growthpath.careergrowth_id
-- INNER JOIN careergrowth ON vacature.vacature_id = careergrowth.careergrowth_id
-- INNER JOIN video ON vacature.vacature_id = video.video_id
-- INNER JOIN workwithus ON vacature.vacature_id = workwithus.workwithus_id
-- INNER JOIN workwithusicons ON vacature.vacature_id = workwithusicons.vacature_id
';

// Execute the query and fetch the results
$stmt = $db->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through the results and build the JSON structure
foreach ($results as $result) {

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
            "sectionContent" => array(
                [
                    "id" => 1,
                    "objectName" => "header",
                    "objectValue" => $result['banner_header']
                ],
                [
                    "id" => 2,
                    "objectName" => "companyName",
                    "objectValue" => $result['company_name']
                ],
                [
                    "id" => 3,
                    "objectName" => "companyLocation",
                    "objectValue" => $result['company_location']
                ],
                [
                    "id" => 4,
                    "objectName" => "button",
                    "objectValue" => $result['banner_button']
                ]
            )
        ],
        [
            "sectionId" => 2,
            "sectionName" => "mainContent",
            "sectionContent" => array(
                [
                    "id" => 1,
                    "sectionName" => "summary",
                    "sectionContent" => array(

                    )
                ],
                [
                    "id" => 2,
                    "sectionName" => "summary",
                    "sectionContent" => array(

                    )
                ],
                [
                    "id" => 3,
                    "sectionName" => "summary",
                    "sectionContent" => array(

                    )
                ],
                [
                    "id" => 4,
                    "sectionName" => "summary",
                    "sectionContent" => array(

                    )
                ],
                [
                    "id" => 5,
                    "sectionName" => "summary",
                    "sectionContent" => array(

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

// Write the JSON string to a file
$file = fopen('my_file.json', 'w');
fwrite($file, $json_string);
fclose($file);

?>



<!-- $data[] = $item; -->