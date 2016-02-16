var app = angular.module("myApp",['ngRoute']);
app.config(['$routeProvider',
			function($routeProvider,$routeParams)
				{
					$routeProvider.
						when('/',{
							templateUrl :'user_Table.php',
							controller : 'userCtrl'
						}).
						when('/add',{
							templateUrl:'user_Add.php',
							controller : 'userAdd'
						}).
						when('/edit/:id',{
							templateUrl :'user_Edit.php',
							controller : 'userEdit'
						}).
						otherwise({
							redirectTo:'/'
						});
				}
			]);