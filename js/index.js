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
			p = 0;
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

$(document).ready(function(){
	var listNumber;
	var rb = true; //resize button?

	var pickItHeight = $(window).height() - ($(window).height() * .13);
	$('#btn-pickIt').css({
		position: 'absolute',
		left: '0',
		bottom: '0',
		width: $(window).width(),
		height: pickItHeight
	});

	function fadeDiv( obj ){
		$(obj).animate({
			opacity: 1
		}, {
			duration: 1000
		});
	}

	$('#joinGame').click(function(){

		$('#container').html('<div><input id="code" /><button id="join">Join Game</button></div>');

	});

	$(document).on('click', '#join', function(){
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
	
	$('#btn-pickIt').click(function(){
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
					$('#btn-pickIt').css({}).animate({
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

	$(document).on('change', '.answerLine', function(){
		console.log('hi');
		var round = $(this).attr('data-round');
		var number = $(this).attr('data-number');
		var value = $(this).val();

		saveGame(round, number, value);
	});

	$(document).on('click', '#points', function(){
		var points = $(this).siblings('.scoreTracker').html() === '' ? 0 : parseInt($(this).siblings('.scoreTracker').html());
		points++;
		$(this).siblings('.scoreTracker').html(points);

		var round = $(this).siblings('.answerLine').attr('data-round');
		var number = $(this).siblings('.answerLine').attr('data-number');
		var value = $(this).siblings('.answerLine').val();
		saveGame(round, number, value, points);
	});
	$(document).on('click', '#noPoints', function(){
		var points = $(this).siblings('.scoreTracker').html() === '' ? 0 : parseInt($(this).siblings('.scoreTracker').html());
		if( points > 0){
			points--;
			$(this).siblings('.scoreTracker').html(points);

			var round = $(this).siblings('.answerLine').attr('data-round');
			var number = $(this).siblings('.answerLine').attr('data-number');
			var value = $(this).siblings('.answerLine').val();
			saveGame(round, number, value, points);
		}
	});

});