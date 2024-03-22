## Criar Caixa

Gerar um ponto de venda em uma loja. Cada caixa registradora terá um código QR exclusivo vinculado a ela.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $filter = [
        'category' => null,
        'external_id' => $Post->external_id,
        'external_store_id' => $Post->external_store_id,
        'fixed_amount' => false,
        'name' => $Post->caixa_terminal_name,
        'store_id' => $Post->caixa_store_id,
    ];
    try {
        $response = $PointSmart->criarCaixa($filter);
        if (!isset($response['status'])) {
            $response = pegarMSGErro($response);
            echo "<pre>";
            print_r($response);
        } else {
            echo "<pre>";
            print_r($response);
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
