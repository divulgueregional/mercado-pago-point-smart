## Excluir Loja

Exclua um estabelecimento físico sempre que for necessário com o ID da loja.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $filter = [
        'user_id' => $Post->user_id,
        'id' => $Post->id,
    ];
    $user_id = '';
    try {
        $response = $PointSmart->excluirLoja($user_id, $filter);
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
