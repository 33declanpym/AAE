<?php
	$headerBg = get_option(THEME_NAME."_header_bg");
	$logo = get_option(THEME_NAME.'_logo');
	$search = get_option(THEME_NAME.'_search');
	$topBanner = get_option(THEME_NAME."_top_banner");
	$topBannerCode = get_option(THEME_NAME."_top_banner_code");
	$alertBox = get_option(THEME_NAME."_alert_box");
?>
		<!-- BEGIN .boxed -->
		<div class="boxed">

			<!-- BEGIN .header -->
			<div class="header"<?php if($headerBg) { ?> style="background:url(<?php echo $headerBg;?>); background-repeat:repeat;"<?php } ?>>

				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="left-side-header">
						<div class="vertical-middle">
						<?php if($logo) { ?>
							<h1 class="with-logo-bg" style="background-image:url(<?php echo $logo;?>);width:700px;height:83px;">
								<a href="<?php echo home_url(); ?>"><?php OT_page_main_title(); ?></a>
							</h1>
						<?php } else { ?>
							<h1>
								<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
							</h1>
						<?php } ?>
							<p class="descr-text-header"><?php bloginfo('description'); ?></p>
						</div>
					</div>
					<?php if($topBanner) { ?>
						<div class="header-banner">
							<?php echo stripslashes($topBannerCode);?>
						</div>
					<?php } ?>
				<!-- END .wrapper -->
				</div>

			<!-- END .header -->
			</div>

			<!-- BEGIN .menu -->
			<div class="menu">

				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<?php
						if ( function_exists( 'register_nav_menus' )) {
							$args = array(
								'container' => '',
								'theme_location' => 'top-menu',
								"link_before" => '<i>',
								"link_after" => '</i>' ,
								'items_wrap' => '<ul class="%2$s ul-main-menu" >%3$s</ul>',
								'depth' => 3,
								"echo" => false
							);


							if(has_nav_menu('top-menu')) {
								echo add_menu_arrows(wp_nav_menu($args));
							} else {
								echo "<ul class=\"ul-main-menu\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
							}

						}

					?>
					<?php if($search=="on") { ?>
						<div class="right-menu-side">
							<?php get_template_part("searchform");?>
						</div>
					<?php } ?>
				<!-- END .wrapper -->
				</div>

			<!-- END .menu -->
			</div>

					<?php
						if ( function_exists( 'register_nav_menus' )) {
							$args = array(
								'container' => '',
								'theme_location' => 'middle-menu',
								"link_before" => '<i>',
								"link_after" => '</i>' ,
								'items_wrap' => '<ul class="ul-secondary-menu" >%3$s</ul>',
								'depth' => 0,
								"echo" => false
							);


							if(has_nav_menu('middle-menu')) {
							?>
								<!-- BEGIN .secondary-menu -->
								<div class="secondary-menu">

									<!-- BEGIN .wrapper -->
									<div class="wrapper">
									<?php echo add_menu_arrows(wp_nav_menu($args)); ?>

									<!-- END .wrapper -->
									</div>

								<!-- END .secondary-menu -->
								</div>
							<?php
							}

						}
					?>

			<!-- BEGIN .content -->
			<div class="content">

				<!-- BEGIN .wrapper -->
				<div class="wrapper">
				<?php if($alertBox) { ?>
					<div class="bearking-message">
						<p><span class="text-icon">&#59141;</span><?php echo $alertBox; ?></p>
					</div>
				<?php } ?>