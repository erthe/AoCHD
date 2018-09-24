<?php
error_reporting(E_ALL);
// disable magic_quotes_runtime
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    set_magic_quotes_runtime(0);
    @ini_set('magic_quotes_sybase', 0);
}

mb_internal_encoding('UTF-8');

// reverse the effect of magic quotes if necessary
if (get_magic_quotes_gpc()) {
    stripslashes_deep($_REQUEST);
    stripslashes_deep($_GET);
    stripslashes_deep($_POST);
    stripslashes_deep($_COOKIE);

    if (is_array($_FILES)) {
        foreach ($_FILES as $key => $val) {
            $_FILES["$key"]['tmp_name'] = str_replace('\\', '\\\\', $val['tmp_name']);
        }
        stripslashes_deep($_FILES);
    }
}

/**
* Reverses the effects of magic_quotes on an entire array of variables
* @param    array   The array on which we want to work
*/
function stripslashes_deep(&$value, $depth = 0) {

    if (is_array($value)) {
        foreach ($value as $key => $val) {
            if (is_string($val)) {
                $value["$key"] = stripslashes($val);
            }
            else if (is_array($val) && $depth < 10) {
                stripslashes_deep($value["$key"], $depth + 1);
            }
        }
    }
}

define('ALLOWED_EXTENSIONS',    'zip'); // lower-case extensions
define('MIN_FILE_SIZE', 65536);             //~64kB
define('MAX_FILE_SIZE', 4194304);           // ~ 4MB
define('UPLOAD_DIR', 'uploads/');           // if it is possible, put it outside your www root

class Salter {

    public static function appendSalt($fileName) {
        $parts = pathinfo($fileName);
        return sprintf('%s_%s.%s', $parts['filename'], substr(md5(uniqid(mt_rand(), true)), 0, 8), $parts['extension']);
    }

    public static function stripSalt($fileName) {
        $parts = pathinfo($fileName);
        return sprintf('%s.%s', substr($parts['filename'], 0, -9), $parts['extension']);
    }
}

function upload() {

    if (!isset($_FILES) || !is_array($_FILES) || empty($_FILES))
        return false;

    reset($_FILES);
    $file = current($_FILES);

    if ($file['error'] > 0) {
        echo 'Error uploading file: ' . $file['error'];
        return false;
    }

    // file size check
    if ($file['size'] < MIN_FILE_SIZE) {
        echo 'Error: Small file size.';
        return false;
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        echo 'Error: Max file size exceeded.';
        return false;
    }

    // extension check
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed_ext = explode(', ', ALLOWED_EXTENSIONS);
    if (!in_array($ext, $allowed_ext)) {
        echo 'Error: Disallowed file extension.';
        return false;
    }

    $fileName = UPLOAD_DIR . Salter::appendSalt(basename($file['name']));

    if (!@move_uploaded_file($file['tmp_name'], $fileName)) {
        echo 'Error uploading file: ' . $file['error'];
        return false;
    }

    return $fileName;
}

?>