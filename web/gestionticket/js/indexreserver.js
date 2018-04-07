$(document).ready(function(){
  var number = 2;
  $(".table-number>strong").html(number);
});

$(".table.plus").click(function(){
  number = $(".table-number>strong").text();
  number = parseInt(number) + 1;
  $(".table-number>strong").html(number);
})

$(".table.minus").click(function(){
  number = $(".table-number>strong").text();
  number = parseInt(number) - 1;
  /* if(number == 2){
      $(".table.minus").css("button:disabled");
  } */
  if(number > 1){
      $(".table-number>strong").html(number);
  }
})