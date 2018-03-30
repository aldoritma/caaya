<main class="insta-sampling" id="contact">
        <div class="section-header insta-header">
            <h1><span class="sp-1">suguhan</span>#RasaTeh <span class="sp-2">yangSebenarnya</span></h1>
        </div>
        <div class="main-contact">
            <div class="insta-form">
                <div class="header-title">
                    <p>Semakin dekat untuk menikmati <b>rasa teh yang sebenarnya.</b><br>Submit data Anda sekarang.</p>
                </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success" role="alert">
            <strong><center><?php echo $this->session->flashdata('success'); ?></center></strong>
            </div>
            <?php endif; ?>

            <div class="alert alert-danger" role="alert">
            <strong><center> <span class="erroractivity" for="errorform"></span></center></strong>
            </div>
          
                <?php echo form_open_multipart(base_url('activity/saveactivity'), 'class="form_activity"'); ?>
                    <div class="input-container">

                        <input type="text" id="input-name" name="name" class="input-text">
                        <label for="input-name" unselectable="on">Nama</label>
                    </div>
                  
                    <div class="input-container">
                        <input type="text" id="input-number" name="phone" class="input-text">
                        <label for="input-number" unselectable="on">Phone number</label>
                    </div>
                     
                    <div class="input-container">
                        <input type="email" id="input-email" name="email" class="input-text">
                        <label for="input-email" unselectable="on">Email</label>
                    </div>
                    <div class="input-container">
                        <input type="text" id="input-alamat" name="address" class="input-text">
                        <label for="input-alamat" unselectable="on">Alamat</label>
                    </div>
                    <div class="d-block">
                        <button type="submit" id="btnloading" class="button-submit">Kirim</button>
                    </div>

              <?php echo form_close();?>
            </div>
        </div>
    </main>