<?php
// save.php - Backend Data Persistence Processor
require_once 'config.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['action'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action request']);
    exit;
}

$action = $input['action'];
$applications = json_decode(file_get_contents(DATA_FILE), true) ?: [];

switch ($action) {
    case 'save_application':
        if (isset($input['application'])) {
            $applications[] = $input['application'];
            file_put_contents(DATA_FILE, json_encode($applications, JSON_PRETTY_PRINT));
            echo json_encode(['status' => 'success', 'message' => 'Application recorded successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Missing application payload']);
        }
        break;

    case 'update_application':
        if (isset($input['application']['app_num'])) {
            $updatedApp = $input['application'];
            $found = false;
            foreach ($applications as $key => $app) {
                if ($app['app_num'] === $updatedApp['app_num']) {
                    $applications[$key] = array_merge($app, $updatedApp);
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $applications[] = $updatedApp;
            }
            file_put_contents(DATA_FILE, json_encode($applications, JSON_PRETTY_PRINT));
            echo json_encode(['status' => 'success', 'message' => 'Application updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid application number']);
        }
        break;

    case 'get_applications':
        echo json_encode(['status' => 'success', 'data' => $applications]);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Unknown action']);
        break;
}
?>
