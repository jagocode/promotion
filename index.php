
<?php get_header();?>
   <!-- Promotion List -->
     <div class="promotion-category-mobile">
         <div class="container">
             <div class="category-mobile">
                 Pilih Tipe Promosi
                 <span class="down-menu">
                     <img src="<?php images('caret-down.png');?>" width="10"></img>
                 </span>
                 <ul class="category-mobile-list">
                     <li><a href="">Semua</a></li>
                     <li><a href="">Marketplace</a></li>
                     <li><a href="">Tiket Kereta</a></li>
                     <li><a href="">Pulsa</a></li>
                 </ul>
             </div>
         </div>
               
           </div>
   <div class="promotion-list">
       
       <div class="container">
          
         
           <div class="promotion-category-list">
               <div class="row">
                   <div class="col-md-4 col-sm-6">
                       <p><strong>Pilih Tipe Promosi</strong></p>
                   </div>
                   <div class="col-md-8 col-sm-6">
                       <div class="pull-right promotion-menu">
                           <span class="icon-caret"></span>
                           <ul class="promotion-group">
                                <li>
                               <a href="">Semua</a>
                           </li>
                           <li>
                               <a href="">Marketplace</a>
                           </li>
                           <li>
                               <a href="">Pulsa</a>
                           </li>
                           <li>
                               <a href="">Tiket Kereta</a>
                           </li>
                       </ul>
                       </div>
                       
                   </div>
               </div>
           </div>
      
           <div class="row">
               <?php if(have_posts()):while(have_posts()):the_post();?>
               <div class="col-md-4 col-sm-6">
                    <a href="<?php print_meta('linkpromo')?>">
               <div class="promotion-box">
                       <div class="promotion-image">
                           <img src="<?php echo feature_img_url($post->ID,'full');?>" class="img-responsive"></img>
                       </div>
                       <div class="promotion-description">
                           <h3><?php the_title();?></h3>
                           <?php the_excerpt();?>
                          
                           <div class="promotion-code">
                              
                               
                               CEK SEKARANG
                           </div>
                       </div>
                   </div>
               
               
           </a>
                   
               </div>
               
               <?php endwhile;endif;?>
               
              
               
               
           </div>
       </div>
   </div>
   <!-- End Promotion List -->
<?php get_footer();?>