<?php

$app->post('/api/Todoist/uncompleteItems', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiToken','uuid','itemIds']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiToken'=>'token','uuid'=>'uuid','itemIds'=>'ids'];
    $optionalParams = ['restoreState'=>'restore_state'];
    $bodyParams = [
       'query' => ['token','restore_state','uuid','ids']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);


    $client = $this->httpClient;
    $query_str = "https://todoist.com/api/v7/sync";

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);


    //custom part

    $validArr['commands'] = array(
        "type" => "item_uncomplete",
        "uuid" => $data["uuid"],
        "args" => array('ids' => $data['ids'])
    );

    if(!empty($requestParams['query']['restore_state']))
    {

        $validArr['commands']['args']['restore_state'] = $requestParams['query']['restore_state'];

        unset($requestParams['query']['restore_state']);
    }

    unset($requestParams['query']['uuid']);
    unset($requestParams['query']['ids']);


    $requestParams['query']['commands'] = json_encode(array($validArr['commands']) );



    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});