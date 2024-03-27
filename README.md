## Pacote integração Point Smart do Mercado Pago - PHP

Esse pacote oferece integração com a maquininha Point Smart do Mercado Pago para consumir em PHP, conforme documentação da API do Mercado Pago. Essa biblioteca pode ser facilmente integrada ao seu software e/ou ERP.

#### Observação

Os endpoints disponibilizados por este pacote seguem a padronização do Mercado Pago API: [Link Documentação](https://www.mercadopago.com.br/developers/pt/reference/integrations_api_paymentintent_mlb/_point_integration-api_devices_deviceid_payment-intents/post).

<hr>

### Como usar:

<b>Instalação: </b>
Para utilizar a biblioteca através do composer:

```php

composer require divulgueregional/mercado-pago-point-smart

```

<br>

## Atualizar:

```php
composer update
```

<b>Ou pela última tag: </b>

```php
composer update divulgueregional/mercado-pago-point-smart 1.0.7
```

<hr>

### Documentação:

Acesse a pasta docs e leia o README.md
<br>

<hr>

#### O QUE VOCÊ PODE UTILIZAR

<b>SEGURANÇA</b><br>

- Gerar o token
- Atualizar o token

<b>DISPOSITIVO (máquina point smart)</b><br>

- Obter dispositivo
- Alterar Modo Criação
  <br>

<b>PAGAMENTO</b><br>

- Criar intenção de pagamento
- Alterar Modo Criação
- Buscar em intenção de pagamento
- Status do pagamento
- Lista de pagamento
- Lista de transações
- Buscar pagamento detalhado após pagamento
  <br>

<b>ESTORNO</b><br>

- Estornar um pagamento.
- Busca um estorno realizado.

<b>WEBHOOK</b><br>

- Receber as notificações.

<b>Quais cartões posso aceitar com a Point?</b><br>

- Abra o link para ver os tipos de cartões: https://www.mercadopago.com.br/ajuda/quais-cartoes-posso-aceitar-com-a-point_2604

<hr>
<b>PIX</b><br>
Geração do pix usa o mesmo token que a Point Smart.<br>
Crie uma loja e um caixa para depois gerar um pix.<br>

LOJA<br>

- Criar loja
- Obter loja
- Buscar em loja
- Atualizar loja
- Excluir loja

CAIXA<br>

- Criar Caixa
- Obter Caixa
- Buscar em Caixa
- Mostrar Todos Caixa
- Excluir Caixa

PIX<br>

- Criar Pix
- Buscar Pix Criado<br>
<b>OBservação</b><br>
Não obtive sucesso após pagar o pix ter um retorno do pagamento, consegue gerar o pix mas não tem como saber se foi pago. Whebhook não mostra o retonro a quem pertence o pix e os endpoints passados não tem como buscar um determindao pix. Se conseguir o endpoind ou saber que ajustaram o webhook favor me avisar pra mim ajustar o projeto. rosenomatos@gmail.com
<hr>

## Autor:

Roseno Matos (developer) rosenomatos@gmail.com<br>

<!-- ## Licença:
A mercado-pago-point-smart é licenciado sob a Licença MIT (MIT). Você pode usar, copiar, modificar, integrar, publicar, distribuir e/ou vender cópias dos produtos finais, mas deve sempre declarar que Roseno Matos (rosenomatos@gmail.com) é o autor original destes códigos e atribuir um link para https://github.com/divulgueregional/api-bb-php -->

<!-- ## Comunidade:
## Facilitou sua vida?
Se o projeto o ajudou em uma tarefa excencial a sua aplicação de uma forma simples e se gostaria de contribuir com uma pequena doação ao autor, faça pelo PIX abaixo<br><hr>

Chave Pix E-MAIL: roseno@divulgueregional.com.br -->
