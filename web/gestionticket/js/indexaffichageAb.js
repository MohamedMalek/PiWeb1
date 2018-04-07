var id = document.getElementsByName('id').value;
alert(id)
var btnBuy = document.getElementById('buy'+id);
var btnCheckout = document.getElementById('checkout'+id);
var card = document.getElementById(id);
btnBuy.addEventListener('click', function() {
  card.classList.add('show-back');
  card.classList.remove('show-front');
});
btnCheckout.addEventListener('click', function() {
  card.classList.remove('show-back');
  card.classList.add('show-front');
});
