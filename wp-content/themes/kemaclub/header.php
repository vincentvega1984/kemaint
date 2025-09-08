<?php
/**
 * The header for our theme
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<meta name="google-site-verification" content="DZqaZW_0ZXb2XM5ZM4exk54nPga8e25mwXhfq7f8q4U" />
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(30235559, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<!-- /Yandex.Metrika counter -->	
<?php if ( get_theme_mod( 'jivosite_switcher', true ) ) : ?>
   <script src="//code.jivo.ru/widget/tjG5MWCTMy" async></script>
<?php endif; ?>
</head>

<body <?php body_class(); ?>>

<header class="header">
	<?php get_template_part( 'components/header/header-top' ); ?>
	<?php get_template_part( 'components/header/header-main' ); ?>
</header>