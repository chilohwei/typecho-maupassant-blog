		</div>
    </div>
</div>
<footer id="footer">
	<div class="container">
		&copy; 2017 - <?php echo date('Y'); ?> <a rel="nofollow" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a><a href="/privacy.html" target="_blank" data-target="blank" rel="noopener noreferrer"> - 隐私政策 -</a><a href="/sitemap.xml" target="_blank" data-target="blank" rel="nofollow noopener noreferrer"> 站点地图 - </a><a href="/feed" rel="nofollow noopener noreferrer">RSS订阅</a> -<a href="https://github.com/pagecho/maupassant/" target="_blank" data-target="blank" rel="nofollow noopener noreferrer"> 主题作者：cho </a>
	</div>
</footer>
<?php $this->footer(); ?>
<!-- Pangu.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pangu/4.0.7/pangu.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pangu/4.0.7/pangu.min.js"></script>
<script>
  const text = pangu.spacing("當你凝視著bug，bug也凝視著你");
  // text = '當你凝視著 bug，bug 也凝視著你'

  pangu.spacingElementById('main');
  pangu.spacingElementByClassName('comment');
  pangu.spacingElementByTagName('p');

  document.addEventListener('DOMContentLoaded', () => {
    // listen to any DOM change and automatically perform spacing via MutationObserver()
    pangu.autoSpacingPage();
  });
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N32KSP12CC"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N32KSP12CC');
</script>
<!-- Code Highlight -->
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.1.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
