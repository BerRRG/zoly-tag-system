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


    | Variável        | Exemplo                               | Descrição                         |
    | :-------------- | :------------------------------------ | :-------------------------------- |
    | [[titulo-link]] | 'lojas', 'login/minhas-viagens', etc. | Título do link do header clicado. |

    <br />

    {{dd($attribute)}}
@endforeach

### {{dd()}}





### Especificação de (micro)conversões:


**No clique dos links do header / menu superior**<br />

- **Onde:** Em todas as páginas independente do Layout;
- **Título ou nome do botão/link:** 'Login / Minhas Viagens', 'Atendimento', 'Lojas', 'Televendas', 'Passagens', 'Hotéis', 'Pacotes', etc

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='header:clique'
  data-gtm-event-label='link:[[titulo-link]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='header:clique'
  data-gtm-event-label='link:[[titulo-link]]'
>Botão</i>
```


| Variável        | Exemplo                               | Descrição                         |
| :-------------- | :------------------------------------ | :-------------------------------- |
| [[titulo-link]] | 'lojas', 'login/minhas-viagens', etc. | Título do link do header clicado. |

<br />

**No clique nos links do rodapé**<br />

- **Onde:** Em todas as páginas independente do Layout;
- **Título ou nome do botão/link:** 'Sobre a CVC', 'Política de Privacidade', 'Programe Viaje!', 'Sala de Imprensa', 'Encontre uma loja CVC', etc.

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='footer:clique'
  data-gtm-event-label='link:[[titulo-link]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='footer:clique'
  data-gtm-event-label='link:[[titulo-link]]'
>Botão</i>
```

| Variável        | Exemplo                                         | Descrição                       |
| :-------------- | :---------------------------------------------- | :------------------------------ |
| [[titulo-link]] | 'sobre-a-cvc', 'politica-de-privacidade', etc.  | Título do link footer clicado.  |

<br />


**No clique nos ícones de redes sociais, ao lado do cadastro de newsletter**<br />

- **Onde:** Em todas as páginas independente do Layout;
- **Título ou nome do botão/link:** 'Facebook', 'Instagram', 'Twitter', etc

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='footer:clique'
  data-gtm-event-label='icone:[[nome-rede-social]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:geral'
  data-gtm-event-action='footer:clique'
  data-gtm-event-label='icone:[[nome-rede-social]]'
>Botão</i>
```

| Variável            | Exemplo                                         | Descrição                       |
| :------------------ | :---------------------------------------------- | :------------------------------ |
| [[nome-rede-social]]| 'facebook', 'instagram', 'pinterest', 'youtube' | Nome da rede social clicada.    |

<br />


### Login e Cadastro 



**Após a tentativa de login**<br />
- **Onde:** Na página de Login.

```html
<script>
  dataLayer.push({
    'event': 'login',
    'eventCategory': 'cvc:login',
    'eventAction': 'formulario:envio',
    'eventLabel': 'callback:[[feedback]]'
  });
</script>
```


| Variável        | Exemplo                          | Descrição                          |
| :-------------- | :------------------------------- | :--------------------------------- |
| [[feedback]]    | 'sucesso' ou 'tente-mais-tarde'  | Resultado da tentativa de login.   |

<br />

**Após a tentativa de cadastro no site**<br />

- **Onde:** Na página de cadastro de usuário.

```html
<script>
  dataLayer.push({
    'event': 'conversion',
    'eventCategory': 'cvc:cadastro',
    'eventAction': 'formulario:envio',
    'eventLabel': 'callback:[[feedback]]'
  });
</script>
```


| Variável        | Exemplo              | Descrição                          |
| :-------------- | :------------------- | :--------------------------------- |
| [[feedback]]    | 'sucesso' ou 'erro'  | Resultado da tentativa de cadastro.|

<br />



### Home

**No preenchimento dos campos do motor de busca (input text, select, radio button e input checkbox)**<br />

- **Onde:** Em todas as páginas que estiver disponível.

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:home',
    'eventAction': 'busca-[[tipo-produto]]:preenchimento',
    'eventLabel': 'campo:[[nome-campo]]'
  });
</script>
```

| Variável          | Exemplo                                 | Descrição                      |
| :---------------- | :-------------------------------------- | :----------------------------- |
| [[tipo-produto]]  | 'passagens', 'pacotes', 'resorts', etc. | Categoria do produto buscado.  |
| [[nome-campo]]    | 'origem', 'destino'; 'data-ida', etc.   | Deve retornar o nome do campo. |

