<div class="razgovor">
	<table class="table  mt-1">
		<thead>
			<tr>
				<th colspan="3" style="text-align: center;">Razgovor</th>
				
				
			</tr>
		</thead>
		<tbody>
		<?php
			
				foreach ($this->data['content'] as $razgovor) {
					
					?>
					<tr>
						<td class="img"><img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$razgovor['slika']; ?>" alt=""></td>
						<td>
							<h4 style="color:grey; "><?php echo $razgovor['username'] ?></h4>
							<p><?php echo $razgovor['poruka']; ?></p>
							<p><?php echo $razgovor['datum']; ?></p>
						</td>
						<td>
							<form method="POST" action="<?php echo ROOT_PATH; ?>Poruke/izbrisiPoruku/<?php echo $razgovor['id_poruke']; ?>" enctype="multipart/form-data"  >
							<button type="submit" class="btn" name="submit" style="background-color: #E4E4E4; border-color: #E4E4E4;color: black;">Izbrisi</button>
						</form>
						</td>
						
						
					</tr>
					<?php
				}
			 ?>
			 		<tr>
			 			
						<td class="img"></td>
						<td>
							<form method="POST" action="<?php echo ROOT_PATH.'Poruke/dodajPoruku/'.$this->data['content1']; ?>" enctype="multipart/form-data">
								 <div class="form-group">
            						<label for="description">Napisi poruku</label>
            						<textarea class="form-control rounded-0" id="description" name="napisi_poruku" rows="3"></textarea>
    	  						</div>
    	  						<button type="submit" class="btn btn-primary" name="submit" style="background-color: #E4E4E4; border-color: #E4E4E4;color: black;">Pošalji</button>
							</form>
						</td>
					</tr>
			
		</tbody>
	</table>
</div>
