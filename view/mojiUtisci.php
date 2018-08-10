
<div class="poruke">
	<table class="table mt-1">
		<thead style="background-color: #FFE9E3; text-align: center;">
			<tr>
				<th colspan="4">Utisci</th>
			
				
			</tr>
		</thead>
		<tbody>
		<?php
			$brojac=0;
				foreach ($this->data['content'] as $utisci) {
					?>
					<tr>
						<td class="utisci">
							<div>
								<img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$utisci['slika']; ?>">
							</div>
							<a href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.$utisci['id']; ?>"><p><?php echo $utisci['username'] ; ?></p></a>

						</td>
						<?php
						if ($utisci['utisak']=='0') {
							?>
						<td class="utisci_img"><img src="<?php echo ROOT_PATH; ?>uploads/slike/like.png"></td>
							<?php
						}else{
							?>
						<td class="utisci_img"><img src="<?php echo ROOT_PATH; ?>uploads/slike/dislike.png"></td>
							<?php
							}
						 ?>
						
						
						<td class="utisci">
							<div>
								<img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content1'][0]['slika']; ?>" alt="">
							</div>
							<a href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.$this->data['content1'][0]['id']; ?>"><p><?php echo $this->data['content1'][0]['username']; ?></p></a>
						</td>
						<td><?php echo $utisci['komentar']; ?></td>
						
					</tr>
					<?php
				}
			 ?>
			
		</tbody>
	</table>
	



</div>
