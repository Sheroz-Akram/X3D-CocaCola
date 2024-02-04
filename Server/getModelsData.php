<?php

// connect to the database
$dsn = "sqlite:database.db";
$dbh = new PDO($dsn);

// fetch data from the modeldata and renderImages tables
$stmt = $dbh->query("SELECT md.ID, md.modelName, md.modelHeading, md.tagLine, md.description, md.fontFamily, md.primaryColor, md.secondaryColor, md.backgroundColor, md.modelTranslation, md.modelRotation, md.modelUrl, ri.Location AS renderimages FROM modeldata md LEFT JOIN renderImages ri ON md.ID = ri.ID");
$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // group the data by ID and add the "renderimages" field to the nested sub-array
    if (!isset($data[$row['ID']])) {
        $data[$row['ID']] = array(
            'ID' => $row['ID'],
            'modelName' => $row['modelName'],
            'modelHeading' => $row['modelHeading'],
            'tagLine' => $row['tagLine'],
            'description' => $row['description'],
            'fontFamily' => $row['fontFamily'],
            'primaryColor' => $row['primaryColor'],
            'secondaryColor' => $row['secondaryColor'],
            'backgroundColor' => $row['backgroundColor'],
            'modelTranslation' => $row['modelTranslation'],
            'modelRotation' => $row['modelRotation'],
            'modelUrl' => $row['modelUrl'],
            'renderImages' => array()
        );
    }
    if (!empty($row['renderimages'])) {
        $data[$row['ID']]['renderImages'][] = $row['renderimages'];
    }
}

// output JSON data
header('Content-Type: application/json');
echo json_encode(array_values($data));

// close database connection
$dbh = null;
?>
