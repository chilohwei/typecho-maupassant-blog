<?php $this->need('header.php'); ?>
<div class="col-8" id="main">
	<div class="res-cons">
		<article class="post">
			<header>
				<h1 class="post-title"><?php $this->title() ?></h1>
			</header>
			<date class="post-meta">
				<?php $this->date('n月 j, Y'); ?>
			</date>
			<div class="post-content">
			<?php $this->content(); ?>
			</div>
		</article>
		<div class=copyright>
				<div class=cp-title>
					<strong>本文标题：</strong><?php $this->title(); ?>
				</div>
				<div class=cp-author>
					<strong>文章作者：</strong><?php $this->author(); ?>
				</div>
				<div class=cp-date>
					<strong>发布时间：</strong><?php $this->date('Y 年 m 月 d 日'); ?>
				</div>
				<div class=cp-update>
					<strong>更新时间：</strong><?php echo date('Y 年 m 月 d 日', $this->modified);?>
				</div>
				<div class=cp-url>
					<strong>原始链接：</strong><a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>
				</div>
				<div class=cp-cc>
					<strong>许可协议：</strong><a href="http://creativecommons.org/licenses/by/4.0/deed.zh" target="_blank" rel="noopener noreferrer nofollow">署名 4.0 国际（CC BY 4.0）</a>，转载请保留原文链接和作者。
				</div>
		</div>
		<div style="padding: 10px 0; margin: 20px auto; width: 100%; font-size:16px; text-align: center;"> 
			   <button id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}"> <span>打赏</span> </button> 
			   <p style="color:#999;font-size:14px;">多寡随意，丰俭由人</p>
			<div id="QR" style="display: none;"> 
				<div id="wechat" style="display: inline-block"> 
				<a class="fancybox" rel="group"><img id="wechat_qr" src="https://chilohdata.oss-cn-hongkong.aliyuncs.com/imgs/wechatpay.png?x-oss-process=style/webp" alt="WeChat Pay" /></a> 
				<p> 微信打赏 </p> 
				</div> 
				<div id="alipay" style="display: inline-block"> 
				<a class="fancybox" rel="group"><img id="alipay_qr" src="https://chilohdata.oss-cn-hongkong.aliyuncs.com/imgs/alipay.png?x-oss-process=style/webp" alt="Alipay" /></a> 
				<p> 支付宝打赏 </p> 
				</div> 
			</div> 
  		</div>
    	<div class="post-nav">
			<div class="post-nav-pre" style="float:left;">
				<?php $this->thePrev('上一篇 : %s', ''); ?>
			</div>  
			<div class="post-nav-next" style="float:right;">
				<?php $this->theNext('下一篇 : %s', ''); ?>
			</div>
		</div>
		<?php $this->need('comments.php'); ?>
	</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>