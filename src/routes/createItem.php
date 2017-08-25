<?php

$app->post('/api/Todoist/createItem', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiToken','commands']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiToken'=>'token','commands'=>'commands'];
    $optionalParams = [];
    $bodyParams = [
       'query' => ['commands','token']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);



    //custom part

    foreach( $data['commands'] as $key => $value)
    {
        //Form valid array request for vendor
        $validArr = [
            "type" => "item_add",
            "uuid" => $value["uuid"]
        ];

        if(!empty($value['tempId']))
        {
            $validArr['temp_id'] = $value['tempId'];
            unset($value['tempId']);
        }


        unset($value['uuid']);

        foreach($value as $alias => $element)
        {
            $pieces = preg_split('/(?=[A-Z])/',$alias);

            for ($i = 0; $i < count($pieces); $i++) {
                $pieces[$i] = strtolower($pieces[$i]);
            }

            unset($value[$alias]);
            $alias = implode('_',$pieces);
            $value[$alias] = $element;

        }


        if(!empty($value['collapsed']))
        {
            if($value['collapsed'] == 'true')
            {
                $value['collapsed'] = 1;

            } else if($value['collapsed'] == 'false')
            {
                $value['collapsed'] = 0;
            }
        }

        if(!empty($value['due_date_utc']))
        {
          $value['due_date_utc'] =   date('Y-m-d', strtotime($value['due_date_utc'])).'T'.date('H:i', strtotime($value['due_date_utc']));

        }


        $validArr['args'] = $value;
        $data['commands'][$key] = $validArr;

    }


    $data['commands'] = json_encode( $data['commands']);



    $client = $this->httpClient;
    $query_str = "https://todoist.com/api/v7/sync";

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);


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