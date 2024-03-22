## Criar Loja

Gere um estabelecimento físico onde os clientes possam adquirir produtos ou serviços. Você pode criar mais de uma loja por conta.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\MercadoPagoPointSmart\MercadoPagoPointSmart;
    $token = '';//você gerencia seu token
    $PointSmart = new MercadoPagoPointSmart($token);

    $user_id = '';
    $filter = [
        'external_id' => $Post->external_id,
        'location' => [
            "street_number" => $Post->street_number,
            "street_name" => $Post->street_name,
            "city_name" => $Post->city_name,
            "state_name" => $state_name,//nome por extenso
            "latitude" => $Post->latitude,
            "longitude" => $Post->longitude,
            "reference" => $Post->reference,
        ],
        'name' => $Post->loja_name,
    ];
    try {
        $response = $PointSmart->criarLoja($user_id, $filter);
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

Para buscar os dados do endereço pelo CEP<br>
Instalar

```php
 composer require divulgueregional/consulta-publicas
```

Opção 2 tras os dados latitude e longitude pelo cep

```php
    require_once './consulta-publica/vendor/autoload.php';
    use Divulgueregional\ConsultaPublicas\ConsultaPublica;
    $onsultaPublica =  new ConsultaPublica();

    $cep = "55324-424";//pode ser só número ou em formato de cep
    $opcao = 2;//1-viacep.com.br; 2-cep.awesomeapi.com.br; 3-brasilapi.com.br
    try {
        $consultarCEP = $onsultaPublica->consultarCEP($cep, $opcao);
        echo "<pre>";
        print_r($consultarCEP);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```
