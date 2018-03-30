<main id="home">
      <div class="leaf">
        <img src="<?php echo base_url('assets/img/leaf.png');?>" alt="">
      </div>
      <div class="leaf-big">
        <img src="<?php echo base_url('assets/img/leaf2.png');?>" alt="">
      </div>
      <section class="hero-home aligner">
        <div class="btls">
          <div class="bottles">
            <span class="caustic"></span>
            <img class="b-red" src="<?php echo base_url('assets/img/bottle-red.png');?>" alt="">
            <img class="b-green" src="<?php echo base_url('assets/img/bottle-green.png');?>" alt="">
            <img class="b-blue" src="<?php echo base_url('assets/img/bottle-blue.png')?>" alt="">
          </div>
          <h1>Rasa Teh yang Sebenarnya</h1>
          <ul class="list--none list-par">
            <li class="linkscroll" data-link="revive">revive me</li>
            <li class="linkscroll" data-link="soothe">soothe me</li>
            <li class="linkscroll" data-link="power">power me</li>
          </ul>
        </div>
      </section>
      <section class="jasmine" id="revive">
        <div class="section-hero hero-jasmine divide">
          <div class="bg-par" id="bg-par1-p"><img src="<?php echo base_url('assets/img/bg1.jpg');?>" alt=""></div>
          <div class="jasmine-copy">
            <h4 id="copy-1">revive me</h4>
            <h2 id="copy-2">Jasmine</h2>
          </div>
          <div class="bottle-wrapper">
            <img class="img-bot" id="img-bot-green-p" src="<?php echo base_url('assets/img/bot1.png');?>" alt="">
          </div>
        </div>
        <div class="main-content content-jasmine">
          <div class="container clearfix">
            <div class="bottle-wrapper">
              <img class="img-jas" id="img-jas-p2" src="<?php echo base_url('assets/img/jasmine.png');?>" alt="">
              <img class="img-bot" id="img-bot-p-1" src="<?php echo base_url('assets/img/bottle-green.png');?>" alt="">
            </div>
            <div class="product-desc" id="prod-desc-p1">
              <h5 class="stag"><?php echo stripslashes(html_entity_decode($homethree['title'])); ?></h5>
              <h3 class="stag"><?php echo stripslashes(html_entity_decode($homethree['subtitle'])); ?></h3>
              <h3 class="stag"><?php echo stripslashes(html_entity_decode($homethree['subtitle2'])); ?></h3>
              <div class="copy-desc" id="copy-desc-p-1">
                <span></span>
                <?php echo stripslashes(html_entity_decode($homethree['description'])); ?>
              </div>
            </div>

          </div>
        </div>
      </section>
      <section class="vanilla" id="soothe">
        <div class="section-hero hero-vanilla divide">
          <div class="bg-par" id="bg-par2-p">
            <img src="<?php echo base_url('assets/img/bg2.jpg');?>" alt="">
          </div>
          <div class="vanilla-copy">
            <h4>soothe me</h4>
            <h2 class="cp-vanila">vanilla</h2>
            <h2 class="cp-pandan">pandan</h2>
          </div>
          <div class="bottle-wrapper">
            <img class="img-bot" id="img-bot-blue-p" src="<?php echo base_url('assets/img/bot2.png');?>" alt="">
          </div>
        </div>
        <div class="main-content content-vanilla">
          <div class="container clearfix">
            <div class="bottle-wrapper">
              <img class="img-pandan" id="img-pan-p2" src="<?php echo base_url('assets/img/pandan.png');?>" alt="">
              <img class="img-bot" id="img-bot-p-2" src="<?php echo base_url('assets/img/bottle-blue.png');?>" alt="">
              <img class="img-vanilla" id="img-van-p2" src="<?php echo base_url('assets/img/pandan-stick.png');?>" alt="">
            </div>
            <div class="product-desc" id="prod-desc-p2">
              <h5 class="stag2"><?php echo stripslashes(html_entity_decode($hometwo['title'])); ?></h5>
              <h3 class="stag2"><?php echo stripslashes(html_entity_decode($hometwo['subtitle'])); ?></h3>
              <h3 class="stag2"><?php echo stripslashes(html_entity_decode($hometwo['subtitle2'])); ?></h3>
              <div class="copy-desc" id="copy-desc-p-2">
                <span></span>
                <?php echo stripslashes(html_entity_decode($homethree['description'])); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="rice" id="power">
        <div class="section-hero hero-rice divide">
          <div class="bg-par" id="bg-par3-p">
            <img src="<?php echo base_url('assets/img/bg3.jpg');?>" alt="">
          </div>
          <div class="rice-copy">
            <h4 id="cp-rice-1">power me</h4>
            <h2 id="cp-rice-2">toasted</h2>
            <h2 id="cp-rice-3" class="cp-rice">rice</h2>
          </div>
          <div class="bottle-wrapper">
            <img class="img-bot" id="img-rice-bot" src="<?php echo base_url('assets/img/bot3.png');?>" alt="">
          </div>
        </div>
        <div class="main-content content-rice">
          <div class="container clearfix">
            <div class="bottle-wrapper">
              <img class="img-rice-big" id="img-rice-b-p" src="<?php echo base_url('assets/img/rice-big.png');?>" alt="">
              <img class="img-bot" id="img-bot-red-p" src="<?php echo base_url('assets/img/bottle-red.png');?>" alt="">
            </div>
            <div class="product-desc">
            <h5 class="stag3">
            <?php
              $text = stripslashes(html_entity_decode($homeone['title']));
              $titleone = wordwrap($text, 32, "<br />\n");
              echo $titleone;?></h5>
              <h3 class="stag3"><?php echo stripslashes(html_entity_decode($homeone['subtitle'])); ?></h3>
              <h3 class="stag3"><?php echo stripslashes(html_entity_decode($homeone['subtitle2'])); ?></h3>
              <div class="copy-desc" id="copy-desc-p-3">
                <span></span>
                <?php echo stripslashes(html_entity_decode($homeone['description'])); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>