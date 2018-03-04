<?php
$page_title="Bulk SMS  | Send SMS";
$head="Send SMS";
$currectPage='sendsms.php';
 include_once 'header.php';
?>
    <!-- Page -->
<div id="page" class="container">
<div class="row">
<div id="sidebar" class="3u">
    <section>
        <header class="major">
            <h2>Available Messages</h2>
        </header>
        <ul class="default">
            <li><a href="#">1. Compagn</a></li>
            <li><a href="#">2. Support</a></li>
            <li><a href="#">3. Holyday Wishes</a></li>
        </ul>
    </section>
    <section>
        <header class="major">
            <h2>Contacts Summary</h2>
        </header>
        <div class="row half">
            <section class="6u">
                <ul class="default">
                    <li><a href="#">   <h3>2,000 Contacts </h3></a></li>                    
                </ul>
            </section>
            
        </div>
    </section>
    <section>
        <header class="major">
            <h2>Account Summary</h2>
        </header>
        <ul class="default">
            <li><a href="#"><h3>Account Balance Ksh.100</h3></a></li>
            
        </ul>
    </section>
     
</div>
<div id="sidebar" class="8u">
                <section>
                    <header class="major">
                        <h2>Create Message</h2>
                        <span class="byline">Create Message here</span>
                    </header>
                    <form method="post" action="#" name="frmcreatesms" id="frmcreatesms">   
                     <input type="hidden" name='actiotype' id="actiontype" value="createmessage">
                    <div id="not">
                 
                    </div>
                      <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="messageType" id="messagetype" value="Message Type" />
                            </div>
                        </div>                       
                        <div class="row half">
                            <div class="12u">
                                <textarea name="message" id="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                           <div class="row half">
                            <div class="12u">
                                <input class="text" type="text" name="messageDescription" id="messageDescription" value="Message Description" />
                            </div>
                        </div>
                        <div class="row half">
                            <div class="12u">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Create Message" class="button alt" id="btncreatesms" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<!-- /Page -->  
    <?php  include_once 'footer.php'; ?>