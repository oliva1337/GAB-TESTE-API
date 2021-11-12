<?php

declare(strict_types=1);

/*
 * AgNciaVirtualV2Lib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace AgNciaVirtualV2Lib;

use AgNciaVirtualV2Lib\Controllers;

/**
 * AgNciaVirtualV2Lib client class
 */
class AgNciaVirtualV2Client implements ConfigurationInterface
{
    private $hOMOLOGAO;

    private $timeout = ConfigurationDefaults::TIMEOUT;
    private $environment = ConfigurationDefaults::ENVIRONMENT;
    private $basicAuthUserName = ConfigurationDefaults::BASIC_AUTH_USER_NAME;
    private $basicAuthPassword = ConfigurationDefaults::BASIC_AUTH_PASSWORD;
    private $basicAuthManager;
    private $authManagers = [];
    private $httpCallback;

    public function __construct(array $configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }
        if (isset($configOptions['basicAuthUserName'])) {
            $this->basicAuthUserName = $configOptions['basicAuthUserName'];
        }
        if (isset($configOptions['basicAuthPassword'])) {
            $this->basicAuthPassword = $configOptions['basicAuthPassword'];
        }
        if (isset($configOptions['httpCallback'])) {
            $this->httpCallback = $configOptions['httpCallback'];
        }

        $this->basicAuthManager = new BasicAuthManager($this->basicAuthUserName, $this->basicAuthPassword);
        $this->authManagers['global'] = $this->basicAuthManager;
    }

    /**
     * Get the client configuration as an associative array
     */
    public function getConfiguration(): array
    {
        $configMap = [];

        if (isset($this->timeout)) {
            $configMap['timeout'] = $this->timeout;
        }
        if (isset($this->environment)) {
            $configMap['environment'] = $this->environment;
        }
        if ($this->getBasicAuthCredentials()->getBasicAuthUserName() !== null) {
            $configMap['basicAuthUserName'] = $this->getBasicAuthCredentials()->getBasicAuthUserName();
        }
        if ($this->getBasicAuthCredentials()->getBasicAuthPassword() !== null) {
            $configMap['basicAuthPassword'] = $this->getBasicAuthCredentials()->getBasicAuthPassword();
        }
        if (isset($this->httpCallback)) {
            $configMap['httpCallback'] = $this->httpCallback;
        }

        return $configMap;
    }

    /**
     * Clone this client and override given configuration options
     */
    public function withConfiguration(array $configOptions): self
    {
        return new self(\array_merge($this->getConfiguration(), $configOptions));
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function getBasicAuthCredentials(): ?BasicAuthCredentials
    {
        return $this->basicAuthManager;
    }

    /**
     * Get the base uri for a given server in the current environment
     *
     * @param  string $server Server name
     *
     * @return string         Base URI
     */
    public function getBaseUri(string $server = Server::SERVER_1): string
    {
        return static::ENVIRONMENT_MAP[$this->environment][$server];
    }

    /**
     * Returns HOMOLOGAO Controller
     */
    public function getHOMOLOGAOController(): Controllers\HOMOLOGAOController
    {
        if ($this->hOMOLOGAO == null) {
            $this->hOMOLOGAO = new Controllers\HOMOLOGAOController(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->hOMOLOGAO;
    }

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    private const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::SERVER_1 => 'https://api-hml.grupoaguasdobrasil.com.br/api/AgenciaVirtual/v2',
        ],
    ];
}
