## Atualizar Token Point Smart do Mercado Pago

Atualizar o token necessário para operar seu aplicativo em nome de um vendedor.
O token tem um prazo de validade e precisa ser atualizado.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $PointSmart = new MercadoPagoPointSmart();

    $config = [
        'client_id' => '',
        'client_secret' => '',
        'grant_type' => 'refresh_token',
        'refresh_token' => '',//código TG
    ];

    //atualizar o token
    try {
        $token = $PointSmart->atualizarToken($config);
        echo "<pre>";
        print_r($token);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
