			
			</div>
			<!-- <script type="text/javascript">
				$(document).ready(function(){
					$("#search_text").on('keyup', function(){
						var search_text = $('#search_text').val();
						$('#result').html('');
						$.ajax ({
							url: 'http://localhost/fashion_room/Search/index/',
							type: 'POST',
							data: {
								product_search: 1,
								search_text: search_text	
							},
							success: function(response){
							// var resp = JSON.parse(response);
							$('#result').html(response);
							console.log(response);
							

							},
							dataType: 'text'	
					
						});
					});
				});
			</script> -->
		<footer class="footer">
      <div class="container">
        <span class="text-muted">Proudly created by Tamara Vasić Antić</span>
      </div>
    </footer>
		<script
		  src="https://code.jquery.com/jquery-3.3.1.js"
		  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		  crossorigin="anonymous"></script>
	</body>
</html>