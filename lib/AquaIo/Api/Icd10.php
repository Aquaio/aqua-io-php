<?php

namespace AquaIo\Api;

use AquaIo\HttpClient\HttpClient;

/**
 * Returns an ICD-10 code.
 */
class Icd10
{

    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Returns all top-level ICD-10 codes. Useful for helping a user navigate down the ICD-10 hierarchy to find a code.
     *
     * 'codes/v1/icd10' GET
     */
    public function topLevelCodes(array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $response = $this->client->get('codes/v1/icd10', $body, $options);

        return $response;
    }

    /**
     * Returns a single code matching the name, if any exists. Replace periods with hypens (e.g. 'R50-9' for 'R50.9')
     *
     * 'codes/v1/icd10/:code_name' GET
     *
     * @param $code_name name of code
     */
    public function singleCode($code_name, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());
        $body['code_name'] = $code_name;

        $response = $this->client->get('codes/v1/icd10/'.rawurlencode($code_name).'', $body, $options);

        return $response;
    }

    /**
     * Returns all codes whose name contains the search string.
     *
     * 'codes/v1/icd10?q[name_cont]=:query' GET
     *
     * @param $query the search query string
     */
    public function searchByName($query, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());
        $body['query'] = $query;

        $response = $this->client->get('codes/v1/icd10?q[name_cont]='.rawurlencode($query).'', $body, $options);

        return $response;
    }

    /**
     * Returns all codes whose description contains the search string.
     *
     * 'codes/v1/icd10?q[description_cont]=:query' GET
     *
     * @param $query the search query string
     */
    public function searchByDescription($query, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());
        $body['query'] = $query;

        $response = $this->client->get('codes/v1/icd10?q[description_cont]='.rawurlencode($query).'', $body, $options);

        return $response;
    }

    /**
     * Returns all codes whose name or description contains the search string.
     *
     * 'codes/v1/icd10?q[name_or_description_cont]=:query' GET
     *
     * @param $query the search query string
     */
    public function searchByNameOrDescription($query, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());
        $body['query'] = $query;

        $response = $this->client->get('codes/v1/icd10?q[name_or_description_cont]='.rawurlencode($query).'', $body, $options);

        return $response;
    }

}
