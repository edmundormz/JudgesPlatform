<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <img src="/img/header.jpg" height="15%" width="100%">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.rawgit.com/resir014/Clear-Sans-Webfont/v1.1.1/css/clear-sans.css">
   </head>
   <!-- Start Section 0 -->
   <body   style="background-color:#F3F3F3;" >

<h1  align="center" style=" color:#003C71;font-size:40px; font-family:Clear Sans, sans-serif; " >Intel Talks</h1>

      <form   accept-charset="UTF-8" method="post" action="judmentPageTalk.php">
         <div class="section" style="background: #f3f3f3 !important;">
            <div class="container">
               <div class="col-6 col-md-4"  style="width:100%;overflow:auto;color:#003C71;">
                  <br>
                  <br>
                  <br>
                  <table style= "color:#003C71;font-size:large; font-family:Clear Sans, sans-serif;   width:100%;">
                     <tr>
                        <td>WWID</td>
                    
                     <td>Judge Name</td>
                      </tr>
                     <tr>
                        <td>  <input id="judge_id"  type="text" name="judge_id" value=""    style="color:#003C71; font-size:large;  width:90%;" required />

                        </td>
                        <td>  <input   type="text" name="judge_name" value="" style="color:#003C71; font-size:large;  width:90%;" required />
                        </td>

                     </tr>
                  </table>

                  <br>
                  <br>
                  
                <div class="col-6 col-md-4" style="width:100%;overflow:auto;color:#003C71; font-size:large; font-family: Intel Clear Bold;">
                     <div class="col-md-15 col-xs-3" >
                           <button id="image" type="submit"  width="120" height="30"  style="width:217px; height:78px; background-image:url('/img/submit.png');"  name="saveJud">

                     </div>
                   <!--    <input name="uploadedfile" type="file"  /> -->
                  </div>
               </div>
            </div>
         </div>



         <div class="section" style="background: #003C71!important;">
            <p style=" font-size:large; font-family: Intel Clear Bold;"> 
         </div>

      </form>
      <!-- End Section 0 --> 
   </body>
</html>
