```html
<script>
dataLayer.push({
  'event': 'enhanced-ecommerce',
  'eventCategory':'{{$attribute->event_category}}',
  'eventAction': 'adicao-ao-carrinho',
  'ecommerce': {
    'add': {
      'products': [{
        'name': '[[nome-produto]]',
        'id': '[[id-produto]]',
        'price': '[[preco-produto]]',
        'brand': '[[marca-produto]]',
        'category': '[[categoria-produto]]',
        'variant': '[[variacao-produto]]',
        'quantity': '[[quantidade-produto]]'
      }]
    }
  }
});
</script>
```

