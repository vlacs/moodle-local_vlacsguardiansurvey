<?php
$string['guardianemailmessagehtml'] = '<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://vlacs.org/wp-content/uploads/2014/04/favicon.ico">


<title>Guardian Survey - Virtual Learning Academy</title>

<style>

/* BEGINNING CSS ORIGINAL FILE */
/*
    Theme Name:     Vlacs
    Theme URI:      http://vlacs.org
    Description:    Vlacs WordPress theme
    Version:        1.0
    Author:         Vital
    Author URI:     http://vtldesign.com
*/

/* --------------------------------------------------------------------------

    TABLE OF CONTENTS

    1. Defaults
    2. Layout
    3. Header
    4. Footer
    5. Navigation
        5.1. Main Navigation
        5.2. Utility Navigation
        5.3. Footer Navigation
    6. Page Defaults
        6.1. Typography / Layout
    7. Global Blocks
    8. UI Elements


/*  ==========================================================================
     1. GLOBAL DEFAULTS
    ==========================================================================  */

/*  ==========================================================================
     2. LAYOUT
    ==========================================================================  */
.regUpdate .one23 {
    max-width: 710px;
    margin:0 auto;
    margin-bottom: 20px;
}
.regUpdate .enroll h2 {
    text-align: center;
    font-size: 26px;
    padding-bottom:55px;
    padding-top: 25px;
}
.regUpdate .enroll .circle {
    display: inline-block;
    width: 9%;
    text-align: center;

}
.regUpdate .enroll .circle span {
    width: 56px;
    height: 56px;
    border:1px solid #49af4c;
    display: block;
    margin:0 auto;
    border-radius: 100%;
    position: relative;
    top: -12px;
    -webkit-transition: all 0.3s ease-in-out;
-moz-transition: all .3s ease-in-out;
-o-transition: all .3s ease-in-out;
transition: all .3s ease-in-out;

}
.regUpdate .enroll .circle span p {
    position: relative;
    top: 19px;
    text-align: center;
    font-size: 24px;
    color: #49af4c;
}

.regUpdate .enroll .line {
    display: inline-block;
    height: 1px;
    background: #c6e6c7;
    width: 35%;
}
.regUpdate .enroll .box {
    width: 29%;
    height: 416px;
    background-color: #8EBFDE;
    display: inline-block;
    text-align: center;
    position: relative;
    padding:0px 2% ;
    vertical-align: top;
}
.regUpdate .enroll .box .arrow {
       border-left: 27px solid rgba(255, 255, 255, 0);
    border-right: 27px solid rgba(255, 255, 255, 0);
    border-top: 20px solid #fff;
    height: 0;
    left: 50%;
    margin-left: -27px;
    position: absolute;
    width: 0;
    -moz-transform: scale(.9999);
}
.regUpdate .enroll .box.createAcct {
    background: #d8e9f3;
}
.regUpdate .enroll .box.requestCourse {
    background: #cae1ef;
}
.regUpdate .enroll .box.courseApprove {
    background: #bbd8eb;
}
.regUpdate .enroll .box h3 {
    color: #0877BC;
    font-family: "Helvetica";
    font-size: 20px;
    font-weight: 700;
    padding-top: 30px;
    padding-bottom: 5px;
}
.regUpdate .enroll .box p {
    font-size: 13px;
    text-align: center;
}
.regUpdate .enroll .box img {
    padding-bottom: 27px;
}
.regUpdate .enroll .create {
    width: 83%;
    height: 54px;
    background-color: #A5A5A5;
    background-image: -moz-linear-gradient(bottom, #40AC43 0%, #8DDE8F 100%);
    background-image: -o-linear-gradient(bottom, #40AC43 0%, #8DDE8F 100%);
    background-image: -webkit-linear-gradient(bottom, #40AC43 0%, #8DDE8F 100%);
    background-image: linear-gradient(to top, #40AC43 0%, #8DDE8F 100%);
    -moz-border-radius: 12px;
    -webkit-border-radius: 12px;
    border-radius: 12px;
    color: #FFF;
    font-family: "Helvetica";
    font-size: 19px;
    font-weight: 700;
    margin-top: 12px;
}
.regUpdate .enroll .create + a {
    font-size: 12px;
    position: relative;
    top: 10px;
}
.regUpdate .enroll .congrats {
    color: #0877BC;
    font-family: "Helvetica";
    font-size: 18px;
    font-weight: 700;
    padding-bottom: 8px;
}
.regUpdate .vlacs-logo img {
    margin:0 auto;
    display: block;
    text-align: center;
    margin-top: 35px;
}
.regUpdate button:hover {
    cursor: pointer;
    background: #0877BC !important;
}

@media screen and (max-width: 1024px){
    .regUpdate .enroll .box {
        background-color: #8ebfde;
        display: inline-block;
        height: 416px;
        padding: 0 1%;
        position: relative;
        text-align: center;
        vertical-align: top;
        width: 30%;
    }
    .container.regUpdate {
        width: 100%;
    }
    .regUpdate .enroll .box {
        width: 31%;
        height: auto;
    }
    .regUpdate .enroll .box.courseApprove {
        float: right;
    }
}
@media screen and (max-width: 580px){
    .regUpdate .enroll .circle {
        width: 8%;
    }
    .regUpdate .enroll .circle span {
        background: #fff;
    }
    .regHeader {
        height: auto !important;
        background-size: cover !important;
    }
}
@media screen and (max-width: 450px) {
    .regUpdate .enroll .box {
        width: 100%;
        height: auto;
        display: block;
        margin-top: 15px;
    }
    .regUpdate .one23 {
        display: none;
    }

}

.one23 .circle span.active {
    background: #49af4c !important;
    color: #fff !important;
}
.one23 .circle span.active p {
    color: #fff !important;
}

/*  ==========================================================================
     3. HEADER
    ==========================================================================  */


.regHeader h1 {
    color: #666666;
    padding-top: 45px;
    padding-bottom: 20px;
}
.regHeader h1 span {
    color: #49ab47;
}
.regHeader p  {
    max-width: 630px;
    font-family: Arial, Helvetica, sans-serif;
    color: #666666;
    line-height: 1.5em;
}

/*  ==========================================================================
     4. FOOTER
    ==========================================================================  */


/*  ==========================================================================
     5. NAVIGATION
    ==========================================================================  */

/*   5.1. Main Navigation
    --------------------------------------------------------------------------  */

/*   5.2. Utility Navigation
    --------------------------------------------------------------------------  */

/*   5.3. Footer Navigation
    --------------------------------------------------------------------------  */


/*  ==========================================================================
     6. PAGE DEFAULTS
    ==========================================================================  */

/*   6.1. Typography / Layout
    --------------------------------------------------------------------------  */

/*  ==========================================================================
     7. GLOBAL BLOCKS
    ==========================================================================  */

/*  ==========================================================================
     8. UI ELEMENTS
    ==========================================================================  */
@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300|Covered+By+Your+Grace);




/* CSS Document */

/*::-moz-selection {
background: #0096d2;
color:#fff;
}
::selection {
background: #0096d2;
color:#fff;
}*/
* {
    margin:0;
    padding:0;
    border:none;
    outline:none;
}
/**:before, *:after {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}*/
body {
    font-family:Helvetica, Arial, sans-serif;
}
a {
    text-decoration:none;
    color: #4DAA4C;
}
a:hover{
    color: #333333;
}
img{
    max-width:100%;
}
button.enrollButton {
    /*background: url(images/enroll_now_button.png) repeat;*/
    background: #4dab4d;
    border: medium none;
    cursor: pointer;
    height: 33px;
    width: 114px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    font-weight:bold;
    color:#fff;
    margin-top: 15px;
}
button.enrollButton:hover {
    background:#196a9f;
}
.more {
    color: #4DAA4C;
    font-size:14px;
    float:right;
    font-weight:bold;
}
.more:hover {
    color:#333;
}
.more.em {
    font-style:italic;
}
.blue-btn {
    /*background:url(images/blue-btn-bg.png) repeat-x left top;*/
    background: #196a9f;
    height:25px;
    padding:0 15px;
    color:#fff;
    cursor:pointer;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    color:#fff;
}
.blue-btn:hover {
    background:#4dab4d;
}
.blue-btn:hover a {
    color: #fff;
}
.blue-btn-small {
    /*background:url(images/blue-btn-bg.png) repeat-x left top;*/
    background: #196a9f;
    height:25px;
    padding:0 15px;
    color:#fff;
    cursor:pointer;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    display:inline-block;
    line-height:25px;
    font-size:13px;
}
.blue-btn-small:hover {
    /*background-position: left bottom;*/
    background:#4dab4d;
}
.wrapper {
    width:100%;
    float:left;
}
.container {
    width:960px;
    margin:0 auto;
    max-width:100%;
}
.desktop-hidden{
    display:none;
}
.mobile-hidden{
    display:block;
}
@media screen and (max-width: 1023px){
    .container{
        width:740px;
    }
}
@media screen and (max-width: 767px){
    .container{
        width:520px;
    }
    .desktop-hidden{
        display:block;
    }
    .mobile-hidden{
        display:none;
    }
}
@media screen and (max-width: 567px){
    .container{
        width:420px;
    }
}
@media screen and (max-width: 479px){
    .container{
        width:280px;
    }
}
header {
    width:100%;
    float:left;
    height:175px;
}
header .logo {
    float:left;
    width:auto;
    padding-top:15px;
    height:105px;
}
header .header-right {
    width:60%;
    float:right;
}
header .header-right .search-block {
    width:auto;
    float:right;
    padding:35px 0 0;
}
header .header-right .search-block input[type=text] {
    width:150px;
    border:1px solid #1378ba;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    padding:5px 30px 5px 10px;
    margin-right:10px;
}
header .header-right .search-block input[type=text]:focus {
    border:1px solid #49ab47;
    background-position:95% -37px;
}
header .header-right .search-block input[type=button] {
    /*background:url(images/blue-btn-bg.png) repeat-x left top;*/
    background: #196a9f;
    height:25px;
    padding:0 15px;
    color:#fff;
    cursor:pointer;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
}
/*header .header-right .search-block input[type=button]:hover {
    background-position: left bottom;
}*/
header .header-right .search-block ul li {
    display: inline;
    position: relative;
    float: left;
}
header .header-right .search-block ul ul {
    position: absolute;
    background: none repeat scroll 0 0 #FFFFFF;
    right: -60px;
    top: 20px;
    width: 200px;
    display:none;
    padding: 6px 0;
    z-index:999;
    border-radius: 8px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
}
header .header-right .search-block ul li:hover ul{
    display: block;
    transition:all 5s ease 5s;
}
header .header-right .search-block ul ul li{
   width:200px !important;
}
header .header-right .search-block ul ul li a{
    background: none repeat scroll 0 0 #FFFFFF;
    border-bottom: 1px solid #CCCCCC;
    color: #4DAA4C;
    display: block;
    font-family: UbuntuRegular,Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 24px;
    padding: 6px 0 6px 10px;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0);
}
header .header-right .search-block ul ul li:last-child a {
    border-bottom:none;
}
header .header-right .search-block ul ul li a:hover{
    background: none repeat scroll 0 0 #EDEDED;
    color: #333333;
}
header .header-right .top-menu {
    width:100%;
    float:right;
    padding:15px 0 0;
}
header .header-right .top-menu ul {
    float:right;
}
header .header-right .top-menu li {
    display: inline;
    list-style-type: none;
    font-size:12px;
    font-weight:700;
    position: relative;
    float: left;
    border-radius: 10px;
    border: 1px solid #fff;
}
header .header-right .top-menu .menu-item-has-children:hover{
    border-bottom: 1px solid rgba(255,255,255,0);
    border-radius: 10px 10px 0 0;
    z-index: 992;
}
header .header-right .top-menu .menu-item-has-children a:hover{
    position: relative;
    z-index: 993;
    border-radius: 10px 10px 0 0;
}
header .header-right .top-menu li a {
    color: #a4a4a4;
    background: #fff;
    padding: 11px 10px;
    border-radius: 10px;
    display: inline-block;
}
header .header-right .top-menu li:hover {
    border: 1px solid #e8e8e8;
}
header .header-right .top-menu li a:hover {
    color:#1378ba;
}
header .header-right .top-menu li:hover .sub-menu{
    display: block;
}
header .header-right .top-menu li .sub-menu{
    display: none;
}
header .header-right .top-menu li .sub-menu{
    position: absolute;
    top: 35px;
    z-index: 991;
    left: -1px;
    width: 244px;
    background: #fff;
    border: 1px solid #e8e8e8;
}
header .header-right .top-menu .menu-item-has-children a:after {
    content: "\e600";

    speak: none;
    font-style: normal;
    color: #a4a4a4;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-left: 5px;
}
header .header-right .top-menu .sub-menu li {
    float: left;
    width: 100%;
    border: none;
    padding: 0;
    margin: 0;
}
header .header-right .top-menu .sub-menu li:last-child{
    border: none;
}
header .header-right .top-menu .sub-menu li a:after{
    display: none;
}
header .header-right .top-menu .sub-menu li a {
    color: #b6b6b6;
    height: auto;
    line-height: inherit;
    margin: 0;
    border-radius: 0;
    display: block;
    padding: 10px 0 10px 10px;
    border-bottom: 1px solid #cccccc;
}
header .header-right .top-menu .sub-menu li a:hover{
    color: #4daa4c;
    background: #ededed;
}
header .header-right .top-menu li .sub-menu{
    border-radius: 0 10px 10px 10px;
}

header .header-right .top-menu .sub-menu li a:hover{
    border-radius: 0 ;
}
header .header-right .top-menu .sub-menu li:first-child,
header .header-right .top-menu .sub-menu li:first-child a{
    border-radius: 0 10px 0 0;
}
header .header-right .top-menu .sub-menu li:last-child,
header .header-right .top-menu .sub-menu li:last-child a{
    border-radius: 0 0 10px 10px;
}
header .menu-wrapper {
    width:100%;
    float:left;
    height:56px;
    background:#1378ba;
}
header .menu-wrapper ul {
    background: url("images/top-div.png") repeat-y scroll left center rgba(0, 0, 0, 0);
    float: left;
    width: 100%;
}
header .menu-wrapper ul li {
    list-style-type:none;
    position:relative;
    float:left;
    background: url(images/top-div.png) 100% 0 repeat-y;
    font-size:15px;
}
header .menu-wrapper ul li a {
    color:#fff;
    cursor:pointer;
    display: block;
    font-size: 14px;
    font-weight: normal;
    height: 50px;
    line-height: 45px;
    margin: 0 1px 0 -2px;
    outline: medium none;
    padding: 5px 5px 0 8px;
    position: relative;
    z-index: 100;
}
header .menu-wrapper ul li#menu-item-173 a{
    margin:0 1px 0 0;
    padding:5px 5px 0 5px;
}
header .menu-wrapper ul li.current-menu-item a,
header .menu-wrapper ul li.current-page-parent a{
    background: url(images/dark-20.png) repeat;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.3) inset;
}
header .menu-wrapper ul li.sub-menu li a{
    background: none;
    box-shadow: none;
    text-shadow:none;
}
header .menu-wrapper ul li a span {
    border-radius: 4px;
    display: block;
    outline: medium none;
    padding: 0 5px;
    transition: background 0.2s ease-out 0s;
    width: auto;
}
header .menu-wrapper ul li a:hover span {
    background: #FFFFFF;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    color:#4daa4c;
}
header .menu-wrapper ul li:hover ul {
    display:block;
}
header .menu-wrapper ul li.col1-menu ul {
    width:225px;
}
header .menu-wrapper ul li.col1-menu ul li:last-child{
    border:none;
}
header .menu-wrapper ul li ul {
    border-radius: 0 5px 5px;
    background:#fff;
    left: 6px;
    top: 45px;
    padding: 6px 0;
    position:absolute;
    z-index: 500;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    display:none;
}
header .menu-wrapper ul li ul li {
    float:left;
    width:100%;
    background:none;
    border-bottom:1px solid #ccc;
}
header .menu-wrapper ul li ul li a:hover {
    background: none repeat scroll 0 0 #EDEDED;
}
header .menu-wrapper ul li ul li a {
    color: #4DAA4C;
    font-family: UbuntuRegular, Helvetica, Arial, sans-serif;
    margin:0;
    line-height:inherit;
    height:auto;
    padding:10px 0 10px 10px;
}
header .menu-wrapper ul li.sub-menu span {
    background:url(images/menu-arrow.png) no-repeat 93% 17px;
    padding-right:22px;
    transition: background-color 0.01s ease;
}
header .menu-wrapper ul li.sub-menu:hover span {
    background:url(images/menu-arrow.png) no-repeat 93% -118px #FFFFFF;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    transition: background-color 0.01s ease;
    color:#4daa4c;
}
header .menu-wrapper ul li.sub-menu ul li ul {
    display:block;
}
header .menu-wrapper ul li.col2-menu ul {
    width:450px;
}
header .menu-wrapper ul li.col2-menu ul li {
    width:50%;
    float:left;
    padding-top:10px;
}
header .menu-wrapper ul li.col2-menu ul li{
    border-top:1px solid #ccc;
    border-bottom:none;
}
header .menu-wrapper ul li.col2-menu ul li.menu-item-530,
header .menu-wrapper ul li.col2-menu ul li.menu-item-532,
header .menu-wrapper ul li.col2-menu ul li.menu-item-527,
header .menu-wrapper ul li.col2-menu ul li.menu-item-528,
header .menu-wrapper ul li.col2-menu ul li.menu-item-525,
header .menu-wrapper ul li.col2-menu ul li.menu-item-526,
header .menu-wrapper ul li.col2-menu ul li.menu-item-524,
header .menu-wrapper ul li.col2-menu ul li.menu-item-523{
    border:none;
}
header .menu-wrapper ul li.col2-menu ul li a {
    border:none;
}
header .menu-wrapper ul li.col2-menu ul li ul {
    width:100%;
    position:inherit;
    top:0;
    border-radius: 0 0 0;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0)
}
header .menu-wrapper ul li.col2-menu ul li ul li {
    width:90%;
    margin:0 5%;
    padding:0;
    border-bottom:1px solid #ccc;
    border-top:none;
}
header .menu-wrapper ul li.col2-menu ul li ul li a {
    font-size:12px;
    padding:5px 0 5px 10px;
}
header .menu-wrapper ul li.col2-menu ul li ul li:last-child {
    border:none;
}
@media screen and (max-width: 1023px){
    header .logo{
        width:50%;
    }
    header .header-right{
        width:50%;
    }
    header .header-right .search-block ul ul{
         right:0;
    }
    header .menu-wrapper ul li a {
    font-size: 12px;
    }
}
@media screen and (max-width: 767px){
    header{
        height:auto;
        text-align:center;
    }
    header .logo {
        height:auto;
        width:100%;
    }
    header .header-right{
        width:100%;
    }
    header .header-right .search-block{
        width:100%;
        padding:10px 0 0;
    }
    header .header-right .search-block ul li{
        float:none;
        display:inline-block;
    }
    header .header-right .top-menu{
        padding:10px 0;
    }
    header .header-right .top-menu ul{
        width:100%;
    }
    header .header-right .top-menu li{
        margin:0 10px;
    }
}
.banner-wrapper {
    width:100%;
    float:left;
    height:362px;
}
.banner-wrapper .column1 {
    width:360px;
    float:left;
    margin:50px 0 0;
}
.banner-wrapper .column1 h1 {
    color: #666666;
    font-family: impact;
    font-size: 38px;
    font-weight: 300;
    line-height: 50px;
    padding-bottom: 20px;
}
.banner-wrapper .column1 h1 span {
    color: #49AB47;
}
.banner-wrapper .column1 p {
    color: #666666;
    font-family: arial;
    font-size: 16px;
    line-height: 20px;
    padding-bottom: 30px;
}
.banner-wrapper .column1 .t-free {
    color: #666666;
    font-family: arial;
    font-size:12px;
    line-height:20px;
    padding-left:30px;
    background:url(images/tuition_free.png) no-repeat left center;
}
.banner-wrapper .column1 .billboard-learn-more {
    background:#49ab47;
    border-radius: 22px;
    color: #fff;
    float: left;
    padding: 10px 20px;
    margin-top:20px;
}
.banner-wrapper .column1 .billboard-learn-more:hover{
    background:#196a9f;
}
.banner-wrapper .column2 {
    width:297px;
    float:left;
    margin:1px 0;
}
.banner-wrapper .column3 {
    width:300px;
    margin:0;
    float:right;
}
.banner-wrapper .column3 .top-block {
    color: #1378BA;
    font-size:22px;
    font-weight: bold;
    margin-top: 40px;
    padding: 15px;
    text-align: center;
    background-color: #F8F8F8;
    border: 1px solid #E1E1E1;
    width: 280px;
}
.banner-wrapper .column3 .top-block p {
    color: #1378ba;
    font-size: 22px;
    font-weight: bold;
    text-align: center;
}
.banner-wrapper .column3 .bottom-block {
    color: #757575;
    font-size: 1.8em;
    font-weight: bold;
    margin-top: 10px;
    padding: 15px 0 5px 0;
    text-align: left;
    background-color: #F8F8F8;
    border: 1px solid #E1E1E1;
    width: 311px;
}
.banner-wrapper .column3 .bottom-block p {
    padding-left: 35px;
    margin-bottom:12px;
    color: #767676;
    font-size: 18px;
}
.banner-wrapper .column3 .bottom-block li {
    color: #A8A8A8;
    list-style-type:none;
    background:#ededed;
    border-bottom:3px solid #dcdcdc;
    cursor: pointer;
    line-height:30px;
    font-weight: 400;
    height: 25px;
    padding-bottom: 5px;
    margin-bottom: 4px;
    padding-left: 60px;
    text-align: left;
    font-size:14px;
}
.banner-wrapper .column3 .bottom-block li a{
    color: #a4a4a4;
}
.banner-wrapper .column3 .bottom-block li:hover {
    background:#49ab47;
    border-bottom:3px solid #449f42;
    color:#fff;
}
.banner-wrapper .column3 .bottom-block li:hover a{
    color:#fff;
}
@media screen and (max-width: 1023px){
    .banner-wrapper .column2{
        display:none;
    }
    .banner-wrapper{
        height:338px;
    }
}
@media screen and (max-width: 767px){
    .banner-wrapper{
        height:auto;
        margin-bottom:20px;
    }
    .banner-wrapper .column1{
        width:100%;
        text-align:center;
        margin:20px 0 0;
        width:100%;
    }
    .banner-wrapper .column1 .t-free{
        background:none;
        padding:0;
    }
    .banner-wrapper .column1 p{
         padding-bottom:10px;
    }
    .banner-wrapper .column3{
        width:100%;
        margin:0;
    }
    .banner-wrapper .column3 .top-block{
        padding:5%;
        width:90%;
        margin:20px 0 0;
    }
    .banner-wrapper .column3 .bottom-block{
        padding:5%;
        width:90%;
    }
}
@media screen and (max-width: 567px){
    .banner-wrapper .column1 h1{
        font-size:30px;
        line-height:34px;
        padding-bottom:10px;
    }
    .banner-wrapper .column1 p{
        font-size:14px;
    }
}
.home-news-letter {
    width:100%;
    float:left;
    background:#49ab47;
    border-bottom:4px solid #449f42;
    height:47px;
}
.home-news-letter .new {
    background: none repeat scroll 0 0 #42983F;
    float: left;
    padding-right: 25px;
    position: relative;
}
.home-news-letter .new span {
    color: #FFFFFF;
    font-size: 20px;
    line-height: 49px;
    padding: 0 6px 0 15px;
}
.home-news-letter .cource {
    color:#fff;
    padding:0 0 0px 20px;
    float: left;
    font-size:14px;
    width: 48%;
    height: 51px;
}

