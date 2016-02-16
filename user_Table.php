


<input ng-model="search" placeholder="search"/>
<input type="button" value="search" ng-click="searchby(search)">
<table  ng-table="usersTable" class="table table-striped">
	<thead>            
    <th><a href="javascript:void(0);" ng-click="acs_desc('name')" >Name</a></th>
    <th><a href="javascript:void(0);"ng-click="acs_desc('email')" >Email</a></th>
    <th>Action</th>
    <th>Delete</th>
    <th>
        <a href="#/add">add</a>
    </th>
    </thead>
    <tbody ng-repeat="x in userTable |offset: currentPage*itemsPerPage |
                                 limitTo: itemsPerPage ">
    <tr ng-if="x.is_enabled === '1'" id="enr_{{x.id}}">
        
        <td>{{x.firstname}}</td>
        <td>{{x.email}}</td>
        <td><a href="#/edit/{{x.id}}" class="edit_class">edit</a></td>
        <td><a href="javascript:void(0);" class="delete_class" ng-click="delete_user(x.id,$index)" > Delete </a></td>
        <td>
           <a href="javascript:void(0);" ng-click="enab_disab(x.id,x.is_enabled)"   ng-model="$index" > 
                
               <span  id="en_{{x.id}}" class="enab">
                   
                    <img src="assets/images/enable.png" >
                                            
                </span>
                                            
                <span  class="enab_dis" id="dis_{{x.id}}">
                                                
                        <img src="assets/images/disable.png" >

                </span>
            </a>
        </td>

	</tr>
    <tr  ng-if="x.is_enabled === '0'" class="disable-color" id="enr_{{x.id}}">
        
        <td>{{x.firstname}}</td>
        <td>{{x.email}}</td>
        <td><a href="#/edit/{{x.id}}" class="edit_class" id="enr_{{x.id}}">edit</a></td>
        <td><a href="javascript:void(0);" class="delete_class" ng-click="delete_user(x.id,$index)" > Delete </a></td>
        <td>
           <a href="javascript:void(0);" ng-click="enab_disab(x.id,x.is_enabled)" ng-model="enab_"> 
               <span id="en_{{x.id}}" class="enab_dis">
                                                
                    <img src="assets/images/enable.png" >
                                            
                </span>
                                            
                <span id="dis_{{x.id}}" class="enab">
                                                
                        <img src="assets/images/disable.png" >

                </span>
            </a>
        </td>

    </tr>
</tbody>
<tfoot>
    
      <td colspan="3">
        <div class="pagination">
          <ul>
            <li ng-class="prevPageDisabled()">
              <a href ng-click="prevPage()">« Prev</a>
            </li>
            <li ng-repeat="n in range()"
              ng-class="{active: n == currentPage}" ng-click="setPage(n)">
              <a href>{{n+1}}</a>
            </li>
            <li ng-class="nextPageDisabled()">
              <a href ng-click="nextPage()">Next »</a>
            </li>
          </ul>
        </div>
      </td>
    </tfoot>

</table>
<div >

</div>
	