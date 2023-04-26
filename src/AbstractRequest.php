<?php

namespace Ay4t\IAK;
use GuzzleHttp\Client;

/**
 * Introduction
 * IAK API use RESTful API as interface to communicate. Our API has predictable, 
 * resource oriented URL, and use HTTPS.
 * 
 * Request
 * To make request into IAK API, it is the same way as make request to other RESTful API.
 * 
 * Base URL
 * Development: https://prepaid.iak.dev
 * Production: https://prepaid.iak.id
 */

abstract class AbstractRequest
{
    protected $apiKey   = '';

    // username
    protected $username = '';

    protected $isSandbox = false;

    // const live base url
    const LIVE_BASE_URL = 'https://prepaid.iak.id';

    // const sandbox base url
    const SANDBOX_BASE_URL = 'https://prepaid.iak.dev';

    private $sign = '';

    /**
     * data object dari result response API
     */
    private $data;

    // constructor
    public function __construct(string $apiKey, string $username, bool $isSandbox = false)
    {
        $this->apiKey   = $apiKey;
        $this->username = $username;
        $this->isSandbox = $isSandbox;
    }

    /**
     * Function: sign
     * Authentication
     * IAK API use md5 hash to authenticate the requests. You need to put the sign key as request body and combination of md5 hash as value. The combination include username, api key, and additional.
     * sign: md5({username}+{api_key}+{additional})
     * additional : Based on the request commands. The additional will be explained in each api call later.
     */
    protected function sign(string $additional = '')
    {
        $this->sign = md5( $this->username . $this->apiKey . $additional );
        return $this;
    }

    /** 
     * Function: api_call
     * API Call
     * To make request into IAK API, it is the same way as make request to other RESTful API.
     * 
     */
    protected function api_call($endpoint, $method, $data = [])
    {
        $url = $this->getBaseUrl() . $endpoint;

        $headers = [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];

        $body = [
            'username'  => $this->username,
            'sign'      => $this->sign,
        ];

        $body = array_merge($body, $data);

        $client     = new Client();
        $response   = $client->request($method, $url, [
            'headers' => $headers,
            'body'    => json_encode($body),
        ]);

        $result = json_decode($response->getBody()->getContents());

        return $this->data = $result->data;
    }

    /**
     * Function: getBaseUrl
     * Get base url
     */
    private function getBaseUrl()
    {
        $base = $this->isSandbox ? self::SANDBOX_BASE_URL : self::LIVE_BASE_URL;
        return $base . '/api/';
    }
}
