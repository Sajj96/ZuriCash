<?php
namespace App\Services;
use GuzzleHttp\Client;      


class PaymentService {

    public $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function ussdPush($phone) {
        $url = 'http://18.220.121.223:30001/gateway/services/v1/collect/push';

        try {
            $response = $this->client->request('POST', $url, [
                "verify" => false,
                "json" => [
                    "body" => (object) array(
                        "request" => (object) array(
                            "command" => "UssdPush",
                            "transactionNumber" => "4334388325",
                            "msisdn" => "255659608434",
                            "amount" => "1000"
                        )
                    ),
                    "header" => (object) array(
                        "username" => "7",
                        "password" => "Nachangia@2022",
                        "timestamp" => "1608710938"
                    )
                ]
            ]);
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()->getContents()); 
                echo json_encode($responseData);               
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('register')->with('error', 'Problem occured while sending verification code');           
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();            
            return redirect()->route('register')->with('error', 'Problem occured while sending verification code');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('register')->with('error', 'Problem occured while sending verification code');           
        }
    }
}