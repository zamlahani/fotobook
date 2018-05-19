<?php
/**
 * Template Name: Fotobook Homepage Template
 *
 * 
 * 
 *
 * @package understrap
 */

$callToActionText  = esc_html(get_theme_mod( 'fotobook_calltoaction_text', 'make your photobook' ));
$callToActionUrl  = esc_url(get_theme_mod( 'fotobook_calltoaction_url', '#' ));
$bnnrTtl = esc_html(get_theme_mod( 'fotobook_banner_title', 'create your own photostory' ));
$bnnrTtl1stLttr = substr($bnnrTtl,0,1);
$bnnrTtlRst = substr($bnnrTtl,1);
$imgBoxSctnTtl = esc_html(get_theme_mod( 'fotobook_imagebox_section_title', 'advantage' ));
$prcTblSctnTtl = esc_html(get_theme_mod( 'fotobook_pricetable_section_title', 'ready solutions' ));
$testiSctnTtl = esc_html(get_theme_mod( 'fotobook_testimonial_section_title', 'testimonials' ));

$iconBox = array(
	array(
		'title' => 'Download photos',
		'fa-bg' => 'cloud',
		'fa-fg' => 'arrow-down'),
	array(
		'title' => 'Design your photobook',
		'fa-bg' => 'desktop',
		'fa-fg' => 'paint-brush'),
	array(
		'title' => 'Pay for service',
		'fa-bg' => 'credit-card',
		'fa-fg' => 'dollar'),
	array(
		'title' => 'Get your photobook',
		'fa-bg' => 'image',
		'fa-fg' => 'check'),
);

$imageBox = array(
	array(
		'title' => 'Import photos from your social networks',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et interdum urna. Donec sollicitudin velit a nisl convallis consectetur.',
		'imgUrl' => get_template_directory_uri().'/img/social_media-min.jpg'),
	array(
		'title' => 'Photo editing',
		'description' => 'Lorem ipsum dolor sit amet, per cu harum vitae. Mei cu detraxit sensibus, solum error meliore no mel, eum at partem audire.',
		'imgUrl' => get_template_directory_uri().'/img/kitten-min.jpg'),
	array(
		'title' => 'Templates',
		'description' => 'Lorem ipsum dolor sit amet, nullam quaestio oportere sed ut. Labitur scaevola honestatis in mel. Idque verear viderer est in.',
		'imgUrl' => get_template_directory_uri().'/img/templates-min.jpg'),
);

$priceTable = array(
	array(
		'title'	=> 'LightBook',
		'features' => '15&times;10 cm,12 pages,binding on the clip',
		'price' => 129,
		'linkText' => 'Make your LightBook',
		'url' => '#',
		'bestseller' => false),
	array(
		'title'	=> 'ClassicBook',
		'features' => '30&times;21 cm,36 pages,binding on the spring,fabric cover',
		'price' => 239,
		'linkText' => 'Make your ClassicBook',
		'url' => '#',
		'bestseller' => true),
	array(
		'title'	=> 'PremiumBook',
		'features' => '42&times;50 cm,50 pages,hardcover,leather cover,free shipping',
		'price' => 759,
		'linkText' => 'Make your PremiumBook',
		'url' => '#',		
		'bestseller' => false)
);

$testimonials = array(
	array(
		'title' => 'isyana',
		'subtitle' => 'Musician, songwriter',
		'imgUrl' => get_template_directory_uri().'/img/isyana_square-min.jpg',
		'description' => 'Lorem ipsum dolor sit amet, animal facilisi per in, aliquip tamquam copiosae sea in. Consul recusabo consectetuer ei est, soluta nemore facilisis pri id. Cu his alia nusquam mentitum. Quo delenit accusata reprimique et, at viris affert incorrupte mel, ex cibo malorum consetetur quo.',
		'controlCaption' => 'Next testimonial'
	),
	array(
		'title' => 'raisa',
		'subtitle' => 'Profesional singer',
		'imgUrl' => get_template_directory_uri().'/img/raisa_square-min.jpg',
		'description' => 'Lorem ipsum dolor sit amet, probo munere feugiat duo ut. Pro ne alii reque. Qui amet quidam aeterno id, ea utinam suscipit sed, eam novum dignissim referrentur ne. Eum constituto constituam id. Elit dicant denique nam no. Pri summo feugait no, no vis dicam nostrud, ad eos commodo aliquid.',
		'controlCaption' => 'Previous testimonial'
	),
);

$bottomCards = array(
	array(
		'title' => 'terms',
		'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.',
	),
	array(
		'title' => 'payment',
		'text' => 'Payment methods: <ul><li>VISA</li><li>MasterCard</li><li>PayPal</li><li>American Express</li></ul>',
	),
	array(
		'title' => 'shipping',
		'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><span class="font-weight-bold text-primary">Free shipping for <span class="text-uppercase">P<span class="small">remium</span>B<span class="small">ook</span></span></span>',
	),
);

get_header(); ?>

