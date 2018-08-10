
<div class="row red">
    
    <div class="col-md-4">
        <div class="card" style="margin-top: 20px;">
          <div class="card-header  text-center" style="background-color: #E4E4E4;">
            <h5><?php echo ucfirst($this->data['content'][0]['naslov'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$this->data['content'][0]['cena'].'  RSD'); ?></h5>
            
          </div>
          <div class="card-body">
            <p>Veličina: <?php echo $this->data['content'][0]['velicina']; ?></p>
            <p>Brend: <?php echo ucfirst($this->data['content'][0]['marka']) ; ?></p>
            <p>Grad: <?php echo ucfirst($this->data['content'][0]['grad']) ; ?></p>
            <?php
      if (isset($_SESSION['loged'])) {
        ?>
        
        <a href="<?php echo ROOT_PATH.'OmiljeniPredmeti/omiljeni_predmeti/'.$this->data['content'][0]['id']; ?>"><button type="button" class="btn btn-default">Dodaj u omiljene predmete</button></a>
        <span><?php echo $this->data['content1'][0]['utisci']; ?></span>
        <?php
      }else{
       ?>
        <button type="button" class="btn btn-default" disabled="disabled">Dodaj u omiljene predmete</button>
        <span><?php echo $this->data['content1'][0]['utisci']; ?></span>
       <?php
      }
     ?>
     <br><br>
    <p>OPIS PROIZVODA:</p>
    <hr>
    <p style="text-align: justify;"><?php echo $this->data['content'][0]['opis']; ?></p>
     </div>
     
    <?php
    if (isset($_SESSION['loged'])) {
      if ($_SESSION['id'] ==$this->data['content'][0]['id_korisnika']) {
        ?>
          <a href="<?php echo ROOT_PATH.'Mojprofil/izbrisiProizvod/'.$this->data['content'][0]['id']; ?>" class="add_product"><div class="card-footer">IZBRIŠI PROIZVOD</div></a>
        <?php
      
      
        }else{
        ?>
          <a href="<?php echo ROOT_PATH.'Poruke/poruci_proizvod/'.$this->data['content'][0]['id']; ?>"><div class="card-footer" style="font-weight: bolder; color: black;">ŽELIM OVAJ PROIZVOD</div></a>
      <?php
        }
    }else{
      ?>
        <div class="card-footer">ŽELIM OVAJ PROIZVOD</div>
      <?php
    }
     ?>
          
          </div>
        </div>
    <div class="col-md-6" style="padding: 0 5%;">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
        <div class="carousel-inner">
    <?php
      $brojac=1;
      foreach ($this->data['content'] as $key => $value) {
        if ($brojac==1) {
          ?>
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo ROOT_PATH.'uploads/slike_proizvoda/'.$this->data['content'][$key]['url_slike']; ?>" alt="First slide" >
          </div>
          <?php 
        }else{
          ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo ROOT_PATH.'uploads/slike_proizvoda/'.$this->data['content'][$key]['url_slike']; ?>" alt="Second slide">
            </div>
          <?php
        }
        $brojac++;
      }
          ?>
    
        </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
</div>


  
    
    

  
  <div class="col-md-2">
    <div class="card" style="width: 14rem; margin-top: 20px;">
      <a href="<?php echo ROOT_PATH.'ProfilProdavca/profil_prodavca/'.intval($this->data['content'][0]['id_korisnika']); ?>"><div class="slicice1 ">
        <div class="slicice2">
          <img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content'][0]['slika']; ?>"alt="">
        </div>
        <img src="<?php echo ROOT_PATH; ?>uploads/slike/ram21.png"alt="">
      </div></a>

      <div class="card-body" style="padding: 0;">
        <p id="suma_utisaka"><span><?php echo $this->data['utisci'][0]['pozitivan'].' '; ?></span><?php echo $this->data['utisci'][1]['negativan']; ?></p>
        </div>
        <?php 
          if (isset($_SESSION['loged'])) {
            if ($_SESSION['id']==$this->data['content'][0]['id_korisnika']) {
              ?>
              <a href="#"><div class="card-footer">Ostavi utisak</div></a>
              <?php
            }else{
            ?>
            <a href="<?php echo ROOT_PATH.'OstaviUtisak/index/'.$this->data['content'][0]['id_korisnika']; ?>"><div class="card-footer">Ostavi utisak</div></a>
            <?php
            }
          }else{
            ?>
            <div class="card-footer">Ostavi utisak</div>
            <?php
          }
          ?>
       
        
       
     </div>
    </div>
</div>
</div>
<hr>
