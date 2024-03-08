## Buscar um Estonro

Esse endpoint permite buscar um estorno realizado.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $Ppayment_id = '';// id do pagamento
    $PidEstorno = '';// id do estorno
    try {
        $response = $PointSmart->buscarEstornarPagamento($Post->payment_id, $Post->idEstorno);
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
