<?php

/**
 * Lion F1 - Basic Sync Server Example
 *
 * This example receives attendance data from a Lion fingerprint
 * machine and passes the received payload to your own storage
 * function.
 *
 * Implement saveData() according to your database or storage
 * requirements.
 */

header('Content-Type: application/json');


// ------------------------------------------------------------
// Request parameters
// ------------------------------------------------------------

$method = $_SERVER['REQUEST_METHOD'];

$deviceId = isset($_GET['duid'])
    ? $_GET['duid']
    : '';

$type = isset($_GET['type'])
    ? $_GET['type']
    : '0';


// ------------------------------------------------------------
// Request routing
// ------------------------------------------------------------

if ($method === 'POST') {

    /*
     * type = 0
     *
     * Standard attendance upload.
     */
    if ($type === '0') {

        addAttendance($deviceId);

    } else {

        /*
         * Other data types can be handled here if required.
         *
         * Example:
         *
         * handleOtherData($deviceId, $type);
         */
        http_response_code(400);

        echo json_encode([
            'error' => 'Unsupported data type'
        ]);
    }

} else {

    http_response_code(405);

    echo json_encode([
        'error' => 'Method not allowed'
    ]);
}


// ------------------------------------------------------------
// Attendance handler
// ------------------------------------------------------------

function addAttendance($deviceId)
{
    /*
     * Read the raw payload sent by the fingerprint machine.
     */
    $data = file_get_contents('php://input');

    if ($data === false || $data === '') {

        http_response_code(400);

        echo json_encode([
            'error' => 'Empty request'
        ]);

        return;
    }


    /*
     * Store the received data.
     *
     * Implement saveData() using your preferred database,
     * file storage, API, etc.
     */
    saveData($deviceId, $data);


    echo json_encode([
        'success' => true
    ]);
}


// ------------------------------------------------------------
// Storage function
// ------------------------------------------------------------

function saveData($deviceId, $data)
{
    /*
     * Implement your own storage logic here.
     *
     * Example:
     *
     * - MySQL
     * - SQLite
     * - JSON/file storage
     * - Your own API
     *
     * Do not hard-code database credentials in this file.
     */
}
?>