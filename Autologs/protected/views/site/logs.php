<script>

    setInterval(loadData, 2000);
    function loadData() {
        var jsonData = '{"appname": "AAR_Servlet","field0": "0200","field2": "254705941419", "field3": "310000","field4": "400","field7": "0911185012","field37": "AAA1AQ9PL", "field39": "00","field48": "Your Account Balance is 400","field68": "BALANCE ENQUIRY","field102": "254705941419"}';
//        var jsonData = '{"appname": "AAR_SMS_Adaptor","field0": "0200","field2": "254705941419", "field3": "310000","field4": "400","field37": "AAA1AQ9PL", "field39": "00","field48": "Your Account Balance is 400","field68": "BALANCE ENQUIRY","field102": "254705941419"}';
        var jsonObject  = JSON.parse(jsonData);        
        var appname     = $('#<?php echo $app; ?>').val();
        
      if(appname===jsonObject.appname){
        var keys      = Object.keys(jsonObject);
        var keyLength = keys.length;
        
       var tableData = '<table style = "font-size: 0.7em;border:1;"><thead><tr id = "tr_header">'; 
       for(var i = 1;i<keyLength;i++){
            tableData+='<th>'+keys[i]+'</th>';
        }
        tableData+='</tr></thead><tbody><tr>';
       for(var i = 1;i<keyLength;i++){
           var keyName = keys[i];
            tableData+='<td>'+jsonObject[keyName]+'</td>';
            }
            tableData+='</tr></tbody></table>';
           document.getElementById("livelogs<?php echo $app; ?>").innerHTML = tableData;
         }
    }
      var jsonData = $('#liveData').val();      
      function loadSocketData(jsonData) {
//        var jsonData = '{"appname": "AAR_Servlet","field0": "0200","field2": "254705941419", "field3": "310000","field4": "400","field37": "AAA1AQ9PL", "field39": "00","field48": "Your Account Balance is 400","field68": "BALANCE ENQUIRY","field102": "254705941419"}';
//        var jsonData = '{"appname": "AAR_SMS_Adaptor","field0": "0200","field2": "254705941419", "field3": "310000","field4": "400","field37": "AAA1AQ9PL", "field39": "00","field48": "Your Account Balance is 400","field68": "BALANCE ENQUIRY","field102": "254705941419"}';
        var jsonObject  = JSON.parse(jsonData);        
        var appname     = $('#<?php echo $app; ?>').val();
        
      if(appname===jsonObject.appname){
        var keys      = Object.keys(jsonObject);
        var keyLength = keys.length;
        
       var tableData = '<table style = "font-size: 0.7em;border:1;"><thead><tr id = "tr_header">'; 
       for(var i = 1;i<keyLength;i++){
            tableData+='<th>'+keys[i]+'</th>';
        }
            tableData+='</tr></thead><tbody><tr>';
       for(var i = 1;i<keyLength;i++){
           var keyValue = keys[i];
            tableData+='<td>'+jsonObject[keyValue]+'</td>';
            }
            tableData+='</tr></tbody></table>';
         document.getElementById("livelogs<?php echo $app; ?>").innerHTML =tableData;
         }
    }
</script>

<input type = "hidden" id = "<?php echo $app; ?>" value = "<?php echo $app; ?>" />
<div id = "livelogs<?php echo $app; ?>"><br/><br/>
</div>