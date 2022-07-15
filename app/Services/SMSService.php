<?php
namespace App\Services;
use GuzzleHttp\Client;      
use Guzzle\Http\Exception\ClientErrorResponseException;

class SMSService {

    public $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function registration($phone, $message) {
        $url = 'https://apisms.beem.africa/v1/send';
        $api_key = config('services.sms.key');
        $api_secret = config('services.sms.secret');

        try {
            $response = $this->client->request('POST', $url, [
                "verify" => false,
                'headers' => [
                    'Authorization' => sprintf('Basic %s', base64_encode("$api_key:$api_secret")),
                    'Content-Type' => 'application/json'
                ],
                "json" => [
                    'source_addr' => 'ZURICASH',
                    'encoding'=>0,
                    'schedule_time' => '',
                    'message' => $message,
                    'recipients' => [array('recipient_id' => '1','dest_addr'=>$phone)]
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
            return redirect()->route('register')->with('error', $response);           
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getMessage();            
            return redirect()->route('register')->with('error', $response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('register')->with('error', $response);           
        }
    }
}