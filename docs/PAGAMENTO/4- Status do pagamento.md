## Status do pagamento

Este endpoint mostra o status do pagamento.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $payment_id = '';
    try {
        $response = $PointSmart->statusPagamento($payment_id);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
