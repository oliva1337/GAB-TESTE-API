# HOMOLOGAÇÃO

```php
$hOMOLOGAOController = $client->getHOMOLOGAOController();
```

## Class Name

`HOMOLOGAOController`

## Methods

* [HML - Obter Token](/doc/controllers/homologação.md#hml-obter-token)
* [HML - Autenticar Cliente](/doc/controllers/homologação.md#hml-autenticar-cliente)
* [HML - Buscar Segunda Via](/doc/controllers/homologação.md#hml-buscar-segunda-via)
* [HML - Enviar E-Mail Segunda Via](/doc/controllers/homologação.md#hml-enviar-e-mail-segunda-via)
* [HML - Gerar Código De Barras Segunda Via](/doc/controllers/homologação.md#hml-gerar-código-de-barras-segunda-via)
* [HML - Gerar Segunda Via](/doc/controllers/homologação.md#hml-gerar-segunda-via)


# HML - Obter Token

```php
function hMLObterToken(int $usuarioId, int $rotinaId, string $codigoEmpresa, HMLObterTokenRequest $body): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `usuarioId` | `int` | Header, Required | - |
| `rotinaId` | `int` | Header, Required | - |
| `codigoEmpresa` | `string` | Header, Required | - |
| `body` | [`HMLObterTokenRequest`](/doc/models/hml-obter-token-request.md) | Body, Required | - |

## Response Type

`void`

## Example Usage

```php
$usuarioId = 9996;
$rotinaId = 9999999997;
$codigoEmpresa = 'CAN';
$body_grantType = 'client_credentials';
$body = new Models\HMLObterTokenRequest(
    $body_grantType
);

$hOMOLOGAOController->hMLObterToken($usuarioId, $rotinaId, $codigoEmpresa, $body);
```


# HML - Autenticar Cliente

```php
function hMLAutenticarCliente(HMLAutenticarClienteRequest $body): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`HMLAutenticarClienteRequest`](/doc/models/hml-autenticar-cliente-request.md) | Body, Required | - |

## Response Type

`void`

## Example Usage

```php
$body_matricula = '1100043548';
$body_documento = '04397820740';
$body = new Models\HMLAutenticarClienteRequest(
    $body_matricula,
    $body_documento
);

$hOMOLOGAOController->hMLAutenticarCliente($body);
```


# HML - Buscar Segunda Via

```php
function hMLBuscarSegundaVia(string $clientId, string $accessToken, int $protocolo): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `clientId` | `string` | Header, Required | - |
| `accessToken` | `string` | Header, Required | - |
| `protocolo` | `int` | Header, Required | - |

## Response Type

`void`

## Example Usage

```php
$clientId = 'a7d65a76-f1fe-33f3-ae6d-c2964184e849';
$accessToken = '19f08bef-0bcd-30ab-8d83-c5eb21e43f63';
$protocolo = 202111022297840;

$hOMOLOGAOController->hMLBuscarSegundaVia($clientId, $accessToken, $protocolo);
```


# HML - Enviar E-Mail Segunda Via

```php
function hMLEnviarEMailSegundaVia(
    string $clientId,
    string $accessToken,
    int $protocolo,
    int $seqOriginal,
    string $email
): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `clientId` | `string` | Header, Required | - |
| `accessToken` | `string` | Header, Required | - |
| `protocolo` | `int` | Header, Required | - |
| `seqOriginal` | `int` | Header, Required | - |
| `email` | `string` | Header, Required | - |

## Response Type

`void`

## Example Usage

```php
$clientId = 'a7d65a76-f1fe-33f3-ae6d-c2964184e849';
$accessToken = 'fff4222a-74c8-389a-90e2-1d05ef9ea707';
$protocolo = 202111022297816;
$seqOriginal = 22356553;
$email = 'vinicius.lobo@grupoaguasdobrasil.com.br';

$hOMOLOGAOController->hMLEnviarEMailSegundaVia($clientId, $accessToken, $protocolo, $seqOriginal, $email);
```


# HML - Gerar Código De Barras Segunda Via

```php
function hMLGerarCDigoDeBarrasSegundaVia(
    string $clientId,
    string $accessToken,
    int $protocolo,
    int $seqOriginal
): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `clientId` | `string` | Header, Required | - |
| `accessToken` | `string` | Header, Required | - |
| `protocolo` | `int` | Header, Required | - |
| `seqOriginal` | `int` | Header, Required | - |

## Response Type

`void`

## Example Usage

```php
$clientId = 'a7d65a76-f1fe-33f3-ae6d-c2964184e849';
$accessToken = '212ec62c-4a84-3dd3-bb3b-b5590a5cf1ca';
$protocolo = 202111022297816;
$seqOriginal = 22356553;

$hOMOLOGAOController->hMLGerarCDigoDeBarrasSegundaVia($clientId, $accessToken, $protocolo, $seqOriginal);
```


# HML - Gerar Segunda Via

```php
function hMLGerarSegundaVia(string $clientId, string $accessToken, int $protocolo, int $seqOriginal): void
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `clientId` | `string` | Header, Required | - |
| `accessToken` | `string` | Header, Required | - |
| `protocolo` | `int` | Header, Required | - |
| `seqOriginal` | `int` | Header, Required | - |

## Response Type

`void`

## Example Usage

```php
$clientId = 'a7d65a76-f1fe-33f3-ae6d-c2964184e849';
$accessToken = '9c5a1e9a-d8c9-3d04-bb66-d05e5c3ac345';
$protocolo = 202111022297816;
$seqOriginal = 22356553;

$hOMOLOGAOController->hMLGerarSegundaVia($clientId, $accessToken, $protocolo, $seqOriginal);
```