<br />

**Ao tentar realizar uma busca**<br />

- **Onde:** Em todas as páginas independente do Layout;
- **Título ou nome do botão/link:** 'Buscar'

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='busca-[[tipo-produto]]:tentativa'
  data-gtm-event-label='botao:buscar'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='busca-[[tipo-produto]]:tentativa'
  data-gtm-event-label='botao:buscar'
>Botão</i>
```

| Variável          | Exemplo                                 | Descrição                      |
| :---------------- | :-------------------------------------- | :----------------------------- |
| [[tipo-produto]]  | 'passagens', 'pacotes', 'resorts', etc. | Categoria do produto buscado.  |

<br />


**No callback do formulário de busca, quando houver erro**<br />

- **Onde:** Em todas as páginas que estiver disponível.

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:home',
    'eventAction': 'busca-[[tipo-produto]]:erro',
    'eventLabel': 'mensagem:[[feedback]]'
  });
</script>
```

| Variável         | Exemplo                                 | Descrição                        |
| :--------------- | :-------------------------------------- | :------------------------------- |
| [[tipo-produto]] | 'passagens', 'pacotes', 'resorts', etc. | Categoria do produto buscado.    |
| [[feedback]]     | 'preencha-o-campo-destino', etc.   | Resultado da tentativa de envio. |

<br />

**No clique do filtro (abas) da vitrine exibida na Home**<br />
- **Título ou nome do botão/link:** "PASSAGEM+HOTEL", "PASSAGENS", "HOTÉIS", "PACOTES CVC

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='vitrine:filtro'
  data-gtm-event-label='botao:[[nome-botao]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='vitrine:filtro'
  data-gtm-event-label='botao:[[nome-botao]]'
>Botão</i>
```

| Variável        | Exemplo                                 					  | Descrição                   	  |
| :-------------- | :------------------------------------------------------------ | :-------------------------------- |
| [[nome-botao]]  | 'passagens+hotel', 'passagens', 'hoteis', 'pacotes-cvc', etc. | Nome do filtro (aba) selecionado  |

<br />


**No clique do filtro de Origem (select) da vitrine exibida na Home**<br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:home',
    'eventAction': 'vitrine:filtro',
    'eventLabel': 'select:origem:[[opcao-selecionada]]'
  });
</script>
```

| Variável       		 | Exemplo                             | Descrição                   |
| :--------------------- | :---------------------------------- | :-------------------------- |
| [[opcao-selecionada]]  | 'sao-paulo', 'rio-de-janeiro' etc.  | Origem escolhida no select  |

<br />


**No clique do box com as ofertas, na vitrine exibida na Home**<br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:[[tipo-produto]]-[[titulo-box]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:[[tipo-produto]]-[[titulo-box]]'
>Botão</i>
```

| Variável       		 | Exemplo                             				 | Descrição                 		|
| :--------------------- | :------------------------------------------------ | :------------------------------- |
| [[tipo-produto]] 		 | 'passagens', 'hoteis', 'pacotes', 'resorts', etc. | Categoria do produto buscado.    |
| [[titulo-box]] 		 | 'punta-cana', 'aruba' etc.  						 | Principal item oferecido no card |

<br />

**No clique dos ícones da seção "Conheça Outros Produtos" na Home**<br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='outros-produtos:clique'
  data-gtm-event-label='icone:[[nome-icone]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:home'
  data-gtm-event-action='outros-produtos:clique'
  data-gtm-event-label='icone:[[nome-icone]]'
>Botão</i>
```

| Variável       		 | Exemplo                             		   | Descrição                 										|
| :--------------------- | :------------------------------------------ | :------------------------------------------------------------- |
| [[nome-icone]] 		 | 'disney', 'lista-de-casamento', 'promocoes' | Deve retornar os links da seção "Conheça outros produtos e aproveite nossas promoções"    |

<br />


### Passagens


**No preenchimento dos campos do motor de busca (input text, select, radio button e input checkbox)**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'busca-passagens:preenchimento',
    'eventLabel': 'campo:[[nome-campo]]'
  });
</script>
```

| Variável          | Exemplo                                 | Descrição                      |
| :---------------- | :-------------------------------------- | :----------------------------- |
| [[nome-campo]]    | 'origem', 'destino'; 'data-ida', etc.   | Deve retornar o nome do campo. |

<br />

**Ao tentar realizar uma busca** <br />
- **Título ou nome do botão/link:** 'Buscar'

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='busca-passagens:tentativa'
  data-gtm-event-label='botao:buscar'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='busca-passagens:tentativa'
  data-gtm-event-label='botao:buscar'
>Botão</i>
```

