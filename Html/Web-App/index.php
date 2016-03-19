<!DOCTYPE html>
<html>
<head>
<title>Drop the Bricks</title>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link  rel="icon" href="Brick-48.png  " 
  type="image/png" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!--Latest compiled and minified CSS from PureCSS-->
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Import Canvas the latest compiled and minified JCanvas -->
<script src="/import/jcanvas.min.js"></script>

<link href="style.css" type="text/css" rel="stylesheet" />

  <script>
	$( document ).ready(function() {			
				
				
		var canvas=document.getElementById('canvas1');
		var ctx=canvas.getContext('2d');
		
		var paddleHeight = 10;
		var paddleWidth = 75;
		var paddleX = (canvas.width-paddleWidth)/2;
		var paddleMove=7;
		var brickRowCount = 3;
		var brickColumnCount = 5;
		var brickWidth = 75;
		var brickHeight = 20;
		var brickPadding = 10;
		var brickOffsetTop = 30;
		var brickOffsetLeft = 110;
		
		var score=0;
		var lives=3;
		
		
		var bricks = [];
			for(c=0; c<brickColumnCount; c++) {
				bricks[c] = [];
				for(r=0; r<brickRowCount; r++) {
					bricks[c][r] = { x: 0, y: 0, status:1 }; //Status=1 for all the bricks to be drawn
				}
			}
		
		//Pressed button
		var rightPressed = false; // At the beginning they aren't pressed
		var leftPressed = false;
		
		//Listener to the keypad
		document.addEventListener("keydown", keyDownHandler, false);
		document.addEventListener("keyup", keyUpHandler, false);
				
		function keyDownHandler(e) {
			if(e.keyCode == 39) {
				rightPressed = true;
			}
			else if(e.keyCode == 37) {
				leftPressed = true;
			}
		}

		function keyUpHandler(e) {
			if(e.keyCode == 39) {
				rightPressed = false;
			}
				else if(e.keyCode == 37) {
				leftPressed = false;
			}
		}		
			
		//Collision detection
		function collisionDetection() {
			for(c=0; c<brickColumnCount; c++) {
				for(r=0; r<brickRowCount; r++) {
				var a = bricks[c][r];
				if(a.status ==1){
					if(redman.x > a.x && redman.x < a.x+brickWidth && redman.y > a.y && redman.y < a.y+brickHeight) {// if hit, status equals 0 and bricks drop
					redman.vy = -redman.vy;
					paddleMove-=0.35;//Slow the movement of the paddle
					redman.color=randomColor(); //Each hits makes change the color
					a.status=0;
					score++;
					if(score == brickRowCount*brickColumnCount) {
                        alert("YOU MADE IT, CONGRATULATIONS!");
                        document.location.reload();
                    }
					}
				}
            }
        }
    }
	
		//Writte and Track the score
		function drawScore() {
			ctx.font = "16px Arial";
			ctx.fillStyle = "#1a1aff";
			ctx.fillText("Score: "+score, 8, 20);
		}
		
		//Write the player number of life
		function drawLives() {
		ctx.font = "16px Arial";
		ctx.fillStyle = "#1a1aff";
		ctx.fillText("Lives: "+lives, canvas.width-65, 20);
}

		//Create and draw a circle layer
		var redman={
			x:canvas.width/2, y:canvas.height-30,
			vx:4, vy:-2,//The ball gets moving by adding a velocity vector to the position
			radius:10,
			color:'#f00',
			
			drawBall: function(){
				ctx.beginPath();
				ctx.arc(this.x, this.y, this.radius, 0, Math.PI*2, true);
				ctx.fillStyle=this.color,
				ctx.fill();
				ctx.closePath();
			}
		};
		
		//Create and draw a paddle
		function drawPaddle() {
			ctx.beginPath();
			ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
			ctx.fillStyle = " #1a1aff";
			ctx.fill();
			ctx.closePath();
		}
		
		//Draw the bricks
		function drawBricks() {
			for(c=0; c<brickColumnCount; c++) {
				for(r=0; r<brickRowCount; r++) {
					if(bricks[c][r].status == 1){
						var brickX = (c*(brickWidth+brickPadding))+brickOffsetLeft; // Keep the value
						var brickY = (r*(brickHeight+brickPadding))+brickOffsetTop;
						bricks[c][r].x = brickX;
						bricks[c][r].y = brickY;
						ctx.beginPath();
						ctx.rect(brickX, brickY, brickWidth, brickHeight);
						ctx.fillStyle = "#1a1aff";
						ctx.fill();
						ctx.closePath();
					}
				}
			}
		}
		
		//Generator of Color
		function randomColor() {
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
				color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
		}
		
		//Animate the circle
		function draw() {
			ctx.clearRect(0,0, canvas.width, canvas.height); //erase any previously drawn content
			
			drawBricks();
			redman.drawBall();
			drawPaddle();
			collisionDetection();
			drawScore();
			drawLives();
			
			//Boundaries
			if (redman.x + redman.vx > canvas.width || redman.x + redman.vx < 0) {//Redman bounces at the top and left
				redman.vx = -redman.vx;
			}			
			if (redman.y + redman.vy < redman.radius) {//bounce at the right
				redman.vy = -redman.vy;
			}
			else if(redman.y + redman.vy > canvas.height-redman.radius ){//Bounce on the paddle
				if(redman.x > paddleX && redman.x < paddleX + paddleWidth) {
				redman.vy = -redman.vy;
				
				}
			else {
				lives--;
				if(!lives) {
				alert("GAME OVER");
				document.location.reload();
			}
			else {
				redman.x = canvas.width/2;
				redman.y = canvas.height-30;
				redman.vx = 4;
				redman.vy = -2;
				paddleX = (canvas.width-paddleWidth)/2;
				paddleWidth=paddleWidth+10;//Each lives lost makes the paddle width bigger
}
				}
			}
		
			if(rightPressed && paddleX < canvas.width-paddleWidth) {
				paddleX = paddleX+paddleMove;
			}
			else if(leftPressed && paddleX > 0) {
				paddleX = paddleX-paddleMove;
			}
			
		redman.x += redman.vx;
		redman.y += redman.vy;
		requestAnimationFrame(draw);
		}
		draw();
	});
  </script>

</head>

<body>

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Drop the briks</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNavBar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://lmukunaciowela.pe.hu/W_A">About</a>
                    </li>
                    <li>
                        <a href="http://lmukunaciowela.pe.hu/www/english.php#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="container-fluid">

	<div class="centre">

		<!--<div class="panelBack">-->
		
			<div class="row">
			<canvas id="canvas1" width="650" height="400" ></canvas>
			</div>

		<!--</div>-->
		
	</div>
	
</div>

</body>
</html>