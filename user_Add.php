<form id="createform" novalidate name="form" method="POST" >
			</br>
			<div>
				<label for="firstname" class="lable-width">FristName</label></br>
				<input type="text"  ng-model="firstname" name="firstname" ng-minlength="3" ng-maxlength="8" required />
			</div>
			<div ng-show="form.$submitted || form.firstname.$touched">
      			<div ng-show="form.firstname.$error.required"class="help-block">Your firstname is required</div>
      			<p ng-show="form.firstname.$error.minlength" class="help-block">firstname is too short.</p>
  				<p ng-show="form.firstname.$error.maxlength" class="help-block">firstname is too long.</p>
    		</div>
			</br>
			<div>
				<label for="lastname">LastName</label></br>
				<input type="text" ng-model="lastname" name="lastname" ng-minlength="3" ng-maxlength="8" required  />
			</div>
			<div ng-show="form.$submitted || form.lastname.$touched">
      			<div ng-show="form.lastname.$error.required" class="help-block">Your lastname is required</div>
      			<p ng-show="form.lastname.$error.minlength" class="help-block">lastname is too short.</p>
  				<p ng-show="form.lastname.$error.maxlength" class="help-block">lastname is too long.</p>
    		</div>
			</br>
			<div>
				<label for="email">Email</label></br>
				<input type="email" ng-model="email" name="email" required />
			</div>
			<div ng-show="form.$submitted || form.email.$touched">
				<p ng-show = "form.email.$error.required" class="help-block">Email is required</p>
				<p ng-show="form.email.$invalid && !form.email.$pristine" class="help-block">Enter a valid email.</p>
			</div>
			</br>
			<div>
				<label for="bod">DOB</label></br>
				<input type="date" ng-model="dob" name="dob" required />
			</div>
			<div ng-show="form.$submitted || form.dob.$touched">
				<p ng-show = "form.dob.$error.required" class="help-block">DOB is required</p>
				
			</div>
			</br>
			Male<input type="radio" ng-model="gender"name="gender" value="male"ng-required="!color">
			</br>
			Female<input type="radio" ng-model="gender" value="female" ng-required="!color">
			</br>
			<div ng-show="form.$submitted || form.gender.$touched">
				<p ng-show = "form.gender.$error.required" class="help-block">Gender is required</p>
				
			</div>
			<div>
				<input type="submit" value="submit" id="submit" ng-click="add_user()" />
				<input type="button" value="close" id="close_form" ng-click="close_user()" />
			</div>
		</form>