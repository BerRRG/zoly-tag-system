```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': '{{$attribute->event_category}}',
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
