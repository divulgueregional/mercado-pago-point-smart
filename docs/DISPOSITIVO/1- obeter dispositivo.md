## Obter dispositivos do Mercado Pago

Listar Disposotivos

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $config = [
        'limit' => 50,
        'offset' => 0,
    ];

    try {
        $response = $PointSmart->obterDispositivo($config);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
