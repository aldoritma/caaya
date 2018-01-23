 <main class="contact" id="contact">
        <div class="section-header contact-header">
            <h1>Contact</h1>
        </div>
        <div class="main-contact clearfix">
            <div class="col-8 contact-form">
                <div class="header-title">
                    <h3>Form Pertanyaan</h3>
                    <p>Isi data diri dan pertanyaan Anda pada form di bawah ini.</p>

                     <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success" role="alert">
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
            <?php endif; ?>
                </div>
                <?php echo form_open_multipart(base_url('contact/savecontact'), 'class="form_create"'); ?>

                    <div class="clearfix wrap">
                        <div class="input-container col-6">
                            <input type="text" id="input-name" class="input-text" name="name">
                            <label for="input-name" unselectable="on">Nama</label>
                            <rome class="validation-form" for="name"></rome>
                        </div>
                        <div class="input-container col-6">
                            <input type="text" id="input-first" class="input-text" name="ponsel">
                            <label for="input-first" unselectable="on">Telephone</label>
                            <rome class="validation-form" for="ponsel"></rome>
                        </div>
                    </div>
                    <div class="clearfix wrap">
                        <div class="input-container col-6">
                            <input type="email" id="input-email" class="input-text" name="email">
                            <label for="input-email" unselectable="on">Email</label>
                             <rome class="validation-form" for="email"></rome>
                        </div>
                        <div class="input-container col-6">
                            <input type="text" id="input-phone" class="input-text" name="phone">
                            <label for="input-phone" unselectable="on">Phone Number</label>
                             <rome class="validation-form" for="phone"></rome>
                        </div>
                    </div>
                    <div class="clearfix wrap">
                        <div class="input-container container-select col-6">
                            <span>Kategori</span>
                            <div class="select">
                                <select id="slct" name="category">
                                    <option>Choose an option</option>
                                    <option value="Pure CSS">Pure CSS</option>
                                    <option value="No JS">No JS</option>
                                    <option value="Nice!">Nice!</option>
                                </select>
                            </div>
                            <rome class="validation-form" for="category"></rome>
                        </div>
                        <div class="input-container no-pad-r col-6">
                            <input type="text" id="input-alamat" class="input-text" name="address">
                            <label for="input-alamat" unselectable="on">Alamat</label>
                             <rome class="validation-form" for="address"></rome>
                        </div>
                    </div>
                    <div class="clearfix wrap">
                        <div class="input-container col-12">
                            <textarea id="input-message " class="textarea input-text" name="message"></textarea>
                            <label for="input-message" unselectable="on" id="lbl-msg">Message</label>
                            <rome class="validation-form" for="message"></rome>
                        </div>
                    </div>
                    <div class="clearfix wrap sp-mbl">
                        <div class="captcha">
                            <div class="input-container col-2">
                                <span>Captcha</span>
                            </div>
                            <div class="captcha-input input-container col-3">
                                <input type="text" id="mainCaptcha" name="mycaptcha" disabled/>
                                <input type="button" id="refresh" value="Click to change" />
                                <button type="submit" id="submit-btn" class="button-submit">Kirim</button>
                            </div>
                            <div class="captcha-output input-container col-4">
                                <input type="text" id="captchaInput" class="input-text inline-block" name="validationcaptcha">
                                <label for="captchaInput" unselectable="on">Masukkan Captcha</label>
                                <div class="notif-captcha formcontent" style="display:none;">
                                    Awesome!
                                </div>
                                <div class="notif-captcha captache-error" style="display:none;">
                                    Wrong captcha, try Again
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
            <div class="col-4 contact-information">
                <h3>AQUA Menyapa</h3>
                <p>Call us: 0800-15-88888<br>We are open from Monday - Friday<br>9:00 AM - 6:00 PM</p>
                <div class="socmed">
                    <h3>Follow Us</h3>
                    <ul class="list--none">
                        <li>
                            <a href="#">
                                <img src="<?php echo base_url('assets/img/ic-fb.png');?>" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo base_url('assets/img/ic-twitter.png');?>" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo base_url('assets/img/ic-linkdin.png');?>" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
