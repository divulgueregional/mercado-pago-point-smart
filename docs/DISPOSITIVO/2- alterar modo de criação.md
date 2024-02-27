## Alterar modo de criação

Este endpoint permite alterar o modo de operação do dispositivo. As opções são:

- <b>PDV:</b> quando o dispositivo é usado em modo integrado com nossa API
- <b>STANDALONE:</b> é usado quando você deseja processar pagamentos sem nossa API.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    try {
        $filter = [
            'operating_mode' => 'PDV' //PDV ou STANDALONE
        ];
        $device_id = '';
        $response = $PointSmart->alterarModoCriacao($device_id, $filter);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