.home-news-letter .new img {
    position: absolute;
    top: 15px;
    right: 15px;
}
.home-news-letter .cource li .icon-left{
    background:url("images/left_paren.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
.home-news-letter .cource li .icon-right{
    background:url("images/right_paren.png") no-repeat scroll right top rgba(0, 0, 0, 0);
    position: relative;
}
.home-news-letter .cource li .icon-right:before{
    position: absolute;
    left: 5px;
    top: 6px;
}
.home-news-letter .cource li .icon-left:before{
    position: absolute;
    left: 8px;
    top: 20px;
}
.home-news-letter .cource li{
    list-style-type: none;
    padding:14px 0 6px !important;
    margin: 0;
    height: 51px;
    width: 100%;
}
.home-news-letter .cource li a{
    color: #fff;
    float: left;
    padding: 4px 0;
}
.home-news-letter .cource li a:hover{
    color: #000;
}
.home-news-letter .cource li span  {
    float: left;
    height: 32px;
    width: 32px;
}
.home-news-letter .news-letter {
    width:36%;
    float:right;
    color:#fff;
    font-size:12px;
    padding:15px;
    position: relative;
}
.home-news-letter .news-letter .validation_error {
    background: #49ab47;
    left: 0;
    padding: 2%;
    position: absolute;
    top: -44px;
    width: 96%;
}
.home-news-letter .news-letter .validation_message {
    text-align: center;
}
.home-news-letter .news-letter label {
    float: left;
    margin: 2px;
}
.home-news-letter .news-letter #gform_wrapper_1{
    float: left;
}
.home-news-letter .news-letter .gform_body {
    float: left;
}
.home-news-letter .news-letter .gfield_label {
    display: none;
}
.home-news-letter .news-letter .ginput_container {
    float: left;
    margin: 0 10px;
}
.home-news-letter .news-letter .gform_footer.top_label {
    float: left;
}
.home-news-letter .news-letter .gform_body li{
    list-style-type: none;
}
.home-news-letter .news-letter input[type=text] {
    background:#fff;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    border:none;
    padding:2px 5px;
    float: left;
    width: 136px;
}
.home-news-letter .news-letter input[type=submit] {
    background:none;
    color:#fff;
    font-size:12px;
    cursor:pointer;
    font-weight:bold;
}
.home-news-letter .news-letter input[type=submit]:hover {
    color:#333;
}
@media screen and (max-width: 1023px){
    .home-news-letter .news-letter label{
        display:none;
    }
    .home-news-letter .news-letter {
        width: 32%;
    }
}
@media screen and (max-width: 767px){
    .home-news-letter{
        height:auto;
    }
    .home-news-letter .new{
        padding:0 3%;
        width:14%;
    }
    .home-news-letter .cource{
        padding:0 0 0 5%;
        width:75%;
        height:45px !important;
    }
    .home-news-letter .news-letter{
        padding:15px 5%;
        width:90%;
        background:#42983F;
    }
    .home-news-letter .cource li span{
        width:15px;
    }
    .home-news-letter .cource li a{
        font-size:13px;
    }
    .home-news-letter .news-letter label{
        display:block;
    }

}
@media screen and (max-width: 567px){
    .home-news-letter .new{
        display:none;
    }
    .home-news-letter .cource{
        width:90%;
        display:none;
        padding:0 5%;
    }
    .home-news-letter .news-letter label{
        width:100%;
        text-align:center;
        margin:0 0 10px 0;
    }
    .home-news-letter .news-letter #gform_wrapper_1{
        margin-left:85px;
    }
}
@media screen and (max-width: 479px){
    .home-news-letter .news-letter #gform_wrapper_1{
        margin-left:0;
    }
}
.interior-page {
    width:100%;
    float:left;
    padding:20px 0;
}
.interior-page .left-col {
    margin: 0 20px 0 0;
    width: 655px;
    float:left;
}
.interior-page .right-col {
    margin: 0 0 0 40px;
    width: 205px;
    float:left;
}
.interior-page .video-block {
    width:100%;
    float:left;
    padding-bottom:30px;
}
.interior-page .video-block img:hover{
    opacity: 0.5;
}
.interior-page .video-block .left {
    width:310px;
    float:left;
}
.interior-page .video-block .right {
    width:290px;
    float:left;
    margin-left:20px;
}
.interior-page .video-block .right a {
    float:left;
    margin:0 10px 10px 0;
}
.interior-page .video-block .right h1 {
    color:#666;
    font-size:14px;
    font-weight:bold;
    padding-bottom:10px;
}
.interior-page .video-block .right .blue-btn {
    margin:0;
    font-size:14px;
    text-align:center;
    width:225px;
    line-height:25px;
}
.interior-page .content {
    width:100%;
    float:left;
}
.page-id-1243 .content > table,
.page-id-1243 .content > tr,
.page-id-1243 .content > td {
    border: 1px solid #cccccc;
}
.interior-page .content .alignleft{
    float: left;
    margin: 3px 10px 0 0;
}
.interior-page .content .alignright{
    float: right;
    margin: 3px 0 0 10px;
}
.interior-page .content p a {
    color: #4DAA4C;
    font-weight: bold;
}
.interior-page .content p a:hover {
    color: #333333;
}
.interior-page .content h4{
    margin: 15px 0;
    color: #666666;
    font-size: 14px;
}
.interior-page .home-testimonial {
    float: left;
    width: 100%;
}
.interior-page #home-testimonial {
    min-height: 100px;
}
.interior-page .home-testimonial h2 {
    font-size: 20px;
    font-weight: normal;
    letter-spacing: normal;
}
.interior-page .home-testimonial .rsDefault,
.interior-page .home-testimonial .rsDefault .rsOverflow,
.interior-page .home-testimonial .rsDefault .rsSlide,
.interior-page .home-testimonial .rsDefault .rsVideoFrameHolder,
.interior-page .home-testimonial .rsDefault .rsThumbs
.interior-page .home-testimonial .interior-page .essentials {
    background: none;
    color: #6a6a6a;
}
.interior-page .home-testimonial .rsDefault.rsHor .rsArrowLeft .rsArrowIcn,
.interior-page .home-testimonial .rsDefault.rsHor .rsArrowRight .rsArrowIcn {

    speak: none;
    color: #a4a4a4;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    font-size: 2em;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.interior-page .home-testimonial .rsDefault .rsArrowIcn {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border-radius: 2px;
    cursor: pointer;
    height: 32px;
    left: 50%;
    margin-left: -22px;
    margin-top: -16px;
    position: absolute;
    top: 50%;
    width: 32px;
}
.interior-page .home-testimonial .rsDefault.rsHor .rsArrowLeft .rsArrowIcn:before {
    content: "\e60a";
}
.interior-page .home-testimonial .rsDefault.rsHor .rsArrowRight .rsArrowIcn:before {
    content: "\e60b";
}
.interior-page .home-testimonial .content-block{
    width: 90%;
    display: table;
    margin: 0 auto;
}
.interior-page .home-testimonial .content-block p {
    color: #6a6a6a;
    font-size: 15px;
    font-style: italic;
    letter-spacing: 0.3px;
    line-height: 20px;
    height: 70px;
    display: table-cell;
    vertical-align: middle;
}
.home-testimonial .more,
.essentials .more{
    font-weight: normal;
    font-style: normal;
}
.interior-page .essentials {
    float: left;
    width: 100%;
}
.interior-page .essentials ul{
    width: 100%;
}
.interior-page .essentials li:before {
    border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #4daa4c;
    border-style: solid;
    border-width: 6px;
    content: "";
    height: 0;
    left: 0px;
    top: 2px;
    position: absolute;
    width: 0;
}
.interior-page .essentials li{
    position: relative;
    width: 47%;
    float: left;
    color: #494949;
    font-size: 13px;
    font-weight: normal;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: outside none none;
    padding: 0px 0 5px 16px;
}
.interior-page .essentials .readmore{
    padding: 30px 0;
    float: right;
}
.interior-page h2 {
    color: #1378BA;
    font-size: 20px;
    font-weight: normal;
    letter-spacing: normal;
    line-height: 110%;
    margin: 0;
    padding: 15px 0;
}
.interior-page h2 a{
    color: #1378BA;
}
.interior-page h2 a:hover{
    color: #4daa4c;
}
.interior-page .essentials h2 {
    font-size: 20px;
    font-weight: normal;
    letter-spacing: normal;
}
.interior-page .left-col h1 {
    font-size:26px;
    color: #4DAA4C;
    font-weight:normal;
    padding-bottom:15px;
}
.interior-page .content p {
    color:#666;
    font-size:12px;
    padding-bottom:15px;
    letter-spacing:0.3px;
    line-height:20px;
    text-align: justify;
}
.interior-page .content td {
    color:#666;
    font-size:12px;
    letter-spacing:0.3px;
    line-height:20px;
}
.interior-page .content #ui-accordion-accordion-panel-3 td {
    border-top:1pt solid #666666;
    color:#666666;
    padding-right:20px;
}
.interior-page .content #ui-accordion-accordion-panel-3 p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-4 tr:first-child td{
    border-top:1pt solid #666666;
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-4 tr:first-child td p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-4 tr:last-child td{
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-4 tr:last-child td p{
    padding:0;
}

.interior-page .content #ui-accordion-accordion-panel-5 tr:first-child td{
    border-top:1pt solid #666666;
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-5 tr:first-child td p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-5 tr:last-child td{
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-5 tr:last-child td p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-5 thead tr:first-child td{
    border-top:1pt solid #666666;
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-5 tbody td{
    color:#666666;
    padding:5px 20px 5px 5px;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-5 tbody td:last-child{
    border-right:none;
}

.interior-page .content #ui-accordion-accordion-panel-7 tr:first-child td{
    border-top:1pt solid #666666;
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-7 tr:first-child td p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-7 tr:last-child td{
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-7 tr:last-child td p{
    padding:0;
}
.interior-page .content #ui-accordion-accordion-panel-7 thead tr:first-child td{
    border-top:1pt solid #666666;
    border-bottom:1px solid #666666;
    color:#666666;
    padding:5px 20px 5px 0;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-7 tbody td{
    color:#666666;
    padding:5px 20px 5px 5px;
    vertical-align:middle !important;
}
.interior-page .content #ui-accordion-accordion-panel-7 tbody td:last-child{
    border-right:none;
}
.interior-page .content #ui-accordion-accordion-panel-7 tbody tr:nth-child(3) td{
    border-bottom:1px solid #666666;
    border-top:1px solid #666666;
    padding:5px 0;
}
.interior-page .content #ui-accordion-accordion-panel-7 tbody tr:nth-child(3) td p{ padding:0;}
/*.interior-page .content #ui-accordion-accordion-panel-5 tbody td:first-child{
    background:#E6E6E6;
}
.interior-page .content #ui-accordion-accordion-panel-5 tbody td:nth-child(4){
    background:#E6E6E6;
}*/
.interior-page .content #ui-accordion-accordion-panel-5 td p{
    padding:0;
}
.interior-page .questions{
    width:100%;
    float:left;
}
.interior-page .content ul li {
    color: #666666;
    font-size: 12px;
    font-weight:normal;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: none outside none;
    margin-left: 20px;
    padding: 1px 0;
    margin-bottom: 3px;
}
.interior-page .content ul li a{
    margin-bottom: 3px;
    font-weight: bold;
}
.interior-page  .left-col .content ul {
    position: relative;
    margin-top: 15px;
}
.interior-page .left-col .content ul li:before {
    border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #FFFFFF;
    border-style: solid;
    border-width: 4px;
    content: "";
    display: block;
    height: 0;
    margin: 5px 0;
    left: 5px;
    position: absolute;
    width: 0;
    border-left-color: #4DAA4C;
}
.interior-page .left-col .content ol {
    margin-top: 15px;
}
.page-template-default .interior-page  .left-col .content ol {
    margin-top: 0;
    margin-bottom: 15px;
}
.page-template-default .interior-page .content ol li {
    font-weight: normal;
}
.interior-page  .left-col .content ol li li{
    list-style: square;
}
.interior-page  .left-col .content ol li li:before{
    border: medium none;
}
.interior-page .content ol li {
    color: #666666;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: decimal;
    margin-left: 20px;
    padding: 1px 0;
}
.interior-page .content ol li a{
    margin-bottom: 3px
}
.interior-page .left-col .content .course-offered {
    border-top: 1px solid #D8D8D8;
    float: left;
    padding: 15px 0;
    width: 100%;
}
.interior-page .left-col .content .blue-button {
    background:#196A9E;
    border-radius: 10px;
    color: #FFFFFF;
    float: left;
    font-size: 14px;
    margin: 10px 20px 10px 0;
    padding: 10px 30px;
    margin-right: 20px;
}
.interior-page .left-col .content .blue-button:hover {
    background: #4DAA4C;
    color: #FFFFFF;
}
.interior-page .left-col .content .course-assessment {
    float: left;
    border-top: 1px solid #D8D8D8;
}
.interior-page .left-col .content .course-assessment .link-blcok{
    float: left;
    padding: 40px 0;
}
.interior-page .left-col .content .course-assessment .content-blcok{
    float: left;
}
.interior-page .left-col .content .description-block{
    float: left;
}
.interior-page .left-col .content .description-block span strong{
    color: #666666;
    letter-spacing: 0.3px;
    line-height: 20px;
    padding-right: 6px;
    text-align: justify;
}
.interior-page .left-col .content .description-block .desc strong {
    float: left;
}
.single-course_catalog .interior-page .left-col .content h2 {
    color: #4daa4c;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: normal;
    line-height: 100%;
    margin: 0;
    padding: 15px 0;
}
.single-course_catalog .interior-page .left-col .content p {
    font-size: 13px;
    color: #545454;
}
.single-course_catalog .interior-page .left-col .content .course-offered p {
    display: initial;
}
.single-course_catalog .interior-page .left-col .content .course-offered span{
    font-size: 13px;
    color: #545454;
}
.single-course_catalog .interior-page .left-col .content p strong {
    font-size: 14px;
    float: left;
    padding-right: 5px;
}
.description-block p strong{
    float: none !important;
}
.single-announcements .interior-page .left-col .content ul li:before,
.page-id-79 .interior-page .left-col .content ul li:before,
.page-id-126 .interior-page .left-col .content ul li:before,
.page-id-148 .interior-page .left-col .content ul li:before{
    border: medium none;
}
.single-announcements .interior-page .content ul li,
.page-id-79 .interior-page .content ul li,
.page-id-126 .interior-page .content ul li{
    color: #666666;
    font-size: 12px;
    font-weight:normal;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: square;
    margin-left: 20px;
    padding: 1px 0;
}
.page-id-81 .interior-page .content ul li,
.page-id-7 .interior-page .content ul li{
    font-weight:normal;
}
.interior-page .content p.em {
    font-style:italic;
}
.interior-page .right-col .sidebar {
    width:100%;
    float:left;
    margin-bottom:25px;
    padding: 0;
}
#field_2_4 .gfield_label {
    display: none;
}
.page-id-148 .interior-page .content #recaptcha_widget_div td{
    line-height:0;
}
.interior-page .right-col .sidebar .top-block {
    background-color: #F8F8F8;
    border: 1px solid #E1E1E1;
    padding: 15px 0;
    height: auto;
    text-align: center;
    width: 193px;
}
.interior-page .right-col .sidebar .top-block p{
    color: #1378BA;
    font-size: 20px;
    font-weight: 400;

}

