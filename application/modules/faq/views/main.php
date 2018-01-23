<main class="faq" id="faq">
        <div class="section-header faq-header">
            <h1>Q / A</h1>
        </div>
        <div class="main-faq">
            <div class="fluid-container">
                <div class="header-title">
                    <h3>Pertanyaan yang sering ditanyakan</h3>
                    <p>Cari jawaban dari pertanyaan anda disini.</p>
                </div>
                <div class="row tabs">
                    <div class="col-3">
                        <nav class="tabs-navigation">
                            <?php  if($listfaq):
                            $no=1; foreach ($listfaq as $key => $listfaq): ?>
                            <a class="nav-tab" href="#tab<?php echo $no++;?>"><?php echo $listfaq['title'];?></a>
                            <?php endforeach;?>
                            <?php endif;?>
                        </nav>
                    </div>
                    <div class="col-9">
                        <?php  if($listfaqdata):
                        $no=1; foreach ($listfaqdata as $key => $listfaqdata): ?>
                        <div class="tab-content" id="tab<?php echo $no++;?>">
                            <div class="accordion">
                                <ul>
                                 <?php if ($listfaqdata['catid']): ?>
                                 <?php foreach ($listfaqdata['catid'] as $key => $listfaqdata): ?>

                                    <li>
                                        <input type="checkbox" checked>
                                        <i></i>
                                        <h2><?php echo $listfaqdata['title'];?></h2>
                                        <p><?php echo stripslashes(html_entity_decode($listfaqdata['description'])); ?></p>
                                    </li>
                                      <?php endforeach; ?>
                                    <?php else: ?>
                                    <?php endif; ?> 
                                </ul>
                            </div>
                            <div class="more-help">Belum menemukan jawaban atas pertanyaan Anda? Silahkan <a href="#">hubungi kami</a></div>
                        </div>
                        <?php endforeach;?>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </main>
