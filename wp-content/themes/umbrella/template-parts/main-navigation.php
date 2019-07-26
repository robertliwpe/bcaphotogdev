<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <!-- START: Navbar -->
    <div class="nk-navbar" id="nk-navbar">
        <div class="nano">
            <div class="nano-content">
                <div class="nk-nav-table">
                    <div class="nk-nav-row nk-nav-row-center">
                        <nav class="nk-nav">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'container' => '',
                                    'menu_class' => '',
                                    'walker' => new nk_walker(),
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                )
                            );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-navbar-bg">
        <div class="nk-navbar-image"></div>
    </div>
    <!-- END: Navbar -->
<?php endif; ?>
