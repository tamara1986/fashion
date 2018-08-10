<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/main.css">

    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    

    <title><?php echo $this->data['title']; ?></title>
  </head>
  <body>
  
      
        <nav class="navbar navbar-expand-md navbar-dark " id="glavni">
            <div class="naslov">
              
                <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>Home/index/1" style="font-family:Kaushan Script;text-shadow: 1px 1px 2px black, 0 0 25px white, 0 0 5px white; font-size: 30px; ">Fashion room</a>
      
                  <form class="form-inline pretraga" action="<?php echo ROOT_PATH; ?>Search/index/1" method="POST">
                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
                    <button class="btn btn-success " type="submit" name="submit">Search</button>
                  </form>
              </div>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label=/indexe navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                    
                    <ul class="navbar-nav pull-right ">
                        
                        <?php
                            if (isset($_SESSION['loged'])) {
                              ?>

                                  
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Zdravo,<?php echo ucfirst($_SESSION['username']) ; ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                      <a class="dropdown-item" href="<?php echo ROOT_PATH.'Mojprofil/index/1'; ?>">Moj profil</a>
                                      <a class="dropdown-item" href="<?php echo ROOT_PATH.'Postavke/index/'; ?>">Postavke</a>
                                      <a class="dropdown-item" href="<?php echo ROOT_PATH.'OstaviUtisak/mojiUtisci/'; ?>">Utisci</a>
                                      <a class="dropdown-item" href="<?php echo ROOT_PATH.'Pracenje/proizvodiZapracenih/1'; ?>">Praćenje</a>
                                      <a class="dropdown-item" href="<?php echo ROOT_PATH.'Login/logoutUser/'; ?>">Odjavi se</a>
                                    </div>
                                  </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="<?php echo ROOT_URL; ?>OmiljeniPredmeti/index/1">Omiljeno<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="<?php echo ROOT_URL; ?>Poruke/razgovori/">Poruke<span class="sr-only">(current)</span></a>
                        </li>
                      </ul>
                      
                      <a href="<?php echo ROOT_PATH; ?>DodajNoviProizvod/index/" class="dodaj_novi" ><button type="button" class="btn">DODAJ NOVI PROIZVOD</button></a>
                      
                     
                              <?php
                            }else{
                              ?>
                          <div class="registracija d-flex">
                            <a href="<?php echo ROOT_PATH; ?>Login/index/" class="login" >Uloguj se</a>
                            <a href="<?php echo ROOT_PATH; ?>Registracija/index/" class="login" >Registracija</a>    
                          </div>
                              <?php
                            }

                         ?>
                 
           
              
                   
            
      </nav>
      
      <!-- <div class="row">
        <div class="col-sm-12"> -->
        <ul class="nav nav-pills nav-fill ">
         
         <li class="nav-item">
          

            <a class="nav-link" href="<?php echo ROOT_PATH; ?>Kategorije/kategorijeProizvoda/1">Odeća</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>Kategorije/kategorijeProizvoda/2">Cipele</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>Kategorije/kategorijeProizvoda/3">Aksesoari</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>Kategorije/kategorijeProizvoda/4">Torbe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>Kategorije/kategorijeProizvoda/5">Nakit</a>
          </li>
        </ul>
     <!--  </div>
      </div> -->
 <div class="container glavni_kontejner" >
     
 
    
  
	 
    




                   
                    
               
    