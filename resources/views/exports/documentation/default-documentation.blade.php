![Zoly](http://lucida-brasil.github.io/public/Images/zoly-logo.png)

> Área - Digital Analytics<br />
> Documento de Especificação Técnica

<br />

## Implementação da Camada de dados
Última atualização: {{$tagBook->updated_at->format('d/m/Y')}} <br />
Em caso de dúvidas, entrar em contato com: [digitalanalytics@zoly.com.br](mailto:@zoly.com.br)

<br />

## Objetivo

Este documento tem como objetivo instruir a implementação da camada de dados para utilização de recursos do enhanced ecommerce referentes ao ambiente de [CVC](https://www.cvc.com.br/).

<br />

## Overview e Descrições Técnicas

### Camada de dados (DataLayer)
> É um array de objetos javascript utilizado pelo Google Tag Manager para receber em seus atributos, dados importantes do site.
Para implementar o dataLayer no site, o desenvolvedor pode utilizar formas diferentes para preencher os dados. Essas formas são dependentes da ação estabelecida na documentação e também do nível da interação.

**Instalação**<br />
Inserir a camada de dados antes do snippet de instalação do Google Tag Manager. Exemplo:

```html
<script>
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
    'atributo1': 'valor1',
    'atributo2': 'valor2'
  });
</script>
```

## Implementação

A documentação foi descrita para algumas áreas especificas do ambiente [{{$tagBook->client_name}}]({{$tagBook->url}}).

---

## Especificações Globais:

**Itens Gerais:**<br />

Todas as informações entre colchetes `[[  ]]` são variáveis dinâmicas que devem ser preenchidas com seus respectivos valores;<br />
Todos os valores enviados ao Google Analytics devem estar sanitizados, ou seja, sem espaços, acentuação ou caracteres especiais;<br />
Caso a informação solicitada não esteja disponível retornar: 'nao_disponivel'.

---

@foreach($attributes as $attribute)
@if($attribute->section)
### {{ $attribute->section }}
@continue
@endif

**{{ $attribute->description_when }}**<br />

- ** Onde:** {{ $attribute->description_where }}
    @if($attribute->description_button)
- ** Titulo ou nome do botão/link:** {{ $attribute->description_button }}
    @endif

@if($attribute->data_layer_data_attribute == 'dataLayer')
@php
$dimensions = $attribute->dimensions()->get();
@endphp
```html
<script>
  dataLayer.push({
    'event': '{{$attribute->data_layer_event}}',
    'eventCategory': '{{$attribute->event_category}}',
    'eventAction': '{{$attribute->event_action}}',
    'eventLabel': '{{$attribute->event_label_var}}'@if($dimensions),@endif

@if($dimensions)
@foreach($dimensions as $dimension)
    '{{$dimension->name}}': '{{$dimension->variable}}',
@endforeach
@endif
  });
</script>
```
@endif

@if($attribute->data_layer_data_attribute == 'dataAttribute')
```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
   data-gtm-event-category='{{ $attribute->event_category }}'
   data-gtm-event-action='{{ $attribute->event_action }}'
   data-gtm-event-label='{{ $attribute->event_label_var }}'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
   data-gtm-event-category='{{ $attribute->event_category }}'
   data-gtm-event-action='{{ $attribute->event_action }}'
   data-gtm-event-label='{{ $attribute->event_lavel_var }}'
>Botão</i>
```
@endif

@if($attribute->fields_to_set_type)
@include('exports.documentation.ecommerce.'.$attribute->fields_to_set_type)
@endif

@if ($attribute->comments()->get())
| Variável        | Exemplo                               | Descrição                         |
| :-------------- | :------------------------------------ | :-------------------------------- |
@endif
@foreach($attribute->comments()->get() as $comment)
| [[{{$comment->variable}}]] | {{$comment->example}} | {{$comment->note}} |
@endforeach
<br />

@endforeach

<br />

---

## Considerações Finais

> Recomendações do Google:
> 1. [Enhanced Ecommerce - Product Impressions](https://developers.google.com/tag-manager/enhanced-ecommerce#product-impressions)
> 2. [Enhanced Ecommerce - Product Clicks](https://developers.google.com/tag-manager/enhanced-ecommerce#product-clicks)
> 3. [Enhanced Ecommerce - Product Detail](https://developers.google.com/tag-manager/enhanced-ecommerce#details)
> 4. [Enhanced Ecommerce - AddToCart / Remove From Cart](https://developers.google.com/tag-manager/enhanced-ecommerce#cart)
> 5. [Enhanced Ecommerce - Promotion Impression](https://developers.google.com/tag-manager/enhanced-ecommerce#promo-impressions)
> 6. [Enhanced Ecommerce - Promotion Click](https://developers.google.com/tag-manager/enhanced-ecommerce#promo-clicks)
> 7. [Enhanced Ecommerce - Checkout](https://developers.google.com/tag-manager/enhanced-ecommerce#checkout)
> 8. [Enhanced Ecommerce - Purchase](https://developers.google.com/tag-manager/enhanced-ecommerce#purchases)
> 9. [Enhanced Ecommerce - Refunds(Reembolso)](https://developers.google.com/tag-manager/enhanced-ecommerce#refunds)

> Em caso de dúvidas, entrar em contato com: [](mailto:@zoly.com.br)

<script>
  document.addEventListener('DOMContentLoaded', function(event) {
    document.querySelectorAll('h1 a')[0].style.display = 'none';
  });
</script>
