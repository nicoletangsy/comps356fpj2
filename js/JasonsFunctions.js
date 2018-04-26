function popWindow() {
				var windowHeight=500;
				var windowWidth=400;
				var topBorderDistance;
				var leftBorderDistance;

				topBorderDistance=(window.screen.height/2)-(windowHeight/2);
				leftBorderDistance=(window.screen.width/2)-(windowWidth/2);
				window.open('survey.php','','height='+windowHeight+', width='+windowWidth+', top='+topBorderDistance+', left='+leftBorderDistance+', resizable=yes');
}
