 <main class="contact">
        <div class="contact-header">
            <div class="container">
                <h1>Contact</h1>
            </div>
        </div>
        <div class="main-contact clearfix">
            <div class="col-8 contact-form">
                <h3>Just say hi!</h3>
                <p>Tell us more about you and we’ll contact you soon :)</p>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success" role="alert">
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
            <?php endif; ?>

                 <?php echo form_open_multipart(base_url('contact/savecontact'), 'class="form_create"'); ?>
                    <div class="clearfix wrap">
                        <div class="input-container col-6">
                            <input type="text" id="input-name" class="input-text" name="name">
                            <label for="input-name" unselectable="on">Name</label>
                            <rome class="validation-form" for="name"></rome>
                            
                        </div>

                        <div class="input-container col-6">
                            <input type="text" id="input-first" class="input-text" name="fname">
                            <label for="input-first" unselectable="on">First Name</label>
                            <rome class="validation-form" for="fname"></rome>
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
                        <div class="input-container no-pad-r col-10">
                            <input type="text" id="input-msg" class="input-text" name="message">
                            <label for="input-msg" unselectable="on">Message</label>
                            <rome class="validation-form" for="message"></rome>
                        </div>
                        <div class="input-container no-pad col-2">
                            <button type="submit" class="button-submit" id="btnloading">Submit</button>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
            <div class="col-4 contact-information">
                <h3>Contact Information</h3>
                <p>Cyber 2 Tower Lt.12<br>Jl. HR. Rasuna Said No.13<br>Kuningan - Jakarta</p>
                <p>Call us: +62 8888 4000<br>We are open from Monday - Friday<br>9:00 AM - 6:00 PM</p>
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
