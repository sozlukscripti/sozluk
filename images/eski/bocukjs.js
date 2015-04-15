function changePos() {
if(name) {
width = document.body.clientWidth;
height = document.body.clientHeight;
Hoffset = img.offsetHeight;
Woffset = img.offsetWidth;
img.style.left = xPos + document.body.scrollLeft;
img.style.top = yPos + document.body.scrollTop;
}
else {
height = window.innerHeight;
width = window.innerWidth;
Hoffset = document.img.clip.height;
Woffset = document.img.clip.width;
document.img.pageY = yPos + window.pageYOffset;
document.img.pageX = xPos + window.pageXOffset;
document.imd.pageY = yPos + window.pageYOffset;
document.imd.pageX = xPos + window.pageXOffset;
}
if (yon) {
yPos = yPos + step;
}
else {
yPos = yPos - step;
}
if (yPos < 0) {
yon = 1;
yPos = 0;
}
if (yPos >= (height - Hoffset)) {
yon = 0;
yPos = (height - Hoffset);
}
if (xon) {
xPos = xPos + step;
}
else {
xPos = xPos - step;
}
if (xPos < 0) {
xon = 1;
xPos = 0;
}
if (xPos >= (width - Woffset)) {
xon = 0;
xPos = (width - Woffset);
   }
}
function start() {
if(name) img.visibility = "visible";
else document.img.visibility = "visible";
interval = setInterval('changePos()',delay);
}