<br />

**No callback do formulário de busca, quando houver erro** <br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'busca-passagens:erro',
    'eventLabel': 'mensagem:[[feedback]]'
  });
</script>
```

| Variável        | Exemplo                        | Descrição                       |
| :-------------- | :----------------------------- | :------------------------------ |
| [[feedback]]    | 'preencha-o-campo-destino' etc | Resultado da tentativa de envio |

<br />


**No clique do filtro de Origem (select) da vitrine de ofertas** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'vitrine:filtro',
    'eventLabel': 'select:origem:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo                  		    | Descrição                  |
| :-------------------- | :-------------------------------- | :------------------------- |
| [[opcao-selecionada]] | 'sao-paulo', 'rio-de-janeiro' etc | Origem escolhida no select |

<br />

**No clique do box com as ofertas, na vitrine de ofertas** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:passagem-[[titulo-box]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:passagem-[[titulo-box]]'
>Botão</i>
```

| Variável        | Exemplo                  		  | Descrição                 		 |
| :-------------- | :-------------------------------- | :------------------------------- |
|  [[titulo-box]] | 'sao-paulo', 'rio-de-janeiro' etc | Principal item oferecido no card |

<br />

**Na interação com os filtros de checkbox na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:[[tipo-seletor]]:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo                  		    							| Descrição                  				 |
| :-------------------- | :------------------------------------------------------------ | :----------------------------------------- |
| [[nome-filtro]]  		| 'regras-de-bagagem', 'companhia-aerea' 						| Nome do filtro selecionado 				 |
| [[tipo-seletor]]	 	| 'voos-com-mala-despachada', 'voos-sem-mala-despachada' etc	| Deve retornar o item selecionado			 |
| [[opcao-selecionada]] | 'true' ou 'false'												| Retornar se a opção foi selecionada ou não |
<br />

**Na interação com os filtros de intervalo (slider) na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:faixa:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo        							| Descrição        				 |
| :-------------------- | :---------------------------------------- | :----------------------------- |
| [[nome-filtro]]  		| 'horario-de-ida', 'horario-de-volta' 	| Nome do filtro selecionado 	 |
| [[opcao-selecionada]] | '5h50min-22h5min', '1h0min-7h40min'		| Retornar intervalo selecionado |

<br />


**Nos cliques dos links da tabela de Melhores Tarifas** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='melhores-tarifas:clique'
  data-gtm-event-label='link:[[nome-link]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='melhores-tarifas:clique'
  data-gtm-event-label='link:[[nome-link]]'
>Botão</i>
```

| Variável        | Exemplo                  		  		 | Descrição                 		   |
| :-------------- | :--------------------------------------- | :---------------------------------- |
|  [[nome-link]]  | 'voo-direto', '1-parada', 'avianca' etc  | Deve retornar o nome do link clicado|

<br />

**Na interação com o select de ordenação**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'resultado-de-busca:ordenacao',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo                           | Descrição              			    |
| :--------------------  | :-------------------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | 'maior-preco', 'menor-preco' etc | Deve retornar a opção selecionada    |

<br />

**Na interação com o select de quantidade de resultados**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:passagens',
    'eventAction': 'resultado-de-busca:qtd-resultados',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo               | Descrição              			    |
| :--------------------  | :-------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | '25', '50', '100' etc | Deve retornar a opção selecionada    |

<br />


**No clique do link "Ver detalhes +"** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-detalhes'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-detalhes'
>Botão</i>
```

<br />



### Hotéis


**No preenchimento dos campos do motor de busca (input text, select, radio button e input checkbox)**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'busca-hoteis:preenchimento',
    'eventLabel': 'campo:[[nome-campo]]'
  });
</script>
```

| Variável          | Exemplo                                 | Descrição                      |
| :---------------- | :-------------------------------------- | :----------------------------- |
| [[nome-campo]]    | 'criancas', 'adultos'; 'quartos', etc.  | Deve retornar o nome do campo. |

<br />

**Ao tentar realizar uma busca** <br />
- **Título ou nome do botão/link:** 'Buscar'

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='busca-hoteis:tentativa'
  data-gtm-event-label='botao:buscar'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='busca-hoteis:tentativa'
  data-gtm-event-label='botao:buscar'
>Botão</i>
```

