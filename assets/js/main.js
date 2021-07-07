
//активность кнопки добавления изображения
var submit = document.querySelector("[name=submit_image]");
var image_product = document.querySelector("[name=image_product]");
    
setInterval(function(){
    if (image_product.value != '') {
        submit.removeAttribute('disabled');
    }else{
        submit.setAttribute('disabled', 'disabled');
    }
}, 500);


//FETCH
var input = document.querySelector('[name=image_product]');
var data = new FormData();
// console.log(data);
async function submit() {
    fetch('/images/product/create/64', {
      method: 'POST',
      body: data
    })
};