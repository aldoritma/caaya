<main class="about">
      <div class="about-hero">
        <div class="container">
          <div class="about-hero-d">
            <h1>How We Crafted It</h1>
            <div class="desc">
              <div class="line"></div>
              <p>Terinspirasi dari dua hal yang paling membanggakan<br>bagi Indonesia yaitu kekayaan budaya & kekayaan<br>alam nusantara, Caaya
              mengajak Anda untuk<br>menemukan kembali rasa teh yang sebenarnya</p>
            </div>
          </div>
        </div>
      </div>

      <?php  if($listabout):
      $no=0; $rome=2;foreach ($listabout as $key => $listabout): ?>
      <div class="about-detail" id="about-slider<?php if($no++ == "0") { echo ""; } else {echo $rome++;}?>">
        <div class="container about-detail-wrapper">
          <figure class="detail-img aligner">
            <img src="<?php echo base_url('assets/about/original_'.$listabout['img']);?>" alt="">
          </figure>
          <div class="about-desc">
            <div class="wrap-desc">
              <h3>
              <?php $replace_p = array("<p>", "</p>");
              $showdata = str_replace($replace_p, "", $listabout['title']);  
              echo stripslashes(html_entity_decode($showdata)); ?>
              </h3>
              <div class="will-hide">
                <p><?php echo stripslashes(html_entity_decode($listabout['description'])); ?></p>
                <button class="button-green hide-parent"><?php echo stripslashes(html_entity_decode($listabout['button'])); ?>
                  <i class="demo-icon icon-angle-right"></i>
                </button>
              </div>
              <div class="slider-wrapper will-show">
                <div class="slider-container">
                  <?php if ($listabout['id']): ?>
                      <?php foreach ($listabout['id'] as $key => $listabout): ?>
                        <div class="slider-item">
                          <p>
                            <?php echo $listabout['description']; ?>
                        </p>
                        </div>
                      <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?> 

                </div>
                <div class="slider-nav">
                  <span class="arrow arrow-prev"><i class="demo-icon icon-angle-left"></i></span>
                  <div class="dots"></div>
                  <span class="arrow arrow-next"><i class="demo-icon icon-angle-right"></i></span>
                </div>
                <button class="button-green hide-parent"><i class="demo-icon icon-angle-left"></i>Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php  endforeach;endif;?>
    </main>
