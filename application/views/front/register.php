<!-- breadcrumb start -->
<div class="breadcrumb">
            <div class="container">
                <ul class="list-unstyled d-flex align-items-center m-0">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li>
                        <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path
                                    d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                    fill="#000" />
                            </g>
                        </svg>
                    </li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            <div class="login-page mt-100">
                <div class="container">
                    <form action="<?php echo base_url('home/register') ;?>" method="post" class="login-form common-form mx-auto">
                        <div class="section-header mb-3">
                            <h2 class="section-heading text-center">Register</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Username</label>
                                    <input type="text" name="username" value="<?php echo set_value('username'); ?>">
                                </fieldset>
                                <span class="text-danger">
                                    <?php echo form_error('username'); ?>
                                </span>
                            </div>
                           
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Email address</label>
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>">
                                </fieldset>
                                <span class="text-danger">
                                <?php echo form_error('email'); ?>
                                </span>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Password</label>
                                    <input type="password" name="password">
                                </fieldset>
                                <span class="text-danger">
                                <?php echo form_error('password'); ?>
                                </span>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn-primary d-block mt-3 btn-signin">CREATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </main>