<br />

**No callback do formulário de busca, quando houver erro** <br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'busca-hoteis:erro',
    'eventLabel': 'mensagem:[[feedback]]'
  });
</script>
```

| Variável        | Exemplo                        | Descrição                       |
| :-------------- | :----------------------------- | :------------------------------ |
| [[feedback]]    | 'preencha-o-campo-destino' etc | Resultado da tentativa de envio |

<br />


**No clique do box com as ofertas, na vitrine de ofertas** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:hotel-[[titulo-box]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:hotel-[[titulo-box]]'
>Botão</i>
```

| Variável        | Exemplo                  		  | Descrição                 		 |
| :-------------- | :-------------------------------- | :------------------------------- |
|  [[titulo-box]] | 'sao-paulo', 'rio-de-janeiro' etc | Principal item oferecido no card |

<br />

**Na interação com os filtros de checkbox na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:[[tipo-seletor]]:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo                  		    			| Descrição                  				 |
| :-------------------- | :-------------------------------------------- | :----------------------------------------- |
| [[nome-filtro]]  		| 'plano-de-refeicao', 'comodidades' 			| Nome do filtro selecionado 				 |
| [[tipo-seletor]]	 	| 'cafe-da-manha', '100-smoke-free-hotel' etc	| Deve retornar o item selecionado			 |
| [[opcao-selecionada]] | 'true' ou 'false'								| Retornar se a opção foi selecionada ou não |
<br />

**Na interação com os filtros de intervalo (slider) na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:faixa:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo        						| Descrição        				 |
| :-------------------- | :------------------------------------ | :----------------------------- |
| [[nome-filtro]]  		| 'preco' 								| Nome do filtro selecionado 	 |
| [[opcao-selecionada]] | '62.00-4596.36', '55.78-3655.99'	etc	| Retornar intervalo selecionado |

<br />



**Na interação com o select de ordenação**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'resultado-de-busca:ordenacao',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo                           | Descrição              			    |
| :--------------------  | :-------------------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | 'maior-preco', 'menor-preco' etc | Deve retornar a opção selecionada    |

<br />

**Na interação com o select de quantidade de resultados**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:hoteis',
    'eventAction': 'resultado-de-busca:qtd-resultados',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo               | Descrição              			    |
| :--------------------  | :-------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | '25', '50', '100' etc | Deve retornar a opção selecionada    |

<br />


**No clique das opções de visualização ("Ver lista" ou "Ver mapa")** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='resultado-de-busca:visualizacao'
  data-gtm-event-label='icone:[[nome-icone]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='resultado-de-busca:visualizacao'
  data-gtm-event-label='icone:[[nome-icone]]'
>Botão</i>
```

| Variável          | Exemplo               	   | Descrição              		  |
| :---------------  | :-------------------------- | :------------------------------- |
| [[nome-icone]] 	| 'ver-lista', 'ver-mapa' etc | Deve retornar o icone clicado    |


<br />

**No clique do link "Ver no Mapa"** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-no-mapa'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:hoteis'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-no-mapa'
>Botão</i>
```
<br />



### Pacotes

**No preenchimento dos campos do motor de busca (input text, select, radio button e input checkbox)**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'busca-pacotes:preenchimento',
    'eventLabel': 'campo:[[nome-campo]]'
  });
</script>
```

| Variável          | Exemplo                                 | Descrição                      |
| :---------------- | :-------------------------------------- | :----------------------------- |
| [[nome-campo]]    | 'criancas', 'adultos'; 'quartos', etc.  | Deve retornar o nome do campo. |

<br />

**Ao tentar realizar uma busca** <br />
- **Título ou nome do botão/link:** 'Buscar'

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='busca-pacotes:tentativa'
  data-gtm-event-label='botao:buscar'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='busca-pacotes:tentativa'
  data-gtm-event-label='botao:buscar'
>Botão</i>
```

<br />

**No callback do formulário de busca, quando houver erro** <br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'busca-pacotes:erro',
    'eventLabel': 'mensagem:[[feedback]]'
  });
