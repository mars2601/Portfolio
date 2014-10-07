function positionSouris(event) {
	background = document.getElementById('background');
   posX = event.clientX;
   posY = event.clientY;
   divParts = 2;
   tx = posX / 15;
   ty = posY / 40;
   px =(-tx)+'px '+(-ty)+'px';
   background.style.backgroundPosition = px;
}
