<?php get_header(); ?>
<div class="page">
  <div class="page__container">
    <main>
      <div class="page">
        <div class="page__container">
          <div class="scroll-marker"></div>
          <div class="d-fixedBlock">
            <div class="d-fixedBlock__icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                <path d="M-9.2716e-08 8.53027L8.53027 7.4574e-07L17.0605 8.53027L16 9.59082L8.53027 2.12109L1.06055 9.59082L-9.2716e-08 8.53027Z" fill="white" />
              </svg>
            </div>
            <div class="d-fixedBlock__address"> </div>
          </div>
          <section class="page__block NoPadding" id="firstBlock">
            <?php
            $btn_text = get_field('main_video_button');
            $main_video_btn_icon = get_field('main_video_btn_icon');
            $btn_video_link = get_field('btn_video_link');
            $main_video_src_mp4 = get_field("main_video_src_mp4");
            $main_video_src_webm = get_field("main_video_src_webm");
            ?>
            <div class="main-video">
              <div class="main-video__cover"></div>
              <div class="main-video__info">
                <div class="main-video__info-title">
                  <div class="text-xxlBold">
                    <?php
                    $main_title = get_field("main_video_title");
                    echo esc_html($main_title ? $main_title : "The largest exhibition of country houses in Moscow 5 minutes from Domodedovskaya")
                    ?>
                  </div>
                  <a class="main-video__link" href="<?php echo esc_url($btn_video_link ?: "https://www.apple.com/") ?>">
                    <img src="<?php echo esc_url($main_video_btn_icon) ?>" alt="main video button icon" />
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M1.75452 8.0812C1.32114 7.91268 1.10444 7.82838 1.04118 7.70696C0.986341 7.6017 0.986268 7.4763 1.04099 7.37098C1.10411 7.24948 1.3207 7.16496 1.75388 6.9959L14.0473 2.19847C14.4383 2.04587 14.6339 1.96958 14.7588 2.01131C14.8673 2.04756 14.9524 2.1327 14.9887 2.2412C15.0305 2.36614 14.9542 2.56166 14.8015 2.9527L10.0041 15.2461C9.83508 15.6793 9.75049 15.8959 9.629 15.959C9.52374 16.0137 9.39831 16.0137 9.29305 15.9588C9.17163 15.8956 9.08733 15.6789 8.91881 15.2455L7.00569 10.326C6.97147 10.238 6.95437 10.1941 6.92794 10.157C6.9045 10.1242 6.87582 10.0954 6.84299 10.0721C6.80594 10.0456 6.76197 10.0285 6.67403 9.99432L1.75452 8.0812Z" fill="#FF783D" />
                    </svg> -->
                    <div class="button-m slide-button">
                      <span>
                        <?php
                        echo esc_html($btn_text ? $btn_text : 'Get directions');
                        ?>
                      </span>
                    </div>
                  </a>
                </div>
              </div>
              <video class="" loop muted="muted" autoplay="autoplay" playsinline webkit-playsinline preload="auto" poster="<?php echo get_template_directory_uri(); ?>/assets/img/newrubkoff/company.jpg">
                <source src="<?php echo esc_url($main_video_src_webm) ?>" type="video/webm">
                <source src="<?php echo esc_url($main_video_src_mp4); ?>" type="video/mp4">
              </video>
            </div>
          </section>
          <section class="page__block d-middle _black">
            <?php
            $grid_slider_title_first = get_field('grid_slider_title_first');
            $grid_slider_title_link_first = get_field('grid_slider_title_link_first');
            $grid_slider_title_second = get_field('grid_slider_title_second');
            $grid_slider_title_third = get_field('grid_slider_title_third');
            $grid_slider_title_link_second = get_field('grid_slider_title_link_second');
            $grid_slider_title_fourth = get_field('grid_slider_title_fourth');
            ?>
            <div class="title-mixed text-xxl d-mainTitle">
              <?php echo esc_html($grid_slider_title_first) ?><a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($grid_slider_title_link_first) ?></a> <?php echo esc_html($grid_slider_title_second) ?> <br />
              <?php echo esc_html($grid_slider_title_third) ?> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($grid_slider_title_link_second) ?></a> <?php echo esc_html($grid_slider_title_fourth) ?>
            </div>
            <div class="title-mixed text-xxl d-mainTitle _mob">
              <?php echo esc_html($grid_slider_title_first) ?><a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($grid_slider_title_link_first) ?></a> <?php echo esc_html($grid_slider_title_second) ?> <br />
              <?php echo esc_html($grid_slider_title_third) ?> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($grid_slider_title_link_second) ?></a> <?php echo esc_html($grid_slider_title_fourth) ?>
            </div>
            <ul class="filter-links">
              <li>
                <div class="button-s _active" data-tab="houses">Houses</div>
              </li>
              <li>
                <div class="button-s" data-tab="bathhouses">Baths</div>
              </li>
              <li>
                <div class="button-s" data-tab="services">Related services</div>
              </li>
            </ul>
            <div class="d-gridSlider _active" data-tab="houses">
              <div class="d-grid">
                <?php
                $houses = new WP_Query([
                  'post_type' => 'house',
                  'posts_per_page' => -1,
                ]);

                if ($houses->have_posts()) :
                  while ($houses->have_posts()) : $houses->the_post();

                    $house_link = get_field('house_link');
                    $technology = get_field('technology');
                    $house_area = get_field('house_area');
                    $house_bedrooms = get_field('house_bedrooms');
                    $house_bathrooms = get_field('house_bathrooms');
                    $house_rating = get_field('house_rating');
                    $house_reviews = get_field('house_reviews');
                    $construction_company = get_field('construction_company');

                ?>

                    <a class="d-card" href="<?php echo esc_url($house_link) ?>">
                      <ul class="label-list">
                        <li class="label-list__item text-s _active"><?php echo esc_html($technology ?: "Frame 1 technology"); ?></li>
                        <li class="label-list__item text-s"><?php echo esc_html($house_bedrooms ?: "4 bedrooms");  ?></li>
                        <li class="label-list__item text-s"><?php echo esc_html($house_bathrooms ?: "2 bathrooms"); ?></li>
                      </ul>
                      <div class="d-card__content">
                        <?php if (has_post_thumbnail()): ?>
                          <img src="<?php the_post_thumbnail_url('full'); ?>"
                            alt="<?php the_title_attribute(); ?>">
                        <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dom/dGridSlider/d-1.jpg" alt="">
                        <?php endif; ?>

                        <div class="title-label caps-m">
                          <?php the_title(); ?>
                        </div>
                      </div>

                      <div class="d-card__info">
                        <div class="top">
                          <span class="text-lBold">Кампанья</span>
                          <span>|</span>
                          <span class="text-lBold"><?php echo esc_html($house_area ?: '256'); ?></span>
                        </div>
                        <div class="bottom">
                          <div class="title">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect width="24" height="24" rx="12" fill="#834721"></rect>
                              <path d="M10.7072 19V8.24324H7V6H17V8.24324H13.2928V19H10.7072Z" fill="white"></path>
                            </svg>
                            <div class="caps-m"><?php echo esc_html($construction_company ?: "CK Teremok"); ?></div>
                          </div>
                          <div class="star">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path d="M7.29097 1.42802C7.5812 0.857327 8.4188 0.857326 8.70903 1.42802L10.2598 4.4775C10.375 4.70396 10.5974 4.86096 10.8546 4.89746L14.3225 5.38946C14.9712 5.48149 15.2297 6.25638 14.7598 6.70059L12.2527 9.07074C12.0659 9.24732 11.9807 9.50197 12.0248 9.75153L12.6164 13.0998C12.7273 13.7275 12.0494 14.2063 11.4692 13.9101L8.36781 12.3271C8.13752 12.2095 7.86248 12.2095 7.63219 12.3271L4.53084 13.9101C3.95059 14.2063 3.27266 13.7275 3.38357 13.0998L3.97523 9.75153C4.01933 9.50197 3.93406 9.24732 3.74728 9.07074L1.24021 6.70059C0.770342 6.25638 1.02876 5.48149 1.67746 5.38946L5.14539 4.89746C5.40264 4.86096 5.62499 4.70396 5.74016 4.4775L7.29097 1.42802Z" fill="#F09F32"></path>
                            </svg>
                            <div class="text-s"><?php echo esc_html($house_rating ?: "4.0"); ?></div>
                          </div>
                          <div class="review"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.27012 14.1333C4.78173 13.9477 5.21794 13.7075 5.56155 13.4823C6.31514 13.7742 7.13857 13.9348 8 13.9348C11.5898 13.9348 14.5 11.1512 14.5 7.7174C14.5 4.28363 11.5898 1.5 8 1.5C4.41017 1.5 1.5 4.28363 1.5 7.7174C1.5 9.00542 1.91009 10.2034 2.61215 11.1964C2.6567 12.0174 2.2059 12.7593 1.73802 13.4157C1.32822 13.9906 1.43104 14.4539 2.19515 14.4953C2.53764 14.5139 3.27846 14.4929 4.27012 14.1333Z" fill="#B3B3B3"></path>
                            </svg>
                            <p class="text-s"><?php echo esc_html($house_reviews ?: "99"); ?></p><span class="text-s">reviews</span>
                          </div>
                        </div>
                      </div>
                    </a>

                <?php
                  endwhile;
                  wp_reset_postdata();
                else:
                  echo '<p>The are no houses yet</p>';
                endif;
                ?>
              </div>
            </div>
          </section>
          <section class="page__block d-middle _black">
            <div class="benefits">
              <div class="text-xxl d-mainTitle" data-aos="fade-up" data-aos-delay="50">
                <?php
                $benefits_main_title = get_field('benefits_main_title');
                $benefits_link = get_field('benefits_link');
                $benefits_link_text = get_field('benefits_link_text');
                $benefits_title_secondary = get_field('benefits_title_secondary');
                ?>

                <?php
                echo nl2br(esc_html($benefits_main_title ?: "We've compiled the best solutions for country<br /> living to make your choice simple and convenient."))
                ?>
              </div>
              <div class="benefits__wrapper">
                <div class="benefits__content" data-aos="fade-up" data-aos-delay="150">
                  <video class="" loop muted="muted" autoplay="autoplay" playsinline webkit-playsinline preload="auto" poster="<?php echo get_template_directory_uri(); ?>/assets/img/newrubkoff/company.jpg">
                    <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/content/main-video.webm'); ?>" type="video/webm">
                    <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/content/main-video.mp4'); ?>" type="video/mp4">
                  </video>
                </div>
                <div class="benefits__info">
                  <div class="benefits__info-text">

                    <?php
                    $benefits = new WP_Query([
                      'post_type' => 'benefits-info-text',
                      'posts_per_page' => -1,
                      'order' => 'ASC'
                    ]);
                    if ($benefits->have_posts()) :
                      while ($benefits->have_posts()) : $benefits->the_post();
                        $benefits_info_text = get_field('benefits-info-text')
                    ?>

                        <div class="text-l" data-aos="fade-up" data-aos-delay="50">
                          <?php echo esc_html($benefits_info_text ?: "The largest exhibition of country houses in Moscow,
                    presenting 78 projects from leading manufacturers.
                    Here you can not only look at the facades, but also go inside,
                    evaluate the layouts, materials, and atmosphere of your future home.")
                          ?>
                        </div>


                    <?php
                      endwhile;
                      wp_reset_postdata();
                    else:
                      echo '<p>there are no benefits_info blocks yet</p>';
                    endif;
                    ?>
                    <a class="accent-link _left" href="<?php echo esc_url($benefits_link ?: "https://www.apple.com/") ?>">
                      <div class="btn-accent"><?php echo esc_html($benefits_link_text ?: "About the exhibition") ?></div><svg xmlns="http://www.w3.org/2000/svg" width="6" height="8" viewBox="0 0 6 8" fill="none">
                        <path d="M1 7L4 4L1 1" stroke="#FF783D" stroke-width="1.5" />
                      </svg>
                    </a>
                  </div>
                  <div class="benefits__info-people">
                    <div class="text-xlBold" data-aos="fade-up" data-aos-delay="50">
                      <?php
                      echo nl2br(esc_html($benefits_title_secondary ?: "More than 10,000 people visit the exhibition per year"))
                      ?>
                    </div>
                    <ul data-aos="fade-up" data-aos-delay="150">

                      <?php
                      $benefits = new WP_Query([
                        'post_type' => 'benefits-people',
                        'posts_per_page' => -1,
                        'order' => 'ASC'
                      ]);
                      if ($benefits->have_posts()) :
                        while ($benefits->have_posts()) : $benefits->the_post();
                      ?>

                          <li> <img src="<?php the_post_thumbnail_url('full'); ?>" alt=""></li>

                      <?php
                        endwhile;
                        wp_reset_postdata();
                      else:
                        echo '<p>there are no benefits_people yet</p>';
                      endif;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="page__block NoPaddingDesktop _black">
            <div class="layer-map" data-layer-link="<?php echo esc_url(rest_url('map/v1/houses')); ?>" data-map-id="map1"><svg class="main-svg" viewBox="0 0 2400 1279" preserveAspectRatio="xMidYMid meet">
                <a class="layer-map__link" data-link-id="35">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 759.13558,159.49202 24.77546,32.5178 11.03283,14.51687 -38.32454,20.32362 -17.42025,-6.9681 -17.42024,10.45215 -6.77454,4.45184 -55.93835,-25.35614 35.03405,-23.80767 8.12945,-12.58129 0.58067,-12.77484 5.61319,-1.16135 24.77546,11.41994z">
                </a>
                <a class="layer-map__link" data-link-id="33">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 539.44693,240.59295 -20.32362,35.80828 0.9678,3.48405 7.16165,2.90337v 6.58098l 23.80767,10.06503 9.87147,22.45276 24.96902,10.25859 39.48589,-25.16257 -2.12914,-27.29172 2.70982,-0.19356 2.70981,-3.67761 -34.06626,-14.12975 -0.58067,-9.09724 2.90337,-1.35491 -0.77423,-5.03251 -10.45215,-3.87117 -8.90368,6.9681 0.19356,5.03251z">
                </a>
                <a class="layer-map__link" data-link-id="54">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 649.84154,522.00835 -55.56774,38.32259 1.91613,50.09309 53.65161,23.26728 50.36683,-36.40645 8.75945,-32.30047 -9.85438,-22.44608 -49.2719,-22.71982z">
                </a>
                <a class="layer-map__link" data-link-id="6">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1633.637,597.28486 -55.0202,36.95392v 10.67557l -9.8544,11.77051v 14.23411l -11.2231,31.75299 -0.2737,12.04425 27.647,7.66451 12.318,-4.10599 14.2341,15.8765 14.7816,5.20092 50.093,6.56959 54.7466,-42.42858 -0.5475,-69.52812z">
                </a>
                <a class="layer-map__link" data-link-id="52">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 384.79387,409.76288 50.13159,21.67853 56.51902,-38.71165 -0.77423,-23.61412 8.12944,-4.83895 -30.00153,-38.13098 -36.58252,21.29141v -6.19387l -13.35552,-6.77454 -9.87147,8.12945 2.3227,15.2911 -36.38896,22.83988 1.16135,1.54847 10.06503,-2.3227 2.12914,28.64662z">
                </a>
                <a class="layer-map__link" data-link-id="32">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 496.86411,277.94969 -36.38896,23.227 1.93559,25.93681 6.77454,-3.87117 29.03374,36.96963 24.19478,10.25859 42.96994,-28.45306 -0.38711,-6.58099 -7.16166,-18.00092 -7.54877,-17.42024z">
                </a>
                <a class="layer-map__link" data-link-id="52/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 401.01848,463.15581 -14.78157,24.90968 -22.17235,14.78157 -22.99356,23.81475 85.67835,38.32258 35.85899,-24.90968 -0.82119,-13.13917 23.26728,-12.86544 -16.6977,-6.84332 -0.54746,-18.61382 -12.59171,-6.02212 -15.60277,-25.18342 -13.4129,13.68664z">
                </a>
                <a class="layer-map__link" data-link-id="51">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 509.69038,370.63414 -15.60277,41.33365 -4.92719,3.01106 -2.46359,9.30691 -1.09493,27.09954 8.48571,9.03318 36.13272,13.68664 17.24517,-10.94931 5.20092,-31.753 20.25622,-12.31797 -26.27834,-45.16591 -10.40185,-6.02212v 12.31798z">
                </a>
                <a class="layer-map__link" data-link-id="38">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 613.70882,322.73091 -28.74194,43.52351 1.91613,20.52995 35.03779,13.68664 25.45715,-0.54746 17.79263,-6.02213 11.22304,-9.85437 7.11705,-13.68664 -1.09493,-17.24516z">
                </a>
                <a class="layer-map__link" data-link-id="37">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 738.80469,223.91339 -40.51245,23.81475 -0.27373,49.54562 59.67374,24.36222 23.26728,-40.23871 13.96037,6.56958 6.84332,-5.74839 -2.18986,-35.58525z">
                </a>
                <a class="layer-map__link" data-link-id="36">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 811.6176,185.1802 -18.3401,31.88987 2.4636,2.053 -0.8212,24.49908 6.56959,3.01106 -0.8212,24.63594 33.66913,13.68664 61.31613,-42.42858 -10.12811,-16.42396 -13.4129,-4.92719v -20.25622l -7.93825,-0.8212 0.27373,-7.66452 -24.36222,-10.67558 -3.55852,5.47466z">
                </a>
                <a class="layer-map__link" data-link-id="52/2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 519.54476,496.55121 18.34009,24.36221 -6.29585,4.65346 0.8212,13.68663 2.46359,1.91613 -36.13272,24.36222 -14.23411,-5.74839h -4.37972l -10.67558,-4.92719 -3.01106,-5.20092 0.27374,-20.25623 27.647,-21.35115z">
                </a>
                <a class="layer-map__link" data-link-id="50">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 605.49684,398.82861 -52.28296,33.66913 0.54747,23.54102 -5.74839,7.11705 0.54747,25.18341 56.11521,22.71982 24.36222,-16.97143 26.00461,-27.92074 -1.09493,-47.35577z">
                </a>
                <a class="layer-map__link" data-link-id="31">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 685.97427,372.824 1.36866,32.84793 -14.2341,0.54747 -6.84332,16.6977 75.82397,31.75299 61.8636,-43.79723 -19.16129,-8.48572 1.6424,-22.99355 -11.77051,-7.66452 -26.55208,-30.38433 -5.20092,3.28479 0.54746,-7.39078 -6.29585,-3.01106 -4.92719,4.92718v 9.58065l -16.42396,4.92719z">
                </a>
                <a class="layer-map__link" data-link-id="29">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 931.51254,223.91339 37.22766,48.99816 -12.59171,9.03318 1.6424,25.73088 -9.85438,11.49677 -32.84793,25.45715 -30.11061,-15.32903v -6.02212l -42.42857,-16.97143 1.09493,-28.46821z">
                </a>
                <a class="layer-map__link" data-link-id="53">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 577.02863,522.82955 17.24517,20.52996v 9.03318l 5.74838,1.91613 -7.93825,5.74838 0.8212,19.98249 -26.82581,19.1613 -64.60093,-27.92074 48.4507,-35.31153z">
                </a>
                <a class="layer-map__link" data-link-id="48">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 782.60193,486.14936 16.15023,19.70876 7.11705,18.88756 -52.28295,34.21659 -62.6848,-27.92074 44.89217,-31.47926 1.09493,-13.68664 25.73088,11.49677z">
                </a>
                <a class="layer-map__link" data-link-id="27">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 845.01299,407.58806 -16.42396,23.95162 -32.30047,27.92074 64.7378,29.15254 50.22996,-37.50139 -14.6447,-5.47466 -0.27374,-19.16129 -19.98249,-7.11705 -0.13686,-4.24286 -7.39079,-2.18986 -2.46359,2.18986 -7.39079,-2.46359 -0.13686,-4.51659 -3.83226,-0.8212 -3.01106,2.32673z">
                </a>
                <a class="layer-map__link" data-link-id="26">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 871.8388,382.13092 3.01106,27.37327 20.25623,13.68664 14.78156,6.84332 9.85438,-1.91613 8.48572,4.37972 5.74839,-3.28479 10.67557,3.83226 34.49033,-19.43503 7.39078,-17.79263 6.56959,-22.17235 -34.49033,-42.97604 -42.15484,24.08848z">
                </a>
                <a class="layer-map__link" data-link-id="25">
                  <path class="layer-map__path" fill="#f9f9f9" d="M 996.66094,284.95579 954.50609,313.424v 17.51889l 5.74839,-3.28479 34.21659,46.8083v 10.67558l 29.56313,12.04424 17.5189,-12.59171 -2.4636,-9.03318 24.0885,-42.15484 2.1899,-4.10599 -0.5475,-19.70876z">
                </a>
                <a class="layer-map__link" data-link-id="69">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 676.66735,647.65168 -10.67557,20.25623 3.28479,16.97143 35.31152,13.96037 22.99355,-15.05531 -1.36866,-17.24516 -11.77051,-5.20092z">
                </a>
                <a class="layer-map__link" data-link-id="55">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 714.44247,578.12356 22.44609,2.73733 39.96498,17.5189 16.6977,31.20553 -13.41291,9.85438 0.8212,15.0553 -34.76406,24.90968 -19.70876,-9.58065v -4.65345l -52.28295,-22.44609 4.37972,-25.73088 12.59171,-8.75944 13.4129,-18.88756 0.8212,-10.40185z">
                </a>
                <a class="layer-map__link" data-link-id="47">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 881.69318,477.66365 -93.06913,60.76867 1.09493,30.38433 22.17235,12.31797 13.96037,6.84332 21.62489,7.11705 17.79263,9.58065 41.05991,-28.46821 4.92719,-22.99355 8.21198,-28.74193z">
                </a>
                <a class="layer-map__link" data-link-id="23">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 934.79734,431.95028 -21.07743,33.66912v 31.753l -9.03318,7.39079 12.31798,15.60276 42.15484,17.5189 58.57885,-41.88111 -6.2959,-22.44609 -13.68663,-5.47465 0.54746,-16.6977 -13.13917,-4.65345 0.8212,-7.11706 -9.03318,-1.09493 -1.36867,4.37973z">
                </a>
                <a class="layer-map__link" data-link-id="22">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1051.6812,398.55488 21.8986,22.44609 26.8258,23.26728 -59.9474,41.88111 -39.6913,-18.06636 0.8212,-7.93825 -1.64237,-33.12166 22.71977,-14.23411 0.2738,-2.46359 4.3797,-4.65346 4.106,3.01106z">
                </a>
                <a class="layer-map__link" data-link-id="21">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1152.6886,374.74013 -4.3797,35.85899 -38.5963,22.17235 -40.5125,-17.51889 -17.2451,-19.43503 -6.0222,4.106 -6.0221,-24.63595 21.0774,-37.77512z">
                </a>
                <a class="layer-map__link" data-link-id="68">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 780.13833,668.18164 28.19448,34.49032 -8.75945,4.37973 0.54746,3.83226 -3.83226,1.64239 -14.50783,28.19448 -27.64701,20.80369 -46.26083,-20.25623v -27.09954l -3.83226,0.27373 47.35576,-35.58525z">
                </a>
                <a class="layer-map__link" data-link-id="56">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 831.32636,605.22311 45.9871,20.52995 3.28479,40.78618 -59.94747,40.78618 -11.49678,-5.47465 -30.38433,-39.69125 4.10599,-24.90968z">
                </a>
                <a class="layer-map__link" data-link-id="46">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 976.13098,549.38163 -21.35115,39.96498 -13.96037,29.83687 -0.8212,5.20092 69.80184,30.9318 38.8701,-33.66913 4.6534,-36.68019 -22.1723,-30.9318 -13.9604,7.66452 -4.6535,-3.01106 -4.6534,4.65346z">
                </a>
                <a class="layer-map__link" data-link-id="19/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1034.5729,511.19591 -16.0133,32.43733 4.9271,2.87419 -0.5474,11.49678 8.6226,-4.24286 21.6248,29.7 20.3931,7.80139 31.753,-16.6977 -1.5055,-29.83687 7.8014,-1.50553 -19.7088,-9.17005z">
                </a>
                <a class="layer-map__link" data-link-id="19">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1086.1715,481.4959 -18.34,32.02674 7.3907,3.28479 -0.2737,9.03318 38.0489,17.24516 0.2737,10.12811 13.6866,6.29586 30.1106,-24.63595v -21.07742l 5.4747,1.64239 -1.6424,-4.10599 -29.0157,-12.31797 -0.8212,-11.77051 -6.8433,-2.73733 -9.0332,5.47466 0.2737,3.28479z">
                </a>
                <a class="layer-map__link" data-link-id="18">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1150.4987,440.43599 -9.8543,19.70876 -0.2738,39.41752 22.7198,13.13917 2.4636,8.21198 16.9715,6.84332 8.4857,-6.02212 -0.5475,-7.66452 30.9318,-22.71982 0.2738,-14.2341 10.4018,-8.48572 -29.8369,-36.13272 -27.3732,18.61383z">
                </a>
                <a class="layer-map__link" data-link-id="17">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1238.367,373.91893 -48.9982,32.84793 -0.2737,33.3954 15.0553,-9.85438 35.5852,44.89217 48.177,-35.85899 3.5585,-12.31797 -1.3687,-34.49033z">
                </a>
                <a class="layer-map__link" data-link-id="72">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 761.65184,770.94264 -47.61534,33.67914 -0.19355,58.4546 72.19724,31.35644 4.45184,-8.323 15.2911,5.80675 27.48528,-20.71074 1.3549,-10.06503 15.67823,-9.67792 -2.12915,-23.03343 -10.06503,-25.74325z">
                </a>
                <a class="layer-map__link" data-link-id="57">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 917.55217,649.02035 26.82581,29.01567 8.21198,30.9318 -17.24516,9.03318 -5.74839,-3.01106 -30.9318,16.15023 -15.8765,-4.65346 -5.74838,7.93825 -22.44609,-15.0553v -20.80369l 9.58065,-21.35115 26.00461,-18.88756z">
                </a>
                <a class="layer-map__link" data-link-id="66">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 885.79917,728.40284 -8.48571,5.20093 1.64239,14.2341 -30.65806,21.89862 1.64239,3.55852 4.37973,-1.91613 -0.54747,28.74194 49.54563,23.26729 59.94747,-50.91429 -1.36866,-19.43503 -29.83687,-35.85899 -29.01567,13.4129 -5.47466,3.55853z">
                </a>
                <a class="layer-map__link" data-link-id="58">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1002.1356,691.44892 26.8258,33.94286 -0.2737,14.78157 -11.2231,-0.54746 -30.38431,28.4682 -23.81475,-5.20092v -10.67558l -21.62489,-27.37327 11.77051,-10.67558 7.11705,-15.60277 18.88756,7.11705z">
                </a>
                <a class="layer-map__link" data-link-id="45">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1066.7365,591.26274 -20.2562,32.84793 -3.0111,24.08848 -27.9207,18.06636 78.0138,34.21659 32.5742,-26.00461 0.5475,-16.15023 22.7198,-14.78157 -0.8212,-10.67558 -13.9604,-21.62488 -13.1391,-3.83226 -0.8212,-6.84332 -4.9272,-4.10599 -6.0221,3.83226 -17.2452,-7.93825z">
                </a>
                <a class="layer-map__link" data-link-id="16">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1166.9227,532.68393 -19.7088,32.02673 -24.6359,32.5742 69.2544,32.57419 61.3161,-43.24977 -0.2737,-18.06636 -19.9825,-1.36867 -2.1899,-12.04424 -19.435,-26.00461 -18.6138,10.94931z">
                </a>
                <a class="layer-map__link" data-link-id="15">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1232.6186,472.46272 -9.5807,6.02212 0.2738,13.96037 -31.4793,23.81475 3.011,1.36867 4.6535,-2.18987 -1.0949,19.70876 13.1391,-9.58064 25.4572,36.95392 12.8654,5.47465 55.8415,-44.3447 3.8323,-23.26729 -32.0268,-37.77512 -32.8479,19.9825 0.2737,-6.02213z">
                </a>
                <a class="layer-map__link" data-link-id="14">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1299.4094,413.33645 -19.7088,41.88111v 7.11705l 32.0267,37.22766v 11.49677l 10.1281,3.01106 39.965,-32.02673v -19.98249l -9.8544,-16.6977 -16.1502,-29.83687 -11.7705,-3.55852 -0.2737,10.94931z">
                </a>
                <a class="layer-map__link" data-link-id="78">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 791.26626,890.17454 -20.71074,30.58221 -32.90491,33.29202 72.97148,34.25982 61.93865,-44.71196 -4.6454,-17.42025 -16.06534,0.38712 -1.16135,-13.74264 -18.58159,-25.16258 -18.00092,7.35522z">
                </a>
                <a class="layer-map__link" data-link-id="73">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 876.81902,852.04356 -38.32454,7.74233 -15.48466,28.25951 10.06503,-1.93558 19.74294,26.71104v 11.41994l 15.29111,0.77423 8.12944,16.45246 53.80921,-47.03467 -0.19356,-6.58098 -35.42117,-14.32331z">
                </a>
                <a class="layer-map__link" data-link-id="65">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 966.24295,771.71687 -18.96872,30.96933 -30.00153,30.19509 67.55184,27.67883 56.13186,-43.35705 -0.7742,-9.48436 -15.8718,-1.54846 -1.9356,-11.6135 -18.9687,-23.80767 -14.71039,9.2908z">
                </a>
                <a class="layer-map__link" data-link-id="59">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1054.4185,732.6457 12.7286,20.94056 9.7175,7.80138v 22.99355l -27.647,24.63595 -24.4991,-6.56959 -1.0949,-9.85438 -20.6668,-24.22535 14.371,-26.68894 2.8742,-2.32673 2.8741,3.55853z">
                </a>
                <a class="layer-map__link" data-link-id="60">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1149.4038,699.38717 -72.2654,50.91429 -0.8212,34.2166 -8.7595,8.75944 0.5475,4.106 9.3069,3.55852 16.9714,-11.22304c 0,0 35.859,44.61844 36.9539,44.89217 1.095,0.27373 30.6581,5.20092 30.6581,5.20092l 36.4065,-27.92074 11.223,-24.63595 12.0443,5.74839 -1.6424,-64.32719z">
                </a>
                <a class="layer-map__link" data-link-id="44">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1169.6727,635.25828 -42.0021,28.45307 0.7742,49.93804 20.9043,-16.06534 61.7451,26.51748 36.1954,-31.35644 -4.2583,-9.09724 -10.065,-21.48497z">
                </a>
                <a class="layer-map__link" data-link-id="12">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1376.0058,500.34816 -41.615,28.25951 0.1936,6.77454 -7.1617,9.87147 -0.3871,9.67792 -7.1617,20.32362 0.1936,7.16165 47.4218,18.96871 34.4533,3.09694 41.8086,-28.45307 -1.1613,-48.38957z">
                </a>
                <a class="layer-map__link" data-link-id="1/2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 2002.3551,920.01577 -18.3401,14.2341 73.3603,31.47927 42.1549,-32.84793 -21.0774,-10.12812 -0.8212,-19.16129 -9.8544,-4.65346 2.7373,-3.55852 -18.6138,-25.73088 -4.106,0.8212 -15.6028,10.67558 -3.5585,-1.6424 -2.4636,4.10599 -0.5475,3.28479 -16.1502,-4.37972 -8.212,22.44609 3.0111,0.82119z">
                </a>
                <a class="layer-map__link" data-link-id="13">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1318.9061,597.70798c 1.1614,0.19355 21.485,22.83987 21.485,22.83987l 3.0969,16.06534 -12.0006,11.03282 -13.5491,7.93589v 19.93651l -8.5165,6.0003 -72.3908,-32.51779 30.9693,-22.83988 30.0015,-21.67852 22.4528,-6.77454z">
                </a>
                <a class="layer-map__link" data-link-id="77">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 919.20828,922.30522 -25.54969,9.09724 -48.77669,36.96963 2.70982,25.74325 21.29141,12.58126 27.09816,7.7424 45.09908,-37.16323 5.41963,-24.77546z">
                </a>
                <a class="layer-map__link" data-link-id="81">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 960.4362,1133.8644 27.48527,-20.5172v -20.5171l 4.25829,-2.3227 -68.13252,-29.0338 -18.58159,30.1951 7.74233,3.4841 0.38711,13.549 -0.38711,2.3227 0.38711,1.9356z">
                </a>
                <a class="layer-map__link" data-link-id="64">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1095.1528,792.81472 -39.4859,13.16197 -54.5835,41.42147 4.6454,27.09816 23.227,13.9362 15.0976,8.51656 39.0987,8.51657 24.3884,-15.87178 -2.7098,-12.38773 25.5497,-42.96994z">
                </a>
                <a class="layer-map__link" data-link-id="43">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1269.7423,679.77669 47.6154,21.29141 0.1935,7.35521 4.839,14.51688 4.0647,13.16196 -55.5512,45.87331 -8.5166,-10.45215 -6.7745,3.87117 -34.0663,-13.74264 0.5807,-47.61534z">
                </a>
                <a class="layer-map__link" data-link-id="9/2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1362.6416,624.65813 -44.3447,33.94286 1.0949,42.70231 44.3448,16.97143 20.2562,-16.97143 33.3954,-26.82581 -3.8323,-13.68664 -6.5696,-18.06636z">
                </a>
                <a class="layer-map__link" data-link-id="9/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1477.0619,563.342 -35.5852,13.68663 -55.8415,38.87005 8.212,1.6424 -0.5475,18.61383 18.6138,8.21198 2.7373,14.2341 21.8987,8.21198 32.3004,-19.70875 8.212,11.49677 18.0664,-10.40184 10.9493,-22.44609 4.9272,-20.80369z">
                </a>
                <a class="layer-map__link" data-link-id="8">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1521.9541,527.20927 -26.2784,21.89862 -0.5474,14.78157 -5.4747,3.28479 0.5475,12.59171 20.2562,18.06636 29.0157,12.04424 44.8921,-38.32258 1.6424,0.54746 -20.2562,-25.73087 -22.4461,-25.73088z">
                </a>
                <a class="layer-map__link" data-link-id="80">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1018.5037,1104.4436 -13.9362,20.9043c 0,0 -26.13038,24.3883 -21.8721,24.969 4.25828,0.5806 50.5187,23.227 50.5187,23.227l 40.0666,-30.7758 -0.5807,-11.4199 -6.581,-3.097 -6.7745,-6.3874 -13.162,-17.4202 -12.9684,7.3552z">
                </a>
                <a class="layer-map__link" data-link-id="63">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1066.1891,1000.4932 -16.1503,34.7641 -1.9161,21.6248 -14.7816,23.2673 72.2655,32.0268 55.8415,-43.2498 -10.4019,-21.0774 -6.5696,-14.7816 -19.1613,-34.49033 -21.0774,14.23413 -5.2009,-10.1281 -9.5807,5.2009z">
                </a>
                <a class="layer-map__link" data-link-id="62">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1149.1301,967.0978 -17.2452,29.01567 0.8212,14.23413 23.8148,46.5345 15.0553,7.3908 61.3161,-43.5235 -4.3797,-18.8875 -13.6867,-0.8212 -4.106,-10.40188 -18.8875,-25.73088 -16.6977,10.67557z">
                </a>
                <a class="layer-map__link" data-link-id="10/2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1366.4739,838.16967 -31.2056,10.40185 -51.4617,40.51245 9.3069,1.64239 10.4018,18.06636 26.2784,14.23411 6.5696,17.51889 52.5567,-36.13272 -1.6424,-24.63595 8.2119,-5.47465z">
                </a>
                <a class="layer-map__link" data-link-id="61">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1246.5153,879.14172 -9.6779,3.48405 2.3227,31.35644 -19.3558,18.96871 -16.646,10.45215 -13.9362,5.03251 -77.4233,-34.06625 1.9356,-29.03375 -10.0651,-5.03251 27.4853,-46.84111 30.1951,5.41964 16.2589,8.12944 13.9362,-10.45214 9.6779,5.41963 0.3871,15.48466z">
                </a>
                <a class="layer-map__link" data-link-id="10/3">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1335.5421,953.68489 -53.9254,38.32259 -62.6848,-27.92074 18.0664,-14.50784 6.5696,-4.92719v -11.7705l -3.5586,-0.54747v -3.28479l 13.6867,-10.40185 11.4968,-24.90968 14.7815,7.66452 11.2231,-7.93825 12.3179,17.5189 10.1282,4.10599 13.9603,9.03318 -2.4636,3.28479 -4.106,-1.36866 0.8212,17.79263z">
                </a>
                <a class="layer-map__link" data-link-id="10/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1201.1393,858.4259c 2.4636,0.8212 47.6295,19.43502 47.6295,19.43502l 1.6424,18.88756 8.7594,4.65346 4.6535,-9.58065 10.9493,5.47466 60.7687,-45.71337 -36.4065,-15.60277 -2.1898,-13.96037 -1.3687,-4.10599 -13.1392,-5.74839 5.2009,-3.28479 -25.4571,-36.13272 -24.3622,15.60276 -7.9383,-2.73732 -3.8322,4.65345 -0.2738,7.93825 -16.6977,-7.66451 -13.9603,30.1106 1.0949,15.8765 7.3908,3.28479z">
                </a>
                <a class="layer-map__link" data-link-id="42">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1338.0057,719.91713 -21.3512,32.84793 -31.2055,33.94286 79.9299,36.68019 64.0535,-47.08204 -4.9272,-17.51889 -14.2341,-2.18986 -7.117,-12.04425 -19.7088,-27.92074 -18.6138,11.49678z">
                </a>
                <a class="layer-map__link" data-link-id="10">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1466.1126,650.93647 29.5631,36.13273 -9.8543,4.92719 1.6424,24.63594 -47.6295,39.41752 -36.6802,-15.8765 -13.1392,-18.06636v -20.25622l -3.2848,-3.2848 43.2498,-32.30046z">
                </a>
                <a class="layer-map__link" data-link-id="9">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1640.6,546.99571 -16.646,10.06503 -23.227,-9.67792 -20.5172,37.55031 -17.4202,23.61411 29.0337,14.32331 42.5828,-27.87239 32.1307,15.09755 13.9362,-8.51657 0.3871,-18.19448 -18.5816,-1.16135v -11.22638z">
                </a>
                <a class="layer-map__link" data-link-id="7">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1594.4933,720.73833 -24.0885,6.56958 -31.753,22.44609 -32.0268,25.45714 78.0139,35.31153 56.9364,-45.43964 -9.5807,-9.30691 -15.8765,-11.22304z">
                </a>
                <a class="layer-map__link" data-link-id="75">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1018.2858,931.51254v 26.27835l 5.7484,1.91613 0.8212,6.56958 18.6138,7.66452 0.2738,13.4129 36.4064,13.68668 2.1899,0.8212 38.3226,-26.55212v -10.40184l -13.4129,-34.76406 -55.5678,-24.08848z">
                </a>
                <a class="layer-map__link" data-link-id="74">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 984.89043,949.85264 -24.36222,-2.18987 -1.36866,2.4636 -26.27834,-13.41291 -3.55853,-3.55852 -0.54747,-18.88756 -7.39078,-3.28479 19.70876,-35.85899 35.03779,13.4129 -0.54747,-4.65346 8.48572,-5.20092 10.40184,4.37973 -1.64239,2.46359 -1.09493,1.6424 0.27373,7.93825 33.66912,14.50783 -1.6424,3.2848 -7.3908,0.54746 1.095,25.45715 -12.5917,9.30691 -3.0111,4.37972z">
                </a>
                <a class="layer-map__link" data-link-id="5">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1760.219,600.41779 -24.3883,12.77485 -44.5184,-16.64601 -10.0651,17.03313 51.0994,20.13006 -1.1613,63.1 9.2908,0.77423 22.0656,-11.6135 7.7424,-2.3227 16.646,-33.67914 8.1294,-17.80736 -20.9043,-12.77485z">
                </a>
                <a class="layer-map__link" data-link-id="2/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1656.9043,751.94386 -22.9935,44.07097 8.4857,5.20092 -0.5475,25.45715 71.4443,28.74194 29.8368,-27.09954 10.1282,-36.95393 -98.8176,-40.23871z">
                </a>
                <a class="layer-map__link" data-link-id="2/2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1747.5099,823.93557 0.2737,11.49678 -12.0442,7.11705 0.2737,2.73733 -13.4129,21.62488 84.5834,35.85899 57.2101,-42.42857 -9.8543,-5.74839 -6.5696,-19.43503 -2.7373,-18.06636 -20.53,-38.04885 -22.9936,15.60277 -5.7483,-10.40185 -10.1282,6.29586 -27.0995,-11.49678 -17.5189,42.42858z">
                </a>
                <a class="layer-map__link" data-link-id="2">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1890.6721,617.81481 -41.8811,17.79263 -15.6028,13.68664 -36.9539,-17.24516 -24.9097,53.10415 9.0332,3.01106 -4.3797,53.92535 80.2037,33.94286 84.0359,-65.69586 -10.4018,-23.26728 -1.9162,-18.61383z">
                </a>
                <a class="layer-map__link" data-link-id="1/1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1893.4094,752.21759 -35.859,50.64056 9.0332,0.27373 -0.2737,26.00461 14.7815,16.15024 17.5189,7.11705 35.859,3.28479 52.0093,-41.05991 -0.8212,-17.24516 7.6645,-6.29586 -39.4175,-47.6295 -35.5853,16.15024z">
                </a>
                <a class="layer-map__link" data-link-id="1">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 1998.7965,650.93648 67.0646,29.01567 -0.2738,63.77973 -61.5899,57.75761 -49.8193,-59.94748 -30.1106,14.78157 3.2848,-28.19447 9.8544,-32.02673z">
                </a>
                <a class="layer-map__link" data-link-id="1/3">
                  <path class="layer-map__path" fill="#f9f9f9" d="m 2092.7521,821.84847 -16.646,28.64662 -17.8073,25.5497c 0,0 11.2264,18.19447 12.7748,18.19447 1.5485,0 34.0663,10.83927 34.0663,10.83927l 52.2607,-41.03436v -6.9681l -10.065,-19.35582 -10.065,-5.41964 -6.581,-3.48404 -22.0657,-6.19387z">
                </a>
              </svg><img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/dom/map/new-desktop-2.jpg" alt=""><a class="small-card" href="#">
                <div class="small-card__content"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dom/map/map-preview.jpg" alt=""></div>
                <div class="small-card__info">
                  <div class="small-card__titles">
                    <div class="text-lBold _title">Courchevel</div>
                    <div class="text-lBold _size">256 m²</div>
                  </div>
                  <div class="small-card__description">
                    <div class="title">
                      <div class="icon"><img src="" alt=""></div>
                      <div class="caps-m">RUSS-HOUSE</div>
                    </div>
                    <div class="star">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M7.29097 1.42802C7.5812 0.857327 8.4188 0.857326 8.70903 1.42802L10.2598 4.4775C10.375 4.70396 10.5974 4.86096 10.8546 4.89746L14.3225 5.38946C14.9712 5.48149 15.2297 6.25638 14.7598 6.70059L12.2527 9.07074C12.0659 9.24732 11.9807 9.50197 12.0248 9.75153L12.6164 13.0998C12.7273 13.7275 12.0494 14.2063 11.4692 13.9101L8.36781 12.3271C8.13752 12.2095 7.86248 12.2095 7.63219 12.3271L4.53084 13.9101C3.95059 14.2063 3.27266 13.7275 3.38357 13.0998L3.97523 9.75153C4.01933 9.50197 3.93406 9.24732 3.74728 9.07074L1.24021 6.70059C0.770342 6.25638 1.02876 5.48149 1.67746 5.38946L5.14539 4.89746C5.40264 4.86096 5.62499 4.70396 5.74016 4.4775L7.29097 1.42802Z" fill="#F09F32" />
                      </svg>
                      <div class="text-s">5.0</div>
                    </div>
                    <div class="review"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.27012 14.1333C4.78173 13.9477 5.21794 13.7075 5.56155 13.4823C6.31514 13.7742 7.13857 13.9348 8 13.9348C11.5898 13.9348 14.5 11.1512 14.5 7.7174C14.5 4.28363 11.5898 1.5 8 1.5C4.41017 1.5 1.5 4.28363 1.5 7.7174C1.5 9.00542 1.91009 10.2034 2.61215 11.1964C2.6567 12.0174 2.2059 12.7593 1.73802 13.4157C1.32822 13.9906 1.43104 14.4539 2.19515 14.4953C2.53764 14.5139 3.27846 14.4929 4.27012 14.1333Z" fill="#B3B3B3" />
                      </svg>
                      <p class="text-s">68</p><span class="text-s">reviews</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="layer-map _mobile" data-layer-link="/api/house-popup.json" data-map-id="map1">
              <div class="layer-map__scroll-container"><img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/dom/map/mob-map-22.jpg" alt="">
                <svg class="main-svg" viewBox="0 0 1992 1120"><a class="layer-map__link" data-link-id="35" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 563.21839,143.03959 -6.43678,2.86079 -1.788,9.29758 -10.01277,13.58876 -8.22477,0.3576 -22.52874,18.59514 47.91826,22.52874 23.95914,-16.80715 10.72797,6.07918 37.19029,-20.74074 -15.01916,-16.80715 -15.37675,-21.81354 -20.02555,8.58238z"></path>
                  </a><a class="layer-map__link" data-link-id="33" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 410.16603,212.77139 -17.87995,33.61431 6.79438,3.57599 0.7152,7.86717 21.81354,8.93998 7.50957,20.38314 23.24394,8.22478 32.8991,-21.09834 -1.78799,-25.38953 6.07918,-2.50319 -5.00638,-3.93359 -26.10473,-11.44317 -0.7152,-12.15837 -6.07918,-4.29118 -8.58238,6.43678 -0.71519,5.00638z"></path>
                  </a><a class="layer-map__link" data-link-id="32" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 371.18774,246.3857 -31.82631,21.09834 1.0728,22.88633 6.43678,-3.21839 24.31673,31.82631 24.31673,10.37037 37.54789,-23.60153v -7.15198l -6.79438,-15.73436 -7.50958,-17.52235z"></path>
                  </a><a class="layer-map__link" data-link-id="52" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 269.27203,336.85824 6.07918,-0.3576v 27.89272l 41.83908,19.66794 51.13666,-33.9719 -0.7152,-22.52874 6.43678,-4.29118 -27.53512,-34.6871 -31.46871,17.52235 -1.4304,-2.5032 -9.65517,-6.07918 -9.65517,6.43678 1.4304,12.51597z"></path>
                  </a><a class="layer-map__link" data-link-id="51" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 383.34611,329.34866 -16.09196,38.62069 -4.29119,9.65517 -5.36398,12.87356 1.43039,9.65518 41.48149,17.52235 16.80715,-8.93998 6.07918,-25.38952 17.52235,-12.87357 -8.22478,-11.44317 -19.31034,-30.75351 -6.07918,-2.14559 -1.0728,9.65517z"></path>
                  </a><a class="layer-map__link" data-link-id="52/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 287.86718,410.88123 -13.94636,21.45594 -18.23755,12.87356 -21.45594,23.60153 76.52618,31.82631 31.82631,-20.02554v -12.51597l 17.87995,-12.51596 -14.30396,-21.81354 -11.08557,-4.64879 -14.30396,-22.52873 -4.29118,2.86079 -8.22478,7.50958z"></path>
                  </a><a class="layer-map__link" data-link-id="38" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 474.89144,287.15198 -26.81992,39.69349 1.4304,15.01915 32.1839,12.87357 22.88634,-0.7152 16.44955,-5.72158 16.09196,-17.16476 0.35759,-18.59514z"></path>
                  </a><a class="layer-map__link" data-link-id="37" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 586.81992,198.10983 -36.83269,22.17114v 41.83908l 53.28225,22.88634 20.74074,-34.32951 15.73435,4.64879 7.86718,-5.36398v -11.44317l -8.22478,-19.66795z"></path>
                  </a><a class="layer-map__link" data-link-id="36" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 652.26054,164.13793 -17.87995,28.60792v 22.52874l 8.22477,4.29118 7.15198,22.52874 20.02555,10.37037 52.56705,-37.19029 -6.43678,-15.01916 -9.29758,-5.00639 -0.7152,-13.58876 -9.29757,-10.72797 -19.31034,-10.37037z"></path>
                  </a><a class="layer-map__link" data-link-id="29" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 756.67944,199.89783 -27.89272,13.58876 -52.56705,35.7599 -0.3576,8.22477 5.00639,1.788 0.71519,13.23116 34.6871,15.37676 -0.35759,8.93997 26.46232,11.80077 31.82631,-25.03193 5.00638,-13.94636v -22.52874l 13.58877,-6.79438z"></path>
                  </a><a class="layer-map__link" data-link-id="31" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 582.52874,301.45594 -1.0728,7.50958 -18.23755,6.07918 -25.03193,16.44955 1.788,29.32312 -10.01277,1.78799 -7.50958,10.72797 65.79821,28.96552 55.78544,-37.54789 -15.73435,-27.89272 -8.93998,-7.50958 -24.67433,-26.46233 -4.64879,-3.21839 -6.07918,-2.50319z"></path>
                  </a><a class="layer-map__link" data-link-id="50" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 467.73946,356.16858 -43.26947,28.96552 -7.15198,25.38953 0.3576,23.24393 48.99106,20.74074 18.59514,-11.44317 27.53513,-29.68071 -1.788,-41.12388z"></path>
                  </a><a class="layer-map__link" data-link-id="52/2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 392.28608,440.56194 16.09195,22.17114 -6.07918,3.57599 1.0728,14.66156 -30.75351,19.66794 -14.66156,-4.29119 -11.08557,-5.00638 -2.14559,-3.93359 -1.0728,-18.59515 22.88633,-17.16475z"></path>
                  </a><a class="layer-map__link" data-link-id="53" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 443.42273,464.16347 16.09196,20.02555 7.50958,6.07918 -11.80077,6.79438 0.7152,18.23755 -22.88634,17.52235 -56.50064,-25.03193 49.70626,-38.26309z"></path>
                  </a><a class="layer-map__link" data-link-id="54" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 509.57854,465.23627 -50.42145,31.11111 1.78799,45.05747 46.13027,19.66795 41.83908,-28.60792 9.65517,-19.66794 1.788,-12.15837 -8.58238,-17.52235z"></path>
                  </a><a class="layer-map__link" data-link-id="48" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 588.96552,433.40996 -4.64879,2.1456 -8.22478,18.95274h -10.01277l -19.66794,17.87995 50.06386,23.24393 50.77905,-32.5415 -8.22478,-13.94636 -13.94636,-17.52235 -14.66155,6.79438z"></path>
                  </a><a class="layer-map__link" data-link-id="27" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 679.94232,361.59075 -14.16019,20.73457 -29.33184,23.51604 59.42225,24.52749 41.97487,-30.849 -11.12587,-3.28719 -2.02288,-14.1602 3.03433,-1.77002 -20.22886,-11.12587 -14.91877,-6.57438z"></path>
                  </a><a class="layer-map__link" data-link-id="26" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 703.71122,340.60331 4.29864,0.50572 -0.75859,22.5046 16.18309,9.60871 12.64303,7.83868 19.47027,2.27574 12.89589,1.77003 29.07898,-17.70025 9.60871,-17.19452 0.75858,-12.8959 4.55149,-5.05721 -30.09042,-38.94054 -32.61902,16.18308z"></path>
                  </a><a class="layer-map__link" data-link-id="25" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 814.46419,253.36638 -37.42337,24.78035 1.2643,5.31007 -8.09154,8.85013 0.75858,4.29863 11.37873,-5.56294 31.60758,40.20485 0.25286,8.59726 22.5046,10.11443 15.93023,-10.11443 -0.25287,-6.57438 20.48172,-34.13619 5.56293,2.52861 -1.77002,-25.53893z"></path>
                  </a><a class="layer-map__link" data-link-id="21" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 873.63359,300.90419 -19.97599,33.88333 7.33296,3.03433 -0.25286,15.93022 4.80435,-1.77003 17.19452,19.976 32.36617,12.39017 34.64191,-23.7689 -1.01144,-24.78035 6.32151,-2.27575 -0.50572,-3.28718z"></path>
                  </a><a class="layer-map__link" data-link-id="22" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 864.78347,353.49921 -20.73458,7.58582 -28.57325,19.21741 0.25286,2.5286h 2.27574l 2.27575,25.79179 30.09042,12.39017 13.65447,-9.10298 8.59727,3.54005 22.25174,-13.90734 -2.02289,-16.18308 -10.36729,-2.52861 0.25286,-9.10298z"></path>
                  </a><a class="layer-map__link" data-link-id="23" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 758.83485,384.85393 -16.94167,28.57325v 17.19453l -13.40161,9.35584 15.17164,19.976 36.91766,15.93022 51.58357,-37.42338 -3.54005,-18.96455 -11.12587,-15.93022 -13.40161,-11.88445 -4.29863,-1.77003 -3.79291,3.54005z"></path>
                  </a><a class="layer-map__link" data-link-id="47" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 630.6258,474.89144 0.7152,30.21712 17.87995,9.47637 15.91315,6.79438 35.2235,14.66156 33.6143,-27.71392 6.61559,-17.16475 0.17879,-18.77395 7.50958,-5.90038 -34.8659,-43.09068 -36.47509,18.23755z"></path>
                  </a><a class="layer-map__link" data-link-id="55" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 563.93359,513.15453 -6.43678,2.5032 -0.3576,8.22477 -13.94636,17.16475 -9.65517,8.58238 -5.72159,22.88633 64.36782,25.03193 32.18391,-23.95913 -0.3576,-10.37037 5.72158,-5.36398 -5.00638,-12.87357 -6.43679,-1.07279v -15.01916l -35.40229,-15.37676z"></path>
                  </a><a class="layer-map__link" data-link-id="69" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 531.74968,575.01916 -11.44317,17.87995 4.64879,14.66155 31.11111,12.87357 19.31035,-14.30396 0.71519,-13.94636z"></path>
                  </a><a class="layer-map__link" data-link-id="68" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 625.08301,591.46871 24.31674,31.82631 -7.15198,2.86079 -1.4304,5.00639 -16.44955,25.03193 -22.88634,18.59514 -23.95913,-6.79438 -16.80715,-9.29757 -2.50319,-26.10473 38.26309,-29.32311z"></path>
                  </a><a class="layer-map__link" data-link-id="56" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 667.99489,537.47127 -42.73308,28.96551v 5.72159l -0.35759,15.73435 -4.64879,4.46999 6.43678,-1.2516 24.31673,32.72031 6.97318,2.86079 35.5811,-21.81354 -0.1788,-4.11239 17.34355,-11.62196 -1.0728,-34.5083z"></path>
                  </a><a class="layer-map__link" data-link-id="72" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 607.20307,684.44445 -42.55428,30.03831 0.7152,52.20945 61.50702,27.53512 4.64879,-8.58237 11.80076,5.00638 42.91188,-36.47509 -2.50319,-9.65518 -8.22478,-31.11111 -71.1622,-28.60792z"></path>
                  </a><a class="layer-map__link" data-link-id="73" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 674.07407,765.61941 -8.22477,17.52235 23.24393,30.03832 13.23116,6.79438 6.79438,12.15836 45.77267,-36.83269 -1.43039,-6.79438 -29.32312,-12.51597 -15.37675,-21.45594 -21.81354,12.15837z"></path>
                  </a><a class="layer-map__link" data-link-id="78" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 631.8774,789.93614 -18.59515,29.68072 -23.60153,23.95913 65.08301,28.25032 49.70626,-37.19029 -2.1456,-13.23117 -14.30396,-1.43039 -2.86079,-9.29758 -17.16475,-25.03192 -16.44955,7.86717z"></path>
                  </a><a class="layer-map__link" data-link-id="57" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 720.91954,583.24393 -25.92592,18.23755 -0.1788,15.91316 -6.61559,4.64878 0.5364,15.73436 8.40358,11.26437 11.08557,2.86079 8.93997,-8.04598 8.58238,4.82759 7.15198,-5.36399 26.46232,-6.97318 9.83397,-6.97318 -0.89399,-27.53512 -23.60154,-25.56833z"></path>
                  </a><a class="layer-map__link" data-link-id="46" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 797.98212,487.76501 -18.77395,33.7931 -1.96679,5.90038 -7.50958,13.58877 -13.58876,9.47637 71.1622,32.7203 30.75351,-21.63473 1.6092,-9.47638 1.25159,-3.03959V 523.8825l 5.36399,-4.46998 -20.20435,-28.25032 -11.62196,6.61558 -3.75479,-2.1456 -3.21839,2.3244z"></path>
                  </a><a class="layer-map__link" data-link-id="19" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 895.63247,427.08166 -15.93022,28.82612 6.57437,2.5286 -0.50572,8.59726 29.83756,14.1602v 8.59726l 13.65448,5.31008 26.80323,-19.97599 0.75858,-17.44739 5.05721,-3.03433 -26.04465,-11.12587 -1.01144,-10.87301 -6.06866,-2.5286 -6.32151,4.80435v 2.27575z"></path>
                  </a><a class="layer-map__link" data-link-id="18" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 951.26181,392.18689 -8.3444,16.18308 -18.71169,20.73457 12.64304,4.29864 0.50572,8.85012 26.04465,13.14875 -0.50573,7.0801 16.43595,7.58582 8.85012,-5.05721 0.50572,-12.64303 27.81471,-16.43595 -0.7586,-12.64303 8.0915,-6.32152 -25.03318,-31.60758 -21.99888,11.88445z"></path>
                  </a><a class="layer-map__link" data-link-id="17" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1030.9129,331.50033 45.2621,18.45883v 32.87188l -9.3559,21.74602 -29.3318,20.22885 -13.6545,-8.59726 -25.03318,-33.12475 -13.14876,9.10299 0.50573,-30.34328z"></path>
                  </a><a class="layer-map__link" data-link-id="14" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1084.5194,366.90082 -17.4474,39.44627 1.77,6.57437 25.2861,31.10186 0.2528,9.35585 7.5859,3.54005 36.4119,-28.06754 0.2529,-19.21741 -9.103,-1.2643 0.5057,-13.65448 -14.9188,-25.53892 -8.0915,-3.79291 -1.77,8.85012z"></path>
                  </a><a class="layer-map__link" data-link-id="15" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1024.3385,418.4844 -7.5858,6.82723v 12.8959l -27.05607,20.48171 4.80436,-0.25286v 16.94167l 11.63161,-7.58582 18.9645,26.55037 1.0115,6.82723 12.8959,4.80436 48.8021,-35.4005 -0.2529,-21.49315 6.0687,-5.31008 -27.5618,-34.89477 -30.3433,20.22885v -5.31007z"></path>
                  </a><a class="layer-map__link" data-link-id="16" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 966.93917,471.07941 -19.72313,30.09042 -3.28719,15.93023 -13.40161,3.28718 -9.86157,8.34441 69.28382,28.57325 51.07781,-35.14763 -3.54,-16.68881 -12.1373,-1.51716 -3.2872,-11.63159 -17.1945,-23.01032 -14.91881,9.10298z"></path>
                  </a><a class="layer-map__link" data-link-id="45" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 877.90549,525.4917 -18.23754,28.78672 -0.3576,13.58876 -25.74713,21.45594 66.51341,31.64751 29.50192,-23.42274 -0.3576,-10.19157 22.17113,-14.12516 -0.89399,-10.90677 -11.97957,-4.82758 0.1788,-13.23116 -13.76756,-5.90039 -0.3576,-5.90038 -3.39719,-2.32439 -4.11239,2.86079 -18.59515,-7.50958z"></path>
                  </a><a class="layer-map__link" data-link-id="58" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 783.14176,620.61303 -9.83397,16.98595 -7.50958,5.90038 20.56194,25.21073 1.788,9.83397 19.13154,3.93359 21.63474,-16.27075 6.07919,-9.65517 5.18518,1.43039 -0.1788,-11.62197 3.75479,-3.57599 -23.24393,-29.50191 -18.59515,10.19157z"></path>
                  </a><a class="layer-map__link" data-link-id="66" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 759.54023,636.88378 -25.74713,7.86718 -8.58237,5.36398 -8.93998,-4.64878 -6.43678,6.07918 1.0728,11.44317 -28.25032,21.45594 6.79438,0.71519 -1.0728,26.81993 42.19668,18.23754 48.27587,-37.90549 0.35759,-17.87995 6.43679,-5.72158z"></path>
                  </a><a class="layer-map__link" data-link-id="65" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 822.47765,684.80204 16.09195,19.66795 14.30396,11.80076 1.788,10.37037 -48.63346,36.1175 -59.00383,-26.46232 24.31673,-17.52235 1.78799,-8.58238 16.44955,-25.74712 17.52235,5.36398z"></path>
                  </a><a class="layer-map__link" data-link-id="59" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 834.45722,658.87612 -14.30396,24.67433 4.11239,0.5364 17.87995,23.24393 16.27075,10.37037 19.48914,-12.33716 0.5364,-12.33717 5.18519,-3.57599 -0.7152,-6.79438 3.39719,-3.39719 -0.7152,-7.33078 -19.84674,-22.17114 -21.63474,9.83398z"></path>
                  </a><a class="layer-map__link" data-link-id="60" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 950.50323,620.52007 63.46807,28.06753 0.7585,57.39937 -9.3558,-3.28719 -13.90734,23.7689 -30.59614,18.45883 -31.60758,-8.59726 -29.07898,-36.6648 -17.95311,8.85013 -3.54005,-1.77003 1.26431,-12.39017 5.81579,-9.60871 1.26431,-19.72313z"></path>
                  </a><a class="layer-map__link" data-link-id="64" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 868.96552,716.27075 -50.77906,38.0843 6.61558,-0.3576v 22.17113l 18.95275,12.15837 13.23116,6.43678 32.00511,7.86718 23.95913,-13.23116 -0.3576,-9.47638 21.09834,-39.33588 -31.64751,-37.3691z"></path>
                  </a><a class="layer-map__link" data-link-id="63" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 877.90549,887.56067 -15.01915,31.8263 5.36398,2.1456v 9.65517l -8.93997,7.15198 -11.08557,19.31034 66.15581,29.32312 51.49425,-39.33589 -12.15836,-15.37675 -6.43679,-14.66156 -16.80715,-31.11111 -20.02554,10.72797 -3.93359,-7.15198 -10.37037,4.64878z"></path>
                  </a><a class="layer-map__link" data-link-id="80" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 832.49042,980.5364 -8.58237,17.87995 -21.09834,22.52875 44.69987,21.8135 37.90549,-27.8927 -3.21839,-11.4432 -11.08557,-1.788v -7.50954l -12.51596,-14.30396 -10.37037,5.72159z"></path>
                  </a><a class="layer-map__link" data-link-id="81" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 751.31545,942.98851 -15.73435,26.10472 6.07918,2.86079 0.7152,16.80716 41.12388,18.23752 27.53512,-20.74072 -2.50319,-18.23754 4.29119,-1.788 -48.63346,-21.81354z"></path>
                  </a><a class="layer-map__link" data-link-id="62" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 951.92848,857.87995 -17.34355,28.96552 6.07918,18.41634 14.12516,26.99873 15.55556,11.80076 53.46107,-38.08429 -3.0396,-15.91315 -11.8008,-0.5364 -2.682,-10.54917 -16.27073,-23.06513 -15.91315,8.40357 -22.52874,-7.68838z"></path>
                  </a><a class="layer-map__link" data-link-id="10/2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1144.4474,744.16893 25.0332,32.36617 -8.3444,3.54004 0.2528,18.45883 -42.4806,34.89477 -10.3673,-3.28718 0.2529,-12.39018 -21.2403,-10.62014 -11.6316,-15.93023 -3.2872,3.28719 -1.77,-8.09154 46.7792,-32.36616z"></path>
                  </a><a class="layer-map__link" data-link-id="10/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1005.8797,704.46981 -15.17162,24.27462 0.75858,15.4245 8.3444,2.78147v 13.90733l 38.43484,18.20597 -0.2529,5.05722 7.0801,4.80435 5.0572,2.78147 46.2735,-33.37761 -7.8386,-12.39017 -4.5515,-5.56294 -2.2758,-12.64303 -9.8616,-10.87301 -21.4931,-30.59614 -23.7689,13.90734 -3.7929,-1.51717 -2.0229,2.02289 0.2529,6.82723z"></path>
                  </a><a class="layer-map__link" data-link-id="61" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 935.33159,740.62888 -23.26318,40.96343 7.33296,2.52861 1.01144,27.81467 68.27238,30.849 10.87301,-4.80435 16.9417,-9.60871 15.1716,-20.98743 -1.77,-24.52749 7.8387,-4.29863 -41.21633,-16.94166 -0.75858,-14.91878 -10.11443,-5.05722 -9.10298,8.34441 -7.58582,-1.01145z"></path>
                  </a><a class="layer-map__link" data-link-id="44" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 968.45634,563.87928 -35.65335,24.52748 -0.25287,41.46915 18.20597,-11.37873 50.31931,22.25174 34.8947,-28.57326v -6.06865l -10.1144,-4.55149 0.5057,-13.65448z"></path>
                  </a><a class="layer-map__link" data-link-id="10/3" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1054.1761,794.23534 -11.8844,22.5046 -10.8731,8.85012 -17.1945,30.59614 53.1008,23.76891 50.825,-35.90622 -11.3788,-7.0801 0.7586,-17.70024 -20.7346,-12.39017 -9.6087,-14.91878 -10.6201,5.81579z"></path>
                  </a><a class="layer-map__link" data-link-id="43" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1057.7162,604.58984 -42.2278,29.83756 0.7586,41.97487 31.3547,12.13731 4.2987,-1.77002 5.8158,6.32152 47.7906,-31.35473 -0.2528,-11.63159 -0.7586,-11.12587 -4.8044,-16.94166z"></path>
                  </a><a class="layer-map__link" data-link-id="42" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1120.4256,638.47317 -18.9646,29.5847 -8.0915,14.1602 -23.2632,17.44738 71.5596,31.10187 55.6293,-40.96343 -4.0457,-14.66592 -9.8616,-4.55149 -5.8158,-9.10299 -18.4588,-25.53892 -14.6659,8.85012z"></path>
                  </a><a class="layer-map__link" data-link-id="10" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1233.7072,576.77517 23.7689,32.11331 -8.3444,5.81579 0.7586,23.01032 -41.7221,32.61903 -21.2402,-9.10299 -11.8845,-4.55149 -9.103,-13.90734 -1.2643,-18.71168 -3.7929,-2.52861 40.7106,-27.56181z"></path>
                  </a><a class="layer-map__link" data-link-id="9/2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1141.1602,555.53488 -39.1934,26.80323 -0.7586,39.69912 39.6991,15.17164 18.9646,-12.13731 1.77,-5.8158 32.1133,-22.25174 -8.5973,-8.59726 -3.7929,-16.18308z"></path>
                  </a><a class="layer-map__link" data-link-id="13" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1102.9782,529.74309 -18.9645,5.31007 -26.8033,19.72313 -31.3547,20.73458 66.2495,28.57325 8.5973,-6.57437 0.2528,-17.44739 29.079,-18.71169 -11.3787,-3.28719 0.2528,-8.59726z"></path>
                  </a><a class="layer-map__link" data-link-id="12" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1152.5389,445.54049 -35.6534,24.02176 0.2529,4.55149 -8.3444,9.10299 -0.2529,9.35584 -6.0686,17.44739 0.2529,5.81579 43.9977,19.72313 27.0561,3.28719 38.4348,-28.06753 -1.0114,-42.98631z"></path>
                  </a><a class="layer-map__link" data-link-id="8" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1300.9681,463.74646 21.2403,21.49315v 15.4245l 6.8272,0.25286 7.0801,7.83868 -42.4805,31.60759 -28.3204,-12.8959 -12.3902,-15.67736v -9.86156l 7.8387,-5.31008 -1.0115,-12.13731 20.7346,-14.41306z"></path>
                  </a><a class="layer-map__link" data-link-id="9/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1241.0401,499.90553 32.6191,40.45771 -10.3673,5.56293 -0.2529,11.37873 -7.3329,21.2403 -12.3902,9.6087 -10.3673,-13.65447 -26.2975,16.94166 -22.7575,-9.86157 -2.7814,-11.63159 -13.4017,-6.06865v -15.67736l -8.5972,0.25286 51.0778,-35.14763z"></path>
                  </a><a class="layer-map__link" data-link-id="9" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1352.046,487.00964 -16.6888,28.57325 3.2871,2.78147 -0.5057,4.55149 -30.3433,19.47027 31.6076,13.90734 41.9749,-29.07898 29.5847,13.40162 11.3787,-7.33296 -0.2528,-13.14876 -14.9188,-1.51716 -1.2643,-10.11443 -16.9417,-24.02176 -15.6773,9.60871z"></path>
                  </a><a class="layer-map__link" data-link-id="6" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1382.6421,529.49023 -49.8135,34.64191 -0.2529,7.83868 -10.1144,10.11443v 13.65447l -9.6087,26.04465 0.5057,12.13731 25.0332,8.09154 8.3444,-5.56293 13.9073,15.93022 14.9188,4.04577 41.722,5.56294 51.0779,-37.9291 -1.5172,-61.95087z"></path>
                  </a><a class="layer-map__link" data-link-id="7" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1347.0754,639.74457 18.5951,21.09834 0.3576,5.72159 15.7344,5.72158 1.4303,11.44317 -44.6998,36.83269 -71.5198,-32.54151 26.1047,-20.38314 7.8672,-1.07279 24.6743,-22.17114z"></path>
                  </a><a class="layer-map__link" data-link-id="77" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 681.22605,859.31035 6.43679,3.21839 -0.3576,23.24393 33.2567,15.73436 44.69987,-32.89911 -0.35759,-18.59515 7.86717,-3.93359 -25.38952,-28.96551 -23.95914,8.93997z"></path>
                  </a><a class="layer-map__link" data-link-id="74" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 765.97701,777.42018 -16.80715,30.75351 7.15198,4.64879 -0.3576,14.30396 8.58238,9.65517 16.44955,7.50958 2.86079,-4.29119 35.0447,5.36399 15.01916,-10.72797 0.7152,-24.31673 7.86717,-3.2184 -30.03831,-14.66155 -0.3576,-9.29758 -7.50958,-3.57599 -8.22477,5.36399z"></path>
                  </a><a class="layer-map__link" data-link-id="75" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 865.38953,804.5977 -30.03832,21.99234 -0.71519,21.45594 6.25798,2.50319 0.5364,6.61558 15.37675,6.61558 0.5364,11.26437 32.54151,13.76756 37.01149,-26.81992 -0.1788,-5.72159 -6.97318,-14.12515 -5.72158,-16.09196z"></path>
                  </a><a class="layer-map__link" data-link-id="5" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1431.9499,528.73165 -9.6087,14.66591 46.5264,18.20597 0.2529,55.88221 7.08,2.27574 12.6431,-9.35584 8.0915,-2.02289 6.3215,-2.78146 14.666,-30.34328 -1.2643,-7.83868 7.5858,-4.55149 -17.4474,-10.62015 -1.0115,-2.52861 -12.643,-18.96455 -19.4703,12.8959z"></path>
                  </a><a class="layer-map__link" data-link-id="2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1609.4581,549.97194 31.8605,45.51492 0.2528,14.91878 7.0801,2.27575 -0.2528,20.73457 -64.4795,53.60646 -80.4097,-33.37761 6.0687,-5.05721 2.2757,-37.17052 -9.103,-4.04577 22.7575,-46.2735 36.4119,13.40162z"></path>
                  </a><a class="layer-map__link" data-link-id="1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1705.7471,578.23755 59.7191,25.38953 -0.3576,55.42784 -20.7408,24.67433 -33.9719,28.60792 -12.1584,-2.1456 0.3576,-10.37037 -31.4687,-41.83908 -25.0319,15.73436 -0.7152,-21.09834 7.8672,-13.94636 0.3576,-19.66795z"></path>
                  </a><a class="layer-map__link" data-link-id="1/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1610.9753,668.56359 -8.5973,18.45883 -7.8387,6.32152 -15.4245,20.73457 9.3559,-1.51716 -1.0115,21.74601 14.9188,7.58582 -2.5286,6.82724 15.4245,7.33296 12.8959,-4.04577 18.4588,7.83868 46.0207,-34.64191 -0.2529,-16.94166 6.5744,-5.56294 -32.3662,-43.23917 -27.3089,16.6888 -4.2987,2.27575z"></path>
                  </a><a class="layer-map__link" data-link-id="2/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1401.788,668.35249 -20.3831,35.7599 8.2247,4.29119 -0.3576,24.31673 62.2223,26.10472 26.8199,-21.45594 -0.3576,-11.80076 8.5824,-23.95913 -15.0192,-4.29119z"></path>
                  </a><a class="layer-map__link" data-link-id="1/3" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1788.3525,731.28991 -14.6616,23.95913 -4.2912,12.51597 -12.5159,10.72797 10.0128,13.58876 30.7535,11.80076 47.9182,-37.19029 1.4304,-5.00639 -11.8007,-4.29118 1.0728,-13.94636 -7.8672,-1.788 -1.4304,-6.43678 -3.576,-1.0728 -3.2184,3.57599 -18.2375,-6.43678z"></path>
                  </a><a class="layer-map__link" data-link-id="2/2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1551.2644,691.95402 17.8799,32.89911 -6.4368,4.29119 2.1456,10.72797 7.152,2.14559 6.7944,19.66794 -43.2695,32.89911 -3.576,2.50319 -60.4342,-27.17752 0.7152,-20.74074 8.2248,-7.15198 -0.3576,-13.58876 12.1583,-35.4023 22.1712,8.22478 10.7279,-4.29119 4.6488,6.43678z"></path>
                  </a><a class="layer-map__link" data-link-id="1/2" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 1750.447,774.20179 15.7344,18.59515 0.7152,4.64878 6.0791,5.36399 1.0728,17.52235 -27.1775,20.74074 -37.9055,-15.73436 1.0728,-21.09834 -3.2184,-4.64878 9.2976,-18.95275 12.8736,6.07918 1.788,-5.72158h 3.9335z"></path>
                  </a><a class="layer-map__link" data-link-id="19/1" data-modal-side="layer-mob">
                    <path class="layer-map__path" fill="#f9f9f9" d="m 849.10611,453.37917 -14.1602,29.83756 6.32152,2.27574 -2.27575,9.10299 8.59726,-4.5515 18.71169,27.81468 17.19453,6.06865 28.57325,-17.44738 -1.77002,-21.99888 5.81579,-3.03433z"></path>
                  </a></svg>
              </div><a class="small-card" href="#">
                <div class="small-card__content"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dom/map/layer-mob.jpg" alt=""></div>
                <div class="small-card__info">
                  <div class="small-card__titles">
                    <div class="text-lBold _title">Courchevel</div>
                    <div class="text-lBold _size">256 m²</div>
                  </div>
                  <div class="small-card__description">
                    <div class="title">
                      <div class="icon"><img src="" alt=""></div>
                      <div class="caps-m">RUSS-HOUSE</div>
                    </div>
                    <div class="star">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M7.29097 1.42802C7.5812 0.857327 8.4188 0.857326 8.70903 1.42802L10.2598 4.4775C10.375 4.70396 10.5974 4.86096 10.8546 4.89746L14.3225 5.38946C14.9712 5.48149 15.2297 6.25638 14.7598 6.70059L12.2527 9.07074C12.0659 9.24732 11.9807 9.50197 12.0248 9.75153L12.6164 13.0998C12.7273 13.7275 12.0494 14.2063 11.4692 13.9101L8.36781 12.3271C8.13752 12.2095 7.86248 12.2095 7.63219 12.3271L4.53084 13.9101C3.95059 14.2063 3.27266 13.7275 3.38357 13.0998L3.97523 9.75153C4.01933 9.50197 3.93406 9.24732 3.74728 9.07074L1.24021 6.70059C0.770342 6.25638 1.02876 5.48149 1.67746 5.38946L5.14539 4.89746C5.40264 4.86096 5.62499 4.70396 5.74016 4.4775L7.29097 1.42802Z" fill="#F09F32" />
                      </svg>
                      <div class="text-s">5.0</div>
                    </div>
                    <div class="review"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.27012 14.1333C4.78173 13.9477 5.21794 13.7075 5.56155 13.4823C6.31514 13.7742 7.13857 13.9348 8 13.9348C11.5898 13.9348 14.5 11.1512 14.5 7.7174C14.5 4.28363 11.5898 1.5 8 1.5C4.41017 1.5 1.5 4.28363 1.5 7.7174C1.5 9.00542 1.91009 10.2034 2.61215 11.1964C2.6567 12.0174 2.2059 12.7593 1.73802 13.4157C1.32822 13.9906 1.43104 14.4539 2.19515 14.4953C2.53764 14.5139 3.27846 14.4929 4.27012 14.1333Z" fill="#B3B3B3" />
                      </svg>
                      <p class="text-s">68</p><span class="text-s">reviews</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </section>
          <section class="page__block d-middle _black">
            <?php
            $companies_title_first = get_field('companies_title_first');
            $companies_link_first = get_field('companies_link_first');
            $companies_title_second = get_field('companies_title_second');
            $companies_link_second = get_field('companies_link_second');
            ?>
            <div class="title-mixed text-xxl d-mainTitle">
              <?php echo esc_html($companies_title_first ?: "The exhibition features leading construction") ?> <br /> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($companies_link_first ?: "companies") ?></a>
              <?php echo esc_html($companies_title_second ?: "and") ?> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($companies_link_second ?: "material makers") ?></a>
            </div>
            <div class="title-mixed text-xxl d-mainTitle _mob">
              <?php echo esc_html($companies_title_first ?: "The exhibition features leading construction") ?> <br /> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($companies_link_first ?: "companies") ?></a>
              <?php echo esc_html($companies_title_second ?: "and") ?> <a href="#" class="text-xxl nbl-textAnimation"><?php echo esc_html($companies_link_second ?: "material makers") ?></a>
            </div>

            <div class="d-gridSliderSmall">
              <div class="d-grid small">
                <?php
                $companies_grid = new WP_Query([
                  'post_type'      => 'companies-grid',
                  'posts_per_page' => -1,
                  'order'          => 'ASC'
                ]);

                if ($companies_grid->have_posts()) :
                  $all_posts = $companies_grid->posts;
                  $chunks = array_chunk($all_posts, 2);

                  foreach ($chunks as $chunk) : ?>
                    <div class="d-gridCard">
                      <?php
                      foreach ($chunk as $post) :
                        setup_postdata($post);

                        $rate   = get_field('companies-grid_rate', $post->ID);
                        $review = get_field('companies-grid_review', $post->ID);
                        $title  = get_field('companies-grid_title', $post->ID);
                        $img    = get_field('companies-grid_img', $post->ID);
                        $thumb  = get_the_post_thumbnail_url($post->ID, 'full');
                      ?>

                        <a class="card-small" href="<?php echo get_permalink($post->ID); ?>" data-aos="fade-up" data-aos-delay="50">
                          <div class="card-small__content">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                          </div>
                          <div class="card-small__info">
                            <div class="star">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M7.29097 1.42802C7.5812 0.857327 8.4188 0.857326 8.70903 1.42802L10.2598 4.4775C10.375 4.70396 10.5974 4.86096 10.8546 4.89746L14.3225 5.38946C14.9712 5.48149 15.2297 6.25638 14.7598 6.70059L12.2527 9.07074C12.0659 9.24732 11.9807 9.50197 12.0248 9.75153L12.6164 13.0998C12.7273 13.7275 12.0494 14.2063 11.4692 13.9101L8.36781 12.3271C8.13752 12.2095 7.86248 12.2095 7.63219 12.3271L4.53084 13.9101C3.95059 14.2063 3.27266 13.7275 3.38357 13.0998L3.97523 9.75153C4.01933 9.50197 3.93406 9.24732 3.74728 9.07074L1.24021 6.70059C0.770342 6.25638 1.02876 5.48149 1.67746 5.38946L5.14539 4.89746C5.40264 4.86096 5.62499 4.70396 5.74016 4.4775L7.29097 1.42802Z" fill="#F09F32" />
                              </svg>
                              <div class="text-s"><?php echo esc_html($rate ?: "4.5"); ?></div>
                            </div>
                            <div class="review">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.27012 14.1333C4.78173 13.9477 5.21794 13.7075 5.56155 13.4823C6.31514 13.7742 7.13857 13.9348 8 13.9348C11.5898 13.9348 14.5 11.1512 14.5 7.7174C14.5 4.28363 11.5898 1.5 8 1.5C4.41017 1.5 1.5 4.28363 1.5 7.7174C1.5 9.00542 1.91009 10.2034 2.61215 11.1964C2.6567 12.0174 2.2059 12.7593 1.73802 13.4157C1.32822 13.9906 1.43104 14.4539 2.19515 14.4953C2.53764 14.5139 3.27846 14.4929 4.27012 14.1333Z" fill="#B3B3B3" />
                              </svg>
                              <p class="text-s"><?php echo esc_html($review ?: "1 265"); ?></p>
                              <span class="text-s"><?php echo esc_html($title ?: "reviews"); ?></span>
                            </div>
                          </div>
                        </a>

                      <?php endforeach; ?>
                    </div>
                <?php endforeach;

                  wp_reset_postdata();
                else:
                  echo '<p>There are no links yet</p>';
                endif;
                ?>
              </div>
            </div>
            <div class="d-grid _desktop small">

              <?php
              $companies_grid = new WP_Query([
                'post_type' => 'companies-grid',
                'posts_per_page' => -1,
                'order' => 'ASC'
              ]);

              if ($companies_grid->have_posts()) :
                while ($companies_grid->have_posts()) : $companies_grid->the_post();

                  $companies_grid_rate = get_field('companies-grid_rate');
                  $companies_grid_review = get_field('companies-grid_review');
                  $companies_grid_title = get_field('companies-grid_title');
                  $companies_grid_img = get_field('companies-grid_img');

              ?>

                  <a class="card-small" href="#" data-aos="fade-up" data-aos-delay="50">
                    <div class="card-small__content"> <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt=""></div>
                    <div class="card-small__info">
                      <div class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                          <path d="M7.29097 1.42802C7.5812 0.857327 8.4188 0.857326 8.70903 1.42802L10.2598 4.4775C10.375 4.70396 10.5974 4.86096 10.8546 4.89746L14.3225 5.38946C14.9712 5.48149 15.2297 6.25638 14.7598 6.70059L12.2527 9.07074C12.0659 9.24732 11.9807 9.50197 12.0248 9.75153L12.6164 13.0998C12.7273 13.7275 12.0494 14.2063 11.4692 13.9101L8.36781 12.3271C8.13752 12.2095 7.86248 12.2095 7.63219 12.3271L4.53084 13.9101C3.95059 14.2063 3.27266 13.7275 3.38357 13.0998L3.97523 9.75153C4.01933 9.50197 3.93406 9.24732 3.74728 9.07074L1.24021 6.70059C0.770342 6.25638 1.02876 5.48149 1.67746 5.38946L5.14539 4.89746C5.40264 4.86096 5.62499 4.70396 5.74016 4.4775L7.29097 1.42802Z" fill="#F09F32" />
                        </svg>
                        <div class="text-s"><?php echo esc_html($companies_grid_rate ?: "4.5") ?></div>
                      </div>
                      <div class="review">
                        <img src="<?php echo esc_url($companies_grid_img) ?>" alt="" />
                        <p class="text-s"><?php echo esc_html($companies_grid_review ?: "1200") ?></p><span class="text-s"><?php echo esc_html($companies_grid_title ?: "reviews") ?></span>
                      </div>
                    </div>
                  </a>

              <?php
                endwhile;
                wp_reset_postdata();
              else:
                echo '<p>There are no links yet</p>';
              endif;
              ?>
            </div>
            <?php
            $all_manufactures_link = get_field('all_manufactures_link');
            $all_manufactures_link_text = get_field('all_manufactures_link_text');
            ?>
            <a class="accent-link _left" href="<?php echo esc_url($all_manufactures_link ?: "https://www.apple.com/") ?>">
              <div class="btn-accent"><?php echo esc_html($all_manufactures_link_text ?: "All manufacturers") ?></div><svg xmlns="http://www.w3.org/2000/svg" width="6" height="8" viewBox="0 0 6 8" fill="none">
                <path d="M1 7L4 4L1 1" stroke="#FF783D" stroke-width="1.5" />
              </svg>
            </a>
          </section>
          <section class="page__block d-middle _black">
            <?php
            $news_title = get_field('news_title');
            ?>
            <div class="text-xxl d-mainTitle"><?php echo esc_html($news_title ?: "Exhibition news"); ?></div>
            <div class="d-newsSlider">
              <div class="d-news">

                <?php
                $exhibition_item = new WP_Query([
                  'post_type' => 'exhibition-item',
                  'posts_per_page' => -1,
                  'order' => 'ASC'
                ]);

                if ($exhibition_item->have_posts()) :
                  while ($exhibition_item->have_posts()) : $exhibition_item->the_post();

                    $exhibition_data = get_field('exhibition_data');
                    $exhibition_title = get_field('exhibition_title');
                    $exhibition_text = get_field('exhibition_text');
                    $exhibition_item_link = get_field('exhibition_item_link');

                ?>

                    <a class="d-news__el" href="<?php echo esc_url($exhibition_item_link ?: "https://www.apple.com/iphone-air/") ?>" data-aos="fade-up" data-aos-delay="50">
                      <div class="d-news__el-info">
                        <div class="text-l"><?php echo esc_html($exhibition_data ?: "September 20") ?></div>
                      </div>
                      <div class="d-news__content">
                        <div class="d-news__content-img"> <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt=""></div>
                        <div class="d-news__content-info">
                          <p class="text-l"><?php echo esc_html($exhibition_title ?: "Construction Technology Tours - September 13") ?></p>
                          <p class="text-m"><?php echo esc_html($exhibition_text ?: "We invite you to free tours of suburban construction technologies at our exhibition on Domodedovskaya Street, which will take place on September 13!") ?></p>
                        </div>
                      </div>
                    </a>

                <?php
                  endwhile;
                  wp_reset_postdata();
                else:
                  echo '<p>there are no exhibition blocks yet</p>';
                endif;
                ?>
              </div>
            </div>
            <?php
            $all_news_link = get_field('all_news_link');
            $all_news_link_text = get_field('all_news_link_text');
            ?>
            <a class="accent-link _left" href="<?php echo esc_url($all_news_link ?: "https://www.apple.com/") ?>">
              <div class="btn-accent"><?php echo esc_html($all_news_link_text ?: "all news") ?></div><svg xmlns="http://www.w3.org/2000/svg" width="6" height="8" viewBox="0 0 6 8" fill="none">
                <path d="M1 7L4 4L1 1" stroke="#FF783D" stroke-width="1.5" />
              </svg>
            </a>
          </section>
        </div>
        <div class="nbl-cookies">
          <div class="nbl-cookies__body">
            <div class="text-lBold">We use cookies</div>
            <div class="text-m">
              This site uses cookies to provide a better user experience,
              analyze traffic, and personalize content. By continuing to use this site,
              you agree to our use of cookies.
            </div>
            <div class="nbl-cookies__body-btns">
              <button class="nbl-cookies__close">Okay</button><a class="nbl-cookies__link" href="#">Read more</a>
            </div>
          </div>
        </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>