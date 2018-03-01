<script>
 var pasrsedJsonData;
    function parsetoJSON(rawData) {
        try {
            preparedData = '{' + rawData + '}';//single we do want the user to write so much in the config, we add the bracess here before parsing it
            return  JSON.parse(preparedData);
        }
        catch (err) {
            return err;
        }
    }
    
    function ViewTransDetails(index){

        document.getElementById("specific_details_here").innerHTML ='';
        //getting headers
         var pasrsedJsonDataatZero =  pasrsedJsonData.transactions[0];           
         var keysatZero = Object.keys(pasrsedJsonDataatZero);
         var keyLengthatZero = keysatZero.length;

        var pasrsedJsonDataAtI = pasrsedJsonData.transactions[index];
        var keysAti = Object.keys(pasrsedJsonDataAtI);
        var keyLengthAti = keysAti.length;  
        var content = '<h3>No.'+(index+1)+' Transaction Details</h3>'; 

            for (var i =0; i < keyLengthAti; i++) {
                var keyNameAti = keysAti[i];
                content +='<p><b>'+keysatZero[i]+': </b> '+ pasrsedJsonDataAtI[keyNameAti]+'</p>';

            }

        content+='';

        document.getElementById("specific_details_here").innerHTML = content;
        document.getElementById("details_here").style.display = 'none';
        document.getElementById("specific_details_here").style.display = 'block';

        return false;
    }

    function UploadMedia() {
        var _success = -1;
        var formData = new FormData($('#frmuploadMedia')[0]);
        $.ajax({
            url: './index.php?r=Transactions/index',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                _success = response;
            }
        });
        return _success;
    }
    $(document).ready(function() {
        
        $('#fileUpload').on("change", function() {
            document.getElementById("details_here").innerHTML ='';
    try{
            var data = UploadMedia();
            pasrsedJsonData = parsetoJSON(data);
            var tableData = '<table style="font-size: 0.7em;border:1;"><thead><tr id="tr_header">';
 
           var pasrsedJsonDataatZero =  pasrsedJsonData.transactions[0];           
            var keysatZero = Object.keys(pasrsedJsonDataatZero);
            var keyLengthatZero = keysatZero.length;
                tableData += '<th>No.</th>';

            for (var i = 0; i < keyLengthatZero; i++) {
                tableData += '<th>' + keysatZero[i] + '</th>';
            }
            tableData += '<th>Actions</th>';
            tableData += '</tr></thead><tbody>';
            
            
       var keysTrans = Object.keys(pasrsedJsonData.transactions);
       var keyLengthTrans = keysTrans.length;  
       
       for(var ti =0; ti <keyLengthTrans; ti++){           
            tableData += '<tr>';
            var pasrsedJsonDataAtI = pasrsedJsonData.transactions[ti];
            var keysAti = Object.keys(pasrsedJsonDataAtI);
            var keyLengthAti = keysAti.length;
                tableData += '<td>' + (ti+1)+ '</td>';
            for (var i =0; i < keyLengthAti; i++) {
                var keyNameAti = keysAti[i];
                var actualData = pasrsedJsonDataAtI[keyNameAti];
            
                var dataBulletin ='';

                var isJson = false;             
                try
                {
                    //This works with JSON string and JSON object, not sure about others.
                var json = $.parseJSON(actualData);
                    isJson = (typeof(json) === 'object' || typeof(json) === 'Object');
                }
                catch (ex) {}
                 
                 if(isJson===true){
                    dataBulletin = actualData.substring(0,10)+'...'; 
                 }
                 else{
                     dataBulletin = actualData;
                 }

                    tableData += '<td>' + dataBulletin+ '</td>';
                }
             tableData += '<td><input type="button" value="View Details" \n\
             id="btnViewDetails" onclick="js:return ViewTransDetails('
            +ti+')"></td>';
             tableData += '</tr>';  
        }
        tableData+='</tbody></table>';
    
        document.getElementById("details_here").innerHTML = tableData;

    }
     catch (ex) {
        document.getElementById("details_here").innerHTML = '<div style="color:red">'+ex+'</div><br>';
     }

    });



$('#btnLogs').click(function () {    
       document.getElementById("details_here").style.display = 'block';
       document.getElementById("specific_details_here").style.display = 'none'; 

        return false;
        
}); 
        


    });
</script>
<?php
/* @var $this TransactionsController */

$this->breadcrumbs = array(
    'Transactions',
);
?>

<h1>View All Transactions</h1>
<div id="sidebar" class="12u">
    <h3>Transaction file</h3>
    <form method="post" action="#" name="frmuploadMedia" id="frmuploadMedia"  enctype="multipart/form-data">   

        <div class="row">
            <div class="span-12">
                <input type="file" name="fileUpload" id="fileUpload">
            </div>
          
        </div>
        <br/> <br/>
        <div class="row" id="details_here">

        </div>
        <hr>

        <div class="row" id="specific_details_here">

        </div>
      <div class="pull-right"><input type="button" class="btn btn-primary" id="btnLogs" value="<< Back to Logs"></div>
    </form>
</div>