.interior-page .right-col .sidebar .top-block button.enrollButton {
    font-size: 12px;
}
.interior-page .right-col ul li {
    color:#666;
    font-size:13px;
    letter-spacing:0.3px;
    list-style-type:none;
    padding:5px 0;
    position:relative;
    padding-left:30px;
}
.interior-page .right-col ul li.gfield{
    padding:5px 0 5px 15px;
}
.interior-page .right-col ul li:after,
.interior-page .right-col a.readmore:after {
    border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #4DAA4C;
    border-style: solid;
    border-width: 4px;
    content: "";
    display: block;
    height: 0;
    left: 15px;
    position: absolute;
    top: 8px;
    width: 0;
}
.interior-page .right-col a.readmore:hover{
    color:#333333;
}
.interior-page .right-col a.readmore {
    color:#4DAA4C;
    font-size:13px;
    letter-spacing:0.3px;
    padding:5px 0;
    position:relative;
    padding-left:30px;
    font-weight:bold;
}
.interior-page .right-col a.read {
    color:#4DAA4C;
    font-size:13px;
    letter-spacing:0.3px;
    padding:5px 0;
    position:relative;
    font-weight:bold;
    float:right;
}
.interior-page .right-col a.read:hover{
    color:#333333;
}
.interior-page .right-col .sidebar .sidebar-post {
    display: block;
    float: left;
    margin-bottom: 15px;
    padding-bottom: 15px;
}
.interior-page .right-col .sidebar .sidebar-post:last-child {
    border:none;
}
.interior-page .right-col .sidebar .sidebar-post p {
    padding-bottom: 0;
}
.interior-page .right-col .sidebar h3 {
    color:#4DAA4C;
    font-size:14px;
    padding-bottom:10px;
}
.interior-page .right-col .sidebar h3 a{
    color:#4DAA4C;
}
.interior-page .right-col .sidebar h3 a:hover{
    color:#333333;
}
.interior-page .right-col .sidebar p {
    color:#666;
    font-size:12px;
    padding-bottom:15px;
    letter-spacing:0.3px;
    line-height:20px;
}
.footer {
    width:100%;
    float:left;
    height:500px;
}
.footer .blue-bar {
    color:#fff;
    background:#0377bc;
    height:30px;
    border-bottom:4px solid #046aa8;
    line-height:30px;
    padding:0 20px;
}
.footer .blue-bar p {
    color: #FFFFFF;
    font-weight: bold;
    letter-spacing: 1px;
    font-size:13px;
}
.footer .blue-bar p a{
    color:#fff;
}
.footer .blue-bar p a:hover{
    color:#333;
}
.footer .footer-blocks {
    width:100%;
    float:left;
    padding:20px 0 80px;
}
.footer .footer-blocks .grid-1 {
    width:145px;
    float:left;
    margin:0 10px;
}
.footer .footer-blocks .grid-2 {
    width:145px;
    float:left;
    margin:0 10px;
}
.footer .footer-blocks .grid-3 {
    width:210px;
    float:left;
    margin:0 10px;
}
.footer .footer-blocks .grid-4 {
    width:145px;
    float:left;
    margin:0 10px;
}
.footer .footer-blocks .grid-5 {
    width:210px;
    float:left;
    margin:0 10px;
}
.footer .footer-blocks h2 {
    color: #1378BA;
    font-family: Tahoma;
    font-size: 16px;
    font-weight:normal;
    text-transform: uppercase;
}
.footer .footer-blocks h2 a{
    color:#1378BA;
}
.footer .footer-blocks h2 a:hover{
    color:#4DAA4C;
}
.footer .footer-blocks li {
    list-style-type:none;
    font-size:12px;
    font-weight:bold;
    line-height:20px;
    padding-left:5px;
}
.footer .footer-blocks li a {
    color:#999;
}
.footer .footer-blocks li a:hover {
    color:#333;
}
.footer .footer-blocks .social-block {
    width:100%;
    float:left;
}
.footer .footer-blocks .social-block .social-box {
    background:#f3f3f3;
    border:1px solid #fff;
    /*-webkit-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    0px 0px 10px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         0px 0px 10px 0px rgba(50, 50, 50, 0.75);*/
    height:51px;
    margin:10px 0;
    width:auto;
    float:left;
}
.footer .footer-blocks .social-block .social-box img:hover{
    opacity:0.5;
}
.footer .footer-blocks .blue-btn-small {
    margin-left:50px;
    margin-top:10px;
}
.footer .footer-soacials {
    border-top: 1px solid #CCCCCC;
    position:relative;
    width:100%;
    float:left;
    padding:20px 0;
}
.footer .footer-soacials .grid-1 {
    width:220px;
    float:left;
    margin:0 10px;
}
.footer .footer-soacials .grid-2 {
    width:140px;
    float:left;
    margin:0 10px;
}
.footer .footer-soacials .grid-3 {
    width:300px;
    float:left;
    margin:0 10px;
}
.footer .footer-soacials .grid-4 {
    width:220px;
    float:left;
    margin:0 10px;
}
.footer .footer-soacials h2 {
    color: #1378BA;
    font-family: Tahoma;
    font-size: 16px;
    font-weight:normal;
}
.footer .footer-soacials .grid-2 img {
    margin-top:-70px;
    margin-left:-90px;
    max-width: none;
}
.footer .footer-soacials .grid-3 a {
    color: #33637C;
    font-size:14px;
    font-weight:bold;
}
.footer .footer-soacials .gfield_label {
    display: none;
}
.footer .footer-soacials .newsletter li {
    list-style-type: none;
}
.footer .footer-soacials .newsletter {
    margin:10px 0;
}
.footer .footer-soacials .newsletter input[type=text] {
    background:#fff;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    border:1px solid #ccc;
    padding:4px 7px;
    float:left;
    margin-right:10px;
}
.footer .footer-soacials .newsletter input[type=submit] {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: #1378BA;
    cursor: pointer;
    display: inline-block;
    float: left;
    font-size: 12px;
    font-weight: bold;
    margin-top: 5px;
    text-align: left;
    width: 100%;
}
.footer .footer-soacials .newsletter input[type=submit]:hover{
    color: #333333;
}
.footer .footer-copyright {
    border-top: 1px solid #CCCCCC;
    text-align:center;
    width:100%;
    float:left;
    padding:20px 0;
}
.footer .footer-copyright p {
    font-size:13px;
    color:#333;
}
.footer .footer-copyright p span {
    width: 85%;
}
.footer #bbblink {
    float: right;
}
.footer .madeby {
    float: left;
    padding: 0 0 10px;
    text-align: center;
    width: 100%;
}
.footer .madeby img {
        opacity: .6;
        filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
        filter: gray;
        -webkit-filter: grayscale(100%);
        -webkit-transition: all 200ms linear;
        -moz-transition: all 200ms linear;
        -o-transition: all 200ms linear;
        transition: all 200ms linear;
    }
