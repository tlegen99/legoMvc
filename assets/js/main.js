
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