	
app.controller("userCtrl",function($scope,$http,$location,$window,UserService){
	$scope.userTable  = [];
	$scope.itemsPerPage = 1;
  $scope.currentPage = 0;
	
		$http
			.get('user_info_list.php')
			.then(function(response){
						
						if (response.data.is_success == 1) 
						{
							
							
							$scope.userTable = response.data.html;
							
							
							
						}

					},

					function(response){

						$scope.userTable = response.statusText;
					
						
			});
			$scope.range =  function()
			
				{
					
					if ($scope.currentPage == 3)
    				{
    					var data = [4];
    					var pagenum = $scope.currentPage;
   					for (var i = 0; i < data.length; i++) {
    						data[i] = pagenum;
    						pagenum++;
    					}
    					return data;
      					
   					}
   					else
   					{
   						var data  = [1,2];
   						return data;
   					}
				}
			
			$scope.setPage = function(n)
							{	
							 	
							 	$scope.currentPage = n;
							}
			
			$scope.prevPage = function() 
								{
    								if ($scope.currentPage > 0)
    								 {
      									$scope.currentPage--;
   									 }
  								};

		  	$scope.prevPageDisabled = function() 
		  								{
		  
		    								return $scope.currentPage === 0 ? "disabled" : "";
		   								};

		  	$scope.pageCount = function() 
		  						{
		    						return Math.ceil($scope.userTable.length/$scope.itemsPerPage)-1;
		  						};

		 	$scope.nextPage = function() 
		  						{
								    if ($scope.currentPage < $scope.pageCount())
								    {
								     	 $scope.currentPage++;
								    }
		  						};

  			$scope.nextPageDisabled = function() 
					  			{
					    				return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
					  			};
		
			$scope.enab_disab = function(id,is_enabled)
								{	
									UserService.enab_disb(id,is_enabled)
												.then(
													function(response){
														$scope.userTable =response;
														

													});
								

									
								}
			$scope.delete_user = function(id,index)
								{
									if($window.confirm("Do you want to delete"))
									{	
										UserService.delete_user(id,index)
												.then(
													function(response){
														alert("Your Record Delete successFully");
														if(index != -1) 
														{
					    									$scope.userTable.splice(index, 1);
														}

													});
										
									}		
								}
				var a;
				var b;
				var asc_desc;
				$scope.sort;
			$scope.acs_desc = function(data)
								{
									
									if (data == "name") 
									{
										if (a == 0) 
										{
											
											a = 1;
											asc_desc = 0;
										}
										else
										{
											a =0;
											asc_desc = 1;
											
										}
									}
									if (data == "email") 
									{
										if (b == 0)
										{
											asc_desc = 0;
											
											b=1;
										}
										else
										{
											
											asc_desc = 1;
											b=0;
										}
									}

									UserService.asc_desc(data,asc_desc)
												.then(
														function(response){
														$scope.userTable =response;
										

												});
				
								}
			$scope.searchby = function(search)
								{
											if (search.length >=3 ) 
											{
												UserService.user_search(search)
															.then(function(response){
																	$scope.userTable =response;
																

																});
											}
											else
											{
												alert("please Enter the More Then 3 Char");	
											}
					

								}
		 	
	
	});

//==============================================================

app.controller("userAdd",function($scope,$http,$location,UserService){
		

		$scope.add_user = function() 
						{
							if ($scope.firstname == "" || $scope.firstname == null || $scope.lastname == "" || $scope.lastname == null || $scope.email == "" || $scope.email == null || $scope.dob == "" || $scope.dob == null || $scope.gender == "" || $scope.gender == null)  
							{
								
								
							}
							else
							{
								$http.post("user_Add_process.php",
										{
										"firstname":$scope.firstname, "lastname":$scope.lastname, "email":$scope.email, "dob":$scope.dob, "gender":$scope.gender
										}).then(function(response)
											{
												if (response.data.is_success == 1) 

												{
													$location.path('/');
													
												}
											
									
									});
								
							}
						};
		$scope.close_user= function()
			{
				$location.path('/');
			} 


});

//==============================================================

app.controller("userEdit" ,function($scope,$http,$location,$routeParams,UserService){
	id = $routeParams.id;
	UserService.edit_user(id)
				.then(function(response){
					$scope.userData =response;
																

				});
			 
	
	$scope.update_user=function(userData)
		{

			if (userData.firstname == "" || userData.firstname == null || userData.lastname == "" || userData.lastname == null || userData.email == "" || userData.email == null || userData.dob == "" || userData.dob == null || userData.gender == "" || userData.gender == null)  
			{
					
					
			}
			else
			{
				$http.post("user_Update.php",
						{
						"id":id, "firstname":userData.firstname, "lastname":userData.lastname, "email":userData.email, "dob":userData.dob, "gender":userData.gender
						}).then(function(response){
							
							if (response.data.is_success == 1) 
							{
											
								$location.path('/');	
							}
							
							
					
					});
				
			}
		}
	$scope.close_user= function()
		{
			$location.path('/');
		} 
});


