<?php 

require 'request_headers.php';

require 'vendor/autoload.php';

if (isset($_GET['url'])) {

    $url = explode('/', $_GET['url']);

    $service = ucfirst($url[0]) . 'Service';

    if (file_exists('Api/Services/' . $service . '.php')) {

        $service = 'Api\Services\\' . ucfirst($url[0]) . 'Service';

    } else {
        http_response_code(404);
        echo json_encode(array('status' => 'error', 'data' => 'Resource Not Found'), JSON_UNESCAPED_UNICODE);
        exit;
    }

    $parameter = [];

    if (isset($url[1])) {
        $parameter[] = $url[1];
    }

    $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);

    if (method_exists($service, $requestMethod)) {
        try {
            $response = call_user_func_array(array(new $service, $requestMethod), $parameter);
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'data' => $response), JSON_UNESCAPED_UNICODE);
        } catch(Exception $e) {

            echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
        }
        
        

    } else {

        http_response_code(405);
        echo json_encode(array('status' => 'error', 'data' => 'Method Not Allowed'), JSON_UNESCAPED_UNICODE);
        exit;

    }

}
