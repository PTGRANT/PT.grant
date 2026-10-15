<?php
// save.php
header('Content-Type: application/json');
define('DATA_FILE', __DIR__ . '/applications.json');

if (!file_exists(DATA_FILE)) {
    file_put_contents(DATA_FILE, json_encode([], JSON_PRETTY_PRINT));
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['action'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    exit;
}

$action = $input['action'];
$applications = json_decode(file_get_contents(DATA_FILE), true) ?: [];

if ($action === 'save_application' && isset($input['application'])) {
    $applications[] = $input['application'];
    file_put_contents(DATA_FILE, json_encode($applications, JSON_PRETTY_PRINT));
    echo json_encode(['status' => 'success']);
} elseif ($action === 'get_applications') {
    echo json_encode(['status' => 'success', 'data' => $applications]);
} elseif ($action === 'update_application' && isset($input['application']['app_num'])) {
    foreach ($applications as $key => $app) {
        if ($app['app_num'] === $input['application']['app_num']) {
            $applications[$key] = array_merge($app, $input['application']);
            break;
        }
    }
    file_put_contents(DATA_FILE, json_encode($applications, JSON_PRETTY_PRINT));
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unknown action']);
}
?>