</script>
```

| Variável        | Exemplo                        | Descrição                       |
| :-------------- | :----------------------------- | :------------------------------ |
| [[feedback]]    | 'preencha-o-campo-destino' etc | Resultado da tentativa de envio |

<br />


**No clique do filtro de Origem (select) da vitrine de ofertas** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'vitrine:filtro',
    'eventLabel': 'select:origem:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo                  		    | Descrição                  |
| :-------------------- | :-------------------------------- | :------------------------- |
| [[opcao-selecionada]] | 'sao-paulo', 'rio-de-janeiro' etc | Origem escolhida no select |

<br />

**No clique do box com as ofertas, na vitrine de ofertas** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:passagem+hotel-[[titulo-box]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='vitrine:clique'
  data-gtm-event-label='box:passagem+hotel-[[titulo-box]]'
>Botão</i>
```

| Variável        | Exemplo                  		  | Descrição                 		 |
| :-------------- | :-------------------------------- | :------------------------------- |
|  [[titulo-box]] | 'sao-paulo', 'rio-de-janeiro' etc | Principal item oferecido no card |

<br />

**Na interação com os filtros de checkbox na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:[[tipo-seletor]]:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo                  		    							| Descrição                  				 |
| :-------------------- | :------------------------------------------------------------ | :----------------------------------------- |
| [[nome-filtro]]  		| 'regras-de-bagagem', 'companhia-aerea' 						| Nome do filtro selecionado 				 |
| [[tipo-seletor]]	 	| 'voos-com-mala-despachada', 'voos-sem-mala-despachada' etc	| Deve retornar o item selecionado			 |
| [[opcao-selecionada]] | 'true' ou 'false'												| Retornar se a opção foi selecionada ou não |
<br />

**Na interação com os filtros de intervalo (slider) na sidebar do resultado de busca** <br />

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'filtro:[[nome-filtro]]',
    'eventLabel': 'seletor:faixa:[[opcao-selecionada]]'
  });
</script>
```

| Variável        		| Exemplo        							| Descrição        				 |
| :-------------------- | :---------------------------------------- | :----------------------------- |
| [[nome-filtro]]  		| 'horario-de-ida', 'horario-de-volta' 	| Nome do filtro selecionado 	 |
| [[opcao-selecionada]] | '5h50min-22h5min', '1h0min-7h40min'		| Retornar intervalo selecionado |

<br />

**No clique para trocar um produto do pacote** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:[[voo ou hotel]]:clique'
  data-gtm-event-label='[[altere-o-voo ou escolher-outro-hotel]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:[[voo ou hotel]]:clique'
  data-gtm-event-label='[[altere-o-voo ou escolher-outro-hotel]]'
>Botão</i>
```

| Variável       						   | Exemplo                  					  | Descrição                 		 |
| :--------------------------------------- | :------------------------------------------- | :------------------------------- |
| [[voo ou hotel]]						   | 'voo' ou 'hotel'							  | Deve retornar o nome do produto selecionado para troca.|
| [[altere-o-voo ou escolher-outro-hotel]] | 'altere-o-voo'  ou 'escolher-outro-hotel' | Deve retornar o nome do link clicado |

<br />

**Na interação com o select de ordenação**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'resultado-de-busca:ordenacao',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo                           | Descrição              			    |
| :--------------------  | :-------------------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | 'maior-preco', 'menor-preco' etc | Deve retornar a opção selecionada    |

<br />

**Na interação com o select de quantidade de resultados**<br />


```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:pacotes',
    'eventAction': 'resultado-de-busca:qtd-resultados',
    'eventLabel': 'select:[[opcao-selecionada]]'
  });
</script>
```


| Variável          	 | Exemplo               | Descrição              			    |
| :--------------------  | :-------------------- | :----------------------------------- |
| [[opcao-selecionada]]  | '25', '50', '100' etc | Deve retornar a opção selecionada    |

<br />

**No clique das opções de visualização ("Ver lista" ou "Ver mapa")** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:visualizacao'
  data-gtm-event-label='icone:[[nome-icone]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:visualizacao'
  data-gtm-event-label='icone:[[nome-icone]]'
>Botão</i>
```

| Variável          | Exemplo               	   | Descrição              		  |
| :---------------  | :-------------------------- | :------------------------------- |
| [[nome-icone]] 	| 'ver-lista', 'ver-mapa' etc | Deve retornar o icone clicado    |


<br />

**No clique do link "Ver detalhes +" e "Ver detalhes"** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-detalhes:[[passagem ou hotel]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:passagens'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-detalhes:[[passagem ou hotel]]'
>Botão</i>
```
| Variável               | Exemplo               	     | Descrição              		                                |
| :--------------------  | :-------------------------- | :--------------------------------------------------------- |
| [[passagem ou hotel]]  | 'passagem' ou 'hotel' etc   | Deve retornar o nome do produto correspondente ao clique   |

