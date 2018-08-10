
<div class="razgovor">
	<table class="table  mt-1">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Poruke</th>
				<th></th>
				
			</tr>
		</thead>
		<tbody>
					<tr></tr>
		
			 		<tr>
			 			
						<td class="img"><img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content'][0]['slika']; ?>" alt=""></td>
						<td>
							<form method="POST" action="<?php echo ROOT_PATH.'Poruke/posaljiProdavcu/'.$this->data['content'][0]['id']; ?>" enctype="multipart/form-data">
								 <div class="form-group">
            						<label for="description">Napisi poruku</label>
            						<textarea class="form-control rounded-0" id="description" name="napisi_poruku" rows="3"></textarea>
    	  						</div>
    	  						<button type="submit" class="btn btn-primary" name="submit">Pošalji</button>
							</form>
						</td>
					</tr>
			
		</tbody>
	</table>
</div>
