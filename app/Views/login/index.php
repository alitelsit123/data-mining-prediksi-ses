<div id="content-wrapper">

  <div class="container-above-header">

  </div>

  <div class="blocks-container">

    <!-- BLOCK "TYPE 18" -->
    <div class="block">
      <div class="container">
        <div class="row">

          <div class="col-md-6 col-md-offset-3 wow fadeInUp">
            <div class="form-block">
              <img class="img-circle form-icon" src="<?php echo base_url('front/img/icon-118.png'); ?>" alt="" />

              <div class="form-wrapper">
                <div class="row">
                  <div class="block-header">
                    <h2 class="title">Login Admin</h2>
                    <div class="text">Login sebagai admin untuk masuk ke dashboard.</div>
                  </div>
                </div>

                <?php
                echo form_open('login/cek_login');
                ?>

                <form>
                  <?php
                  if (!empty(session()->getFlashdata('gagal'))) { ?>

                    <div class="alert alert-warning">
                      <?php echo session()->getFlashdata('gagal'); ?>
                    </div>

                  <?php }
                  ?>

                  <div class="field-entry">
                    <label for="username">Your Username</label>
                    <input type="text" name="username" id="username" required />
                  </div>
                  <div class="field-entry">
                    <label for="password">Your Password </label>
                    <input type="password" name="password" id="password" required />
                  </div>
                  <!-- <a class="simple-link" href="#"><span class="glyphicon glyphicon-chevron-right"></span>Forgot Password?</a><br/>
                                        <a class="simple-link" href="#"><span class="glyphicon glyphicon-chevron-right"></span>Register Now</a><br/> -->

                  <div class="button col-mt-5">Login<input type="submit" value="" /></div>
                </form>
                <?php
                echo form_close() ?>


              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


  </div>

</div>