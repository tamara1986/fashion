


<ul class="nav justify-content-center pod_kategorije">
	<?php
	$brojac=1;
		foreach ($this->data['content'] as $key => $value) {
			if ($brojac=1) {
				?>
				 <li class="nav-item">
					<a class="nav-link active" href="<?php echo ROOT_PATH.'Podkategorije/podkategorijeProizvoda/'.$this->data['content'][$key]['id']; ?>"><?php echo ucfirst($this->data['content'][$key]['kategorija']) ; ?></a>
  				</li>
				<?php
			}else{
			?>
				  <li class="nav-item">
					<a class="nav-link active" href="<?php echo ROOT_PATH.'Podkategorije/podkategorijeProizvoda/'.$this->data['content'][$key]['id']; ?>"><?php echo ucfirst($this->data['content'][$key]['kategorija']); ?></a>
  				  </li>
			<?php
			}
			$brojac++;
		}
	?>
</ul>

<div class="row">
      <?php
      // var_dump($this->data['content']);
      foreach ($this->data['content1'] as $key => $proizvod) {
        ?>
        <div class="col-md-4">
        <div class="card kartica" style="width: 16rem;">
          <div class="slika">
            <img class="card-img-top" src="<?php echo ROOT_PATH.'uploads/slike_proizvoda/'.$this->data['content1'][$key]['url_slike']; ?>" alt="Card image cap">
            </div>
            <div class="card-body">
              <h6 class="card-title"><?php echo ucfirst($this->data['content1'][$key]['naslov']).' '.$this->data['content1'][$key]['velicina']; ?></h5>
              <h6 class="card-text">Cena: <?php echo $this->data['content1'][$key]['cena'].' RSD'; ?></h6>
              </div>
              <a href="<?php echo ROOT_URL.'Mojprofil/mojproizvod/'.$this->data['content1'][$key]['id']; ?>"  ><div class="card-footer">Detaljnije</div></a>
            
        </div>
        </div>

      <?php
        }

       ?>
  
</div>

 <nav aria-label="..."  style="margin-top: 20px;">
            <ul class="pagination justify-content-center">
              
     <?php
     
        for ($page=1; $page <=$this->data['content2'] ; $page++) { 
          ?>
           <li class="page-item"><a class="page-link" href="<?php echo ROOT_PATH.'Kategorije/kategorijeProizvoda/'.$this->data['id'].'/'.$page; ?>"><?php echo $page; ?></a></li>
             
              <?php
            }
               ?>
             </ul>
          </nav>



