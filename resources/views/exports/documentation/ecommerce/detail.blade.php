```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': '{{$attribute->event_category}}',
  'eventAction': 'detalhes-do-produto',
  'ecommerce': {
    'detail': {
      'actionField': {'list': '[[lista-produto]]'},
      'products': [{
        'name': '[[nome-produto]]',
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-produto]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]'
      }]
    }
  }
 });
</script>
```
