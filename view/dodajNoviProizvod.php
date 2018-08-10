		
		<h1 class="dodaj_proizvod_h1">Dodaj novi proizvod</h1>
		
		<div class="dodaj_proizvod">
	
		<form class="form-control" method="POST" action="<?php echo ROOT_PATH; ?>DodajNoviProizvod/dodaj_novi_artikal/" enctype="multipart/form-data">
			<div class="row">

			<?php
				for ($i=1; $i <6 ; $i++) { 
					?>
					<div class="col-sm-2">
					  <div class="form-group ">
					    <label for="slika_<?php echo $i; ?>">Slika<?php echo $i; ?></label>
					    <input type="file" class="form-control-file" accept="image/*" id="slika_<?php echo $i; ?>" name="slika_<?php echo $i; ?>">
					  </div>
					</div>
					<?php
				}
			 ?>
			</div>
			<div class="col-md-auto">  
		  <div class="form-group">
		    <label for="naslov_artikla">Naslov artikla</label>
		    <input type="text" class="form-control" id="naslov_artikla" name="naslov_artikla" placeholder="Naslov artikla">
		  </div>
		   
		  <div class="form-group">
		    <label for="brend">Brend/Marka</label>
		    <input type="text" class="form-control" id="brend" name="brend" placeholder="Brend/Marka">
		  </div>
		  <!-- <div class="input-group mb-3">
  				<select class="custom-select" id="inputGroupSelect03" name="kategorija">
  					<option selected>Kategorija</option>
  					<?php 
  						foreach ($this->data['content1'] as $key => $value) {
  							?>
  					<option value="<?php echo $this->data['content1'][$key]['id']; ?>"><?php echo $this->data['content1'][$key]['kategorija']; ?></option>
  					<?php 
  						}
  					?>
    			</select>
		  </div> -->

		   <div class="input-group mb-3">
  				<select class="custom-select" id="inputGroupSelect03" name="vrsta">
  					<option selected>Kategorija</option>
  					<?php 
  						foreach ($this->data['content'] as $key => $value) {
  							?>
								<option value="<?php echo $this->data['content'][$key]['id']; ?>"><?php echo $this->data['content'][$key]['kategorija']; ?></option>
  							<?php
  						}
  					 ?>
  					
    			</select>
		  </div>
		  
		   <div class="input-group mb-3">
  				<select class="custom-select" id="inputGroupSelect03" name="velicina">
  					<option selected>Velicina</option>
  					<?php
  						for ($i=16; $i <=47 ; $i++) { 
  							?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  							<?php
  						}
  					 ?>
  					
    			</select>
		  </div>
		  <div class="form-group">
            <label for="description">Opis proizvoda</label>
            <textarea class="form-control rounded-0" id="description" name="description" rows="3"></textarea>
    	  </div>
    	  <div class="form-group">
		    <label for="cena">Cena</label>
		    <input type="number" class="form-control" id="cena" name="cena" placeholder="Cena">
		  </div>
		</div>
		  <button style="background-color: #E4E4E4; border: 1px solid #E4E4E4; color: black;" type="submit" class="btn btn-primary" name="submit">Submit</button>
		  

		</form>
		</div>
	
