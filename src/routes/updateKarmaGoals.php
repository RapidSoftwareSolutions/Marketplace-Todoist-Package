<?php

$app->post('/api/Todoist/updateKarmaGoals', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','commands']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['accessToken'=>'token','commands'=>'commands'];
    $optionalParams = [];
    $bodyParams = [
       'query' => ['token','commands']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);


    //custom part

    foreach( $data['commands'] as $key => $value)
    {
        //Form valid array request for vendor
        $validArr = [
            "type" => "update_goals",
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


        if(!empty($value['vacation_mode']))
        {
            if($value['vacation_mode'] == 'false')
            {
                $value['vacation_mode'] = 0;
            } else {
                $value['vacation_mode'] = 1;
            }
        }

        if(!empty($value['karma_disabled']))
        {
            if($value['karma_disabled'] == 'false')
            {
                $value['karma_disabled'] = 0;
            } else {
                $value['karma_disabled'] = 1;
            }

        }




        $validArr['args'] = $value;
        $data['commands'][$key] = $validArr;

    }


    $data['commands'] = json_encode( $data['commands']);




    $client = $this->httpClient;
    $query_str = "https://todoist.com/api/v7/sync";

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = [];

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