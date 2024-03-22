## Excluir Loja

Exclua um ponto de venda sempre que for necessário com o ID da caixa.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $id = '';
    try {
        $response = $PointSmart->excluirCaixa($id);
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
