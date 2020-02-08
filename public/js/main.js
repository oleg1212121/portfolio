(function($) {
  "use strict";

  var canvas = document.getElementById('canvas');
  if(!!canvas) {
    var ctx = canvas.getContext('2d');

    // массив координат для отображения изображений
    var animationArray = [
      {'sx': 0, 'sy': 100, 'sWidth': 90, 'sHeight': 100, 'dx': 50, 'dy': 50, 'dWidth': 140, 'dHeight': 130,},
      {'sx': 90, 'sy': 20, 'sWidth': 90, 'sHeight': 100, 'dx': 200, 'dy': 50, 'dWidth': 140, 'dHeight': 130,},
      {'sx': 200, 'sy': 110, 'sWidth': 90, 'sHeight': 100, 'dx': 400, 'dy': 60, 'dWidth': 140, 'dHeight': 130,},
      {'sx': 200, 'sy': 10, 'sWidth': 90, 'sHeight': 100, 'dx': 400, 'dy': 180, 'dWidth': 140, 'dHeight': 130,},
      {'sx': 90, 'sy': 110, 'sWidth': 105, 'sHeight': 80, 'dx': 210, 'dy': 190, 'dWidth': 170, 'dHeight': 130,},
      {'sx': 0, 'sy': 0, 'sWidth': 90, 'sHeight': 100, 'dx': 50, 'dy': 170, 'dWidth': 140, 'dHeight': 130,},
    ];


    var img = new Image();
    img.onload = function () {
      var i = 0;
      setInterval(function () {
        draw(i);
        i++;
        if (i > animationArray.length - 1) {
          i = 0;
        }
      }, 1000);
    };
    img.src = 'images/bears.jpg';

    function draw(index) {
      // зарисовывание фона белым цветом с прозрачностью
      ctx.fillStyle = "rgba(255,255,255,0.85)";
      ctx.fillRect(0, 0, 1000, 800);

      // отрисовка изображения по координатам из массива
      ctx.drawImage(
        img,
        animationArray[index]['sx'],
        animationArray[index]['sy'],
        animationArray[index]['sWidth'],
        animationArray[index]['sHeight'],
        animationArray[index]['dx'],
        animationArray[index]['dy'],
        animationArray[index]['dWidth'],
        animationArray[index]['dHeight']
      );
    }
  }
})(jQuery);