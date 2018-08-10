<div class="postavke">
<form method="POST" action="<?php echo ROOT_PATH; ?>Postavke/izmeniPodatke/" enctype="multipart/form-data" >
  
  <div class="form-group">
    <label for="naslov_radnje">Naslov radnje</label>
    <input type="text" class="form-control" id="naslov_radnje" name="naslov_radnje"  value="<?php echo $this->data['content1'][0]['naslov_radnje']; ?>">
  </div>
  <div class="form-group">
    <label for="ime_i_prezime">Prikazi ime i prezime</label>
    <input type="text" class="form-control" id="ime_i_prezime" name="ime_i_prezime" value="<?php echo $this->data['content1'][0]['ime_i_prezime_prikaz']; ?>">
  </div>
  <div class="form-group">
    <label for="grad">Grad</label>
    <input type="text" class="form-control" id="grad" name="grad"  value="<?php echo $this->data['content1'][0]['grad']; ?>">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $this->data['content1'][0]['email_prikaz']; ?>">
  </div>
  <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control rounded-0" id="description" name="description" rows="3" maxlength="250" wrap="hard" ></textarea>
    </div>
   <div class="form-group">
    <label for="profilna_slika">Promeni fotografiju</label>
    <input type="file" class="form-control-file" id="profilna_slika" name="profilna_slika">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>