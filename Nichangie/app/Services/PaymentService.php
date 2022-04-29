<?php
namespace App\Services;
use GuzzleHttp\Client;      


class PaymentService {

    public $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function ussdPush($phone, $amount, $transactionNo) {
        $url = 'http://18.220.121.223:30001/gateway/services/v1/collect/push';

        try {
            $response = $this->client->request('POST', $url, [
                "verify" => false,
                "json" => [
                    "body" => (object) array(
                        "request" => (object) array(
                            "command" => "UssdPush",
                            "transactionNumber" => $transactionNo,
                            "msisdn" => "255659608434",
                            "amount" => "1000"
                        )
                    ),
                    "header" => (object) array(
                        "username"  => env('PAYMENT_USERNAME'),
                        "password"  => env('PAYMENT_PASSWORD'),
                        "timestamp" => env('PAYMENT_TIMESTAMP')
                    )
                ]
            ]);
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = json_decode($response->getBody()->getContents()); 
                return response()->json($responseData);               
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('campaign.show')->with('error', 'Problem occured while donating');           
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getResponse();            
            return redirect()->route('campaign.show')->with('error', 'Problem occured while donating');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('campaign.show')->with('error', 'Problem occured while donating');           
        }
    }
}