<br />

**No clique nas abas dentro do modal de detalhes de hotel** <br />
- **Título ou nome do botão/link:** "Fotos", "Sobre o Hotel" e "Comodidades"

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:modal:clique'
  data-gtm-event-label='detalhes:[[nome-aba]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:modal:clique'
  data-gtm-event-label='detalhes:[[nome-aba]]'
>Botão</i>
```
| Variável      | Exemplo               	                   | Descrição              		            |
| :-----------  | :----------------------------------------- | :------------------------------------- |
| [[nome-aba]]  | 'fotos', 'sobre-o-hotel' e 'comodidades'   |  Deve retornar o nome da aba clicada   |

<br />



**No clique do link "Ver quartos"** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-quartos'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='link:ver-quartos'
>Botão</i>
```
<br />

**No clique para selecionar um produto (passagem ou hotel)** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='botao:selecionar:[[passagem ou hotel]]'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='botao:selecionar:[[passagem ou hotel]]'
>Botão</i>
```
| Variável                | Exemplo                 | Descrição              		                                 |
| :------- -------------  | :---------------------- | :--------------------------------------------------------- |
| [[passagem ou hotel]]   | 'passagem' ou 'hotel'   | Deve retornar o nome do produto correspondente ao clique   |

<br />

**No clique para selecionar um quarto** <br />

```html
<!-- Use se o elemento for um link -->
<a href='#' class='gtm-link-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='botao:selecionar:quarto'
>Link</a>

<!-- Use se o elemento não for um link -->
<i class='gtm-element-event'
  data-gtm-event-category='cvc:pacotes'
  data-gtm-event-action='resultado-de-busca:clique'
  data-gtm-event-label='botao:selecionar:quarto'
>Botão</i>
```
<br />

---

### Resorts


**Ao clicar no campo de busca pelo nome do resort'.**<br />

- **Onde:** Na página de resorts.

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:resorts',
    'eventAction': 'busca-resorts:preenchimento',
    'eventLabel': 'campo:nome-resort'
  });
</script>
```

<br />

**Ao clicar no campo de busca pelo nome do resort'.**<br />

- **Onde:** Na página de resorts.

```html
<script>
  dataLayer.push({
    'event': 'event',
    'eventCategory': 'cvc:resorts',
    'eventAction': 'busca-resorts:filtro',
    'eventLabel': 'seletor:[[tipo-seletor]]:[[opcao-selecionada]]'
  });
</script>
```
| Variável              | Exemplo                                                                        | Descrição              		                 |
| :-------------------  | :----------------------------------------------------------------------------- | :------------------------------------------ |
| [[tipo-seletor]]      | 'tipo-resort' ou 'all-inclusive'                                               | Deve retornar o tipo do filtro utilizado.   |
|[[opcao-selecionada]]  | 'todos-resorts', 'resorts-nacionais', 'resorts-internacionais', 'true', 'false'| Deve retornar a opção selecionada           |


<br />


## Enhanced Ecommerce:

### Promotion Impression:

- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez na visualização de um banner.

```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'visualizacao-banner',
  'ecommerce': {
    'promoView': {
      'promotions': [{
        'id': '[[id-banner]]', 
        'name': '[[nome-banner]]',
        'position': '[[posicao-banner]]'
      }]
    }
  }
});
</script>
```

<br />

| Variável              | Exemplo           | Descrição                               |
| :-------------------- | :---------------- | :-------------------------------------- |
| [[id-banner]]         | 'banner123'       | ID único do Banner                      |
| [[nome-banner]]       | 'caldas-novas'    | Nome do amigável do banner              |
| [[posicao-banner]]    | '4'               | Posição que o banner aparece na lista   |

<br />

### Promotion Click:

- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez no clique de um banner.

```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'clique-banner',
  'ecommerce': {
    'promoClick': {
      'promotions': [{
        'id': '[[id-banner]]', 
        'name': '[[nome-banner]]',
        'position': '[[posicao-banner]]'
      }]
    }
  }
});
</script>
```

<br />

| Variável              | Exemplo           | Descrição                               |
| :-------------------- | :---------------- | :-------------------------------------- |
| [[id-banner]]         | 'banner123'       | ID único do Banner                      |
| [[nome-banner]]       | 'caldas-novas'    | Nome do amigável do banner              |
| [[posicao-banner]]    | '4'               | Posição que o banner aparece na lista   |

