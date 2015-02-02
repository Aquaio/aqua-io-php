<?php

namespace AquaIo\HttpClient;

use Guzzle\Http\Message\Response as GuzzleResponse;

/**
 * ResponseHandler takes care of decoding the response body into suitable type
 */
class ResponseHandler {

    public static function getBody(GuzzleResponse $response)
    {
        $body = $response->getBody(true);

        // Response body is in JSON
        if ($response->isContentType('json')) {
            $tmp = json_decode($body, true);

            if (JSON_ERROR_NONE === json_last_error()) {
                $body = $tmp;
            }
        }

        return $body;
    }

}