.footer .madeby img:hover {
        opacity: 1;
        filter: none;
        -webkit-filter: grayscale(0%);
    }

/* Misc visuals
----------------------------------*/

/* Overlays */
.accordion-block .ui-widget-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.accordion-block.ui-accordion .ui-accordion-header {
    display: block;
    cursor: pointer;
    position: relative;
    margin-top: 2px;
    padding: .5em .5em .5em .7em;
    min-height: 0; /* support: IE7 */
}
.accordion-block.ui-accordion .ui-accordion-icons {
    padding-left: 2.2em;
}
.accordion-block.ui-accordion .ui-accordion-noicons {
    padding-left: .7em;
}
.accordion-block.ui-accordion .ui-accordion-icons .ui-accordion-icons {
    padding-left: 2.2em;
}
.accordion-block.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
    position: absolute;
    left: .5em;
    top: 50%;
    margin-top: -8px;
}
.accordion-block.ui-accordion .ui-accordion-content {
    padding:10px 15px;
    border-top: 0;
    margin-bottom:10px;
    overflow: auto;
}
.accordion-block.ui-accordion .ui-accordion-content table{ width:100%;}
.interior-page.faq .content p {
    padding: 15px;
}
.interior-page.faq .content #ui-accordion-accordion-panel-3 p{
    padding: 15px;
}
.interior-page #accordion{
    margin:25px 0;
}
.interior-page #accordion ul{
    margin:0;
}
.interior-page #accordion ol{
    margin-bottom:15px;
}
/* Component containers
----------------------------------*/

.accordion-block .ui-widget-content {
    border: 1px solid #dddddd;
    background: #F2F5F7;
    color: #222222;
}
.accordion-block .ui-widget-content a {
    color: #222222;
}
.accordion-block .ui-widget-header {
    border: 1px solid #aaaaaa;
    background: #cccccc url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x;
    color: #222222;
    font-weight: bold;
}
.accordion-block .ui-widget-header a {
    color: #222222;
}

/* Interaction states
----------------------------------*/
.accordion-block .ui-state-default,
.accordion-block .ui-widget-content .ui-state-default,
.accordion-block .ui-widget-header .ui-state-default {
    border: 1px solid #AED0EA;
    background: #e6e6e6 url(images/ui-bg_glass_80_d7ebf9_1x400.png) 50% 50% repeat-x;
    font-weight: normal;
    color: #555555;
}
.accordion-block .ui-state-default a,
.accordion-block .ui-state-default a:link,
.accordion-block .ui-state-default a:visited {
    color: #555555;
    text-decoration: none;
}
.accordion-block .ui-state-hover,
.accordion-block .ui-widget-content .ui-state-hover,
.accordion-block .ui-widget-header .ui-state-hover,
.accordion-block .ui-state-focus,
.accordion-block .ui-widget-content .ui-state-focus,
.accordion-block .ui-widget-header .ui-state-focus {
    border: 1px solid #AED0EA;
    background: #dadada url(images/ui-bg_glass_100_e4f1fb_1x400.png) 50% 50% repeat-x;
    font-weight: normal;
    color: #212121;
}
.accordion-block .ui-state-hover a,
.accordion-block .ui-state-hover a:hover,
.accordion-block .ui-state-hover a:link,
.accordion-block .ui-state-hover a:visited,
.accordion-block .ui-state-focus a,
.accordion-block .ui-state-focus a:hover,
.accordion-block .ui-state-focus a:link,
.accordion-block .ui-state-focus a:visited {
    color: #212121;
    text-decoration: none;
}
.accordion-block .ui-state-active,
.accordion-block .ui-widget-content .ui-state-active,
.accordion-block .ui-widget-header .ui-state-active {
    border: 1px solid #2694E8;
    border-bottom: none;
    background: #ffffff url(images/ui-bg_glass_50_3baae3_1x400.png) 50% 50% repeat-x;
    font-weight: normal;
    color: #FFFFFF;
}
.accordion-block .ui-state-active a,
.accordion-block .ui-state-active a:link,
.accordion-block .ui-state-active a:visited {
    color: #212121;
    text-decoration: none;
}

/* Interaction Cues
----------------------------------*/
.accordion-block .ui-state-highlight,
.accordion-block .ui-widget-content .ui-state-highlight,
.accordion-block .ui-widget-header .ui-state-highlight {
    border: 1px solid #fcefa1;
    background: #fbf9ee url(images/ui-bg_glass_55_fbf9ee_1x400.png) 50% 50% repeat-x;
    color: #363636;
}
.accordion-block .ui-state-highlight a,
.accordion-block .ui-widget-content .ui-state-highlight a,
.accordion-block .ui-widget-header .ui-state-highlight a {
    color: #363636;
}
.accordion-block .ui-state-error,
.accordion-block .ui-widget-content .ui-state-error,
.accordion-block .ui-widget-header .ui-state-error {
    border: 1px solid #cd0a0a;
    background: #fef1ec url(images/ui-bg_glass_95_fef1ec_1x400.png) 50% 50% repeat-x;
    color: #cd0a0a;
}
.accordion-block .ui-state-error a,
.accordion-block .ui-widget-content .ui-state-error a,
.accordion-block .ui-widget-header .ui-state-error a {
    color: #cd0a0a;
}
.accordion-block .ui-state-error-text,
.accordion-block .ui-widget-content .ui-state-error-text,
.accordion-block .ui-widget-header .ui-state-error-text {
    color: #cd0a0a;
}
.accordion-block .ui-priority-primary,
.accordion-block .ui-widget-content .ui-priority-primary,
.accordion-block .ui-widget-header .ui-priority-primary {
    font-weight: bold;
}
.accordion-block .ui-priority-secondary,
.accordion-block .ui-widget-content .ui-priority-secondary,
.accordion-block .ui-widget-header .ui-priority-secondary {
    opacity: .7;
    filter:Alpha(Opacity=70);
    font-weight: normal;
}
.accordion-block .ui-state-disabled,
.accordion-block .ui-widget-content .ui-state-disabled,
.accordion-block .ui-widget-header .ui-state-disabled {
    opacity: .35;
    filter:Alpha(Opacity=35);
    background-image: none;
}
.accordion-block .ui-state-disabled .ui-icon {
    filter:Alpha(Opacity=35); /* For IE8 - See #6059 */
}

/* Icons
----------------------------------*/

/* states and images */
.accordion-block .ui-icon {
    width: 16px;
    height: 16px;
}
.accordion-block .ui-icon,
.accordion-block .ui-widget-content .ui-icon {
    background-image: url(images/ui-icons_3d80b3_256x240.png);
}
.accordion-block .ui-widget-header .ui-icon {
    background-image: url(images/ui-icons_3d80b3_256x240.png);
}
.accordion-block .ui-state-default .ui-icon {
    background-image: url(images/ui-icons_3d80b3_256x240.png);
}
.accordion-block .ui-state-hover .ui-icon,
.accordion-block .ui-state-focus .ui-icon {
    background-image: url(images/ui-icons_3d80b3_256x240.png);
}
.accordion-block .ui-state-active .ui-icon {
    background-image: url(images/ui-icons_3d80b3_256x240.png);
    background-position: -63px 0;
}
.accordion-block .ui-state-highlight .ui-icon {
    background-image: url(images/ui-icons_2e83ff_256x240.png);
}
.accordion-block .ui-state-error .ui-icon,
.accordion-block .ui-state-error-text .ui-icon {
    background-image: url(images/ui-icons_cd0a0a_256x240.png);
}

