<?php defined('BASEPATH') or die("No Access Allowed");?>

<h2 class="index-header">Selamat Datang di Website Voting <br />SMKN 1 SAYUNG</h2>
<div class="row">
   <div class="large-4 large-offset-1 medium-4 columns">
      <div id="content-slider">
         <img src="./assets/img/logo1.png" class="img" alt="Slideshow 1" >
         <img src="./assets/img/osis.png" class="img" alt="Slideshow 2" >
      </div>
   </div>
   <div class="large-6 medium-6 columns form">
      <span class="info-login">Silahkan Login untuk dapat melakukan pemilihan</span>
      <br />
      <br />
      <form action="" method="post">
         <label>Masukkan NIS :</label>
         <br />
         <input type="number" placeholder="NIS" required="NIS" name="nis"/>
         <br />
         <div class="row">
            <div class="text-right" style="padding-right:15px;">
               <input type="submit" name="submit" class="button alert large" value="Login">
            </div>
         </div>
      </form>
   </div>
</div>
