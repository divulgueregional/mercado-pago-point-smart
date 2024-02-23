## Gerar Token Point Smart do Mercado Pago

Criar o token.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $PointSmart = new MercadoPagoPointSmart();

    $config = [
        'client_id' => '',
        'client_secret' => '',
        'grant_type' => 'authorization_code',
        'redirect_uri' => '',
        'code' => '',
    ];

    //criar o token
    try {
        $token = $PointSmart->gerarToken($config);
        echo "<pre>";
        print_r($token);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
