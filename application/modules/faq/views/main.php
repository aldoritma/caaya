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
<<<<<<< HEAD
                            <?php  if($listfaq):
                            $no=1; foreach ($listfaq as $key => $listfaq): ?>
                            <a class="nav-tab" href="#tab<?php echo $no++;?>"><?php echo $listfaq['title'];?></a>
                            <?php endforeach;?>
                            <?php endif;?>
=======
                            <a class="nav-tab" href="#tab1">Keterangan Umum</a>
                            <a class="nav-tab" href="#tab2">Kualitas, Keamanan<br>& Rasa Produk</a>
                            <!-- <a class="nav-tab" href="#tab3">Kemasan</a> -->
>>>>>>> fe750cbfef97bfc9b14ee9b0b03d19a4bf67f474
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
<<<<<<< HEAD
                        <?php endforeach;?>
                            <?php endif;?>
=======
                        <div class="tab-content" id="tab2"><div class="accordion">
                            <ul>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h2>Adakah anjuran khusus saat menikmati Caaya?</h2>
                                    <p>Caaya lebih menyegarkan jika disajikan setelah disimpan di dalam pendingin. Segera habiskan ketika botol sudah dibuka karena Caaya tidak mengandung bahan pengawet.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h2>Jika saya menemukan perbedaan warna teh kemasan Caaya antara satu dan yang lainnya, apakah tetap layak dikonsumsi?</h2>
                                    <p>
                                      Caaya tidak menggunakan pewarna tambahan, sehingga warna produknya berasal dari hasil seduhan daun teh.
                                      Perubahan warna pada teh kemasan menjadi lebih gelap seiring berjalannya waktu adalah hal yang umum terjadi karena itu adalah sifat alami teh yang disimpan dalam jangka waktu tertentu. Selama produk Caaya masih belum mencapai tanggal kadaluarsa dan dalam kemasan yang masih tertutup rapat, produk tersebut masih aman dikonsumsi.
                                      Namun, jika Anda menemukan warna teh yang keruh, kami menghimbau untuk menghubungi AQUA menyapa agar bisa kami investigasi lebih lanjut
                                    </p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h2>Apakah produk Caaya telah mendapatkan sertifikasi halal?</h2>
                                    <p>Caaya adalah minuman teh dalam kemasan yang telah tersertifikasi halal oleh LPPOM MUI dengan nomor 00120016900801.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h2>Apakah Caaya menggunakan pemanis buatan?</h2>
                                    <p>Produk Caaya tidak menggunakan pemanis buatan. Selain menggunakan gula, Caaya juga menggunakan Stevia, yang merupakan pemanis alami yang telah digunakan selama ratusan tahun.</p>
                                </li>
                                <li>
                                    <input type="checkbox" checked>
                                    <i></i>
                                    <h2>Apakah Caaya menggunakan bahan pengawet?</h2>
                                    <p>Caaya tidak menggunakan bahan pengawet. Kami menggunakan teknologi aseptik yang memungkinkan formulasi tanpa pengawet. Kami menjamin kualitas Caaya selama kemasan tetap dalam kondisi tertutup rapat, dan dikonsumsi sebelum tanggal kedaluwarsa.</p>
                                </li>

                            </ul>
                        </div></div>
                        <!-- <div class="tab-content" id="tab3">
                            <p>Kemasan Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda porro obcaecati id molestias doloribus praesentium expedita voluptatibus harum tempore nesciunt!</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis natus, accusantium error exercitationem placeat doloremque est, repudiandae inventore deleniti temporibus quibusdam laboriosam veniam. Laboriosam necessitatibus maxime vel distinctio earum autem, odio pariatur facilis labore quidem assumenda, suscipit perferendis sit repudiandae nihil, officia tempora nesciunt. Odio inventore obcaecati autem culpa earum!</p>
                        </div> -->
>>>>>>> fe750cbfef97bfc9b14ee9b0b03d19a4bf67f474
                    </div>
                </div>
            </div>
        </div>
    </main>
