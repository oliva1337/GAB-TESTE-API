<?php

declare(strict_types=1);

/*
 * AgNciaVirtualV2Lib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace AgNciaVirtualV2Lib\Controllers;

use AgNciaVirtualV2Lib\Http\HttpCallBack;
use AgNciaVirtualV2Lib\Http\HttpResponse;
use AgNciaVirtualV2Lib\Http\HttpRequest;
use AgNciaVirtualV2Lib\Exceptions\ApiException;
use AgNciaVirtualV2Lib\ConfigurationInterface;
use AgNciaVirtualV2Lib\AuthManagerInterface;
use apimatic\jsonmapper\JsonMapper;

/**
 * Base controller
 */
class BaseController
{
    /**
     * User-agent to be sent with API calls
     *
     * @var string
     */
    protected const USER_AGENT = 'APIMATIC 3.0';

    /**
     * HttpCallBack instance associated with this controller
     *
     * @var HttpCallBack|null
     */
    private $httpCallBack;

    /**
     * Configuration instance
     *
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * List of auth managers for this controller.
     *
     * @var array
     */
    private $authManagers = [];

    /**
     * Constructor that sets the timeout of requests
     */
    protected function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        $this->config = $config;
        $this->authManagers = $authManagers;
        $this->httpCallBack = $httpCallBack;
    }

    /**
     * Get auth manager for the provided namespace key.
     *
     * @param  string   $key         Namespace key
     * @return AuthManagerInterface  The AuthManager set for this key.
     */
    protected function getAuthManager(string $key): AuthManagerInterface
    {
        return $this->authManagers[$key];
    }

    /**
     * Get HttpCallBack for this controller
     *
     * @return HttpCallBack|null The HttpCallBack object set for this controller
     */
    public function getHttpCallBack(): ?HttpCallBack
    {
        return $this->httpCallBack;
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     *
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper(): JsonMapper
    {
        $mapper = new JsonMapper();
        return $mapper;
    }

    /**
     * Validate response or throw exception based on the status code
     */
    protected function validateResponse(HttpResponse $response, HttpRequest $request): void
    {
        if (($response->getStatusCode() < 200) || ($response->getStatusCode() > 208)) { //[200,208] = HTTP OK
            throw new ApiException('HTTP Response Not OK', $request, $response);
        }
    }

    /**
     * Create and get ApiException-derived exception instance
     */
    protected function createExceptionFromJson(
        string $type,
        string $reason,
        HttpRequest $request,
        HttpResponse $response
    ) {
        $body = json_decode($response->getRawBody());

        if ($body === null) {
            return new ApiException($reason, $request, $response);
        } else {
            $body->reason = $reason;
            $body->request = $request;
            $body->response = $response;
        }

        return $this->getJsonMapper()->mapClass($body, $type);
    }
}
