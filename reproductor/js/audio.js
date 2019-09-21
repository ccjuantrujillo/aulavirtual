$(function(){
	var playing = false;	
	
	audio = new Audio();  
	audio.src = $(".play").data("id");	

	$(".play").click(function(){
		playing ? audio.pause() : audio.play();	
	});		
	
	audio.addEventListener("pause", function () {
		$("#play").html('<img class="pad" src="images/play.png" />');
		playing = false;
	}, false);
	
	audio.addEventListener("playing", function () {
		$("#play").html('<img src="images/pause.png" />');
		playing = true;
	}, false);
});