<br />


### Product Detail:
- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez no carregamento da página de um produto.

```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'detalhes-do-produto',
  'ecommerce': {
    'detail': {
      'actionField': {'list': '[[lista-produto]]'},
      'products': [{
        'name': '[[nome-produto]]',       
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-passagem-aerea]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]'
      }]
    }
  }
 });
</script>
```

**Exceto no momento do carregamento da página de resultado de busca de "Passagens Aéreas" remover o atributo 'brand'**

<br />

| Variável              | Exemplo                                                                                                                     | Descrição                                             |
| :-------------------- | :-------------------------------------------------------------------------------------------------------------------------- | :---------------------------------------------------- |
| [[lista-produto]]     | 'quartos', 'viagens'                                                                                                        | Nome da lista de produtos                             |
| [[nome-produto]]      | 'mabu-interludium-iguassu-convention', 'origem:sao-paulo/destino:rio-de-janeiro', 'beto-carrero-world'| Retornar o nome do hotel, viagem, pacote, resort e etc    |
| [[id-produto]]      | '01233456'        | Retornar o ID do hotel, viagem, pacote, resort e etc.               |
| [[preco-produto]]     | '3846.00'         | Retornar o preço do hotel, viagem, pacote, resort e etc.              |
| [[marca-passagem-aerea]]  | 'avianca', 'gol' e etc. | Retornar a marca da passagem áerea.                         |
| [[categoria-produto]]   | 'hoteis', 'passagens', 'pacotes', 'resorts' | Retornar a categoria do produto                 |
| [[variacao-produto]]    | 'sem-cafe', 'com-cafe-da-manha', 'tudo-incluso', 'voo-direto', '2-paradas', 'voo-direto+sem-cafe', '2-paradas:tudo-incluso' | Retornar a variação do hotel, viagem, pacote, resort e etc.             |


<br />

### AddToCart:
- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez no clique do CTA de adição de produto ao carrinho (Após o clique no botão 'Comprar').

**OBS: Nas páginas de resultado de busca de Passagens e Pacotes e nas páginas de Hoteis/Resorts**

```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'adicao-ao-carrinho',
  'ecommerce': {
    'add': {
      'products': [{
        'name': '[[nome-produto]]',     
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-passagem-aerea]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]',
        'quantity': '[[quantidade-produto]]'
      }]
    }
  }
});
</script>
```

**Exceto no momento do carregamento da página de resultado de busca de "Passagens Aéreas" remover o atributo 'brand'**

<br />

| Variável              | Exemplo                                                                                                                     | Descrição                                             |
| :-------------------- | :-------------------------------------------------------------------------------------------------------------------------- | :---------------------------------------------------- |
| [[nome-produto]]      | 'mabu-interludium-iguassu-convention', 'origem:sao-paulo/destino:rio-de-janeiro', 'beto-carrero-world'| Retornar o nome do hotel, viagem, pacote, resort e etc    |
| [[id-produto]]      | '01233456'        | Retornar o ID do hotel, viagem, pacote, resort e etc.               |
| [[preco-produto]]     | '3846.00'         | Retornar o preço do hotel, viagem, pacote, resort e etc.              |
| [[marca-passagem-aerea]]  | 'avianca', 'gol' e etc. | Retornar a marca da passagem áerea.                         |
| [[categoria-produto]]   | 'hoteis', 'passagens', 'pacotes', 'resorts' | Retornar a categoria do produto                 |
| [[variacao-produto]]    | 'sem-cafe', 'com-cafe-da-manha', 'tudo-incluso', 'voo-direto', '2-paradas', 'voo-direto+sem-cafe', '2-paradas:tudo-incluso' | Retornar a variação do hotel, viagem, pacote, resort e etc.             |
| [[quantidade-produto]]  | '1'       | Retornar a quantidade do produto |

<br />


### Checkout:

- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez no carregamento das páginas do checkout.

```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'checkout',
  'ecommerce': {
    'checkout': {
      'actionField': {'step': '[[passo-checkout]]'},
      'products': [{
        'name': '[[nome-produto]]',     
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-passagem-aerea]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]',
        'quantity': '[[quantidade-produto]]'
      }]
    }
  }
});
</script>
```

**Exceto no momento do carregamento da página de resultado de busca de "Passagens Aéreas" remover o atributo 'brand'**

<br />