/* Corner radius */
.accordion-block .ui-corner-all,
.accordion-block .ui-corner-top,
.accordion-block .ui-corner-left,
.accordion-block .ui-corner-tl {
    border-top-left-radius: 4px;
}
.accordion-block .ui-corner-all,
.accordion-block .ui-corner-top,
.accordion-block .ui-corner-right,
.accordion-block .ui-corner-tr {
    border-top-right-radius: 4px;
}
.accordion-block .ui-corner-all,
.accordion-block .ui-corner-bottom,
.accordion-block .ui-corner-left,
.accordion-block .ui-corner-bl {
    border-bottom-left-radius: 4px;
}
.accordion-block .ui-corner-all,
.accordion-block .ui-corner-bottom,
.accordion-block .ui-corner-right,
.accordion-block .ui-corner-br {
    border-bottom-right-radius: 4px;
}
.interior-page .content .accordion-block h4 {
    color: #2779AA;
    margin:2px 0 0 0;
    font-size: 13px;
    font-weight: bold;
}
.interior-page .content .accordion-block h4.ui-state-active {
    color: #ffffff;
}
.interior-page .one-col {
    width: 100%;
    float: left;
}
.interior-page .one-col h1 {
    color: #4DAA4C;
    font-size: 26px;
    font-weight: normal;
    padding-bottom: 20px;
}
/* tabs */
#tabs.ui-tabs {
    position: relative;
}
#tabs.ui-tabs .ui-tabs-nav {
    float: left;
    padding: 0 0 0 1.4%;
    width: 98.6%;
}
#tabs.ui-tabs .ui-tabs-nav li {
    list-style: none;
    float: left;
    position: relative;
    margin: 0px 6px 0 0;
    border-bottom-width: 0;
    padding: 0;
    line-height: 26px;
    white-space: nowrap;
}
#tabs.ui-tabs .ui-tabs-nav .ui-tabs-anchor {
    background:#1378ba;
    color: #FFFFFF;
    font-size: 13px;
    padding: 6px 20px;
    position: relative;
    z-index: 1;
    font-weight: bold;
}
#tabs.ui-tabs .ui-tabs-nav li.ui-tabs-active {
    margin-top: -4px;
}
#tabs.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor,
#tabs.ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor,
#tabs.ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor,
#tabs .ui-state-hover a,
#tabs .ui-state-focus a{
    background: #196a9e;
    border-bottom-color: #FFFFFF;
    padding: 11px 20px;
}
#tabs.ui-tabs .ui-tabs-nav .ui-tabs-anchor:hover{
    background: #196a9e;
    border-bottom-color: #FFFFFF;
    padding: 11px 20px;
}
#tabs.ui-tabs .ui-tabs-nav li.ui-state-hover {
    margin-top: -4px;
}
#tabs .ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {
    cursor: pointer;
}
#tabs.ui-tabs .ui-tabs-panel {
    background: #f7f7f7;
    float: left;
    width:100%;
}
.interior-page .content h3 {
    color: #666666;
    margin:15px 0;
    font-size: 20px;
    font-weight: 600;
}
.interior-page .one-col .content ul li a{
    color: #196a9e;
    font-weight: bold;
}
.interior-page .one-col .content ul li a:hover{
    color: #333333;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul{
    float: left;
    padding: 0 3.5%;
    width: 93%;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.title {
    background: #4daa4c;
    padding: 6px 3.5%;
    width: 93%;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all p{
    padding: 6px 3.5%;
    display: inline-block;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.title li {
    color: #ffffff;
    display: inline;
    float: left;
    font-weight: bold;
    font-size: 12px;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: none outside none;
    margin-left: 0;
    padding: 5px 0;

}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.odd,
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.even{
    border-bottom: 3px solid #f9f9f9;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.odd li {
    color: #515151;
    display: inline;
    float: left;
    font-size: 12px;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: none outside none;
    margin-left: 0;
    padding: 5px 0;
}
.interior-page .one-col .content .ui-tabs.ui-widget.ui-widget-content.ui-corner-all ul.even li {
    color: #666666;
    display: inline;
    float: left;
    font-size: 12px;
    letter-spacing: 0.3px;
    line-height: 20px;
    list-style: none outside none;
    margin-left: 0;
    padding: 5px 0;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(1){
    width: 15%;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(2){
    width: 25%;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(3){
    width: 12%;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(4){
    width: 18%;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(5){
    width: 14%;
}
.interior-page .one-col .content #tabs-1 ul li:nth-child(6){
    width: 16%;
    text-align: center;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(1),
.interior-page .one-col .content #tabs-3 ul li:nth-child(1),
.interior-page .one-col .content #tabs-4 ul li:nth-child(1),
.interior-page .one-col .content #tabs-5 ul li:nth-child(1){
    width: 15%;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(2),
.interior-page .one-col .content #tabs-3 ul li:nth-child(2),
.interior-page .one-col .content #tabs-4 ul li:nth-child(2),
.interior-page .one-col .content #tabs-5 ul li:nth-child(2){
    width: 25%;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(3),
.interior-page .one-col .content #tabs-3 ul li:nth-child(3),
.interior-page .one-col .content #tabs-4 ul li:nth-child(3),
.interior-page .one-col .content #tabs-5 ul li:nth-child(3){
    width: 12%;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(4),
.interior-page .one-col .content #tabs-3 ul li:nth-child(4),
.interior-page .one-col .content #tabs-4 ul li:nth-child(4),
.interior-page .one-col .content #tabs-5 ul li:nth-child(4){
    width: 18%;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(5),
.interior-page .one-col .content #tabs-3 ul li:nth-child(5),
.interior-page .one-col .content #tabs-4 ul li:nth-child(5),
.interior-page .one-col .content #tabs-5 ul li:nth-child(5){
    width: 14%;
}
.interior-page .one-col .content #tabs-2 ul li:nth-child(6),
.interior-page .one-col .content #tabs-3 ul li:nth-child(6),
.interior-page .one-col .content #tabs-4 ul li:nth-child(6),
.interior-page .one-col .content #tabs-5 ul li:nth-child(6){
    width: 16%;
    text-align: center;
}
.interior-page.contact .left-col .content input[type="text"],
.interior-page.contact .left-col .content textarea{
    border: 1px solid #CCCCCC;
    border-radius: 4px;
    padding: 5px 10px;
    width: 196px;
}
.interior-page.contact .left-col .content .gform_validation_error .gfield_contains_required input[type="text"],
.interior-page.contact .left-col .content .gfield_error input[type="text"]{
    border: 1px solid #1378ba;
}
.interior-page.contact .left-col .content .validation_error{
    color: #1378ba;
    font-size: 17px;
    letter-spacing: 0.3px;
    line-height: 20px;
}
.interior-page.contact .left-col .content .validation_message{
    color: #1378ba;
}
.interior-page.contact .left-col .content .gform_confirmation_wrapper {
    background: #1378ba;
    border-radius: 10px;
    margin: 20px;
}
.interior-page.contact .left-col .content .gform_confirmation_message{
    color: #fff;
    font-size: 18px;
    letter-spacing: 0.3px;
    text-align: center;
    line-height: 20px;
    padding: 20px 0;
}
.interior-page.contact .left-col .content textarea{
    width: 90%;
}
.interior-page.contact .left-col .content input[type="submit"]{
    background: #1378ba;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 20px;
    padding: 5px 25px;
    color: #fff;
}
.interior-page.contact .left-col .content input[type="submit"]:hover{
    background: #4daa4c;
}
.interior-page.contact .left-col .content a{
    font-weight: bold;
}
.interior-page.press .left-col .content .press-release-block{
    margin:0 0 100px 0;
}
.interior-page.press .left-col .content h2{
    color: #666666;
    font-size: 18px;
    font-weight: 700;
    padding: 0 20px;
    text-align: center;
}
.interior-page.press .left-col .content h3{
    color: #666666;
    font-size: 13px;
    font-style: italic;
    font-weight: bold;
    text-align: center;
}
.interior-page.press .left-col .content .press-release-block .read{
    /*background: url("images/readon-bg.png") repeat-x scroll 50% 50% #E9E9E9;*/
    background: #1378ba;
    /*border-top: 1px solid #FFFFFF;*/
    /*border: 1px solid #D7D7D7;*/
    /*text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.9);*/
    border-radius: 14px;
    font-size: 11px;
    cursor: pointer;
    color: #fff;
    font-weight: normal;
    line-height: 12px;
    padding: 9px 20px;
}
.interior-page.press .left-col .content .press-release-block .read:hover{
    /*background: url("images/readon-bg.png") repeat-x scroll 50% 50% #DDDDDD;  */
    background: #4dab4d;
}
.interior-page .left-col .content .contentbox2 {
    background: none repeat scroll 0 0 #F2F2F2;
    border-radius: 8px;
    margin-bottom: 15px;
    padding: 15px;
}
.interior-page.register .left-col .content  h1{
    text-align: center;
    color: #666666;
    font-size: 31px;
}
.interior-page.register .left-col .content  h2{
    text-align: center;
    color: #666666;
    font-size: 24px;
}
.interior-page.register .left-col .content .select-course {
    float: left;
    margin-bottom: 30px;
}
.interior-page.register .left-col .content  .select-course-content .select-courses-text {
    float: left;
    width: 100%;
}
.interior-page.register .left-col .content  .select-course-content h4{
    background: #6095C9;
    border: 5px solid #fefcfe;
    border-radius: 10px;
    box-shadow: 0 0 4px 0 #cccccc;
    color: #ffffff;
    font-size: 21px;
    font-weight: normal;
    margin: 0;
    padding: 15px 4%;
    text-align: center;
    display: inline-block;
    width: 21%;
    float: left;
}
.interior-page.register .left-col .content .select-course-content h4 span{
    display: block;
    font-size: 30px;
    padding: 16px 0px;
}
.interior-page.register .left-col .content .select-course-content p {
    background: #DDE3EF;
    width: 60%;
    display: inline-block;
    border-radius: 0 10px 10px 0;
    padding: 10px;
    margin: 10px 0;
    min-height: 70px;
}
.interior-page.register .left-col .content .vlacs-logo {
    text-align: center;
}
.interior-page.register .left-col .content .contentbox2 {
    margin: 15px 0;
    padding: 15px 182px;
    float: left;
 }
.interior-page.register .left-col .content .contentbox2 p{
    text-align: center;
    font-weight: bold;
 }
.interior-page.admissions .left-col .content .admissions-block{
    background: url("images/register.png") no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0);
    font-size: 20px;
    height: 670px;
    position: relative;
}
.interior-page.admissions .left-col .content .admissions-block a{
    color: #000;
}
.interior-page.admissions .left-col .content .admissions-block a:hover{
    color: #4DAA4C;
}
.interior-page.admissions .left-col .content .admissions-block .part-time-nh {
    left: 278px;
    position: absolute;
    text-align: center;
    top: 50px;
    width: 92px;
}
.interior-page.admissions .left-col .content .admissions-block .part-time-out {
    left: 45px;
    position: absolute;
    text-align: center;
    top: 275px;
    width: 92px;
}
.interior-page.admissions .left-col .content .admissions-block .register {
    left: 240px;
    position: absolute;
    text-align: center;
    top: 290px;
    width: 92px;
}
.interior-page.admissions .left-col .content .admissions-block .register a{
    font-size: 45px;
}
.interior-page.admissions .left-col .content .admissions-block .full-time-out {
    right: 40px;
    position: absolute;
    text-align: center;
    top: 275px;
    width: 92px;
}
.interior-page.admissions .left-col .content .admissions-block .full-time-nh {
    left: 278px;
    position: absolute;
    text-align: center;
    top: 510px;
    width: 92px;
}
@media screen and (max-width: 768px){
    .interior-page.admissions .left-col .content .admissions-block {
        font-size: 17px;
        height: 475px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-nh {
        left: 178px;
        top: 33px;
        width: 87px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-out {
        left: 17px;
        top: 182px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register {
        left: 138px;
        top: 194px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-out {
        right: 16px;
        top: 183px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-nh {
        left: 178px;
        top: 358px;
    }
}
@media screen and (max-width: 600px){
    .interior-page.admissions .left-col .content .admissions-block {
        font-size: 17px;
        height: 525px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-nh {
        left: 214px;
        top: 43px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-out {
        left: 24px;
        top: 220px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register {
        left: 175px;
        top: 230px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-out {
        right: 26px;
        top: 217px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-nh {
        left: 216px;
        top: 419px;
    }
}
@media screen and (max-width: 480px){
    .interior-page.admissions .left-col .content .admissions-block {
        font-size: 17px;
        height: 525px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-nh {
        left: 168px;
        top: 32px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-out {
        left: 14px;
        top: 173px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register {
        left: 154px;
        top: 190px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register a {
        font-size: 30px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-out {
        right: 15px;
        top: 171px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-nh {
        left: 177px;
        top: 332px;
        width: 68px;
    }
}
@media screen and (max-width: 384px){
    .interior-page.admissions .left-col .content .admissions-block {
        font-size: 13px;
        height: 300px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-nh {
        left: 113px;
        top: 18px;
        width: 50px;
    }
    .interior-page.admissions .left-col .content .admissions-block .part-time-out {
        left: -5px;
        top: 116px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register {
        left: 94px;
        top: 120px;
    }
    .interior-page.admissions .left-col .content .admissions-block .register a {
        font-size: 25px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-out {
        right: 93px;
        top: 217px;
    }
    .interior-page.admissions .left-col .content .admissions-block .full-time-nh {
        left: 215px;
        top: 116px;
        width: 50px;
    }
}
.interior-page .left-col .content .dual_img{
    width:100%;
    height:138px;
}
.interior-page .left-col .content .dual_img img{
    float:left;
}
.interior-page .left-col .content .dual_img .alignleft.size-full.wp-image-571 {
    padding-top: 30px;
}
.interior-page .left-col .content .tours_img{
    width:100%;
}
.interior-page .left-col .content .tours_img table{
    width:100%;
}
.interior-page .left-col .content .tours_img table td{
    float: left;
    width:50%;
}

@media screen and (max-width: 1023px){
    header .logo {
        width: 32%;
    }
    header .header-right {
        width: 68%;
    }
    .interior-page .left-col{
        width:60%;
        margin:0 5% 0 0;
    }
    .interior-page .right-col{
        width:35%;
        margin:0;
    }
    .interior-page #home-testimonial{
        width: 100% !important;
    }
    .interior-page .right-col .sidebar{
        padding:0;
    }
    .footer .footer-blocks .grid-1{
        display:none;
    }
    .footer .footer-blocks .grid-3{
        width:160px;
    }
    .footer .footer-soacials .grid-2{
        display:none;
    }
    .footer .footer-soacials .grid-1{
        width:200px;
    }
    .footer .footer-soacials .grid-3{
        width:280px;
    }
    .footer .footer-soacials .grid-4{
        width:200px;
    }
    .footer .footer-soacials .newsletter input[type=text] {
        width:190px;
    }
    .interior-page .essentials li {
        width: 100%;
    }
    .essentials .more{
        float: left;
    }
}

@media screen and (max-width: 767px){
    header .logo {
        width: 100%;
    }
    header .header-right {
        width: 100%;
    }
    header .header-right .top-menu li {
        margin: 0;
    }
    .interior-page .left-col{
        width:100%;
        margin:0 0 20px 0;
    }
    .interior-page .right-col{
        margin-left: 20px;
        width: 87%;
    }
    .interior-page .video-block .left{
        width:100%;
        text-align:center;
    }
    .interior-page .video-block .right{
        width:100%;
        margin:0;
        text-align:center;
    }
    .interior-page .video-block .right a{
        display:inline-block;
        float:none;
        margin:5px;
    }
    .interior-page .video-block .right .blue-btn{
        margin:0 auto;
        display:block;
    }
    .interior-page .right-col .sidebar{
        padding:0;
    }
    .interior-page .right-col .sidebar p {
        padding-bottom: 0px;
    }
    .footer .blue-bar{
        padding:10px 20px;
        line-height:20px;
        height:auto;
        text-align:center;
    }
    .footer .blue-bar p{
        letter-spacing:0;
    }

    .footer .footer-blocks .grid-2,
    .footer .footer-blocks .grid-3,
    .footer .footer-blocks .grid-4,
    .footer .footer-blocks .grid-5{
        width:100%;
        margin:5px 0;
        text-align:center;
    }
    .footer .footer-blocks .grid-2 ul,
    .footer .footer-blocks .grid-3 ul,
    .footer .footer-blocks .grid-4 ul{
        display:none;
    }
    .footer .footer-blocks .social-block{
        text-align:center;
    }
    .footer .footer-blocks .social-block .social-box{
        margin:15px auto;
        float:none;
        width:163px;
    }
    .footer .footer-blocks .blue-btn-small{
        margin-left:0;
    }
    .footer .footer-soacials .grid-1{
        width:50%;
        margin:0;
    }
    .footer .footer-soacials .grid-2{
        width:50%;
        margin:0;
        display:block;
    }
    .footer .footer-soacials .grid-2 img{
        margin-left:0;
    }
    .footer .footer-soacials .grid-3{
        width:90%;
        margin:10px 5%;
        text-align:center;
    }
    .footer .footer-soacials .grid-4{
        width:90%;
        margin:10px 5%;
        text-align:center;
    }
    .footer-blocks .social-block .social-box img {
        height: 51px;
        width: 51px;
    }
    .footer .footer-soacials .newsletter{
        margin:0 auto;
    }
    .footer .footer-soacials .newsletter input[type="submit"]{
        text-align:center;
    }
    .footer .footer-soacials h2{
        padding-bottom:10px;
    }
    .footer .footer-soacials .newsletter input[type=text] {
        width:244px;
        margin-left:100px;
    }
    #tabs.ui-tabs .ui-tabs-nav{
        width:100%;
        text-align:center;
        padding:0;
    }
    #tabs.ui-tabs .ui-tabs-nav li{
        float:none;
        display:inline;
    }
    #tabs.ui-tabs .ui-tabs-nav li.ui-tabs-active{
        margin:0;
        padding:0;
    }
    #tabs.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor, #tabs.ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor, #tabs.ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor{
        border-bottom-color:#777788;
        margin-bottom:2px;
        display:inline;
    }
}
@media screen and (max-width: 567px){
    .footer .footer-soacials .grid-1{
        width:100%;
        text-align:center;
    }
    .footer .footer-soacials .grid-2{
        display:none;
    }
    .footer .footer-soacials .newsletter input[type=text] {
        width:244px;
        margin-left:56px;
    }
    .interior-page .left-col .content  table{
        width:100%;
    }
    .interior-page .left-col .content  table td{
        width:100%;
    }
}
@media screen and (max-width: 479px){
    .footer .footer-soacials .newsletter input[type=text] {
        width:244px;
        margin-left:0px;
    }
}


/*   5.1. Main Navigation
    --------------------------------------------------------------------------  */

@media only screen and (max-width: 767px) {

    .main-nav ul li > a {
        padding: .875em .875em .6em;
        font-size: .875em;
    }
}
@media only screen and (max-width: 767px) {

    .main-nav {
        float: none;
    }
}
.navigation{
    float: left;
    height: 50px;
    position: relative;
    width: 100%;
    background:#1378BA;
    color:#fff;
    z-index: 6;
}
.menu-toggle {
    display: none;
    position: absolute;
    top: 1.1em;
    right: 5%;
    color: #fff;
    font-size: 1.125em;
    text-decoration: none;
}
.menu-toggle:hover{
   color: #49AB47;
}
.menu-toggle.active {
    color: #fff;
}
.menu-toggle .icon {
    font-size: 1.8em;
}
.submenu-toggle {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 1;
    width: 2.75em;
    height: 2.75em;
    text-align: center;
    line-height: 3.4em;
    cursor: pointer;
}
.submenu-toggle .icon {
    color: #fff;
    font-size: 2em;
}
@media only screen and (max-width: 767px) {
    .menu-toggle,
    .submenu-toggle {
        display: block;
    }
    .main-nav {
        clear: both;
        min-width: inherit;
        background: #1378BA;
        text-align: left;
        position:absolute;
        width:100%;
        top:51px;
    }
    .main-nav ul {
        display: block;
    }
    .main-nav ul,
    .main-nav > ul ul {
        overflow: hidden;
        height: 0;
    }
    .main-menu.active,
    .main-nav > ul ul.active {
        height: auto;
    }
    .main-nav li,
    .main-nav > ul > li {
        display: block;
        border-bottom: 1px solid #FFFFFF;
        position: relative;
    }
    .main-nav li a {
        display: block;
        position: relative;
        color: #fff;
    }
    .main-nav ul li > a {
        height: 2.75em;
        padding: 0 5%;
        font-size: 1em;
        line-height: 3em;
    }
    .main-nav ul ul li > a {
        padding-left: 7%;
        background: #2189cd;
        text-transform: none;
    }
    .main-nav ul ul,
    .main-nav ul ul ul {
        display: inherit;
        position: relative;
        top: auto;
        left: auto;
    }
    .main-nav ul ul ul li > a {
        padding-left: 9%;
        background: #349bdf;
        font-weight: normal;
    }
}
@media only screen and (max-width: 767px) {

    .menu-toggle {
        top: -40px;
        font-size: 1em;
        line-height:30px;
    }
    .menu-toggle .icon-menu {
        top: -1px;
        float:left;
        margin-right:10px;
        font-size:26px;
    }
}

.interior-page.light-full .left-col {
    float: left;
    margin: 0 20px 0 0;
    width: 100%;
}
.fancybox-inner {
    overflow: hidden !important;
}
.page-id-148 .interior-page .left-col h1{
    color: #1378BA;
}
.page-id-148 .interior-page .left-col h3.gform_title {
    color: #4DAA4C;
    font-size: 22px;
    font-weight: normal;
}
.page-id-148 .interior-page .content td{
    padding:3px;
}
#accordion_cat .odd{
    border-bottom:1px solid #DED5D5;
    padding: 20px 0 10px;
}
#accordion_cat .even{
    border-bottom:1px solid #DED5D5;
    padding: 20px 0 10px;
}
#accordion_cat span{
    font-weight:bold;
    color:#333;
}
.blog-page{
    padding:40px 0;
}
.blog-page .content h1.title{
    font-size:34px;
    color:#737373;
    line-height:40px;
    letter-spacing:1px;
    width:100%;

    float:left;
}
.blog-page .content h1.title a{
    color:#737373;
}
.blog-page .content h1.title a:hover{
    color:#1378ba;
}
.blog-page .content article{
    width:100%;
    float:left;
    border-bottom:1px solid #f0f0f0;
    padding:0 0 15px;
    margin-bottom:20px;
}
.blog-page .blog-author{
    font-size:16px;
    color:#4daa4c;
    width:100%;
    float:left;
    font-weight:700;
    padding-bottom:15px;
}
.blog-page .author{
    float:left;
}
.blog-page .blog-share{
    float: right;
    margin-right: 20px;
}
.blog-page .blog-share a{
    padding:0 2px;
}
.blog-page #TellAFriend_BoxContainer {
    border: 1px solid #1378ba;
}
.blog-page #TellAFriend_BoxContainerHeader {
    background: #1378ba;
}
.blog-page .TellAFriend_TextBox,
.blog-page .TellAFriend_TextArea{
    border: 1px solid #cccccc;
}
.blog-page .TellAFriend_Button {
    background: #459744;
    color: #ffffff;
    cursor: pointer;
    padding: 10px 35px;
    width: auto;
}
.blog-page #TellAFriend_BoxLabel {
    color: #737373;
}

.blog-page .content h2{
    font-size:20px;
    color:#4daa4c;
    width:100%;
    float:left;
    font-weight:600;
    padding-bottom:15px;
}
.blog-page .content p{
    font-size:14px;
    width:100%;
    float:left;
    padding-top:10px;
    line-height:22px;
    text-align:inherit;
}
.blog-page .content hr {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    clear: both;
    height: 1px;
    padding: 0;
    border: 0;
    border-top: 1px solid #ccc;
}
.blog-page .content .blog-section{
    width:100%;
    float:left;
    border-bottom:1px solid #ccc;
    padding:0 0 40px 0;
    margin-bottom:40px;
}
.blog-page .content .blog-section:last-child{
    border:none;
}
.blog-page .content .blue-btn-news{
    margin:0;
}
.blog-page .content p.blue{
    color:#217ebd;
    font-size:15px;
}
.blog-page .content h3{
    font-size:20px;
    color:#217ebd;
    width:100%;
    float:left;
    font-weight:600;
}
.blog-page .content ul{
    padding-bottom:15px;
    width:100%;
    float:left;
}
.blog-page .share-green{
    background:#459744;
    color:#fff;
    text-align:right;
    padding:10px 3%;
    width:94%;
    float:left;
}
.blog-page .share-green a{
    color:#fff;
}
.blog-page .share-green a:hover{
    color:#333;
}
.interior-page .related-post{
    width:100%;
    float:left;
    padding-top:40px;
}
.interior-page .related-post h1{
    width:100%;
    float:left;
    padding-bottom:20px;
    color:#217ebd;
    font-size:20px;
}
.interior-page .related-post h3 a{
    padding:10px 0;
    color:#494949;
    font-size:15px;
}
.interior-page .related-post h3 a:hover{
    color:#1378ba;
}
.interior-page .related-post span{
    color:#459744;
    font-size:14px;
    padding-bottom:10px;
    display:block;
}
.interior-page .related-post .left{
    width:45%;
    float:left;
}
.interior-page .related-post .right{
    width:45%;
    float:right;
}
.interior-page .right-col .sidebar .search-block {
    width:100%;
    float:left;
    padding:15px 0;
}
.interior-page .right-col .sidebar .search-block input[type=text] {
    width:150px;
    border:1px solid #1378ba;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    padding:5px 30px 5px 10px;
    background:url(images/search-icon.png) no-repeat 95% 2px;
    margin-right:10px;
}
.interior-page .right-col .sidebar .search-block input[type=text]:focus {
    border:1px solid #49ab47;
    background-position:95% -37px;
}
.interior-page .right-col .sidebar .newsletter{
    background:#f3f3f3;
    /*-webkit-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:    0px 0px 10px 0px rgba(50, 50, 50, 0.75);
    box-shadow:         0px 0px 10px 0px rgba(50, 50, 50, 0.75);*/

    margin:10px 0;
    width:99%;
    float:left;
}
.interior-page .right-col .sidebar .newsletter .title{
    background:#1378ba;
    border:1px solid #dedede;
    border-bottom: none;
    width:90%;
    float:left;
    color:#fff;
    font-size:13px;
    padding:15px 5%;
}
.interior-page .right-col .sidebar .newsletter .form{
    background: none repeat scroll 0 0 #E9E9E9;
    border:1px solid #fff;
    border-top: none;
    float: left;
    padding: 20px 0;
    width: 100%;
}
.interior-page .right-col .sidebar .newsletter .form #gform_wrapper_1 .gform_body{
    float:left;
}
.interior-page .right-col .sidebar .newsletter .form #gform_wrapper_1 #gform_submit_button_1{
    float: left;
    margin: 9px 0 0 7px;
}
.interior-page .right-col .sidebar .newsletter .form #gform_wrapper_1 #gform_submit_button_1:hover{
    color:#333;
}
.interior-page .right-col .sidebar .newsletter .form input[type=text]{
    width:150px;
    float:left;
    background:#fff;
    border:1px solid #a3a3a3;
    padding:5px 10px;
    color:#333;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
}
.interior-page .right-col .sidebar .newsletter .form input[type=submit]{
    background:none;
    border:none;
    color:#1378ba;
    font-size:16px;
    cursor:pointer;
    padding:0 0 0 10px;
}
.interior-page .right-col .sidebar .social-connect{
    /*background:#f3f3f3;
    border:1px solid #d3d3d3;*/
    /*-webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    -moz-box-shadow:   0 3px 6px rgba(0, 0, 0, 0.3);
    box-shadow:        0 3px 6px rgba(0, 0, 0, 0.3);*/
    margin:10px 0;
    float:left;
}
.interior-page .right-col .sidebar .social-icon{
    border:1px solid #fff;
    float:left;
}
.interior-page .right-col .sidebar .social-connect a{
    border-right: 1px solid #CCCCCC;
    float: left;
    margin: 4px 0;
    padding: 8px 10px;
}
.interior-page .right-col .sidebar .social-connect a:last-child{
    border: none;
}
.interior-page .right-col .sidebar .social-connect img:hover{
    opacity:0.5;
}
.interior-page .right-col .sidebar .blog-toplink .block {
    width: 187px;
}
.interior-page .right-col .sidebar .blog-toplink .block h2 {
    width: 187px;
    font-size: 14px;
    padding: 20px 0;
    background: #f3f3f3;
}
.interior-page .right-col .sidebar .blog-toplink .block h2 a {
    width: 187px;
}
.interior-page .right-col .sidebar .category-list{
    width:100%;
    float:left;
}
.interior-page .right-col .sidebar .category-list li:after{
    display:none;
}
.interior-page .right-col .sidebar .category-list li{
    padding-left:0;
}
.interior-page .right-col .sidebar .category-list li a{
    color: #494949;
    font-size: 13px;
    font-weight: 700;
}
.interior-page .right-col .sidebar .category-list .cat-item{

    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;

    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.interior-page .right-col .sidebar .category-list .cat-item:before {
    content: "\e608";
    float: left;

    padding-right: 8px;
    padding-top: 1px;
}
.interior-page .right-col .sidebar .category-list li a:hover{
    color:#1378ba;
}
.interior-page .right-col .sidebar .category-list li span{
    font-size:13px;
    font-style:italic;
    color:#459744;
    display:block;
    font-weight: 500;
    padding: 7px 0;
}
.interior-page .right-col .sidebar .related-posts li:after {
    display: none;
}
.interior-page .right-col .sidebar .related-posts li{
    color: #494949;
    font-size: 13px;
    letter-spacing: 0.3px;
    list-style-type: none;
    padding: 7px 0 7px 0px;
}
.interior-page .right-col .sidebar .related-posts li a {
    color: #494949;
    font-size: 13px;
    font-weight: 700;
}
.interior-page .right-col .sidebar .related-posts li a:hover{
    color: #1378ba;
}
.interior-page .right-col .sidebar .related-posts li span {
    color: #459744;
    display: block;
    font-size: 13px;
    font-style: italic;
    font-weight: 300;
     padding: 5px 0;
}
.blue-btn-news{
    /*background: url("images/blue-btn-bg.png") repeat-x scroll left top rgba(0, 0, 0, 0);*/
    background: #196a9f;
    border-radius: 20px;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    float: right;
    font-size: 13px;
    height: 25px;
    line-height: 25px;
    margin: 35px 0;
    padding: 0 15px;
}
.blue-btn-news:hover {
    background: #4dab4d;
}
.blog_content{
    border-bottom: 1px solid #EEEEEE;
    float: left;
    margin-bottom: 36px;
    width: 100%;
}
.blog-search{
     color: #1378BA;
}
.form .gfield_label{
    display:none;
}
.blog-page .right-col ul li:after, .interior-page .right-col a.readmore:after{
       border:none !important;
}
.interior-page .pagination {
    float: left;
    width: 100%;
}
.interior-page .pagination ol {
    width: 100%;
}
.interior-page .pagination ol  li {
    display: inline;
    list-style: none;
    font-size: 20px;
}
@media screen and (max-width: 767px){
    .thankyou-page .content p{
        text-align:center;
    }
    .blog-page .blog-share{
        float: right;
        margin-right: 0px;
    }
}
@media screen and (max-width: 384px){
    .blog-page .blog-share{
        float: right;
        margin-right:0px;
    }
    .blog-page .blog-author{
        font-size:13px;
    }
}
.blog-toplink {
    float: left;
    width: 100%;
    text-align: center;
    margin: 15px 0;
}
.blog-toplink .left {
    float: left;
    width: 50%;
}
.blog-toplink .right {
    float: left;
    width: 50%;
}
.blog-toplink .block {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    border: 1px solid #d3d3d3;
    width: 420px;

    float: left;
}
.blog-toplink .block h2 {
    border: 1px solid #FFFFFF;
    font-size: 20px;
    font-weight: 400;
    float: left;
}
.blog-toplink .block h2 a {
    background: #F3F3F3;
    color: #196A9E;
    float: left;
    padding: 20px 0;
    width: 420px;
}
.blog-toplink .block h2 a .icon-right{
    font-size:12px;
}
.blog-toplink .block h2 a.active:hover{
    background: #F3F3F3;
    color: #196A9E;
}
.blog-toplink .block h2 a:hover,
.blog-toplink .block h2 a.active{
    background: #196a9e;
    color: #ffffff;
}
.blog-page-title{
    width:100%;
    float:left;
    background:#4daa4c;
    padding:15px 0;
    height:50px;
    color:#fff;
}
.page-template-page-leadership-blog-php .blog-page-title,
.tax-leadership-taxonomie .blog-page-title{
    background: #196a9e;
}
.page-template-page-leadership-blog-php .blog-page-title h1,
.tax-leadership-taxonomie .blog-page-title h1{

    font-size:27px;
    font-style: italic;
}
.blog-page-title h1{
    font-size:38px;
    font-weight:400;
    color:#fff;
    width:100%;
    text-align: center;
    float:left;
    line-height:50px;

}
.blog-page-title h2{
    font-size:24px;
    font-weight:500;
    color:#fff;
    width:100%;
    float:left;
}
.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px;
    height: 0;
    overflow: hidden;
    max-width: 100%;
    height: auto;
}
.embed-container iframe,
.embed-container object,
.embed-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
body iframe{
    display:none !important;
}
body .wrapper iframe{
    display:block !important;
}
body #oggwindowholder iframe{
    display:block !important;
}
body .fancybox-overlay iframe{
    display:block !important;
}

.interior-page .content .tour-img .tour-img-inner {
    float: left;
    width: 50%;
    margin-bottom: 25px;
}
.interior-page .content .tour-img .tour-img-inner p a{
    padding-bottom: 0px;
    color: #4DAA4C;
    font-weight: bold;
}
.interior-page .content .tour-img .tour-img-inner p a:hover{
    color: #000;
}
.interior-page .content .tour-video{
    float: left;
    width: 100%;
}
.interior-page .content .tour-video .tour-video-inner{
    width: 80%;
    margin-bottom: 25px;
}
@media screen and (max-width: 600px){
    .page-id-63 .interior-page .content .alignleft {
        float: left;
        height: auto;
        margin: 3px 10px 3px 0;
        width: 50%;
    }
}
@media screen and (max-width: 384px){
    .interior-page .content .tour-img .tour-img-inner {
        width: 100%;
    }
    .interior-page .content .tour-video .tour-video-inner{
        width: 100%;
    }
    .page-id-63 .interior-page .content .alignleft {
        height: auto;
        margin: 3px 10px 3px 0;
        width: 100%;
    }
    .interior-page .left-col .content .dual_img .wp-image-572{
        padding-top: 18px;
    }
    .interior-page .left-col .content .dual_img {
        height: 70px;
    }
}
@media screen and (max-width: 600px){
    .interior-page .content .tour-video .tour-video-inner{
        width: 100%;
    }
    .page-id-75 .interior-page .content .alignright {
        float: none;
        margin: 3px 0 0 10px;
    }
    .interior-page .content .full-image {
        text-align: center;
        width: 100%;
    }
    .page-id-111 .interior-page .content .alignright {
        float: none;
    }
}

@media screen and (max-width: 768px){
    .page-id-121 .interior-page .content p {
        display: block;
        float: left;
        width: 100%;
    }
    .page-id-121 .interior-page .content span {
        height: auto !important;
        margin-bottom: 20px;
        width: 100%;
    }
    .interior-page .left-col .content .dual_img img {
        width: 30%;
        height: auto;
    }
    .interior-page .left-col .content .dual_img .alignleft.size-full.wp-image-571,
    .interior-page .left-col .content .dual_img .wp-image-573{
        padding-top: 30px;
    }
    .interior-page .left-col .content .dual_img {
        height: 90px;
    }
    .blog-toplink .block {
        width: 100%;
    }
    .blog-toplink .block h2 a{
        width: 100%;
    }
    .blog-toplink .left{
        width: 100%;
    }
    .blog-toplink .right{
        width: 100%;
        margin-top: 10px;
    }
    .blog-toplink .block h2 {
        width: 100%;
    }

}

.page-id-111 .interior-page .content .alignright {
    margin: 3px 0 3px 10px;
}
.page-id-111 .interior-page .left-col .content .contentbox2 {
    float: left;
}
.page-id-111 .interior-page .content p strong {
    float: left;
    padding-bottom: 15px;
    width: 100%;
}

.page-id-73 .interior-page .content .full-image {
    text-align: center;
    width: 100%;
}
@media screen and (max-width: 1023px){
    .interior-page.register .left-col .content .select-course-content p {
        min-height: 60px;
    }
    .interior-page.register .left-col .content .select-course-content h4 {
        font-size: 15px;
    }
    .interior-page.register .left-col .content .select-course-content h4 span {
        font-size: 21px;
    }
    .interior-page.register .left-col .content .contentbox2{
        padding:15px;
    }
}
@media screen and (max-width: 767px){
    .interior-page.register .left-col .content .select-course p {
        height: auto;
        padding: 20px 2%;
        width: 98%;
        min-height: 36px;
        border-radius: 10px;
    }
    .interior-page.register .left-col .content .select-course-content h4 {
        margin: 0;
        padding: 15px 0;
        width: 100%;
    }
    .interior-page.register .left-col .content .contentbox2{
        padding:15px;
    }
    .vlacs-img{
        float:none !important;
        margin:0 !important;
        display:block !important;
    }
    .blog-page .blog-author .author{
        width:100%;
        margin-bottom:15px;
    }
    .blog-page .blog-author .blog-share{
        width:100%;
    }
    .blog-page .content h1.title{
        font-size:26px;
        line-height:26px;
        letter-spacing:inherit;
    }
    .interior-page .related-post .left{
        width:100%;
        margin-bottom:15px;
    }
    .interior-page .related-post .right{
        width:100%;
        margin:0;
    }
    .interior-page .right-col .sidebar .top-block{
        padding:15px 5%;
        width:90%;
    }
    .interior-page .right-col .sidebar .top-block p{
        padding-bottom:10px;
    }
    .interior-page .right-col .sidebar .social-connect img {
        float: left;
        height: 51px;
        width: 20%;
    }
    .interior-page .content p{
        text-align:left;
    }
    .interior-page.register .left-col .content h2{
        font-size:20px;
        margin-top: 10px;
    }
    .blog-toplink .block {
        width: 100%;
    }
    .blog-toplink .block h2 a{
        width: 100%;
    }
    .blog-toplink .left{
        width: 100%;
    }
    .blog-toplink .right{
        width: 100%;
    }
    .blog-toplink .block h2 {
        width: 100%;
    }
    #oggchat{
        display: none;
    }
    #oggwindowholder{
        display: none;
    }
    .interior-page .right-col .sidebar .social-connect img {
        float: left;
        height: 24px;
        width: 100%;
    }
    .interior-page .right-col .sidebar .social-connect a {
        padding: 0 5px;
    }
}
@media screen and (max-width: 567px){
    .interior-page.register .left-col .content .contentbox2{
        padding:15px;
    }
    .interior-page.contact .left-col .content table td{
        width:50%;
        text-align:left !important;
    }
}
@media screen and (max-width: 479px){
    .interior-page.register .left-col .content .contentbox2{
        padding:15px;
    }
    .interior-page.register .left-col .content h2{
        font-size:16px;
    }
}

/*   Upcoming Events
    --------------------------------------------------------------------------  */
.qtip.gce-qtip {
    box-shadow: 2px 2px 5px 0 #1378ba;
}
.gce-event-info {
    border: 1px solid #1378ba;
}
.gce-page-grid .gce-calendar .gce-has-events {
    background: #1378ba;
    color: #ffffff;
}
.gce-event-info .gce-tooltip-title {
    color: #1378ba;
}
.gce-event-info .gce-tooltip-event {
    background: #1378ba;
    color: #ffffff;
    font-weight: bold;
    padding: 5px 0;
    text-align: center;
    text-transform: capitalize;
}
.gce-tooltip-feed-1 div {
    margin: 6px 0;
    color: #666666;
    font-size: 0.85em;
}
.gce-event-info ul li p span, .gce-event-info ul li div span {
    color: #1378ba;
}
.gce-page-grid .gce-calendar .gce-caption {
    font-size: 1.2em;
    margin: 5px 0;
}
.gce-event-info .gce-tooltip-title {
    font-size: 1em;
}
.gce-page-grid .gce-calendar .gce-next,
.gce-page-grid .gce-calendar .gce-prev {
    font-size: 1.5em;
}
@media screen and (max-width: 567px){
    .page-id-1255 .interior-page .left-col .content table td {
        width: auto;
    }
    .gce-page-grid .gce-calendar td {
        height: 40px;
    }
}
/* Home page */
.interior-page .right-col .gce-page-list .gce-list .gce-event-day{
    padding: 5px 0;
}
.interior-page .right-col .gce-page-list .gce-list .gce-event-day .gce-list-title {
    color: #4daa4c;
    font-size: 14px;
    padding-bottom: 5px;
}
.interior-page .right-col .gce-page-list .gce-list .gce-event-day .gce-feed {
    margin: 0;
    padding: 0;
}
.interior-page .right-col .gce-page-list .gce-feed .gce-list-event,
.interior-page .right-col .gce-page-list .gce-feed .gce-tooltip-event{
    padding: 0;
}
.interior-page .right-col .gce-page-list .gce-list .gce-event-day .gce-feed a{
    color: #666666;
    font-size: 12px;
    letter-spacing: 0.3px;
    line-height: 20px;
    padding-bottom: 15px;
}
.interior-page .right-col .gce-page-list .gce-list .gce-event-day .gce-feed a:hover{
    color: #4daa4c;
}
.interior-page .right-col .gce-page-list .gce-list .gce-list-event{
    background: none;
}

/* Template Name: Course Offered */
.interior-page .left-col .content .green-button {
    background:#4DAA4C;
    border-radius: 10px;
    color: #FFFFFF;
    float: left;

    font-size: 14px;
    margin: 10px 20px 10px 0;
    padding: 15px 20px 15px 37px;
    margin-right: 20px;
    min-width: 196px;
    position: relative;
}
.interior-page.course-offered .cta {
    float: left;
    width: 100%;
}
.interior-page .left-col .content .green-button:hover {
    background: #196A9E;
    color: #FFFFFF;
}
.interior-page .left-col .content .blue-button .icon-left {
    left: 11px;
    position: absolute;
    top: 17px;
}
.interior-page.course-offered .left-col .content .blue-button{
    min-width: 196px;
    padding: 15px 20px 15px 37px;
    position: relative;
}
.course-offered .blue-button .icon-right {
    float: right;
}
/* 404 Page */
.interior-page .left-col.not-found h1 {
    color: #4daa4c;
    font-size: 30px;
    font-weight: 300;
    padding-bottom: 10px;
}
.interior-page .left-col.not-found p {
    color: #666666;
    font-size: 14px;
    font-weight: 400;
    line-height: 30px;
    padding-bottom: 20px;
    padding-right: 50px;
}
.interior-page .left-col.not-found p a {
    color: #4daa4c;
}
.interior-page .left-col.not-found p a:hover {
    color: #6c6c6c;
}
.interior-page .left-col.not-found h3 {
    color: #4daa4c;
    font-size: 24px;
    font-weight: 300;
    padding-bottom: 10px;
}
.interior-page .left-col.not-found h3 b {
    font-weight: 300;
}
.interior-page .left-col.not-found li {
    color: #6c6c6c;
    font-size: 18px;
    font-weight: 300;
    line-height: 50px;
}
.interior-page .left-col.not-found li:before{
    display: none !important;
}
.interior-page .left-col.not-found li input[type="text"] {
    background: none repeat scroll 0 0 #e0e0e0;
    color: #b7b7b7;
    font-size: 20px;
    font-style: italic;
    font-weight: 300;
    height: 22px;
    margin-bottom: 10px;
    padding: 10px 3%;
    width: 300px;
}
.interior-page .left-col.not-found li input[type="submit"] {
    background: none repeat scroll 0 0 #1378ba;
    color: #ffffff;
    cursor: pointer;

    font-size: 18px;
    font-weight: 400;
    padding: 9px 45px;
}
.interior-page .left-col.not-found li input[type="submit"]:hover {
    background: none repeat scroll 0 0 #0075ac;
}
/* Template Name: Learning Through College */

.interior-page.ltc h2 {
    padding: 0 0 10px 0;
    color: #4daa4c;
}
.interior-page.ltc h3 {
    color: #1378ba;
    font-size: 16px;
    font-weight: 600;
}
.interior-page.ltc .content p {
    padding-bottom: 20px;
    text-align: left;
}
.interior-page .courses-table{
    width: 100%;
    margin-bottom: 60px;
    display: inline-block;
}
.interior-page .courses-table .left{
    width: 49.2%;
    float: left;
    margin-right: 1.6%;
}
.interior-page .courses-table .right{
    width: 49.2%;
    float: right;
}
.interior-page .courses-table h1{
    background: #1278ba;
    padding: 20px 25px;
    color: #fff;
    text-align: center;
    font-size: 17px;
}
.interior-page .left-col .courses-table ul {
    margin-top: 0;
}
.interior-page .courses-table ul li{
    margin-bottom: 0;
    margin-left: 0;
    padding: 12px;
    min-height: 60px;
}
.interior-page .left-col .courses-table ul li:before{
    display: none;
}
.interior-page .courses-table ul li:nth-child(even) {
    background: #f2f2f2;
}
.interior-page .courses-table ul li:nth-child(odd) {
    background: #d8d8d8;
}
.interior-page .early-college-coach{
    width: 100%;
    clear: both;
}
.interior-page .early-college-coach h1,
.interior-page .early-college-option h1,
.interior-page .option-list h1{
    color: #1378ba;
    font-size: 18px;
    font-weight: 600;
}
.interior-page.ltc .early-college-coach ul{
    margin: 0 0 20px 0;
}
.interior-page .early-college-option .option-table-mobile{
    display: none;
}
.interior-page .early-college-option .option-table {
    width: 100%;
    display: inline-block;
}
.interior-page .early-college-option .option-table ul{
    margin: 0;
    width: 100%;
}
.interior-page .early-college-option .option-table .title li{
    background: #1278ba;
    color: #fff;
    text-align: center;
    padding: 25px 1px;
}
.interior-page .early-college-option .option-table li{
    display: table-cell;
    font-size: 15px;
    padding: 10px;
    margin: 0;
}
.interior-page.ltc .early-college-option .option-table li:before{
    display: none;
}
.interior-page .early-college-option .option-table li:nth-child(1){
    width: 14%;
}
.interior-page .early-college-option .option-table li:nth-child(2){
    width: 19%;
}
.interior-page .early-college-option .option-table li:nth-child(3){
    width: 11%;
}
.interior-page .early-college-option .option-table li:nth-child(4){
    width: 22%;
}
.interior-page .early-college-option .option-table li:nth-child(5){
    width: 15%;
}
.interior-page .early-college-option .option-table li:nth-child(6){
    width: 19%;
}
.interior-page .early-college-option .option-table .even {
    background: #f2f2f2;
}
.interior-page .early-college-option .option-table .odd {
    background: #d8d8d8;
}
.interior-page .option-list h1{
    padding-bottom: 0;
}
.interior-page .option-list h4{
    font-size: 15px;
    color: #4daa4c;
    font-weight: 600;
}
.interior-page .option-list.entry ul{
    padding: 0;
}
.interior-page .option-list.entry ul li{
    padding: 5px 0;
}
.interior-page.ltc .content .alignright{
    margin: 3px 0 20px 30px;
}
.interior-page .free-electives{
    width: 100%;
}
.interior-page .free-electives h1{
    color: #4daa4c;
    font-size: 15px;
    line-height: 25px;
    font-weight: 600;
}
.interior-page .free-electives h2{
    font-size: 18px;
    font-weight: 600;
    color: #1378ba;
}
.interior-page.ltc .free-electives p{
    padding-bottom: 0;
}
.interior-page .content-faq h1{
    padding:20px 0 0 0;
}
.interior-page.ltc .left-col .content ol {
    margin-top: 10px;
}
.interior-page.ltc .left-col .cta{
    float: left;
    width: 100%;
}
.interior-page.ltc .left-col .cta .blue-button{
    position:relative;
    width: 27%;
}
.interior-page.ltc .left-col .cta .blue-button .icon-right {
    position: absolute;
    right: 11px;
    top: 13px;
}
.interior-page.ltc .left-col .cta .blue-button .icon-left {
    top: 13px;
}
.interior-page.ltc .cmp_buttons_container{
    margin-top: 40px;
    float: left;
}
.interior-page.ltc .accordion-block .ui-state-default,
.interior-page.ltc .accordion-block .ui-widget-content .ui-state-default,
.interior-page.ltc .accordion-block .ui-widget-header .ui-state-default{
    background: none;
}
.interior-page.ltc .accordion-block .ui-state-active,
.interior-page.ltc .accordion-block .ui-widget-content .ui-state-active,
.interior-page.ltc .accordion-block .ui-widget-header .ui-state-active{
    background: url("images/ui-bg_glass_50_3baae3_1x400.png") repeat-x scroll 50% 50% #ffffff;
}
@media screen and (max-width: 1023px){
    .interior-page.ltc .left-col .cta .blue-button {
        width: 50%;
    }
    .interior-page.ltc .content .alignright {
        margin: 20px 0;
        width: 100%;
    }
}
@media screen and (max-width: 767px){
    .interior-page .early-college-option .option-table{
        display: none;
    }
    .interior-page .early-college-option .option-table-mobile{
        display: block;
    }
    .interior-page .early-college-option .option-table-mobile ul{
        width: 100%;
        margin: 0;
        padding:10px 0;
        border-bottom: 1px solid #454545;
    }
    .interior-page.ltc .early-college-option .option-table-mobile li:before{
        display: none;
    }
    .interior-page .early-college-option .option-table-mobile li{
        margin: 0;
    }
    .interior-page.ltc .cmp_buttons_container {
        margin-bottom: 40px;
    }
}
@media screen and (max-width: 480px){
    .interior-page.ltc .left-col .cta .blue-button {
        width: 80%;
    }
    .interior-page .courses-table .left {
        margin-right: 0;
        width: 100%;
        margin-bottom: 20px;
    }
    .interior-page .courses-table .right {
        width: 100%;
    }
}
/*  ==========================================================================
     6. WYSIWYG Core Styles
    ==========================================================================  */

.entry h1 {
    margin-top: 1.67em;
    margin-bottom: .5em;
    font-size: 2em;
}
.entry h2 {
    margin: 1.2em 0 .4em;
    font-size: 1.5em;
}
.entry h1 + h2 {
    margin-top: -.5em;
}
.entry h3 {
    margin: 1.8em 0 .4em;
    font-size: 1.25em;
}
.entry h2 + h3 {
    margin-top: -.4em;
    margin-bottom: .2em;
}
.entry h4 {
    margin: 1.8em 0 .4em;
    font-size: 1em;
}
.entry h3 + h4 {
    margin-top: -.3em;
}
.entry h5 {
    margin: 1.8em 0 .4em;
    font-size: 1em;
}
.entry h4 + h5 {
    margin-top: -.3em;
}
.entry h6 {
    margin: 1.8em 0 .4em;
    font-size: 1em;
}
.entry h5 + h6 {
    margin-top: -.2em;
}
.entry h1:first-child
.entry h2:first-child
.entry h3:first-child
.entry h4:first-child
.entry h5:first-child
.entry h6:first-child {
    margin-top: 0;
}
.entry p,
.entry pre {
    margin: 1em 0 0;
}
.entry p {
    word-wrap: break-word;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
}
.entry p:first-child {
    margin-top: 0;
}
.entry blockquote {
    margin: 1em 2.5em;
    font-style: italic;
}
.entry blockquote p:before {
     content: "\201C";
     display: inline-block;
     padding-right: .1em;
}
.entry blockquote p:after {
     content: "\201D";
     display: inline-block;
}
.entry hr {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    clear: both;
    height: 1px;
    padding: 0;
    border: 0;
    border-top: 1px solid #ccc;
}
.entry code,
.entry pre {
    font-family: monospace;
    font-size: 1em;
}
.entry pre {
    white-space: pre;
    white-space: pre-wrap;
    word-wrap: break-word;
}
.entry sub,
.entry sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}
.entry sup {
    top: -0.5em;
}
.entry sub {
    bottom: -0.25em;
}
.entry ul,
.entry ol {
    margin: 1em 0;
}
.entry ul,
.entry ol {
    padding: 0 0 0 2.5em;
}
.entry ul {
    list-style-type: disc;
}
.entry ul ul {
    list-style-type: circle;
}
.entry ul ul ul {
    list-style-type: square;
}
.entry ol {
    list-style-type: decimal;
}
.entry li {
    font-size: 1em;
}
.entry table {
    margin: 0;
    padding: 0;
}
.entry table th,
.entry table td {
    padding: .625em 1.25em;
    border-bottom: 1px solid #ccc;
    text-align: left;
}
.entry table th {
    border-width: 2px;
}
.entry table tr:last-child td {
    border-bottom: none;
}
.entry table tr:nth-child(even) {
    background: #eee;
}
.entry .alignnone {
    margin: 1em 1em 1em 0;
}
.entry .aligncenter {
    display: block;
    margin: .5em auto;
}
.entry .alignright {
    float: right;
    margin: 0 0 1em 1em;
}
.entry .alignleft {
    float: left;
    margin: 0 1em 1em 0;
}
.entry .aligncenter {
    display: block;
    margin: 1em auto;
}
.entry img,
.entry img[class*="align"],
.entry img[class*="wp-image-"] {
    max-width: 100%;
    height: auto;
    border: none;
}
.entry img.alignright {
    margin: 1em 0 1em 1em;
}
.entry img.alignleft {
    margin: 1em 1em 1em 0;
}
.entry img.aligncenter{
    display: block;
    margin: 1em auto;
}
.entry .wp-caption {
    max-width: 96%;
    margin-bottom: 1em;
    margin-left: 0;
    text-align: center;
}
.entry .wp-caption img {
    display: block;
    margin: 0 auto;
}
.entry .wp-caption-text {
    position: relative;
    font-size: .8em;
}
.entry iframe {
    max-width: 100%;
}
@media only screen and (max-width: 30em) {

    .entry p,
    .entry li {
        font-size: .875em;
    }
}

/* END CSS ORIGINAL FILE */


.banner-wrapper .column1 {
width: 100%;
float: left;
margin: 50px 0 0;
color: #666666;
font-family: arial;
font-size: 16px;
line-height: 20px;
padding-bottom: 30px;
}
.banner-wrapper .column1 .billboard-learn-more {
float: none;
}
</style>

</head>
<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="logo">
                <a href="http://vlacs.org"><img src="http://vlacs.org/wp-content/uploads/2014/04/logo.png" alt="Home"></a>
            </div>

        </div>
        <div class="menu-wrapper mobile-hidden">
            <div class="container">
                            </div>
        </div>

        <div class="navigation desktop-hidden">
            <nav id="main-nav" class="main-nav">
                            </nav>
         </div>

    </header>       <div class="banner-wrapper">
        <div class="container">
            <div class="column1">
                <h1>Dear Mr. or Ms.<span> {$a->guardianlastname}</span></h1>

At the conclusion of each VLACS course, we send a survey to parents or guardians asking for
their opinion on a number of topics. The data we collect is used to help us improve our services
to students as well as to generate reports on the overall progress of the school. Survey
responses are reviewed by VLACS administrators and VLACS instructors, however, we do not
publish information that will identify you or your child.<br>
<br><strong>
Student name: {$a->studentfullname}</strong><br><strong>
Course title: {$a->coursefullname}</strong><br><br>
<a class="billboard-learn-more" href="{$a->surveyurl}" style="
    margin-bottom: 30px;
">Go to the Survey</a>

<br>
<br>
<br>
If you have any questions about this survey please call us at 603-778-2500 or send an email to
<a target="_blank" href="mailto:info@vlacs.org">info@vlacs.org</a>.<br>
<br>
Thank you for allowing us to work with your son or daughter and for taking the time to complete this survey.<br>
<br>
Sincerely,<br>
The Virtual Learning Academy Team

<br>
<br>
<br>
<br>
            </div>

        </div>
    </div>


    <div class="container">

    </div>
</div>

</body></html>';