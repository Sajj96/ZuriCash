<?php
namespace App\Services;
use GuzzleHttp\Client;      


class ExchangeRateService {

    public $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function getRate() {
        $url = 'https://openexchangerates.org/api/latest.json?app_id=811a9fc18646415daa4f8895f5d14ba3';


        try {
            $response = $this->client->request('GET', $url, [
                "verify" => false,
            ]);
            $statuscode = $response->getStatusCode();
            if ($statuscode == 200) {
                $responseData = $response->getBody()->getContents(); 
                return $responseData;             
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('home')->with('error', $response);           
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            $response = $e->getMessage();            
            return redirect()->route('home')->with('error', $response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getMessage();
            // $responseBodyAsString = $response->getBody()->getContents(); 
            return redirect()->route('home')->with('error', $response);           
        }
    }
}