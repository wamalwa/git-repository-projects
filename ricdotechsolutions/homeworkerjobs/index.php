<!--Master Page display-->
<?php 
$index="class='active'";
$title="Home";
include_once ('ui/master.php');

        include_once ("dbcom/config.php");
        include_once ("dbcom/homeworkerjob_com.php");
        $obj = new HomeWorkerJobsDAO();

?>
        <div class="row">
            <div class="col-md-4 col-sm-4"> 

                <div class="box">
                
                    <div class="well panel-primary col-md-12 col-sm-12" style="margin-top:0px; padding:0px">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 2em;">Order Now!</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" id="order_form">
                                <div class="body bg-gray">
                                    <div id="not"></div> <span class="col-md-2" style="padding: 0px">Email:</span>
                                    <div class="form-group col-md-10">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email Address"/>
                                    </div>
                                     <span class=" col-md-2" style="padding: 0px">Document Type:</span>
                                    <div class="form-group col-md-10">
                                     <select name="typeofdocument" id="typeofdocument" onchange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();" class="form-control">

                                            <?php
                                            $ar = $obj->getPapers();
                                            foreach ($ar as $value) {
                                                echo $value;
                                            }
                                            ?>			
                                        </select>
                                    </div> 
                                     <span class=" col-md-2" style="padding: 0px">Number of pages:</span>  
                                    <div class="form-group col-md-10">       
                                        <select title="Number of pages" class="form-control" name="numberofpages" id="numberofpages" onchange="javascript:doOrderFormCalculation();" onclick="javascript:doOrderFormCalculation();">
                                      <?php
                                            $arg = $obj->getPages();
                                            foreach ($arg as $value) {
                                                echo $value;
                                            }
                                            ?>	
                                        </select>
                                    </div>
                                       <span class=" col-md-2 required" style="padding: 0px">Deadline:</span>                               
                                        <div class="form-group col-md-6 required">                                                                                   
                                          <input type="text" name="datepicker" id="datepicker" class="form-control" placeholder="Deadline Date" />
                                        </div>
                                      
                                </div>
                                <div class="col-md-2"> </div> 
                                <div class="footer col-md-10">  	
                                    <button type="submit" class="btn btn-primary btn-default btn-flat btn-lg" id="continue">Continue</button> 
 </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> 
            <div class="col-md-4">  
                <div class="box">
                    <h4>Home Workers jobs are now here</h4>
                    <div class="col-md-12">
                        <img src="img/img2.jpg" style="height:213px;width: 400px" alt="Loading..." />
                    </div>

                    <div class="col-md-12">     
                        <b>Homeworkerjobs.com</b> is one of the top companies offering quality work within the given time frame. 
                        We believe that grades depend on the quality of assignments and term papers submitted by individuals. 
                        t is on this concept we started off and now we have 100% satisfied students who are our prioritized customers.
                        Support in academics as well as due assistance is what we provide the students to gain momentum in their writing skills and thus developing their career as a whole. 
                       <a href="about.php"> Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="box">
                    <h4>Our Writing Services</h4>
                    <div class="col-md-12">
                        <ul type="none">
                            <li>Essays</li>
                            <li>Research papers</li>
                            <li>Term papers</li>
                            <li>Dissertation and thesis</li>
                            <li>Project proposals/ research proposal</li>
                            <li>Case studies</li>
                            <li>Book review</li>
                            <li>Argumentative essays</li>
                            <li>Creative writing</li>
                        </ul>
                    </div>
                    <h4>Current Activities</h4>
                    <div class="col-md-12">
   <div><font style="font-size: 2em;">9.86</font> Average quality score</div>
 <div><font style="font-size: 2em;">6251</font> Orders completed</div>
 <div><b>23 </b>  Available writers</div>
 <div><font style="font-size: 2em;color: red">25% OFF</font></div>
 <p>Discount on all Orders!!</p>
                   
                    </div>
                </div>
            </div> 
        </div>  

        <!-- /.container -->

<!--   Footer-->
<?php include_once ('ui/footer.php');   mysql_close();?>
     

    </body>

</html>
