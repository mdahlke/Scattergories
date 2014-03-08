/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	var rb = true; //resize button?
	$('#btn-pickIt').css({
		position: 'absolute',
		left: '0',
		bottom: '0',
		width: $(window).width(),
		height: $(window).height()
	});

	function fadeDiv( obj ){
		$(obj).animate({
			opacity: 1
		}, {
			duration: 1000
		});
	}
	
	$('#btn-pickIt').click(function(){

		$.ajax({
			type: 'GET',
			url: 'inc/pickList.inc.php',
			data: {
				getList: 'true'
			}
		}).done(function(data){

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
				d = $.parseJSON( data );
				
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
								duration: 1000
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

});