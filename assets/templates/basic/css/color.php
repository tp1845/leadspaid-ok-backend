<?php
header("Content-Type:text/css");
$color = "#f0f";
$color2 = "#000";
function checkhexcolor($color)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) and $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}
if (!$color or !checkhexcolor($color)) {
    $color = "#f0f";
}
function checkhexcolor2($color2)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if (isset($_GET['color2']) and $_GET['color2'] != '') {
    $color2 = "#" . $_GET['color2'];
}
if (!$color2 or !checkhexcolor2($color2)) {
    $color2 = "#000";
}
?>


.cmn-btn, .side-tab-nav.style--white .nav-link.active, .side-tab-nav.style--white .nav-link.active, .scroll-to-top, .cmn-list li::before, .choose-card::before, .video-icon, .testimonial-slider .slick-dots li.slick-active button, .brand-section, .sidebar .widget .widget__title::after,.contact-info-card__icon, .contact-info-card__icon::after, .account-tab-nav .nav-item .nav-link.active{
background-color:<?php echo $color; ?> !important;
}

.video-icon:hover, .header.menu-fixed .header__bottom, .testimonial-wrapper, .footer{
background-color:<?php echo $color2; ?> !important;
}

.base--color, .counter-card__icon i, .stat_text,.breadcrumb-item a, .page-breadcrumb li a:hover, .page-breadcrumb li:first-child::before,
.header .main-menu li a:hover, .header .main-menu li a:focus,.contact-info-card__content a:hover, .footer-short-links
{
color:<?php echo $color; ?> !important;
}

a:hover{
color: <?php echo $color; ?>
}

.side-tab-nav.style--white .nav-link.active,.form-control:focus{
border-color:<?php echo $color; ?> !important;
}

.preloader .animated-preloader, .preloader .animated-preloader::before{
background:<?php echo $color; ?>!important;
}

.cmn-btn:hover{
box-shadow: 0 5px 15px 2px <?php echo $color . '7F'; ?> !important;
}

.choose-card.style--two:hover{
background-color:<?php echo $color . '0D'; ?> !important;
}

.form-control:focus{
box-shadow: 0 0 5px <?php echo $color . '0D'; ?> !important;
}

.contact-info-card:hover {
box-shadow: 0 5px 15px <?php echo $color . '1A'; ?> !important;
}


.contact-info-card::before {
border-top: 3px solid <?php echo $color, 60 ?>;
border-left: 3px solid <?php echo $color, 60 ?>;
}

.contact-info-card::after {
border-bottom: 3px solid <?php echo $color, 60 ?>;
border-right: 3px solid <?php echo $color, 60 ?>;
}

.contact-info-card:hover::before, .contact-info-card:hover::after {
border-color: <?php echo $color ?>;
}

.footer-short-links li a:hover {
color: <?php echo $color ?>;
}.footer-short-links li a:hover {
color: <?php echo $color ?>;
}

.para-white a {
color: <?php echo $color ?>;
}

.testimonial-slider .slick-dots li.slick-active button
{
border-color: <?php echo $color ?>;
}