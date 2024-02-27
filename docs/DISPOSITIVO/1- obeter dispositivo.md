## Obter dispositivos do Mercado Pago

Este endpoint permite que você obtenha os dispositivos Point associados à sua conta do Mercado Pago. Os dispositivos podem ser filtrados por ponto de venda e/ou loja.

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
