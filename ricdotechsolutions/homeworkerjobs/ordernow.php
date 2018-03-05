<!--Master Page display-->
<?php
$ordernow = "class='active'";
$title = "Order Now";
include_once ('ui/myheader.php');
include_once ("dbcom/config.php");
include_once ("dbcom/homeworkerjob_com.php");
$obj = new HomeWorkerJobsDAO();
session_start();
?>

<div class="container">

    <form method="post" id="register_form">
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">My Personal Details</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not"></div>
                    <div class="row">
                        <div class="form-group col-md-6 required">
 <input type="hidden" name="iduser" id="iduser"  value="<?php if (!empty($_SESSION["UserID"])) {  echo $_SESSION["UserID"];}?>" >
                            <div class="control-label">Surname</div>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" value="<?php if (!empty($_SESSION["surname"])) {
    echo $_SESSION["surname"];
} ?>"/>
                        </div>
                        <div class="form-group col-md-6 required">
                            <div class="control-label">First Name</div>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?php if (!empty($_SESSION["firstName"])) {
    echo $_SESSION["firstName"];
} ?>" />
                        </div>
                    </div>  
                    <div class="row">           
                        <div class="form-group col-md-6 required"> <div class="control-label">Last Name</div>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?php if (!empty($_SESSION["lastname"])) {
    echo $_SESSION["lastname"];
} ?>" />

                        </div>
                        <div class="form-group col-md-6 required"> <div class="control-label">Email Address</div>
                            <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="Email Address" value="<?php if (!empty($_SESSION["emailaddress"])) {
    echo $_SESSION["emailaddress"];
} ?>" disabled="disabled" />
                        </div> 
                    </div> 
                    <div class="row">                          
                        <div class="form-group col-md-6 required"> <div class="control-label">Phone Number</div>
                            <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phone Number" value="<?php if (!empty($_SESSION["phonenumber"])) {
    echo $_SESSION["phonenumber"];
} ?>" />
                        </div>            

                        <div class="form-group col-md-6 required"> <div class="control-label">Country of Origin</div>
                            <select  name="country" id="country" class="form-control" >
   
                                <option value="Afghanistan"> Afghanistan </option><option value="Albania">  Albania </option><option value="Algeria">  Algeria </option><option value="Andorra">  Andorra </option><option value="Angola">  Angola  </option><option value="Antigua &amp; Deps">  Antigua &amp; Deps  </option><option value="Argentina">  Argentina </option><option value="Armenia">  Armenia </option><option value="Australia">  Australia </option><option value="Austria">  Austria </option><option value="Azerbaijan">  Azerbaijan  </option><option value="Bahamas">  Bahamas </option><option value="Bafrain">  Bahrain </option><option value="Bangladesh">  Bangladesh  </option><option value="Barbados">  Barbados  </option><option value="Belarus">  Belarus </option><option value="Belgium">  Belgium </option><option value="Belize">  Belize  </option><option value="Benin">  Benin </option><option value="Bhutan">  Bhutan  </option><option value="Bolivia">  Bolivia </option><option value="Bosnia Herzegovina">  Bosnia Herzegovina  </option><option value="Botswana">  Botswana  </option><option value="Brazil">  Brazil  </option><option value="Brunei">  Brunei  </option><option value="Bulgaria">  Bulgaria  </option><option value="Burkina">  Burkina </option><option value="Burundi">  Burundi </option><option value="Cambodia">  Cambodia  </option><option value="Cameroon">  Cameroon  </option><option value="Canada">  Canada  </option><option value="Cape Verde">  Cape Verde  </option><option value="Central African Rep">  Central African Rep</option><option value="Chad"> Chad  </option><option value="Chile">  Chile </option><option value="China">  China </option><option value="Colombia">  Colombia  </option><option value="Comoros">  Comoros </option><option value="Congo">  Congo </option><option value="Congo Democratic">  Congo Democratic R</option><option value="Costa Rica"> Costa Rica  </option><option value="Croatia">  Croatia </option><option value="Cuba">  Cuba  </option><option value="Cyprus">  Cyprus  </option><option value="Czech Republic">  Czech Republic  </option><option value="Denmark">  Denmark </option><option value="Djibouti">  Djibouti  </option><option value="Dominica">  Dominica  </option><option value="Dominican Republic">  Dominican Republic  </option><option value="East Timor">  East Timor  </option><option value="Ecuador">  Ecuador </option><option value="Egypt">  Egypt </option><option value="El Salvador">  El Salvador </option><option value="Equatorial Guinea">  Equatorial Guinea </option><option value="Eritrea">  Eritrea </option><option value="Estonia">  Estonia </option><option value="Ethiopia">  Ethiopia  </option><option value="Fiji">  Fiji  </option><option value="Finland">  Finland </option><option value="France">  France  </option><option value="Gabon">  Gabon </option><option value="Gambia">  Gambia </option><option value="Georgia">  Georgia </option><option value="Germany">  Germany </option><option value="Ghana">  Ghana </option><option value="Greece">  Greece  </option><option value="Grenada">  Grenada </option><option value="Guatemala">  Guatemala </option><option value="Guinea">  Guinea  </option><option value="Guinea Bissau">  Guinea-Bissau </option><option value="Guyana">  Guyana  </option><option value="Haiti">  Haiti </option><option value="Honduras">  Honduras  </option><option value="Hungary">  Hungary </option><option value="Iceland">  Iceland </option><option value="India">  India </option><option value="Indonesia">  Indonesia </option><option value="Iran">  Iran  </option><option value="Irag">  Iraq  </option><option value="Ireland Republic">  Ireland {Republic}  </option><option value="Israel">  Israel  </option><option value="Italy">  Italy </option><option value="Ivory Coast">  Ivory Coast </option><option value="Jamaica">  Jamaica </option><option value="Japan">  Japan </option><option value="Jordan">  Jordan  </option><option value="Kazakhstan">  Kazakhstan  </option><option value="Kenya">  Kenya </option><option value="Kiribati"> Kiribati  </option><option value="Korea North"> Korea North </option><option value="Korea South"> Korea South </option><option value="Kosovo"> Kosovo  </option><option value="Kuwait"> Kuwait  </option><option value="Kyrgyzstan"> Kyrgyzstan  </option><option value="Laos"> Laos  </option><option value="Lativia"> Latvia  </option><option value="Lebanon"> Lebanon </option><option value="Lesotho"> Lesotho </option><option value="Liberia"> Liberia </option><option value="Libya"> Libya </option><option value="Liechtenstein"> Liechtenstein </option><option value="Lithuania"> Lithuania </option><option value="Luxembourg"> Luxembourg  </option><option value="Macedonia"> Macedonia </option><option value="Madagascar"> Madagascar  </option><option value="Malawi"> Malawi  </option><option value="Malaysia"> Malaysia  </option><option value="Maldives"> Maldives  </option><option value="Mali"> Mali  </option><option value="Malta"> Malta </option><option value="Majoshall Islands"> Majoshall Islands </option><option value="Mauritania"> Mauritania  </option><option value="Mauritius"> Mauritius </option><option value="Mexico"> Mexico  </option><option value="Micronesia"> Micronesia  </option><option value="Moldova"> Moldova </option><option value="Monaco"> Monaco  </option><option value="Mongolia"> Mongolia  </option><option value="Montenegro"> Montenegro  </option><option value="Morocco"> Morocco </option><option value="Mozambique"> Mozambique  </option><option value="Myanmar {Burma}"> Myanmar, {Burma}  </option><option value="Namibia"> Namibia </option><option value="Nauru"> Nauru </option><option value="Nepal"> Nepal </option><option value="Netherlands"> Netherlands </option><option value="New Zealand"> New Zealand </option><option value="Nicaragua"> Nicaragua </option><option value="Niger"> Niger </option><option value="Nigeria"> Nigeria </option><option value="Norway"> Norway  </option><option value="Oman"> Oman  </option><option value="Pakistan"> Pakistan  </option><option value="Palau"> Palau </option><option value="Panama"> Panama  </option><option value="Papua New Guinea"> Papua New Guinea  </option><option value="Paraguay"> Paraguay  </option><option value="Peru"> Peru  </option><option value="Philipines"> Philippines </option><option value="Poland"> Poland  </option><option value="Portugal"> Portugal  </option><option value="Qatar"> Qatar </option><option value="Romania"> Romania </option><option value="Russian Federation"> Russian Federation  </option><option value="Rwanda"> Rwanda  </option><option value="St Kitts &amp; Nevis"> St Kitts &amp; Nevis  </option><option value="St Lucia"> St Lucia  </option><option value="Saint Vincent"> Saint Vincent &amp; the</option><option value="Samoa">  Samoa </option><option value="San Marino"> San Marino  </option><option value="Sao Tome &amp; Principe"> Sao Tome &amp; Principe</option><option value="Saudi Arabia">  Saudi Arabia  </option><option value="Senegal"> Senegal </option><option value="Serbia"> Serbia  </option><option value="Seychelles"> Seychelles  </option><option value="Sierra Leone"> Sierra Leone  </option><option value="Singapore"> Singapore </option><option value="Slovakia"> Slovakia  </option><option value="Slovenia"> Slovenia  </option><option value="Solomon Islands"> Solomon Islands </option><option value="Somalia"> Somalia </option><option value="South Africa"> South Africa  </option><option value="Spain"> Spain </option><option value="Sri Lanka"> Sri Lanka </option><option value="Sudan"> Sudan </option><option value="Suriname"> Suriname  </option><option value="Swaziland"> Swaziland </option><option value="Sweden"> Sweden  </option><option value="Switzerland"> Switzerland </option><option value="Syria"> Syria </option><option value="Taiwan"> Taiwan  </option><option value="Tajikistan"> Tajikistan  </option><option value="Tanzania"> Tanzania  </option><option value="Thailand"> Thailand  </option><option value="Togo"> Togo  </option><option value="Tonga"> Tonga </option><option value="Trinidad &amp; Tobago"> Trinidad &amp; Tobago </option><option value="Tunisia"> Tunisia </option><option value="Turkey"> Turkey  </option><option value="Turkmenistan"> Turkmenistan  </option><option value="Tuvalu"> Tuvalu  </option><option value="Uganda"> Uganda  </option><option value="Ukraine"> Ukraine </option><option value="United Arab Emirate"> United Arab Emirate</option><option value="United Kingdom">  United Kingdom  </option><option value="United States"> United States </option><option value="Uruguay"> Uruguay </option><option value="Uzbekistan"> Uzbekistan  </option><option value="Vanuatu"> Vanuatu </option><option value="Vatican City"> Vatican City  </option><option value="Venezuela"> Venezuela </option><option value="Vietnam"> Vietnam </option><option value="Yemen"> Yemen </option><option value="Zambia"> Zambia  </option><option value="Zibambwe"> Zimbabwe  </option>  
                            </select>
                        </div>          
                    </div> 

                </div>

            </div>
        </div> 
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">My Order Details!</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not1"></div>
                    <div class="row">           
                        <div class="form-group col-md-6 required"> <div class="control-label">Topic</div>
                            <input type="text" name="topic" id="topic" class="form-control" placeholder="Topic"/>

                        </div>
                        <div class="form-group col-md-6 required"> <div class="control-label">Subject Area</div>
                            <select class="form-control" id="SubujectArea" data-rel="chosen" name="subject_area">
                                <option value="1">Art</option>                    
                                <option value="1">&nbsp;&nbsp;Architecture</option>
                                <option value="1">&nbsp;&nbsp;Dance</option>
                                <option value="1">&nbsp;&nbsp;Design Analysis</option>
                                <option value="1">&nbsp;&nbsp;Drama</option>
                                <option value="1">&nbsp;&nbsp;Movies</option>
                                <option value="1">&nbsp;&nbsp;Music</option>

                                <option value="1">&nbsp;&nbsp;Paintings</option>
                                <option value="1">&nbsp;&nbsp;Theatre</option>
                                <option value="1">Biology</option>
                                <option value="1">Business</option>
                                <option value="1">Chemistry</option>
                                <option value="1">Communications and Media</option>

                                <option value="1">&nbsp;&nbsp;Advertising</option>
                                <option value="1">&nbsp;&nbsp;Communication Strategies</option>
                                <option value="1">&nbsp;&nbsp;Journalism</option>
                                <option value="1">&nbsp;&nbsp;Public Relations</option>
                                <option value="1">Creative writing</option>
                                <option value="1">Economics</option>

                                <option value="1">&nbsp;&nbsp;Accounting</option>
                                <option value="1">&nbsp;&nbsp;Case Study</option>
                                <option value="1">&nbsp;&nbsp;Company Analysis</option>
                                <option value="1">&nbsp;&nbsp;E-Commerce</option>
                                <option value="1">&nbsp;&nbsp;Finance</option>
                                <option value="1">&nbsp;&nbsp;Investment</option>

                                <option value="1">&nbsp;&nbsp;Logistics</option>
                                <option value="1">&nbsp;&nbsp;Trade</option>
                                <option value="1">Education</option>
                                <option value="1">&nbsp;&nbsp;Application Essay</option>
                                <option value="1">&nbsp;&nbsp;Education Theories</option>
                                <option value="1">&nbsp;&nbsp;Pedagogy</option>

                                <option value="1">&nbsp;&nbsp;Teacher's Career</option>
                                <option value="1">Engineering</option>
                                <option value="1">English</option>
                                <option value="1">Ethics</option>
                                <option value="1">History</option>
                                <option value="1">&nbsp;&nbsp;African-American Studies</option>

                                <option value="1">&nbsp;&nbsp;American History</option>
                                <option value="1">&nbsp;&nbsp;Asian Studies</option>
                                <option value="1">&nbsp;&nbsp;Canadian Studies</option>
                                <option value="1">&nbsp;&nbsp;East European Studies</option>
                                <option value="1">&nbsp;&nbsp;Holocaust</option>
                                <option value="1">&nbsp;&nbsp;Latin-American Studies</option>

                                <option value="1">&nbsp;&nbsp;Native-American Studies</option>
                                <option value="1">&nbsp;&nbsp;West European Studies</option>
                                <option value="1">Law</option>
                                <option value="1">&nbsp;&nbsp;Criminology</option>
                                <option value="1">&nbsp;&nbsp;Legal Issues</option>
                                <option value="1">Linguistics</option>

                                <option value="1">Literature</option>
                                <option value="1">&nbsp;&nbsp;American Literature</option>
                                <option value="1">&nbsp;&nbsp;Antique Literature</option>
                                <option value="1">&nbsp;&nbsp;Asian Literature</option>
                                <option value="1">&nbsp;&nbsp;English Literature</option>
                                <option value="1">&nbsp;&nbsp;Shakespeare Studies</option>

                                <option value="1">Management</option>
                                <option value="1">Marketing</option>
                                <option value="1">Mathematics</option>
                                <option value="1">Medicine and Health</option>
                                <option value="1">&nbsp;&nbsp;Alternative Medicine</option>
                                <option value="1">&nbsp;&nbsp;Healthcare</option>

                                <option value="1">&nbsp;&nbsp;Nursing</option>
                                <option value="1">&nbsp;&nbsp;Nutrition</option>
                                <option value="1">&nbsp;&nbsp;Pharmacology</option>
                                <option value="1">&nbsp;&nbsp;Sport</option>
                                <option value="1">Nature</option>
                                <option value="1">&nbsp;&nbsp;Agricultural Studies</option>

                                <option value="1">&nbsp;&nbsp;Anthropology</option>
                                <option value="1">&nbsp;&nbsp;Astronomy</option>
                                <option value="1">&nbsp;&nbsp;Environmental Issues</option>
                                <option value="1">&nbsp;&nbsp;Geography</option>
                                <option value="1">&nbsp;&nbsp;Geology</option>
                                <option value="1">Philosophy</option>

                                <option value="1">Physics</option>
                                <option value="1">Political Science</option>
                                <option value="1">Psychology</option>
                                <option value="1">Religion and Theology</option>
                                <option value="1">Sociology</option>
                                <option value="1">Technology</option>

                                <option value="1">&nbsp;&nbsp;Aeronautics</option>
                                <option value="1">&nbsp;&nbsp;Aviation</option>
                                <option value="1">&nbsp;&nbsp;Computer Science</option>
                                <option value="1">&nbsp;&nbsp;Internet</option>
                                <option value="1">&nbsp;&nbsp;IT Management</option>
                                <option value="1">&nbsp;&nbsp;Web Design</option>

                                <option value="1">Tourism</option>
                            </select>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 required">
                            <div class="control-label">Document Type</div>
                            <select name="typeofdocument" id="typeofdocument"  class="form-control">
    <option selected="selected" value="" >
                                <?php if (!empty($_SESSION["documenttype"])) {
                                    echo $_SESSION["documenttype"];
                                } else echo "Select document type"; ?></option>
                                <?php
                                $ar = $obj->getPapers();
                                foreach ($ar as $value) {
                                    echo $value;
                                }
                                ?>			
                            </select>
                        </div>
                        <div class="form-group col-md-6 required">
                            <div class="control-label">Number of Pages</div>
                            <select title="Number of pages" class="form-control" name="numberofpages" id="numberofpages">
                                                     
                            <?php
                            $arg = $obj->getPages();
                            foreach ($arg as $value) {
                                echo $value;
                            }
                            ?>	
                            </select>
                        </div>
                    </div>  
                    <div class="row">           
                        <div class="form-group col-md-6"> <div class="control-label">Spacing</div>
                            <label> 
                                <input type="checkbox" name="singlespace" id="singlespace"/> Single Spaced(if not checked it will be double spaced)</label>

                        </div>
                        <div id="pages"> approximately 275 words per page</div>

                    </div> 
                </div> 
                <div class="row">           
                    <div class="form-group col-md-6 required"> <div class="control-label">Urgency</div>
                        <select class="form-control" id="urgency" data-rel="chosen" name="urgency" >
