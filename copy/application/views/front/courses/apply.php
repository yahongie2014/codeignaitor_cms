<section id="directions">
    <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
          </div>
        </div>
    </div>
</section>

<section id="main_content" >
<div class="container">
<div class="row">
    <div class="col-md-8">
        <div class=" box_style_2">
            <span class="tape"></span>
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo lang('register'); ?></h3>
                </div>
            </div>
            <div id="message-contact"><?php $msg = $this->session->flashdata('msg'); if(!empty($msg)) echo $msg; ?></div>
            <form method="post" action="<?php echo base_url().'courses/apply/'.$courseId.'/'.$groupId;?>" id="contactform">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control style_2"  id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="<?php echo lang('Name'); ?>"/>
                            <?php echo form_error('name'); ?>
                            <span class="input-icon"><i class="icon-user"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control style_2"  id="phone" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="<?php echo lang('Phone'); ?>"/>
                            <?php echo form_error('phone'); ?>
                            <span class="input-icon"><i class="icon-phone"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="email" class="form-control style_2" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="<?php echo lang('Email'); ?>"/>
                            <?php echo form_error('email'); ?>
                            <span class="input-icon"><i class="icon-email"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control style_2" name="college_work" id="college_work" value="<?php echo set_value('college_work'); ?>" placeholder="<?php echo lang('college_work'); ?>"/>
                            <?php echo form_error('college_work'); ?>
                            <span class="input-icon"><i class=""></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="referralId" class="form-control style_2" name="referralId" id="referralId" value="<?php echo set_value('referralId'); ?>" placeholder="<?php echo lang('referralCode'); ?>"/>
                            <?php echo form_error('referralId'); ?>
                            <span class="input-icon"><i class="icon-user"></i></span>
                        </div>
                    </div>

                </div>
                <?php if (!empty($type) && $type == 'language') {   ?>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" id="placementTest" name="placementTest">
                                    <?php echo lang('placementTestText'); ?>
                                </label>
                            </div>
                            <?php echo form_error('placementTest'); ?>
                        </div>
                    </div>

                </div>
                <?php } //if type ?>

                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo lang('register'); ?>" class=" button_medium" id="submit-contact"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>