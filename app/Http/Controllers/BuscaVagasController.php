<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BuscaVagasController extends Controller
{
    protected Client $client;
    public $apiKey = 'ca111a500amshb1544bd39e2ab9bp14c309jsn8ed39b59aa0d'; 
    public $apiHost = 'linkedin-job-search-api.p.rapidapi.com'; 
    public $baseUri = 'https://linkedin-job-search-api.p.rapidapi.com/'; 
    // public $baseUri24h = 'https://linkedin-job-search-api.p.rapidapi.com/active-jb-24h'; 
    // public $baseUri7d = 'https://linkedin-job-search-api.p.rapidapi.com/active-jb-7d'; 

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri, 
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'x-rapidapi-key' => $this->apiKey,
                'x-rapidapi-host' => $this->apiHost,
                'Accept' => 'application/json',
    
            ] 
        ]);
        
    }

    public function jobs24h(Request $request)
    {
        $response = $this->client->get('active-jb-24h', [
            'query' => [
                'limit' => '3',
                'offset' => '0',
                'title_filter' => 'developer',
                'location_filter' => 'Brazil',
                'description_filter' => 'php',
                'remote' => 'true',

            ]
        ]);

        $status = $response->getStatusCode();

        $corpo = $response->getBody()->getContents();

        return json_decode($corpo);
        
    }
    
    public function jobs7d(Request $request)
    {
        $response = $this->client->get('active-jb-7d', [
            'query' => [
                'limit' => '3',
                'offset' => '0',
                'title_filter' => 'developer',
                'location_filter' => 'Brazil',
                'description_filter' => 'php',
                'remote' => 'true',
    
            ]
        ]);
    
        $status = $response->getStatusCode();
    
        $corpo = $response->getBody()->getContents();
    
        return json_decode($corpo);
        
        

    }

}