<?php
$urg = $obj->getUrgencies();
foreach ($urg as $value) {
    echo $value;
}
?>  
                        </select>

                    </div>
                    <div class="form-group col-md-6 required"> <div class="control-label">Style</div>
                        <select class="form-control" data-rel="chosen" name="writing_style" id="writing_style">
                            <option value="APA">APA</option>                    
                            <option value="MLA">MLA</option>
                            <option value="Turabian">Turabian</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Harvard">Harvard</option>
                            <option value="Oxford">Oxford</option>
                            <option value="Vancouver">Vancouver</option>
                            <option value="CBE">CBE</option>
                            <option value="Other">Other</option>

                        </select>
                    </div> 
                </div> 
                <div class="row">                          
                    <div class="form-group col-md-6 required"> <div class="control-label">Academic Level</div>
                        <select id="academic_level" class="form-control" data-rel="chosen" name="academic_level" >
<?php
$acad = $obj->getAcademicLevels();
foreach ($acad as $value) {
    echo $value;
}
?>
                        </select>
                    </div>            

                    <div class="form-group col-md-6 required"> <div class="control-label">Language</div>
                        <select id="language" class="form-control" data-rel="chosen" name="language">
                            <option value="ENGLISH(US)">ENGLISH(US)</option>
                            <option value="ENGLISH(UK)">ENGLISH(UK)</option>	
                        </select>
                    </div>          
                </div> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="panel panel-primary col-md-5 col-sm-12" style="margin-top:0px; padding:0px">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 1.5em">Cost Calculator</h3>
                        </div>
                        <div class="panel-body">
                            <div class="body bg-gray">
                                <div style="text-align: center" id="costperpage"></div>
                                <div></div>
                                <div style="text-align: center" id="totalcost"></div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

        </div>  
        <div class="well panel-primary col-md-12 col-sm-12" style="padding:0px">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-size: 1.5em">Instructions and Attachments</h3>
            </div>
            <div class="panel-body">
                <div class="body bg-gray">
                    <div id="not2"></div>
                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <div class="control-label" >Attachments</div>
<!--                            <button id="addAttachment" name="addAttachment" class="btn btn-default btn-primary">Attach File</button>-->
                            <div id="atachfile" >
                                <input id="uploadedfiles"  type="file" name="uploadedfiles" class="btn btn-default btn-primary"/>
                            </div>
                           

                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="control-label">Order Instructions </div>
                            <textarea name="instruction" id="instruction" cols="80" rows="7"></textarea>
                        </div>
                    </div>                     
                    <div class="row">   
                        <div class="form-group col-md-6"> 
                            <label> <input type="checkbox" name="receivephonecalls" id="receivephonecalls"/> Receive phone calls</label>

                        </div>
                        <label> <input type="checkbox" name="agree" id="agree"/> I agree to terms and conditions</label>

                    </div> 
                </div>
                <div class="row" ><div class="col-md-6"></div>
                    <div class="form-group col-md-5">                                                               
                        <button type="submit" class="btn btn-primary btn-default btn-flat btn-lg" style="display:none" id="preview">Preview Order</button> 
                    </div>
                </div>

            </div>
        </div>  
    </form> 
</div>


<!--Footer-->
<?php include_once ('ui/footer.php'); ?>