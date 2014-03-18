/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function displaySheet(listNumber, code){
	$.ajax({
		type: 'GET',
		url: 'inc/showList.inc.php',
		data: {
			list: listNumber,
			code: code
		}
	}).done(function(data){

		$('#container').html(data);

	});
}

function saveGame(r, n, v, p){
	if( typeof p === 'undefined' ){
		p = 'none';
	}
	$.ajax({
		type: 'GET',
		url: 'inc/saveGame.inc.php',
		data: {
			round: r,
			number: n,
			value: v,
			point: p
		}
	}).done(function(d){
		console.log(d);
	});
}

function newGame(){

	$.ajax({
		type: 'GET',
		url: 'inc/newGame.inc.php'
	}).done(function(){
		location.reload();
	});

}

var dieLetters = 'abcdefghijklmnoprst';
var die = dieLetters.split("");

function rollDie(){
    return die[Math.floor(Math.random() * die.length)];
}

$(document).ready(function(){
	var listNumber;
	var rb = true; //resize button?
	var windowHeight = $(window).height();
	var windowWidth = $(window).width();
	var createGameDiv = $('#createGame');
	var createGameButton = $('#createGame').children('.btn-pickIt');
	var createGameHeight = windowHeight - (windowHeight * .13);
	var joinGameDiv = $('#joinGame');
	var joinGameButton = $('#joinGame').children('.btn-pickIt');
	var joinGameHeight = windowHeight - createGameHeight;

	$(createGameDiv).css({
		height: createGameHeight
	});
	$(createGameButton).css({
	});
	$(joinGameDiv).css({
		height: joinGameHeight
	});
	$(joinGameButton).css({
	});

	function fadeDiv( obj ){
		$(obj).animate({
			opacity: 1
		}, {
			duration: 1000
		});
	}

	$('#joinGame').click(function(){

		$('#container').html('<div id="enterGameCodeWrapper"><div id="gameCode"><h2>Enter Game Code:</h2><input id="code" /><button id="joinButton" class="scat-btn">Join Game</button></div></div>');

	});

	$(document).on('click', '#joinButton', function(){
		var c = $(this).siblings('#code').val();
		$.ajax({
			type: 'GET',
			url: 'inc/joinGame.inc.php',
			data: {
				code: c
			}
		}).done(function(data){
			console.log(data);
			d = $.parseJSON(data);
			displaySheet( d.list, d.code );
		});

	});
	
	$('#createGame').click(function(){
		$('#joinGame').hide();

		$.ajax({
			type: 'GET',
			url: 'inc/pickList.inc.php',
			data: {
				getList: 'true'
			}
		}).done(function(data){

			console.log(data);
			if( $('#pickedList').length === 0 ){

				var nnd = '<span id="nickname"></span>';
				var filler = '<span id="filler">I choose list:</span>';
				var td = '<p class="tab">' + filler + '<span id="listNumber"></p>';
				
				var wrapper = $('<article/>', {
					id: 'pickedList'
				}).append('<h1>' + nnd + '<br />' + td + '</h1>');
				
				wrapper.css({
					opacity: 0
				});

				$('#container').prepend(wrapper);

				wrapper.animate({
					opacity: 1
				});

			}

			var nicknameDiv = $('#nickname');
			var listDiv = $("#listNumber");
			var fillerDiv = $('#filler');

			try {
				if( rb ){
					$('#createGame').css({}).animate({
						bottom: '0px',
						padding: '50px',
						height: ''
					}, {
						duration: 2000
					});

				}
				var d = $.parseJSON( data );

				console.log(d);
				
				if( nicknameDiv.html() !== d.nickname ){
					nicknameDiv.animate({
						opacity: 0
					}, {
						duration: 500
					});
					
					nicknameDiv.animate({
						opacity: 1
					}, {
						duration: 1000,
						start: function(){
							nicknameDiv.html(d.nickname);
						},
						queue: true
					});
				}

				if( fillerDiv.html() !== d.filler ){
					fillerDiv.animate({
						opacity: 0
					}, {
						duration: 500
					});

					fillerDiv.animate({
						opacity: 1
					}, {
						duration: 1500,
						done: function(){
							fillerDiv.html(d.filler);
						},
						queue: true
					});
				}

				listDiv.animate({
					opacity: 0
				}, {
					duration: 1000,
					done: function(){
						setTimeout(function(){
							listDiv.html(d.list).animate({
								opacity:1
							}, {
								duration: 1000,
								complete: function(){
									setTimeout( function(){
										displaySheet(d.list, d.code);
									}, 1000);
								}
							});
						}, 1000);
					}
				});
				
			}
			catch(e){
				console.log(e);
			}
		});

	});

	$(this).on('change', '.answerLine', function(){
		console.log('hi');
		var round = $(this).attr('data-round');
		var number = $(this).attr('data-number');
		var value = $(this).val();

		saveGame(round, number, value);
	});

	$(this).on('click', '#points', function(){
		var points = $(this).siblings('.scoreTracker').html() === '' ? 0 : parseInt($(this).siblings('.scoreTracker').html());
		points++;
		$(this).siblings('.scoreTracker').html(points);
               
                if( points > 0 ){
                    $(this).siblings('.answerLine').removeClass('strike');
                }

		var round = $(this).siblings('.answerLine').attr('data-round');
		var number = $(this).siblings('.answerLine').attr('data-number');
		var value = $(this).siblings('.answerLine').val();
		saveGame(round, number, value, points);
	});
	$(this).on('click', '#noPoints', function(){
		var previousPoints = $(this).siblings('.scoreTracker').html();
		var points = previousPoints === '' ? 0 : parseInt($(this).siblings('.scoreTracker').html());
		if( points > 0){
			points--;
		}
                if( points === 0 ){
                    $(this).siblings('.answerLine').addClass('strike');
                }
		if( previousPoints !== points ){
			$(this).siblings('.scoreTracker').html(points);

			var round = $(this).siblings('.answerLine').attr('data-round');
			var number = $(this).siblings('.answerLine').attr('data-number');
			var value = $(this).siblings('.answerLine').val();
			saveGame(round, number, value, points);
		}
	});
        $(this).on('click', '#rollDice', function(){
            $('#diceRollResult').fadeIn();
            var time = 0;
            var rolling = setInterval(function(){
            var letter = rollDie();
                $('#diceRollResult').text(letter);
                if(time >= 25) {
                    clearInterval(rolling);
                }
                time++;
            }, 150);
        });



	/**
	 * Start game timer
	 */

	$(this).on('click', '#startTimer', function(){
		var limit = ( 150 ); // 3minutes
		var time = 0;
		var buzzer;
		var timer;
		var sound = document.createElement('audio');
		var gameOver = false;
		sound.setAttribute('src', 'audio/button-20.mp3');
		sound.volume = 0.4;
		$.get();
		
		sound.play();

		function playSound(rate){
			clearInterval( buzzer );
			buzzer = setInterval(function(){
				sound.play();
			}, rate);
			buzzer;
		}

		timer = setInterval(function(){
			time++;
			console.log(time);
			sound.play();
			if( time >= 135 && !gameOver ){
				sound.pause();
				playSound(50);
			}
			if( time >= limit && !gameOver ){
				clearInterval( timer );
				clearInterval( buzzer );
				sound.src='';
				gameOver = true;
				alert( 'Times up!' );
			}
		}, 1000 )();

		playSound(100);
	});
        
        $(document).on('click', '#showTotal', function(){
            var thisScore;
            var score = 0;
            $('.scoreTracker').each( function(){
                thisScore = parseInt( $(this).text() );
                if( !isNaN( thisScore ) ){
                    score += thisScore;
                }
            });
            alert( score );
        });

});