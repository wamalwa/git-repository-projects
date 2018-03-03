<?php
$contect = '';
switch($page_desc){
     case 'High Quality Writing Services': 
        $image = 'quality.jpg';
        $contect = '<p>Quality is something that no research paper writing service provider can afford to play with. '
             . 'We understand the importance of these papers in supporting the students in building their career on the right foot and as a result we never resort to any means that can compromise quality of the paper.</p><br> '
             . '<p>As the quality of our papers is really high, students are guaranteed to get highest grades and marks in their tests and exams. We are sure that with the help of our research paper writing services, there is no way that students can miss an incredible take on their dream career.</p>'; 
         break;
     case 'On Time Service Delivery':
        $image = 'timely.jpg';
        $contect ='<p>Time is an incredible factor when it comes to quality research proposal writing services. We never focus to provide high quality papers alone, all that we do related to writing an essay also is based on high quality. Albeit serving thousands of students constantly with myriad of complex essays and dissertations, we have never missed any timeframe set by the client.</p><br>'
                . '<p> As much as we respect the quality of our thesis writing services, we respect the need to submit papers on time. Usually we provide papers well beyond the deadline, giving enough time for the students to go through the paper.</p>';
         break;
     case 'Multilevel Quality Checking':
        $image = 'img2.jpg';
        $contect = '<p>We have a dedicated Quality Assurance Department team to ensure that the essay writing service that we provide meet all the quality guidelines set by us and by the student. Since quality of the service deliverance can decide the fate our clients in their exams and tests, we take every effort to eliminate any sort of glitch that might happen while writing a paper.</p><br>'
                . '<p> Our quality monitoring team has every equipment to make sure that the paper is devoid of any typing, grammatical or factual errors that might thwart the chances of students getting higher scores. All the papers go through numerous levels of quality checking before being delivered to the clients.</p>';
         break;
     case'Affordable Rates':
         $image = 'img2.jpg';
        $contect ='Though we provide highest quality thesis writing services we never try to burn a hole in the pocket of our clients. We understand the financial soundness of the people who are studying and we have affordable plans for everyone. We believe that our best dissertation writing services must be affordable to everyone and pricing of our services must not be constraint for them.';
         break;
     case'24×7 Customer Service':
         $image = 'img2.jpg';
        $contect ='One of the best things that we promise to our clients is round the clock customer service to get any support related to the custom essay writing services that we provide. And to no surprise of ours, this has been highly appreciated by people around the world as one of the best guarantee that we provide them.';
         break;
     default :
         break;
    
}
?>
<div class="col-md-3">
    <img src="images/<?= $image ?>" style="height:213px;width: 400px" alt="<?= $page_desc ?>" />
</div>

<div class="col-md-9">  
        <div class="box">
            <div class="col-md-12"><br>
               <?= $contect ?> 
                
            </div>
        </div>
</div>