<main>
<section id="mainBanner" class="py-5">
	<div class="carousel">
  		<div class="carousel-inner">
    		<div class="carousel-item active">
      			<img class="d-block w-100" src="<?php echo esc_url(get_theme_mod( 'fotobook_banner_url', get_template_directory_uri().'/img/main_banner-min.jpg' )); ?>" alt="<?php echo esc_attr(get_theme_mod( 'fotobook_banner_alt_text' )); ?>">
      			<div class="carousel-caption d-none d-md-block">
    				<h1 class="display-4 d-none d-lg-block text-dark">
    					<span class="text-uppercase"><?php echo $bnnrTtl1stLttr ?><span class="small"><?php echo $bnnrTtlRst ?></span></span>
    				</h1>
    				<h1 class="d-lg-none text-dark">
    					<span class="text-uppercase"><?php echo $bnnrTtl1stLttr ?><span class="small"><?php echo $bnnrTtlRst ?></span></span>
    				</h1>
    				<p class="lead text-dark mb-5"><?php echo esc_html(get_theme_mod( 'fotobook_banner_subtitle', 'Make your photobook online' )) ?></p>
    				<a class="btn btn-outline-dark btn-lg text-uppercase px-5 py-3" href="<?php echo $callToActionUrl ?>"><?php echo $callToActionText ?></a>
  				</div>
  			</div>
  		</div>
	</div>
</section>

<section id="step" class="step py-5 text-center">
	<div class="container">
		<div class="row">
			<?php foreach ($iconBox as $i => $iconItem) { ?>			
			<div class="col-sm-6 col-lg-3 py-3">
				<div class="border border-secondary rounded-circle d-inline-block p-5">
					<span class="fa-stack fa-2x">
						<i class="fa fa-<?php echo esc_attr(get_theme_mod('fotobook_icon_bg_'.$i, $iconItem['fa-bg'])); ?> fa-stack-2x" aria-hidden="true"></i>
						<i class="fa fa-<?php echo esc_attr(get_theme_mod('fotobook_icon_fg_'.$i, $iconItem['fa-fg'])); ?> fa-stack-1x text-secondary" aria-hidden="true"></i>
					</span>
				</div>
				<h3 class="font-weight-light py-3">
					<?php echo esc_html(get_theme_mod('fotobook_icon_title_'.$i, $iconItem['title'])); ?>
				</h3>
			</div>
			<?php } ?>			
		</div>
	</div>
</section>
<section id="advantage" class="py-5 text-center bg-light">
	<h2 class="display-4">
		<span class="text-uppercase"><?php echo substr($imgBoxSctnTtl,0,1) ?><span class="small"><?php echo substr($imgBoxSctnTtl,1) ?></span></span>
	</h2>
	<div class="container my-5">
		<div class="row">
			<?php foreach ($imageBox as $i => $imageBoxItem) { ?>
			<div class="col-md-4 py-3">
				<img src="<?php echo esc_url(get_theme_mod('fotobook_imagebox_url_'.$i, $imageBoxItem['imgUrl']))  ?>" class="rounded-circle" height="300" width="300" alt="<?php echo esc_attr(get_theme_mod( 'fotobook_imagebox_alttext_'.$i )); ?>">
				<h3 class="font-weight-light my-3"><?php echo esc_html(get_theme_mod('fotobook_imagebox_title_'.$i, $imageBoxItem['title'])) ?></h3>
				<p><?php echo esc_html(get_theme_mod('fotobook_imagebox_description_'.$i, $imageBoxItem['description'])) ?></p>
			</div>
			<?php } ?>			
		</div>
	</div>
	<a href="#" class="btn btn-primary btn-lg text-uppercase px-5 py-3"><?php echo $callToActionText ?></a>
