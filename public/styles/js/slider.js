const slide = ["../image/slider/img.webp", "../image/slider/slier_2.jpg", "../image/slider/info1.jpg", "../image/slider/info.jpg"];
let numero = 0;
function ChangeSlide(sens) {
 numero = numero + sens;
 if (numero < 0)
 numero = slide.length - 1;
 if (numero > slide.length - 1)
 numero = 0;
 document.getElementById("slide").src = slide[numero];
}