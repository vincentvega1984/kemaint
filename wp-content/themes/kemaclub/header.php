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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GCBWVJXB51"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GCBWVJXB51');
</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();
for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(101507354, "init", {
    clickmap:true,
    trackLinks:true,
    accurateTrackBounce:true,
    webvisor:true
});
</script>
<!-- /Yandex.Metrika counter -->
</head>

<body <?php body_class(); ?>>

<header class="header">
	<?php get_template_part( 'components/header/header-top' ); ?>
	<?php get_template_part( 'components/header/header-main' ); ?>
</header>