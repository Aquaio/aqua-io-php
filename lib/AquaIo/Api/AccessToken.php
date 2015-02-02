<?php

namespace AquaIo\Api;

use AquaIo\HttpClient\HttpClient;

/**
 * Retrieve access token using API credentials.
 */
class AccessToken
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Returns an access token (required for making all other API calls).
     *
     * 'oauth/token?grant_type=client_credentials' POST
     */
    public function retrieve(array $options = array())
    {
        $body = (isset($options['body']) ? $options['body'] : array());

        $response = $this->client->post('oauth/token?grant_type=client_credentials', $body, $options);

        return $response;
    }

}
