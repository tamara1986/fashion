
<div class="poruke">
	<table class="table  mt-1">
		<thead>
			<tr>
				<th colspan="5" style="text-align: center;">Utisci</th>
			</tr>
		</thead>
		<tbody style="background-color: #E4E4E4;">
		<?php
			$brojac=0;
				foreach ($this->data['content'] as $key => $utisci) {
					
						foreach ($this->data['content1'] as $key1 => $value) {
							if ($key==$key1) {
					?>
					<tr>
						
						<td class="utisci">
							<div>
							<img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content1'][$key][0]['slika']; ?>">
							</div>
							<a href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.$this->data['content1'][$key][0]['id']; ?>"><p><?php echo $this->data['content1'][$key][0]['username']; ?></p></a>

						</td>

						<?php
							}
						}
					
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
							<img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$utisci['slika']; ?>" alt="">
							</div>
							<a href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.$utisci['id']; ?>"><p><?php echo $utisci['username'] ; ?></p></a>
						</td>
						<td><?php echo $utisci['komentar']; ?></td>
						<td><?php if ($this->data['content1'][$key][0]['id']==$_SESSION['id']) {
							?>
							<a href="<?php echo ROOT_PATH.'OstaviUtisak/izbrisiUtisak/'.$this->data['content'][$key]['id_utiska'].'/'.$utisci['id']; ?>" style="background-color: #FFE9E3;padding: 7px; border: 1px solid #FFE9E3; color: black;">Izbrisi</a>
							<?php
						} ?></td>
					</tr>
					<?php

				}
			 ?>
			
		</tbody>
	</table>

</div>

