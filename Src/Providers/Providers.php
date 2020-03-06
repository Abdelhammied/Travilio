<?php

namespace Src\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

abstract class Providers
{
    /**
     * Define Provider Api
     *
     * @var URL
     */
    public $providerApi;

    /**
     * Response From Provider
     *
     * @var ResponseInterface
     */
    private $response;

    /**
     * Response Status Code
     *
     * @var int
     */
    private $responseStatusCode;

    /**
     * Response Body
     *
     * @var JSON
     */
    private $responseBody;

    public function __construct()
    {
        $this->validateProviderApi();
        $this->sendRequest();
        $this->handleResponse();
    }

    public function __get(string $name)
    {
        if (method_exists($this, $name)) {
            return $this->$name();
        }
    }

    /**
     * Get Response Status Code
     *
     * @return int
     */
    final public function getResponseStatusCode()
    {
        return $this->responseStatusCode;
    }

    /**
     * Get Response Body
     *
     * @var JSON
     */
    final public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Send Guzzle Request
     *
     * @return void
     */
    private function sendRequest()
    {
        if (!property_exists($this, 'method')) {
            $this->method = 'GET';
        }

        if (!property_exists($this, 'timeout')) {
            $this->timeout = 10;
        }

        $client = new Client();

        $request = new Request($this->method, $this->providerApi);

        $response = $client->send($request);

        $this->response = $response;
    }

    /**
     * Handle Guzzle Response
     *
     * @return void
     */
    private function handleResponse()
    {
        $this->responseStatusCode = $this->response->getStatusCode();
        $this->responseBody = json_decode($this->response->getBody());
    }

    /**
     * Validate For Provider API
     *
     * @return void
     */
    private function validateProviderApi()
    {
        if ($this->providerApi == null || !filter_var($this->providerApi, FILTER_VALIDATE_URL)) {

            if (APP_ENV === 'development') {
                throw new InvalidArgumentException('Invalid Provider API');
            }

            die('Invalid Provider API');
        }
    }

    /**
     * Map Provider Response
     *
     * @return array
     */
    abstract public function mapResponse();
}
