
<table class="table  mt-1">
  <thead style="background-color: #E4E4E4;">
      <tr>
        <th colspan="2">Posalji poruku korisniku <?php echo ucfirst($this->data['content'][0]['username']); ?></th>
      
    </thead>
  <tr>
    <tbody>
    <td class="zelim_ovo">
      <div >
      <img src="<?php echo ROOT_PATH.'uploads/profilne_slike/'.$this->data['content'][0]['slika']; ?>" alt="">
      </div>
      
    </td>
    <td>
    <form method="POST" action="<?php echo ROOT_PATH.'Poruke/posaljiProdavcu/'.$this->data['content'][0]['id_korisnika']; ?>" enctype="multipart/form-data" >
        <div class="form-group">
               <!--  <label for="description">Poruka</label> -->
                <textarea class="form-control rounded-0" id="description" name="napisi_poruku" rows="3" >Zdravo,ja želim <?php echo '  '.$this->data['content'][0]['naslov'].' '.$this->data['content'][0]['velicina'].',     '.$this->data['content1']; ?></textarea>
        </div>
       
      
      <button type="submit" class="btn btn-primary" name="submit">Pošalji</button>
    </form>
    </td>
    </tbody>
  </tr>
</table>