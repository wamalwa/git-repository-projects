emp = {
	name: "Silvanos",
	age: 24,
	marks: [58,78,24]
};



$(document).ready(function(){

$('#send_message').click(function (){
  
    var actiontype="PostComment"; 
    var postCode=$('#postCode').val();
    var visitorsname=$('#visitorsname').val();      
    var emailaddress=$('#emailaddress').val();
    var message_body=$('#message_body').val(); 
    
    if(postCode==='' || visitorsname==='' || message_body===''){ 
        alert('Please fill all the fields and try again!');
    }
    else{  
           PostComment(actiontype,postCode,visitorsname,emailaddress,message_body);
            //clear inputs
            $('#visitorsname').val("");
            $('#emailaddress').val("");
            $('#message_body').val("");
        }
    
    return false;
    
   });    
    
    
});

function  PostComment(actiontype,postCode,visitorsname,emailaddress,message_body){
     $.post("backend/action.php",
            {
                actiontype:actiontype,
                postCode:postCode,
                visitorsname:visitorsname,
                emailaddress:emailaddress,
                message_body:message_body,
                rand:Math.random()
            } ,
            function(data)   {
                 data=$.trim(data);
                if(data!=='-1' && data!=='')   { //if correct  details
//                      alert('Comment saved succssfully!');              
                  
                }
                 return false;              
            });
       
}
//
//(function() {
// // log all calls to setArray
// var proxied = jQuery.fn.setArray;
// jQuery.fn.setArray = function() {
// console.log(this, arguments);
// return proxied.apply(this, arguments);
// };
//})();


