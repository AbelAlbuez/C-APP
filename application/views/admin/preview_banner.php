<?php  plantilla::iniciar();

?>
  <div class="content-wrapper">
  <div class="container">
	<h1>Previsualizacion</h1>
	</div>
	<?php if(empty($listado)){?>
	<h1>Sin Imagenes</h1>
	<?php }else {?>
			<?php	foreach ($listado as $slide ) {?>
		<div class="w3-content">
 <img class="mySlides" src="<?php echo base_url('uploads/imagenesBanner/').$slide->url_imagen?>" alt="custom_html_banner1" style="width:100%">
  
<?php }?> 
<?php }?> 
<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
 <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>


<script>
 var slideIndex = 1;
 showDivs(slideIndex);
 function plusDivs(n) {
 showDivs(slideIndex += n);
  }
 function showDivs(n) {
 var i;
 var x = document.getElementsByClassName("mySlides");
 if (n > x.length) {slideIndex = 1} if (n < 1) {slideIndex = x.length}for
 (i = 0; i < x.length; i++) {x[i].style.display = "none";}
 x[slideIndex-1].style.display = "block"; }
</script>
<style>
.w3-content{position:relative;margin-top:0em;width:90%;
	left: 5%;
 }
.w3-btn,.w3-button{border:none;display:inline-block;outline:0;
	padding:8px 16px;
	vertical-align:middle;
	overflow:hidden;
	text-decoration:none;
	color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}

.w3-btn,.w3-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none} 
.w3-disabled,.w3-btn:disabled,.w3-button:disable
d{cursor:not-allowed;opacity:0.3}
.w3-disabled *,:disabled *{pointer-events:none}
.w3-bar-block .w3-dropdown-hover .w3-button,.w3-bar-block .w3-dropdown-click .w3-button
{width:90%;text-align:left;padding:8px 16px}
.w3-button:hover{color:#000!important;background-color:#ccc!important}

.w3-content button {
position: absolute;
top: 40%;
}

.w3-display-right {right:0}
.w3-display-left {left:0}
</style>

</div>
