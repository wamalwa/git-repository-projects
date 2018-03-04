<?php
$page_title="Bulk SMS  | System Admin";
$head="System Admin";
$currectPage='systemadmin.php';
 include_once 'serverside/config.php';  
 include_once 'header.php';  
 include_once('serverside/functions.php');
 $fn = new Functions();
 $allcounties = $fn->GetAllCountiesFormated();
 $costituencies=$fn->GetConstituenciesofCounty(1);
 
?>

<!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Sub Menu</h2>
        </header>
        <ul class="default">
            <li><button class="btn-block btn" id="btnAddWardView">Add Ward</button></li> 
            <li><button class="btn-block btn" id="btnAddConstituencyView">Add Constituency</button></li> 
            <li><button class="btn-block btn" id="btnAddCountyView">Add County</button></li> 
            <li><button class="btn-block btn" id="btnAddPostView">Add Post</button></li> 
             <li><button class="btn-block btn" id="btnAddRoleView">Add Role</button></li> 
        </ul>
    </section>
   
     
</div>
<div id="sidebar" class="8u">
                <section id="sectionAddWard">
                    <header class="major">
                        <h2>Add Ward</h2>
                        <span class="byline">Add a new Ward here</span>
                    </header>
                    <form method="post" action="#" name="frmaddward" id="frmaddward">   
                     <input type="hidden" name='actiotype' id="actiontypeaddward" value="addward">
                    <div id="notAddWard" >
                 
                    </div>
                     <br>
                      	<div class="row half">
                      	<div class="4u">County:</div>
      <div class="8u"> <select class="form-control"  name="wardSelectCounty" id="wardSelectCounty">
   <?php   echo $allcounties;  ?>    	
                        </select></div>
                        </div>
                         <br>
                      	<div class="row half">
                      	<div class="4u">Constituency:</div>
                       <div class="8u"> <select class="form-control"  name="wardSelectConstituecny" id="wardSelectConstituecny">
                       <?php   echo $costituencies;   ?>                       
                           </select></div>
                     </div>
                        <br>
                     <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="wardName" id="wardName" placeholder="Ward Name" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Ward" class="button alt" id="btnaddward" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    
                </section>
    <!--Add constituency-->
                    <section id="sectionAddConstituency" style="display:none">
                    <header class="major">
                        <h2>Add Constituency</h2>
                        <span class="byline">Add a new Constituency here</span>
                    </header>
                    <form method="post" action="#" name="frmaddConstituency" id="frmaddConstituency">   
                     <input type="hidden" name='actiotype' id="actiontypeaddConstituency" value="addConstituency">
                    <div id="notAddConstituency">
                 
                    </div>
                     <br>
                      	<div class="row half">
                      	<div class="4u">County:</div>
       <div class="8u"> <select class="form-control"  name="ConstituencySelectCounty" id="ConstituencySelectCounty">
        <?php    echo $allcounties;  ?>
   
                       </select></div>
                     </div>
				    	
                        <br>
                     <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="ConstituencyName" id="ConstituencyName" placeholder="Constituency Name" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Create Constituency" class="button alt" id="btnaddConstituency" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
    <!--Add county-->
            <section id="sectionAddCounty" style="display:none">
                    <header class="major">
                        <h2>Add County</h2>
                        <span class="byline">Add a new County here</span>
                    </header>
                    <form method="post" action="#" name="frmaddCounty" id="frmaddCounty">   
                     <input type="hidden" name='actiontype' id="actiontypeaddCounty" value="addCounty">
                    <div id="notAddCounty">
                 
                    </div>
                    
                     <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="CountyName" id="CountyName" placeholder="County Name" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save County" class="button alt" id="btnaddCounty" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
    <!--Add POST-->
           <section id="sectionAddPost" style="display:none">
                    <header class="major">
                        <h2>Add Post</h2>
                        <span class="byline">Add a new Post here</span>
                    </header>
                    <form method="post" action="#" name="frmaddPost" id="frmaddPost">   
                     <input type="hidden" name='actiontype' id="actiontypeaddPost" value="addPost">
                    <div id="notAddPost">
                 
                    </div>
                    
                    <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="PostName" id="PostName" placeholder="Post Name" />
                            </div>
                        </div>
                   
                      <div class="row half">
                    <div class="12u">
                            <textarea name="PostDescription" id="PostDescription" placeholder="Description"></textarea>
                            </div>
                        </div>
                    <div class="row half">
                    <div class="2u">Scope:</div>
                   <div class="10u"> 
                       <select class="form-control"  name="postScope" id="postScope">
                                 <option value="1">County</option>
                                 <option value="2">Constituency</option>
                                 <option value="3">Ward</option>     
                       </select></div>
                    </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Post" class="button alt" id="btnaddPost" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
    <!--Add Role-->
     <section id="sectionAddRole" style="display:none">
                    <header class="major">
                        <h2>Add Role</h2>
                        <span class="byline">Add a new Role here</span>
                    </header>
                    <form method="post" action="#" name="frmaddRole" id="frmaddRole">   
                     <input type="hidden" name='actiontype' id="actiontypeaddRole" value="addRole">
                    <div id="notAddRole">
                 
                    </div>
                    
                     <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="RoleName" id="RoleName" placeholder="Role Name" />
                            </div>
                        </div>
                   <div class="row half">
                    <div class="12u">
                            <textarea name="RoleDescription" id="RoleDescription" placeholder="Description"></textarea>
                            </div>
                  </div>
                        
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Role" class="button alt" id="btnaddRole" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<!-- End Page -->
	<?php  include_once 'footer.php'; ?>