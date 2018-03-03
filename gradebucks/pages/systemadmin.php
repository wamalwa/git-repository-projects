<!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Sub Menu</h2>
        </header>
        <ul class="default">
            <li><button class="btn-block btn" id="btnAddCategoryView">New Category</button></li>
             <li><button class="btn-block btn" id="btnAddUserGroupView">Add User group</button></li> 

        </ul>
    </section>
</div>
<div id="sidebar" class="8u">
                <section id="sectionAddCategories">
                    <header class="major">
                        <h2>Add Category</h2>
                        <span class="byline">Add a new Category here</span>
                    </header>
                    <form method="post" action="#" name="frmaddcategory" id="frmaddcategory">   
                     <input type="hidden" name='actiotype' id="actiontypeaddcategory" value="addCategory">
                    <div id="notAddCategory">  </div>
                   
                        <br>
                    <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="categoryName" id="categoryName" placeholder="Category Name" />
                            </div>
                        </div>
                  <div class="row half">
                    <div class="12u">
                            <textarea name="categoryDescription" id="categoryDescription" placeholder="Category Description"></textarea>
                            </div>
                  </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Save Category" class="button alt" id="btnaddCategory" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    
                </section>
    <!--Add User group-->
        <section id="sectionAddUserGroup" style="display:none">
                    <header class="major">
                        <h2>Add User Group</h2>
                        <span class="byline">Add a new User group here</span>
                    </header>
                    <form method="post" action="#" name="frmaddUserGroup" id="frmaddUserGroup">   
                     <input type="hidden" name='actiontype' id="actiontypeaddUserGroup" value="addUsergroup">
                    <div id="notAddUserGroup">
                 
                    </div>
                    
                     <div class="row half">
                    <div class="12u">
                                 <input class="text" type="text" name="groupName" id="groupName" placeholder="User group Name" />
                            </div>
                        </div>
                   <div class="row half">
                    <div class="12u">
                    <textarea name="groupDescription" id="groupDescription" placeholder="Description"></textarea>
                    </div>
                  </div>
                        
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Add User Group" class="button alt" id="btnaddUserGroup" />
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