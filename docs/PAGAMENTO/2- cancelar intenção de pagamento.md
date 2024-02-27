## Cancelar intenção de pagamento

Este endpoint permite cancelar uma intenção de pagamento quando seu status for [open] e ainda não tiver sido enviada para o terminal.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $device_id = '';
    $payment_id = '';
    try {
        $response = $PointSmart->cancelarPagamento($device_id, $payment_id);
        echo "<pre>";
        print_r($response);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
