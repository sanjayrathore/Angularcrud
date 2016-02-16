
<form id="createform" novalidate name="form" method="POST" >
			</br>
			
			<div>
				<label for="firstname" class="lable-width">FristName</label></br>
				<input type="text"  ng-model="userData.firstname" name="firstname"/>
			</div>
			
			</br>
			<div>
				<label for="lastname">LastName</label></br>
				<input type="text" ng-model="userData.lastname" name="lastname"/>
			</div>
			
			</br>
			<div>
				<label for="email">Email</label></br>
				<input type="email" ng-model="userData.email" name="email"required />
			</div>
			
			</br>
			<div>
				<label for="bod">DOB</label></br>
				<input type="text" ng-model="userData.dob" name="dob" required />
			</div>
			
			</br>
			Male<input type="radio" ng-model="userData.gender"name="gender" value="male">
			</br>
			Female<input type="radio" ng-model="userData.gender" value="female">
			</br>
			<div>
				<input type="submit" value="submit" id="submit" ng-click="update_user(userData)" />
				<input type="button" value="close" id="close_form" ng-click="close_user()" />
			</div>
		</form>