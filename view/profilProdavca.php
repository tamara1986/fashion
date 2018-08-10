<div class="row">
	<div class="col-md-12">
		<?php
			if(isset($_SESSION['loged'])){
				if ($_SESSION['id']==$this->data['content1'][0]['id']) {
					?>
					<h1 style="text-align: center; margin-top: 20px; "><?php echo ucfirst($this->data['content1'][0]['first_name']).' '.ucfirst($this->data['content1'][0]['last_name'].' '); ?></h1><?php
				}elseif($this->data['pracenje']==0){
					?>
					<h1 style="text-align: center; margin-top: 20px; "><?php echo ucfirst($this->data['content1'][0]['first_name']).' '.ucfirst($this->data['content1'][0]['last_name'].' '); ?><a href="<?php echo ROOT_PATH; ?>Pracenje/index/<?php echo $this->data['content1'][0]['id']; ?>" class="prati"><span>Prati</span></a></h1>
					<?php
				}else{
					?>
					<h1 style="text-align: center; margin-top: 20px; "><?php echo ucfirst($this->data['content1'][0]['first_name']).' '.ucfirst($this->data['content1'][0]['last_name'].' '); ?><a href="<?php echo ROOT_PATH; ?>Pracenje/index/<?php echo $this->data['content1'][0]['id']; ?>" class="ne_prati"><span>Ne prati</span></a></h1>
					<?php
				}
			}else{
				?>
				<h1 style="text-align: center; margin-top: 20px; "><?php echo ucfirst($this->data['content1'][0]['first_name']).' '.ucfirst($this->data['content1'][0]['last_name'].' '); ?></h1>
				<?php
			}

		 ?>
		
	</div>
</div>
<div class="row moj_profil">
	
	<div class="col-md-4">
		
       
		<div class="card" style="width: 14rem; margin-top: 20px;">
			
	
		  <div class="slicice1 ">
		  	<div class="slicice2">
			<img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content1'][0]['slika']; ?>"alt="">
			</div>
				<img src="<?php echo ROOT_PATH; ?>uploads/slike/ram21.png"alt="">
			
		</div>

		  <div class="card-body" style="padding: 0;">
		    <p id="suma_utisaka"><span><?php echo $this->data['utisci'][0]['pozitivan'].' '; ?></span><?php echo $this->data['utisci'][1]['negativan']; ?></p>
		    </div>
		   
		   	<?php

		    	if (isset($_SESSION['loged'])) {
		    		?>
					
					<a href="<?php echo ROOT_PATH.'OstaviUtisak/index/'.$this->data['content1'][0]['id']; ?>"  ><div class="card-footer">Ostavi utisak</div></a>
		    		<?php
		    	}else{
		    		 ?>
		    		 <div class="card-footer">Ostavi utisak</div>

						
		    		 <?php
		    	}
		    	?>
		   
		 </div>
	
	</div>
	
	<div class="col-md-8">
		<div class="prvi_div ">
			<div class="whitespace">
				<h3><?php echo  ucfirst($this->data['content1'][0]['naslov_radnje']);?></h3>
				<p><?php echo  ucfirst($this->data['content1'][0]['opis']);?></p>
				<h5><?php echo  $this->data['content1'][0]['email_prikaz'];?></h5>
				<p><?php echo ucfirst($this->data['content1'][0]['grad']).','.$this->data['content2']; ?> predmeta</p>
			</div>
		</div>
		<img src="<?php echo ROOT_PATH; ?>uploads/slike/bilbord.png" class="drugi_div" alt="">
		</div>
	
	
	</div>
<h3>PROIZVODI KORISNIKA <?php echo ucfirst($this->data['content1'][0]['username']); ?></h3>
<hr>
<div class="row">
			<?php
			// var_dump($this->data['content']);
			foreach ($this->data['content'] as $key => $proizvod) {
				?>
				<div class="col-md-4">
				<div class="card kartica" style="width: 16rem;">
					<div class="slika">
  					<img class="card-img-top" src="<?php echo ROOT_PATH.'uploads/slike_proizvoda/'.$this->data['content'][$key]['url_slike']; ?>" alt="Card image cap">
  					</div>
  					<div class="card-body">
    					<h6 class="card-title"><?php echo ucfirst($this->data['content'][$key]['naslov']).' '.$this->data['content'][$key]['velicina']; ?></h5>
    					<h6 class="card-text">Cena: <?php echo $this->data['content'][$key]['cena'].' RSD'; ?></h6>
    					
  					</div>
  					<a href="<?php echo ROOT_URL.'Mojprofil/mojproizvod/'.$this->data['content'][$key]['id']; ?>"  ><div class="card-footer">Detaljnije</div></a>
				</div>
				</div>

			<?php
				}

			 ?>
	
</div>


<nav aria-label="..."  style="margin-top: 20px;">
            <ul class="pagination justify-content-center">
              
     <?php
     
        for ($page=1; $page <=$this->data['content3'] ; $page++) { 
          ?>
           <li class="page-item"><a class="page-link" href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.$this->data['id_korisnika'].'/'.$page; ?>"><?php echo $page; ?></a></li>
             
              <?php
            }
               ?>
             </ul>
          </nav>