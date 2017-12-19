<p id="inscription">INSCRIPTION</p>
        <form action="../../app/controller/inscription.php" method="post">
			<div class="form-horizontal">
				<div class="form-group">
            		<label for="firstname" class="col-sm-4 control-label">Prénom</label>
					<div class="col-sm-8">
						<input type="text" name="firstname">
					</div>
				</div>
				<div class="form-group">
            		<label for="name" class="col-sm-4 control-label">Nom</label>
					<div class="col-sm-8">
						<input type="text" name="name">
					</div>
				</div>
				<div class="form-group">
            		<label for="pseudo" class="col-sm-4 control-label">Pseudo</label>
					<div class="col-sm-8">
						<input type="text" name="pseudo">
					</div>
				</div>
				<div class="form-group">
            		<label for="email" class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="email">
					</div>
				</div>
				<div class="form-group">
            		<label for="password" class="col-sm-4 control-label">Mot de passe</label>
					<div class="col-sm-8">
						<input type="password" name="password">
					</div>
				</div>
				<div class="form-group">
            		<label for="pwd2" class="col-sm-4 control-label">Répétez votre mot de passe</label>
					<div class="col-sm-8">
						<input type="password" name="confirm_pass">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
            <input type="submit" name="inscription" value="Créer mon compte" class="btn btn-default">
				</div>
				</div>
        </form>
