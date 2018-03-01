<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<script>
setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    document.getElementById("livelogsheader").innerHTML ="Live Logs  <i>Streaming...</i> "+d.toLocaleDateString()+' @ '+d.toLocaleTimeString();
}
</script>
<h1 id = "livelogsheader"> Live Logs  <i>Streaming...</i></h1>

<p>
   
<?php $this->renderPartial('logtabs',array('model'=>$model)); ?>


</p>

