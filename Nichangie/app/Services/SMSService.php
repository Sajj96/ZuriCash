<?php
namespace App\Services;
use GuzzleHttp\Client;      


class SMSService {

    public $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function sendOtp($phone) {
        $url = 'https://messaging-service.co.tz/api/sms/v1/text/single';

        $otp = rand(1000, 9999);
        session(['session_otp'=> $otp]);
        session(['mobile_number'=> $phone]);

        try {
            $response = $this->client->request('POST', $url, [
                "verify" => false,
                "json" => [
                    "from"   => "N-SMS", 
                    "to"     => $phone, 
                    "text"   => "$otp is your verification code for NACHANGIA"
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