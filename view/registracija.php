
	<div class="registracija1">
        <div class="row centered-form registracija2">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 offset-sm-4 register_1">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<!-- <h3 class="panel-title ">Registruj se!</h3> -->
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="<?php echo ROOT_PATH; ?>Registracija/index/" method="POST">
			    			<h3 style="text-align: center;color: #E4E4E4;">Registracija!</h3>
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Ime">

			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Prezime">
			    					</div>
			    				</div>
			    			</div>
			    			<div class="form-group">
			    				<input type="username" name="username" id="username" class="form-control input-sm" placeholder="Korisničko ime">
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email adresa">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Šifra">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Potvrdi šifru">
			    					</div>
			    				</div>
			    			</div>
			    			<p><?php if (isset($this->data['msg'])) {
			    				echo $this->data['msg'];
			    			} ?></p>
			    			<input type="submit" value="Registruj se" name="submit" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    	</div>
    