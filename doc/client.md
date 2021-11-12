
# Client Class Documentation

The following parameters are configurable for the API Client:

| Parameter | Type | Description |
|  --- | --- | --- |
| `environment` | Environment | The API environment. <br> **Default: `Environment.PRODUCTION`** |
| `timeout` | `int` | Timeout for API calls |

The API client can be initialized as follows:

```php
$client = new AgNciaVirtualV2Lib\AgNciaVirtualV2Client([
    // Set authentication parameters
    'basicAuthUserName' => 'BasicAuthUserName',
    'basicAuthPassword' => 'BasicAuthPassword',

    // Set the environment
    'environment' => 'production',
]);
```

## Agência Virtual - V2 Client

The gateway for the SDK. This class acts as a factory for the Controllers and also holds the configuration of the SDK.

## Controllers

| Name | Description |
|  --- | --- |
| getHOMOLOGAOController() | Gets HOMOLOGAOController |