</section>
<section class="py-5 text-center pricelist" id="readySolution">
	<h2 class="display-4">
		<span class="text-uppercase"><?php echo substr($prcTblSctnTtl,0,1) ?><span class="small"><?php echo substr($prcTblSctnTtl,1) ?></span></span>
	</h2>
	<div class="container py-5">		
		<div class="row card-deck">
			<?php foreach ($priceTable as $i => $solutionItem) { ?>			
			<div class="col-lg-4 d-flex flex-column py-3">
				<div <?php if(get_theme_mod('fotobook_pricecolumn_bestseller_'.$i,$solutionItem['bestseller'])!=true) echo "class='invisible'"; ?>>					
					<div style="border-left: 32px solid transparent;border-bottom:  32px solid #ffc107;" class="align-bottom d-inline-block"></div><div class="bg-secondary font-weight-bold d-inline-block text-primary pt-2 px-3">BESTSELLER</div><div style="border-right: 32px solid transparent;border-bottom:  32px solid #ffc107;" class="align-bottom d-inline-block"></div>
				</div>
				<div class="card border-secondary">
					<div class="card-header bg-secondary">
						<h3 class="card-title"><?php echo esc_html(get_theme_mod('fotobook_pricecolumn_title_'.$i, $solutionItem['title'])) ?></h3>
					</div>
					<div class="card-body bg-white d-flex flex-column">
						<div class="card-text text-left">
							<ul class="list-group list-group-flush">
								<?php foreach( explode(',',get_theme_mod('fotobook_pricecolumn_features_'.$i,$solutionItem['features'])) as $feature) { ?>
									<li class="list-group-item">
									<span class="fa-stack">
										<i class="fa fa-circle-thin text-secondary fa-stack-2x" aria-hidden="true"></i>
										<i class="fa fa-check fa-stack-1x" aria-hidden="true"></i>
									</span>
									<?php echo esc_html($feature); ?>
								</li>
								<?php } ?>								
							</ul>
						</div>
						<div class="card-text price mt-auto">$<?php echo esc_html(get_theme_mod('fotobook_pricecolumn_price_'.$i, $solutionItem['price'])) ?></div>
					</div>					
					<div class="card-footer bg-secondary">						
						<div class="card-text lead">
							<a href="<?php echo esc_url(get_theme_mod('fotobook_pricecolumn_url_'.$i, $solutionItem['url'])) ?>" class="text-dark"><?php echo esc_html(get_theme_mod('fotobook_pricecolumn_linktext_'.$i, $solutionItem['linkText'])) ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>			
		</div>
	</div>
</section>
<section id="testimonial" class="py-5" style="background: url(<?php echo esc_url(get_theme_mod('fotobook_testimonial_background',get_template_directory_uri().'/img/banner_2-min.jpg')) ?>); background-size: cover">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2 class="display-4">
					<span class="text-uppercase"><?php echo substr($testiSctnTtl,0,1) ?><span class="small"><?php echo substr($testiSctnTtl,1) ?></span></span>
				</h2>
				<div id="testimonialCarousel" class="carousel slide py-4 mb-5" data-ride="carousel">
					<div class="carousel-inner">
						<?php foreach ($testimonials as $i => $testimonial) { ?>
						<div class="carousel-item<?php if($i==0) echo ' active' ?>">
							<div class="pb-3">
								<img src="<?php echo esc_url(get_theme_mod('fotobook_testimonial_image_'.$i,$testimonial['imgUrl'])) ?>" class="rounded-circle" height="160" width="160" alt="<?php echo esc_attr(get_theme_mod('fotobook_testimonial_alttext_'.$i)) ?>">
								<div class="d-inline-block align-middle ml-3">
									<h3 class="">
										<?php $name = esc_html(get_theme_mod('fotobook_testimonial_name_'.$i,$testimonial['title'])) ?>
										<span class="text-uppercase"><?php echo substr($name, 0, 1) ?><span class="small"><?php echo substr($name, 1) ?></span></span>
									</h3>						
									<div><?php echo esc_html(get_theme_mod('fotobook_testimonial_job_'.$i,$testimonial['subtitle'])) ?></div>
								</div>
							</div>
							<div>
								<p><?php echo esc_html(get_theme_mod('fotobook_testimonial_comment_'.$i,$testimonial['description'])) ?></p>					
							</div>
							<div class="py-3<?php if($i==0) echo ' text-right' ?>">					
								<a href="#testimonialCarousel" class="text-dark small" data-slide="<?php echo ($i==0) ? 'next' : 'prev' ?>">
									<?php if ($i==0) { echo esc_html(get_theme_mod('fotobook_testimonial_control_next',$testimonial['controlCaption'])); ?>	
										<i class="fa fa-arrow-right fw" aria-hidden="true"></i>
									<?php } else { ?>
										<i class="fa fa-arrow-left fw" aria-hidden="true"></i>
									<?php echo esc_html(get_theme_mod('fotobook_testimonial_control_prev',$testimonial['controlCaption'])); } ?>								
								</a>					
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="text-center">
					<a href="#" class="btn btn-outline-dark btn-lg text-uppercase px-5 py-3"><?php echo $callToActionText ?></a>
				</div>				
			</div>
		</div>
	</div>
</section>
<section id="bottomCards" class="py-5">
	<div class="container py-5">
		<div class="row card-deck">
			<?php foreach ($bottomCards as $i => $bottomItem) { ?>			
			<div class="col-md-4 d-flex flex-column">
				<div class="card border-0">
					<div class="card-header bg-secondary text-center">
						<h3>
							<?php $title = esc_html(get_theme_mod('fotobook_bottom_card_title_'.$i,$bottomItem['title'])) ?>
							<span class="text-uppercase"><?php echo substr($title, 0, 1) ?><span class="small"><?php echo substr($title, 1) ?></span></span>
						</h3>						
					</div>
					<div class="card-body bg-light">
						<div class="card-text"><?php echo wp_kses_post(get_theme_mod('fotobook_bottom_card_text_'.$i,$bottomItem['text'])) ?></div>
					</div>
					<div class="card-footer border-0 bg-light"></div>
				</div>
			</div>
			<?php } ?>			
		</div>		
	</div>
	<div class="text-center pb-5">
			<a href="#" class="btn btn-primary btn-lg text-uppercase px-5 py-3"><?php echo $callToActionText ?></a>
		</div>
</section>
</main>

<?php get_footer(); ?>