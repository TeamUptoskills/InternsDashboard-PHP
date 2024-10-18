<?php
// Simulating the database or source of data.
$teams = [
    1 => [
        'teamMembers' => ['John Doe', 'Jane Smith', 'Praveen Sai Neyyala'],
        'teamCount' => 3,
    ],
    2 => [
        'teamMembers' => ['Alice Johnson', 'Bob Matthews', 'Praveen Sai Neyyala'],
        'teamCount' => 3,
    ],
];

// Check if the project_id parameter is set
if (isset($_GET['project_id'])) {
    $projectId = $_GET['project_id'];

    // Return team members and team count based on project_id
    if (isset($teams[$projectId])) {
        $teamData = $teams[$projectId];
        echo json_encode([
            'teamMembers' => implode(', ', $teamData['teamMembers']),
            'teamCount' => $teamData['teamCount']
        ]);
    } else {
        // Return an error if project ID is not found
        echo json_encode([
            'error' => 'Project not found'
        ]);
    }
} else {
    // Return an error if project_id is not provided
    echo json_encode([
        'error' => 'No project ID provided'
    ]);
}
?>
