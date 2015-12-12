@extends('app')

@section('content')
                
        <div style="position: relative;   background-color: #313132; left: 50%; width: 5000px;  text-align: center; margin-left: -2500px;">
            <!-- Jssor Slider Begin -->
            <div  id="slider1_container" style="position: relative; margin: 0 auto; 
                top: 0px; left: 0px; width: 980px; height: 400px;  background: url(../img/header-app/main_bg.jpg) top center no-repeat;">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- Slides Container -->

                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px;
                    height: 300px; overflow: hidden;">

                    <div>
                      
                        <div style="position: absolute; width: 480px; height: 200px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">CORFOGA</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                               Contribuir a la maximización de la rentabilidad económica, social y ambiental de la cadena cárnica bovina de Costa Rica en forma sostenible.
                            </span>
                            <br />
                           
                            <br />
                            <br />
                            <!--

                            <a href="http://corfoga.org/">
                                <img src="../img/header-app/boton-ir.png" border="0" alt="auction slider" width="215"
                                     height="50" />
                            </a>
                        -->
                        </div>
                     <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" class="img-circle" src="../img/header-app/noticias-1.jpg" class="img-circle" />
                    </div>

                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">SENASA</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Salud Animal de Costa Rica
                            </span>
                            <br />
                            <br />
                            <!--
                            <a href="http://www.senasa.go.cr/senasa/sitio/">
                                <img src="../img/header-app/Senasa.png" border="0" alt="ebay slideshow" width="215"
                                     height="50" />
                            </a>
                        -->
                        </div>
                        <img src="../img/header-app/Senasa.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg"  class="img-circle" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Online marketing</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                We enhance your brand, your website traffic and your bottom line online.
                            </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/header-app/find-out-more-bt.png" border="0" alt="listing slider" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">web hosting</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                we offer the web's best hosting plans for every site.
                            </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/header-app/find-out-more-bt.png" border="0" alt="ebay store slider" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">domain name registration</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Secure your online identity and register your domain now.
                            </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/header-app/find-out-more-bt.png" border="0" alt="listing template slider"
                                     width="215" height="50" />
                            </a>
                        </div>
                        <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">video production</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Make a greater impact on your clients through interactive Video Production.
                            </span>
                            <br />
                            <br />
                            <a href="http://www.jssor.com">
                                <img src="../img/header-app/find-out-more-bt.png" border="0" alt="auction template slider"
                                     width="215" height="50" />
                            </a>
                        </div>
                        <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">mobile applications</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Stay connected to your customers on the go with a header-appMedia custom mobile app.
                                <br />
                                <br />
                                <a href="http://www.jssor.com">
                                    <img src="../img/header-app/find-out-more-bt.png" border="0" alt="ebay slider" width="215"
                                         height="50" />
                                </a>
                        </div>
                        <img src="../img/header-app/noticias-1.jpg" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/header-app/noticias-1.jpg" />
                    </div>
                </div>
                
               
                <style>
                    /* jssor slider arrow navigator skin 07 css */
                    /*
                    .jssora07l                  (normal)
                    .jssora07r                  (normal)
                    .jssora07l:hover            (normal mouseover)
                    .jssora07r:hover            (normal mouseover)
                    .jssora07l.jssora07ldn      (mousedown)
                    .jssora07r.jssora07rdn      (mousedown)
                    */
                    .jssora07l, .jssora07r {
                        display: block;
                        position: absolute;
                        /* size of arrow element */
                        width: 50px;
                        height: 50px;
                        cursor: pointer;
                        background: url(../img/a07.png) no-repeat;
                        overflow: hidden;
                    }
                    .jssora07l { background-position: -5px -35px; }
                    .jssora07r { background-position: -65px -35px; }
                    .jssora07l:hover { background-position: -125px -35px; }
                    .jssora07r:hover { background-position: -185px -35px; }
                    .jssora07l.jssora07ldn { background-position: -245px -35px; }
                    .jssora07r.jssora07rdn { background-position: -305px -35px; }
                </style>
                <!-- Arrow Left -->
                <span u="arrowleft" class="jssora07l" style="top: 123px; left: 8px;">
                </span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora07r" style="top: 123px; right: 8px;">
                </span>
                <!--#endregion Arrow Navigator Skin End -->
                
            <!--#region Thumbnail Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-jquery.html -->
            
            <!-- thumbnail navigator container -->
            <div u="thumbnavigator" class="jssort04" style="right: 0px; bottom: 0px;">
                <!-- Thumbnail Item Skin Begin -->
                <div u="slides" style="bottom: 25px; right: 30px; cursor: default;">
                    <div u="prototype" class="p">
                        <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                        <div class=c></div>
                    </div>
                </div>
                <!-- Thumbnail Item Skin End -->
            </div>
            <!--#endregion Thumbnail Navigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
            </div>
            <!-- Jssor Slider End -->
        </div>
    </div>
    <!--

	<div class="navbar-left nav navbar-nav" >
		<div class="container-fluid">

			<ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 300px;">		
   					 		<li class="active"><a href="#"><span class="glyphicon glyphicon-off"></span>  Overview</a></li>
    				  		<li><a href="./animal/create"><span class="glyphicon glyphicon-user"></span>  Profile</a></li>
   							<li><a href="#"><span class="glyphicon glyphicon-lock"></span>  Access</a></li>
						    <li><a href=""><span class="glyphicon glyphicon-envelope"></span>  Message</a></li>
						    <li><a href="#"><span class="glyphicon glyphicon-list"></span>  Schedule</a></li>
						    <li><a href="#"><span class="glyphicon glyphicon-signal"></span>  Statistics</a></li>
						    <li><a href="#"><span class="glyphicon glyphicon-comment"></span>  Chat</a></li>
						    <li><a href="#"><span class="glyphicon glyphicon-earphone"></span>  Contacts</a></li>
			</ul>
		</div>
	</div>

-->


@endsection