| Variável              | Exemplo                                                                                                                     | Descrição                                             |
| :-------------------- | :-------------------------------------------------------------------------------------------------------------------------  | :---------------------------------------------------  |
| [[passo-checkout]]    | '1'                                                                                                                         | Passo atual do checkout                               |
| [[nome-produto]]      | 'mabu-interludium-iguassu-convention', 'origem:sao-paulo/destino:rio-de-janeiro', 'beto-carrero-world'| Retornar o nome do hotel, viagem, pacote, resort e etc    |
| [[id-produto]]        | '01233456'        | Retornar o ID do hotel, viagem, pacote, resort e etc.               |
| [[preco-produto]]     | '3846.00'         | Retornar o preço do hotel, viagem, pacote, resort e etc.              |
| [[marca-passagem-aerea]]  | 'avianca', 'gol' e etc. | Retornar a marca da passagem áerea.                         |
| [[categoria-produto]]   | 'hoteis', 'passagens', 'pacotes', 'resorts' | Retornar a categoria do produto                 |
| [[variacao-produto]]    | 'sem-cafe', 'com-cafe-da-manha', 'tudo-incluso', 'voo-direto', '2-paradas', 'voo-direto+sem-cafe', '2-paradas:tudo-incluso' | Retornar a variação do hotel, viagem, pacote, resort e etc.             |
| [[quantidade-produto]]  | '1'       | Retornar a quantidade do produto |

<br />

### Purchase:

- **Onde:** O objeto javascript (dataLayer) abaixo deve ser disparado uma única vez no carregamento da página de transação, e se o usuário acessar novamente o link ou atualizar a página, o objeto não deve ser disparado novamente.

```html
<script>
dataLayer.push({
  'event': 'purchase',
  'eventCategory': 'cvc:enhanced-ecommerce',
  'eventAction': 'purchase',
  'ecommerce': {
    'purchase': {
      'actionField': {
        'id': '[[id-transacao]]', 
        'revenue': '[[valor-total-transacao]]',
        'tax': '[[taxa-transacao]]',
        'coupon': '[[cupom-transacao]]'
      },
      'products': [{
        'name': '[[nome-produto]]',       
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-passagem-aerea]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]',
        'quantity': '[[quantidade-produto]]',
        'coupon': '[[cupom-produto]]'
      }]
    }
  }
});
</script>
```

**Exceto no momento do carregamento da página de resultado de busca de "Passagens Aéreas" remover o atributo 'brand'**

*Descrição Purchase:*

| Variável                  | Exemplo           | Descrição                                         |
| :------------------------ | :---------------- | :------------------------------------------------ |
| [[id-transacao]]          | '012736183'       | ID da Transação                                   |
| [[valor-total-transacao]] | '3846.00'         | Valor total da transação incluindo frete e taxas  |
| [[taxa-transacao]]        | '0.00'            | Taxas da transação                                |
| [[cupom-transacao]]       | 'cupom-2018'      | Cupom de desconto usado na transação              |

<br />

*Descrição Produtos:*

| Variável              | Exemplo                                                                                                                     | Descrição                                             |
| :-------------------- | :-------------------------------------------------------------------------------------------------------------------------- | :---------------------------------------------------  |
| [[nome-produto]]      | 'mabu-interludium-iguassu-convention', 'origem:sao-paulo/destino:rio-de-janeiro', 'beto-carrero-world'| Retornar o nome do hotel, viagem, pacote, resort e etc    |
| [[id-produto]]      | '01233456'        | Retornar o ID do hotel, viagem, pacote, resort e etc.               |
| [[preco-produto]]     | '3846.00'         | Retornar o preço do hotel, viagem, pacote, resort e etc.              |
| [[marca-passagem-aerea]]  | 'avianca', 'gol' e etc. | Retornar a marca da passagem áerea.                         |
| [[categoria-produto]]   | 'hoteis', 'passagens', 'pacotes', 'resorts' | Retornar a categoria do produto                 |
| [[variacao-produto]]    | 'sem-cafe', 'com-cafe-da-manha', 'tudo-incluso', 'voo-direto', '2-paradas', 'voo-direto+sem-cafe', '2-paradas:tudo-incluso' | Retornar a variação do hotel, viagem, pacote, resort e etc.             |
| [[quantidade-produto]]  | '1'       | Retornar a quantidade do produto |
| [[cupom-produto]]     | 'cupom-2018'        | Retornar o cupom de desconto utilizado no produto     |

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
