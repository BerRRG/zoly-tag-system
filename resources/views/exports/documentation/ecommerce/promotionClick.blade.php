```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory': '{{$attribute->event_category}}',
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
