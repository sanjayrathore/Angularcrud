 app.factory('UserService',['$http',function($http){
 	return {
 		enab_disb : function(id,is_enabled)
 					{
 						return $http.post("enab_disable.php",{"id":id, "is_enabled": is_enabled})
			 						.then(function(response){
				 						
				 						if (response.data.is_success == 1) 
										{
											if (response.data.is_enabled == 1) 

											{
												
												document.getElementById("enr_"+id).classList.remove('disable-color');
											
											}
											else
											{
												
												document.getElementById("enr_"+id).classList.add('disable-color');
											}	
											return response.data.html;
										}
										else
										{
											return response.data.is_success;
										}
			 					});
 					},
 		edit_user : function(id)
 						{
 							return $http.post("user_Edit_process.php",{"id":id})
			 							.then(function(response){
			 			
					 						if  (response.data.is_success == 1) 
					 						{
									
					 							return response.data.html;
					 				
					 						} 
			 							});
 						},

 		delete_user : function(id,index)
 						{
 						return	$http.post("user_delete.php",{"id":id})
 								.success(function(response){
								
									return response;
								});
 						},
 		asc_desc :function(orderby,asc_desc)
 					{
 						return $http.post("user_asc_desc.php",{"orderby" : orderby , "asc_desc": asc_desc})
 									.then(function(response){
 										if (response.data.is_success == 1) 
										{
											
											return response.data.html;
										}
										else
										{
											return response.data.is_success;
										}
 									});
 					},
 		user_search : function(search)
 						{
 							return $http.post("user_search.php",{"search" : search})
 										.then(function(response){
 											if (response.data.is_success == 1)
 											{
 												return response.data.html;
 											}
 											else
 											{
 												return response.data.message;
 											}
 										});
 						}
 		}
 }]);