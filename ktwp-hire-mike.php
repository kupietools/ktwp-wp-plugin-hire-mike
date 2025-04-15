<?php
/**
 * Plugin Name: Kupietools Hire Mike
 * Description: Adds a floating div in the bottom-right corner of the screen with hover effects and a clickable link.
 * Version: 1.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Enqueue the necessary CSS directly in the page's header
function floating_div_enqueue_styles() {
    $custom_css = '
         .hire-floating-div {
		 font-size:.8em !important;line-height:1.2em;
		 
		 font-family:"open sans";
            position: fixed;
			flex-direction:column;
            bottom: 20px;
            right: 20px;
            width: 120px;
            /* height: 72px; */
            background-color: #EEE;
            border: 3px solid #069;
            border-radius: 36px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            /* font-size: 12px; */
            color: black;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s linear, opacity 0.6s !important;
            opacity: .85;
            cursor:pointer !important;
			z-index:99999;
			padding:6px;
        }
		
		.hire-floating-div > b {letter-spacing:0.5px;font-family:"red hat display";font-size:1.25em !important;}

        .hire-floating-div:hover {
            transform: scale(1.1) rotateZ(360deg);
            opacity: 1;
			box-shadow: 0 6px 18px rgba(255, 255, 220, 0.5);
			 background-color: #FFF;
			 width:140px;
        }
		#hirebody {/* hide completely: display:none !important;transform: scale(0); */font-size:.8em;line-height:.9em;display:block;border:1px solid #def;padding:4px;margin:4px;border-radius:6px;}
		
		@media screen and (max-width:800px) {#hirebody {display:none !important;}} 
		
		.hire-floating-div:hover > #hirebody{
           display:block !important;
		   transform: scale(1);
		   font-size:1em;line-height:1.2em;
        }
		
		.hire-floating-div:hover > .hiremikeclickhere {color:red !important;}
		
    ';
    // Output the CSS directly into the page
    wp_register_style( 'floating-div-inline-style', false );
    wp_enqueue_style( 'floating-div-inline-style' );
    wp_add_inline_style( 'floating-div-inline-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'floating_div_enqueue_styles' );

// Add the floating div to the footer
function floating_div_add_to_footer() {
    echo '<a href="https://michaelkupietz.com/info-news/hire-mike-filemaker-web-development/" class="hire-floating-div"><span style="font-size:1.25em !important;color:#069;height:1em;" class="dashicons dashicons-hammer"></span><b><span style="color:#6fa5ed;">HIRE</span> <span style="color:#00CCCC;">MIKE</span></b><span id="hirebody"><b>Professional info:</b><br>FileMaker & Full-Stack Web Development, Wordpress, IT Consulting<br></span><span class="h6 menuheader hiremikeclickhere">Click here</span></a>';
}
add_action( 'wp_footer', 'floating_div_add_to_footer' );