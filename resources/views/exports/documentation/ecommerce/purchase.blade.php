```html
<script>
dataLayer.push({
  'event': 'purchase',
  'eventCategory': '{{$attribute->event_category}}',
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
        'brand': '[[marca-produto]]',
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
