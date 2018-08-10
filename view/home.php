<h4 id="target">Dobrodošli na Fashion room-Sajt za prodaju, kupovinu i razmenu odeće, obuće i aksesoara! </h4>
<?php
 if (!isset($_SESSION['loged'])) {
   ?>
<div class="row" style="position: relative;">
  <div class="glavna_slika"></div>
  <div id="paragrafi">
    <div id="kupi">
    <p id="in_slajder">Kupi!</p>
    <p id="in_slajder1">Prodaj!</p>
    <p id="in_slajder2">Razmeni!</p>
    </div>
    <div>
    <h1>Kreni u akciju!</h1>
    <a href="<?php echo ROOT_PATH; ?>Help/index/">Saznaj više</a>
    <!-- <a href="<?php echo ROOT_PATH; ?>Login/index/">Uloguj se</a>
    <a href="<?php echo ROOT_PATH; ?>Registracija/index/">Registruj se</a> -->
    </div>
   </div>
</div> 

   <?php
 }else{
  ?>
    <div class="row" style="position: relative;">
      <div class="glavna_slika"></div>
    </div>
  <?php
 }
 ?>
 
  <hr>
 
<div class="row" style="width: 80%;margin: 0 auto;">
     


   <?php
      // var_dump($this->data['content']);
      foreach ($this->data['content1'] as $key => $proizvod) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card kartica" style="width: 16rem;">
          <div class="slika">
            <img class="card-img-top" src="<?php echo ROOT_PATH.'uploads/slike_proizvoda/'.$this->data['content1'][$key]['url_slike']; ?>" alt="Card image cap">
            </div>
            <div class="card-body">
              <h6 class="card-title"><?php echo $this->data['content1'][$key]['naslov'].' '.$this->data['content1'][$key]['velicina']; ?></h5>
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
     
        for ($page=1; $page <=$this->data['content'] ; $page++) { 
          ?>
           <li class="page-item"><a class="page-link" href="<?php echo ROOT_PATH.'Home/index/'.$page; ?>"><?php echo $page; ?></a></li>
             
              <?php
            }
               ?>
             </ul>
          </nav>

      <script type="text/javascript">
        window.onload = setTimeout(function() {
          var div = document.getElementById('paragrafi');
            
            div.style.left = '0px';
            div.style.top = '0px';
          }, 2000);
           

      function animate_string(id){
        let element = document.getElementById(id);
        let textNode = element.childNodes[0]; // assuming no other children
        let text = textNode.data;
        setInterval(function ()
           {
           text = text[text.length - 1] + text.substring(0, text.length - 1);
           textNode.data = text;
         }, 120);
        }
        animate_string('target');
        
      </script>