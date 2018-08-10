
    
    <div class="row">
      <div class="col-md-12">
  
        <form class="form-control ostaviUtisak" method="POST" action="<?php echo ROOT_PATH.'OstaviUtisak/ostavi_utisak/'.$this->data['content1']; ?>" style="background-color: #E4E4E4;margin-top:20px;">
            
            <h3 class="dodaj_proizvod_h1">Ostavi utisak</h3>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect03" name="utisak">
                <option selected>Utisak</option>
                <option value="0">Pozitivan</option>
                <option value="1">Negativan</option>
              </select>
            
          </div>
          
            <div class="form-group ">
              <textarea id="ostavi_utisak" name="komentar" style="width: 100%;">&nbsp;&nbsp;Ostavi utisak...</textarea>
            </div>
          
          <button type="submit" class="btn btn-primary" name="submit" style="background-color: #E4E4E4; border-color: #E4E4E4;color: black;">Submit</button>
           
        </form>
     </div>
    </div>
