<?php

namespace AquaIo;

use AquaIo\HttpClient\HttpClient;

class Client
{
    private $httpClient;

    public function __construct($auth = array(), array $options = array())
    {
        $this->httpClient = new HttpClient($auth, $options);
    }

    /**
     * Retrieve access token using API credentials.
     */
    public function accessToken()
    {
        return new Api\AccessToken($this->httpClient);
    }

    /**
     * Returns an ICD-9 code.
     */
    public function icd9()
    {
        return new Api\Icd9($this->httpClient);
    }

    /**
     * Returns an ICD-10 code.
     */
    public function icd10()
    {
        return new Api\Icd10($this->httpClient);
    }

}
