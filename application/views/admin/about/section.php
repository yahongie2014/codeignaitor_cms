<div class="row">
    <div class="col-lg-12">
      <section class="panel">
       <!-- Form Start -->
       <div class="form">

          <!-- tabbed header -->

          <header class="panel-heading tab-bg-dark-navy-blue tab-right ">

            <ul class="nav nav-tabs pull-right">

              <li class="active">

                <a data-toggle="tab" href="#home-36">

                 <?php echo lang( 'arabic' ); ?>

               </a>

             </li>

             <li class="">

              <a data-toggle="tab" href="#about-36">

                <?php echo lang( 'german' ); ?>

              </a>

            </li>

          </ul>
        </header>

        <!-- tabbed content -->
        <div class="panel-body">

          <div class="tab-content">

            <!-- arabic -->

            <div id="home-36" class="tab-pane active">
                <h2>    <?php echo lang('section').'1'; ?></h2>
                <div class="form-group ">
                  <div class="col-lg-3">
                  <label  class="control-label"><?php echo lang( 'title' ); ?>   *</label>
                    <input class=" form-control" id="titleAR1" name="titleAR1" value="<?php echo !empty($titleAR1) ?  $titleAR1 : set_value('titleAR1');   ?>" type="text" />
                    <?php echo form_error('$titleAR1'); ?>
                  </div>
                  <div class="col-lg-3">
                    <label  class="control-label"><?php echo lang( 'caption' ); ?>   *</label>
                    <input class=" form-control" id="captionAR1" name="captionAR1" value="<?php echo !empty($captionAR1) ?  $captionAR1 : set_value('captionAR1');   ?>" type="text" />
                    <?php echo form_error('$captionAR1'); ?>
                  </div>
                </div>

                <!-- descAR1 -->
                <div class="form-group ">
                    <label  class="control-label col-lg-2"><?php echo lang( 'arabic_content' ); ?>  *</label>
                    <div class="col-lg-6">
                      <textarea class="form-control " id="descAR1" name="descAR1"> <?php if(!empty($descAR1)) { echo $descAR1; } else { echo set_value('descAR1'); } ?></textarea>
                    </div>
                    <div class="col-lg-4"><?php echo form_error('descAR1'); ?></div>
                </div>

            </div>

            <!-- german -->
            <div id="about-36" class="tab-pane">
                <h2>    <?php echo lang('section').'1'; ?></h2>
                <div class="form-group ">
                  <div class="col-lg-3">
                  <label  class="control-label"><?php echo lang( 'title' ); ?>   *</label>
                    <input class=" form-control" id="titleGE1" name="titleGE1" value="<?php echo !empty($titleGE1) ?  $titleGE1 : set_value('titleGE1');   ?>" type="text" />
                    <?php echo form_error('$titleGE1'); ?>
                  </div>
                  <div class="col-lg-3">
                    <label  class="control-label"><?php echo lang( 'caption' ); ?>   *</label>
                    <input class=" form-control" id="captionGE1" name="captionGE1" value="<?php echo !empty($captionGE1) ?  $captionGE1 : set_value('captionGE1');   ?>" type="text" />
                    <?php echo form_error('$captionGE1'); ?>
                  </div>
                </div>

                <!-- descGE1 -->
                <div class="form-group ">
                    <label  class="control-label col-lg-2"><?php echo lang( 'GEabic_content' ); ?>  *</label>
                    <div class="col-lg-6">
                      <textGEea class="form-control " id="descGE1" name="descGE1"> <?php if(!empty($descGE1)) { echo $descGE1; } else { echo set_value('descGE1'); } ?></textarea>
                    </div>
                    <div class="col-lg-4"><?php echo form_error('descGE1'); ?></div>
                </div>

            </div>

          </div>
          <br>

          </div>



      </div>
    </section>

  </div>

</div>