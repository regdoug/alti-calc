function drawCones(canvas, d, r1, r2, r3) {
    var graphics = canvas.getContext('2d');
    var canvasWidth = canvas.width;
    var canvasHeight = canvas.height;
    graphics.clearRect(0,0,canvasWidth,canvasHeight);
    //graphics.fillStyle = '#FFFFFF';
    //graphics.fillRect(0,0,canvasWidth,canvasHeight);
    
    var widthOfContents = 2*d + r1 + r3; //in feet (since dist and radius
                                              //are given in feet)
    var horizScale = canvasWidth / widthOfContents; //in feet per pixel
    
    var heightOfContents = Math.max(2*r1+10, Math.max(2*r2+10, 2*r3+10));
    var vertiScale = canvasHeight / heightOfContents; //in feet per pixel
    //alert('width of contents: '+widthOfContents+'\nhorizScale='+horizScale+'\nht of contents: '+heightOfContents+'\nvertiScale='+vertiScale);
    
    var scale = Math.min(horizScale, vertiScale); //I think I want min here
    var xPadWidth = (canvasWidth - (scale*widthOfContents))/2;
    
    //Draw the cones
    graphics.globalAlpha = 0.5
    var x = r1*scale+xPadWidth;
    var gradient = graphics.createRadialGradient(x, 150, 0, x, 150, r1*scale);
    gradient.addColorStop(0, '#FFFFFF');
    gradient.addColorStop(1, '#FF0000');
    graphics.fillStyle = gradient;
    fillCircle(graphics, x, 150, r1*scale);
    graphics.fillStyle = '#000000';
    fillCircle(graphics, x, 150, 2);
    
    x += d*scale;
    gradient = graphics.createRadialGradient(x, 150, 0, x, 150, r2*scale);
    gradient.addColorStop(0, '#FFFFFF');
    gradient.addColorStop(1, '#00FF00');
    graphics.fillStyle = gradient;
    fillCircle(graphics, x, 150, r2*scale);
    graphics.fillStyle = '#000000';
    fillCircle(graphics, x, 150, 2);
    
    x += d*scale;
    gradient = graphics.createRadialGradient(x, 150, 0, x, 150, r3*scale);
    gradient.addColorStop(0, '#FFFFFF');
    gradient.addColorStop(1, '#0000FF');
    graphics.fillStyle = gradient;
    fillCircle(graphics, x, 150, r3*scale);
    graphics.fillStyle = '#000000';
    fillCircle(graphics, x, 150, 2);
}

function undrawCones(canvas) {
    var graphics = canvas.getContext('2d');
    graphics.clearRect(0,0,canvas.width, canvas.height);
}

/* Creates and fills a circle on the given graphics context, using the current
 * fillStyle
 * 
 * graphics - the canvas graphics context with which to draw
 * x        - the x coordinate of the center of the circle
 * y        - the y coordinate of the center of the circle
 * radius   - the radius of the circle
 */
function fillCircle(graphics, x, y, radius) {
    graphics.beginPath();
    graphics.arc(x, y, radius, 0, Math.PI * 2, true);
    graphics.closePath();
    graphics.fill();
}
