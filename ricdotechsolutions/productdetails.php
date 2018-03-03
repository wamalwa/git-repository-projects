<?php $desc = $_GET['desc']; ?>
<!DOCTYPE html>
<html>
<head>
<title><?= $desc ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ricdotech,Solutions Organization" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!--start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
        $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
});
</script>
<!--start-smoth-scrolling-->
</head>
<body>
	<!--header-top-->
<?php  $thispage = 'products'; require 'header.php'; ?>
	
<!--<div class="banner">
		<div class="_products" >
			<div class="container">
				<div class="banner-text">
												
				</div>
			</div>
		</div>
	</div>	
 <div class="clearfix"></div>

	start-breadcrumbs
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Products</li>
				</ol>
			</div>
		</div>
	</div>-->
	<!--end-breadcrumbs-->
	<!--starts-welcome-->
<div class="container well">
 <?php if($desc==='Business Cards'){?> 
<div class="col-md-12" ><br>
  <div class="heading">
    <h3>Business Cards</h3>
  </div>
  <a href="#"><img src="images/products/businesscards.jpg" alt="Business Cards" style="width:95%;height:300px"/></a>
<hr>
<p>We offer a great selection of quality business cards. </p><br>
<p>We offer hundreds of amazing and creative business card types that you can choose from. We are a true one stop shop for business cards, specialty printing and your marketing needs. Our team knows that the importance of a clean professional business card is immeasurable.</p><br>

<p>Whether you are at an important meeting, or simply making new contacts, your business card is essential. It lets people know who you are, what you do, how to reach you and most important how serious you take yourself.</p>
</div>
 <?php } ?>  
 
 <?php if($desc==='Envelops'){?> 
<div class="col-md-12" ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/envelops.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>There are many benefits to using special custom printed envelopes. 
    They can definitely help emphasize your branding. </p><br>
    <p>By taking advantage of custom print and design, you can bring your envelope to life. Otherwise an envelope is simply another functional object.
        Envelopes are needed as part of mailing advertisements. </p><br>
 <p>Ours are made to stand out from standard mail by printing your logo, motto, or even company name on the outside of the envelope. We can help with the entire process.</p><br>
<p>We will design an eye-catching envelope that will raise awareness of your brand as well as your business. Visibility is a highly important aspect when it comes to expanding your business and brand awareness.</p>
<p>No matter what you need, we have you covered! Give us a call today or email us.</p

</div>
 <?php } ?>
    
 <?php if($desc==='Letter Heads'){?> 
<div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/letterheads.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Having a high quality custom letterhead has many benefits. </p>
<p>When a customer sees that you have a quality letterhead they will know that you provide a high quality product. </p><br>
<p>At <b>Ric-Dotech Solutions</b> we know the importance of a premium letterhead for business. Separate yourself from your competition! Letterhead is employed by many large corporations to personalize interaction with customers as well as prospects.</p><br>
<p> It is part of what separates professionals from amateurs, and will ensure that your business looks professional.</p><br>
<p>Do not waste another minute… Let us assist you enhance the look of your brand. We will design and print your letterhead to match your needs as well as your brand. It is part of what separates professionals from amateurs. We will help you stand out from the rest of your competition!</p><br>
<p>No matter what you need, we have you covered! Give us a call today or email us.</p>


</div>

 <?php } ?>
    
 <?php if($desc==='Stickers'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/stickers.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>A sticker is a great tool for both professional and personal use. They are a perfect way to label and market just about anything. They can be used for campaigns, decorations, promotions as well as actual products, and are a great means of branding for businesses as well.</p><br>

<p> One of the best benefits to using stickers is that you can stick them just about anywhere! The sky is the limit when it comes to using stickers for your marketing campaigns.</p><br>
<p><b>Ric-Dotech Solutions</b> offers a large variety of customizable stickers. From peel and stick paper stickers, all weather laminated vinyl stickers, to roll label stickers, we do it all. In addition, we offer them in all shapes and sizes!</p><br>
<p>Whatever type of stickers you need, give us a call or email us. Let us get started on your project.


</div>
    
 <?php } ?>

   
 <?php if($desc==='Flyers'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/flyers.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Whether you have a restaurant, you are a jeweler, a travel agent or realtor, we will be more than happy to help you. We will create your graphic design and print your flyers.</p><br>
<p> The right promotions in addition to the right flyers can help with all these questions.</p><br>
<p>Give us a call or email us. Let us help you make your business or brand shine bright.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Labels'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/labels.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>When introducing customers to your product, first impressions are very important. They are made with the look of your product as well as your label. </p><br>

<p>It is very important to make an unforgettable first impression and ensure that your labels are attractive and eye-catching. Digitally printed labels are vibrant high-quality stickers that can be used for practically any product.</p><br>

 <p>Using these to create a vibrant product will surely grab the attention of the consumer. When it comes to product labels, we use vibrant high-quality graphics. Our colors and designs are sure to grab the attention of your consumer. </p><br>

 <p>Our digital presses print with great resolution so your labels end up with crisp, clear images and life-like colors. Our goal is to create an eye catching label that grabs a buyer’s attention. </p><br>
<p>No matter what you need, we have you covered! Give us a call today or email us.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Posters'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/posters.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p1>Looking for large format poster printing? You have come to the right place, because we are your number one source for posters as well as poster printing for your business, event, or product branding.
<p> We offer great prices and an excellent team of experienced staff, in addition to our high quality printing. We will address all your needs and make sure you are getting exactly what you want for your project.</p><br>
<p>Posters are used to either market a person, a brand, a service or even an event. We make sure you have the tools you need to make yourself visible to potential new customers, clients, and fans in your area.</p><br>  <p>Setting yourself apart as a unique and individual brand can be of utmost importance. We can make your posters; banners or signs stand out above the rest.</p><br>
<p>Give us a call or email us. Let us help you make your business or brand shine bright.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Booklets'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/booklets.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p><b>Ric-Dotech Solutions</b> understands that in today’s highly competitive business world, your business needs a distinctive marketing campaign that will make you stand out from the competition. </p><br>
  <p>This needs to be achieved while still offering something of interest to your current and prospective customers. Booklets are perfect for these situations.</p><br>
<p>Booklets are an effective promotional and advertising tool, even today. The effectiveness is based on the fact that they can professionally feature a brand to a specific market. </p><br>

  <p>The team at Ric-Dotech Solutions knows that this is still a very relevant tool for your marketing needs. We will help you in tailoring booklets for your business.</p><br>

<p>We will go over the right size, paper type, cover style as well as layout for your booklets. Give us a call or email us. We will be more than happy to assist you in creating your next custom booklets.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Brochures'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/brochures.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Brochures form an important part of printed marketing collateral. Even despite the growing popularity of online marketing initiatives, they still show great value.</p><br>
<p> A well-designed brochure will have captivating visual effects as well as loads of product-specific information. It focuses solely on your brand, your business and your offerings. </p><br>

<p>At <b>Ric-Dotech Solutions</b>, our graphic designers can help you capture the attention of potential customers through the eye catching design of your brochure. Brochures are a very versatile way to promote almost all types of products and services.</p><br>

<p> They are used in different venues and found as menus, flyers, and newsletters. This is in addition to the much known tri-fold style.</p><br>

<p>Let us help you create yet another effective means to market your business for your marketing campaign that will ensure that you leave the best impression in the hands of those you meet with.
<p> Give us a call or email us.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Custom Signs'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/customsigns.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Are you looking for a creative and clean way to brand your business? Custom Signs are a great way to accomplish this task! We will help you design custom signs to be applied on any flat surface. Use cut vinyl lettering in a unique way to get your message across.</p><br>

<p>We always use the best quality vinyl, which endure years of outdoor exposure, and in addition, are completely weather resistant. We will work side-by-side with you to create the perfect design for your storefront, or logo for your company.</p><br>

<p>Do not wait another minute! We are ready to get started on your custom signs design…Get in touch with us today! Give us a call or email us.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Roll Up/ Retractable Banners'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/rollup.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Need a big bold way to get your message noticed? Roll up/Retractable banners are an effective and easy way to do it, and Ric-Dotech Solutions has you covered! These banners stand on their own and are a great addition to any pop up display.</p><br> 
<p>Roll up/Retractable banner displays are portable as well as lightweight, making it extremely easy to set up quickly wherever you go. Our retractable banners are durable. You are able to pack and carry over and over again. They are easy to wipe clean with a damp cloth.</p><br> 

<p>Get your message across loud and clear with top-quality retractable banner stands from Ric-Dotech Solutions. We offer very well-designed retractable banners featuring durable, eye-catching materials and superior craftsmanship.</p><br>
<p> You will also have the option of single or double-sided retractable banners, ensuring you have the configuration that matches your needs.</p><br>

<p>Trust the experts at Ric-Dotech Solutions, because we can ensure you get exactly what you are looking for. </p><br>
<p> Place your order today! Call or email us…</p>


</div>
    
 <?php } ?>


 <?php if($desc==='Vinyl Banners'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/vinylbanners.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>

<p>Take advantage of the visual appeal and durability of vinyl banners to advertise your company to both foot and car traffic. Customers use them to advertise a business or announce an event. Banners have many uses and are essential to many businesses.</p><br>
<p>Let our designers at Ric-Dotech Solutions help you choose the perfect design for your needs. If you are thinking of using a vinyl banner for your business, we will help you every step of the way.</p><br>

<p>One of the biggest benefits of vinyl banners is the durability. They are tear resistant as well as weatherproof. The best aspect of vinyl banners is the fact that they are so versatile. Because vinyl banners are weatherproof and durable, they’re perfect for outdoor use.</p><br>
 <p>You can use them to showcase special sales, open houses, or other special events like conferences. They can even be used to promote events, parades or fairs.</p><br>
<p>Promote your business or event with a vinyl banner, give us a call or email us. We will help you create the perfect vinyl banner that will suit your brand needs and create a lasting impression to anyone who passes by it!</p>

</div>
    
 <?php } ?>

 <?php if($desc==='Logo Design'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/logodesign.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Businesses must have a corporate identity that people can identify them with. A logo design is a shorthand version of a company’s mission and vision because of what it is made to represent. It gives viewers a short story of the brand’s behavior, culture, and values. A good logo is a necessity for all businesses.</p><br>

<p>Ric-Dotech Solutions has had their hands involved in the logo design process for many different businesses. From small coffee shops to global brands, Ric-Dotech Solutions has helped hundreds of businesses build a corporate identity as well as brand.</p><br>

 <p>We will create a brand logo design that will be remembered by your customers. Our professional team will make sure that you are aware as well as involved in the entire process.</p><br>

<p>Don’t settle for anything but the best, especially when the fate of your business is on the line. Give us a call or email us today. </p><br>
 <p>Let’s talk about how we can help you create the perfect logo design.</p>


</div>
    
 <?php } ?>


 <?php if($desc==='Tear Drop Banners'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/teardropbanners.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Looking for promotional flags to increase the business as well as gain marketing exposure? We print our promotional flags using high-resolution printers. </p>

<p>Flags drive sales! They effectively attract customers and will give you optimal results in your marketing campaign. Our promotional flags are heavy duty and versatile.</p>
<p> They are used both indoors and outdoors, and can withstand most weather conditions.</p>

<p>With the help of our trusted graphic designers, we can make your exact vision a reality! We will ensure that you are happy with the results, because we value you!</p>

<p>Give us a call today or email us. We will get started on your exciting promotional flag design and help you stand out from the rest of your competition! </p>


</div>
    
 <?php } ?>
 <?php if($desc==='Presentational Folders'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/presentationalfolers.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>The way you present yourself says everything about you and your brand. It lets your customers, both existing and potential; know who you are, and how much attention you pay to detail. Look organized and professional with custom presentation folders from Ric-Dotech Solutions.</p><br>

 <p>They are a great way to brand yourself as well as separate yourself, your product and your services from others. Let us help you impress your new clients…We’ve got it all covered for you!
Not too sure of what you need? Don’t worry.</p><br>

 <p>Our professional creative team can help you out with that, because we are experts in this field. Ric-Dotech Solutions is proud of the quality of customer service we extend to each and every one of our customers.</p><br>
<p>The next time you need custom presentation folders, give us a call or email us. Contact us today and find out how thousands of customers didn’t go wrong in choosing Ric-Dotech Solutions.</p>


</div>
    
 <?php } ?>

 <?php if($desc==='Door Hangers'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/door.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>

<p>Door hangers are some of the most effective advertising tools for businesses. Your advertisement is guaranteed to be seen by the homeowner because they have to physically remove it from their door. The recipient will bring the door hanger into their home where it’s more than likely to be read.</p><br>

<p>A door hanger gives you ensured visibility and communication with your target audience.
When people are in need of the service you provide, they are more likely to think of you because your name is already in their mind.</p><br>

 <p>People prefer to work with companies with which they already have brand familiarity.
At Ric-Dotech Solutions, we can help you create a creative and eye catching design for your door hanger to catch the attention of your prospective customers.</p><br>

<p> Door hangers can help you strengthen and grow your business! Do not waste another minute… Call us today! You can reach us by phone or email us.</p><br>
  <p>Our team is ready to help you on your door hanger campaign!</p>

</div>
    
 <?php } ?>

 
 <?php if($desc==='Menus'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/menu.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Communicate your business brand with high-quality, full-color menus. They are used by any business that wants to display a menu of items as well as services. They are the brochure of the restaurant industry, and in addition, are incredibly powerful motivators. </p><br>

  <p>The menu is overlooked as a marketing piece, but that is just what it is. The more you can convince customers to try, the more that they will like and the more business you will get. A menu is not just for restaurants. Printing your own personalized menu for weddings, holidays meals or even dinner parties will make any event extra special. Menus also display services in an easy to follow design.</p><br>

<p>At Ric-Dotech Solutions, we understand the importance of having a creative and fun menu. This will entice your clients to spend more at your business. No matter how simple or intricate you want your menu to be, we can help you create it! </p><br>

<p>There are several types of menus you can choose from. They include long menus, bi fold, tri fold menus and even more. We will help you determine which option is going to work the best for your specific needs
</p><br>
 <p>Give us a call or email us. Let us get started on your design and print!</p>


</div>
    
 <?php } ?>

 
 <?php if($desc==='Large Format Printing'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/lfprinting.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>At Ric-Dotech Solutions we take Large Format Printing very seriously! This division is trusted by small business owners and huge corporations alike, for its commitment to outstanding customer service, creative designs and incredible print quality. We are equipped with the latest and best technologies in poster, banner, and display printing.</p><br>

<p>We will have you covered for all of your large format printing needs, whether fits for business or personal. Large format printing is the best way to get high-quality oversize prints because they are perfect for everything! From framing to window graphics, they will make a big impact and a lasting impression.</p><br>

<p>Don’t have a design for your large format print? Not to worry! We have you covered… In the hands of our trusted graphic designers, we can even create an impressive design for you. Our team works until you are completely satisfied with the design we have created for you, as well as with the product.</p><br>

<p>Not sure what type of print you actually need? Let us help you determine what you really need as well as what type of large format printing would be best for you.  We care, because we want to see your business succeed! That is the biggest win in our eyes!</p><br>

<p>Find out how we can help you with your printing needs by giving us a call or even emailing us and speaking to someone on our team today!</p>


</div>
    
 <?php } ?>

 
 <?php if($desc==='Utensils'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/utensils.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Mugs go with any kitchen decor or office desk, and provide the perfect background for your own creative designs with words, photos or both. Personalized Black Mugs are great to give as a gift or for personal use, which can be printed with your own designs or pictures on it. </p><br>

<p><b>Magic mug</b> exposes a picture or message when hot. Choose a dark background picture or set your message on a dark background so ensure very little of it is seen when cold. Mug set is a great gift for a wedding, anniversary, Valentine’s Day or any other special occasion. </p><br>

<p>Customize with your pictures, photos, and text to make a one-of-a-kind mug set that will be cherished for years.</p>

</div>
    
 <?php } ?> 
 <?php if($desc==='Tiles'){?>
 <div class="col-md-12"  ><br>
  <div class="heading">
    <h3><?= $desc ?></h3>
  </div>
  <a href="#"><img src="images/products/tiles.jpg" alt="<?= $desc ?>" style="width:95%;height:300px"/></a>
<hr>
<p>Use tiles as a revolutionary approach to home and office decoration. Decide on which designs or art work will be printed on accent tiles for the bathroom or kitchen or even for a complete mural for a counter top or for your office or basement wall.</p><br>

 <p>How about a floor mural? It’s all possible with sublimation tiles. Tiles can be displayed one at a time or create murals to add to the decor and ambiance at residences, corporations, schools, retail stores, and sports facilities.</p><br>
 <p>Create exclusive, personal pieces for select spaces and projects such as: lobbies, entrances, fireplaces, back splashes, swimming pools, showers, walls, fountains, and signage, run with your imagination…Transfer you image to tiles.</p>

</div>
    
 <?php } ?>

</div>
<!--welcome-End-->

 <?php require 'footer.php'; ?>
</body>
</html>

