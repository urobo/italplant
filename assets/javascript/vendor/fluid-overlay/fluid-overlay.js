class ShapeOverlays {
  constructor(elm) {
    this.elm = elm;
    this.path = elm.querySelectorAll('path');
    this.numPoints = 2;
    this.duration = 600;
    this.delayPointsArray = [];
    this.delayPointsMax = 0;
    this.delayPerPath = 200;
    this.timeStart = Date.now();
    this.isOpened = false;
    this.isAnimating = false;
  }
  toggle() {
    this.isAnimating = true;
    for (var i = 0; i < this.numPoints; i++) {
      this.delayPointsArray[i] = 0;
    }
    if (this.isOpened === false) {
      this.open();
    } else {
      this.close();
    }
  }
  open() {
    this.isOpened = true;
    this.elm.classList.add('is-opened');
    this.timeStart = Date.now();
    this.renderLoop();
  }
  close() {
    this.isOpened = false;
    this.elm.classList.remove('is-opened');
    this.timeStart = Date.now();
    this.renderLoop();
  }
  updatePath(time) {
    const points = [];
    for (var i = 0; i < this.numPoints; i++) {
      const thisEase = this.isOpened ?
                        (i == 1) ? ease.cubicOut : ease.cubicInOut:
                        (i == 1) ? ease.cubicInOut : ease.cubicOut;
      points[i] = thisEase(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1)) * 100
    }

    let str = '';
    str += (this.isOpened) ? `M 0 0 V ${points[0]} ` : `M 0 ${points[0]} `;
    for (var i = 0; i < this.numPoints - 1; i++) {
      const p = (i + 1) / (this.numPoints - 1) * 100;
      const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
      str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
    }
    str += (this.isOpened) ? `V 0 H 0` : `V 100 H 0`;
    return str;
  }
  render() {
    if (this.isOpened) {
      for (var i = 0; i < this.path.length; i++) {
        this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * i)));
      }
    } else {
      for (var i = 0; i < this.path.length; i++) {
        this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * (this.path.length - i - 1))));
      }
    }
  }
  renderLoop() {
    this.render();
    if (Date.now() - this.timeStart < this.duration + this.delayPerPath * (this.path.length - 1) + this.delayPointsMax) {
      requestAnimationFrame(() => {
        this.renderLoop();
      });
    }
    else {
      this.isAnimating = false;
    }
  }
}

(function() {
  const elmOpenOverlay = document.getElementsByClassName('open-overlay');
  const elmOverlay = document.querySelector('.shape-overlays');
  const elemSlider = document.querySelector('.slider-content');
  const elemCloseBtn = document.querySelector('.h-areas-close-slider');
  const overlay = new ShapeOverlays(elmOverlay);

  for(var i=0;i<elmOpenOverlay.length;i++){
      elmOpenOverlay[i].addEventListener('click', () => {
        event.preventDefault();
        if (overlay.isAnimating) {
          return false;
        }
        overlay.toggle();

        if (overlay.isOpened === true) {
          elemSlider.classList.add('is-opened');
          elemCloseBtn.classList.add('is-opened');
          document.documentElement.classList.add('hide-overflow');
        } else {
          elemSlider.classList.remove('is-opened');
          elemCloseBtn.classList.remove('is-opened');
          document.documentElement.classList.remove('hide-overflow');
        }

      });
    };

   //  var areas = document.querySelectorAll('.h-area-single');
   //
   //  areas.forEach(function (element) {
   //      console.log(element);
   //      element.addEventListener('click',function (event){
   //           //  if ( !matchesSelector( event.target, 'h-area-single' ) ) {
   //           //  return;
   //           //}
   //           var selector = event.target.getAttribute('data-selector');
   //           console.log(selector);
   //           flickity.selectCell(selector);
   //     });
   // });

}());
