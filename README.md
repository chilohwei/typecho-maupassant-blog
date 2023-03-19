每次切换一个博客模板的时候，总觉得有许多地方看起来不尽人意。这次的maupassant模板也不例外，于是发挥自己半吊子的代码水平，在原模板基础上做了一些修改优化。这里记录一下部分修改的方法，以供有相同需要的朋友参考。

### 博客主题

- Typecho：https://github.com/pagecho/maupassant/

![template preview](https://ddydeg.by3302.livefilestore.com/y2p1ZgHER4eIFaEHhwaf96MvZH4_iLufEIDj7o8acDgI1GXFDtPI-eRAgvokFoR9irbz738gMmWc_N7yexG6uhB1Dcmelb0cXg8HexpiAdZ5HQ/m.png "Maupassant template preview")


### 调整内容

调整后样式参考：[Chiloh Wei](https://chiloh.cn)

#### 1. 文章日期修改

主要修改了首页标题下日期，以及边栏归档日期的显示。修改方法如下：

- 打开index.php文件，改为date('n月 j, Y')。

```php
<date class="post-meta">
	<?php $this->date('n月 j, Y'); ?>
</date>
```

- 打开sidebar.php文件，改为type=month&format=Y年m月。

```php
<section class="widget">
	<h3 class="widget-title"><?php _e('归档'); ?></h3>
    <ul class="widget-list">
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')
        ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
    </ul>
</section>
```

#### 2. 链接颜色修改

maupassant模板本身的链接颜色，在阅读时的感官体验不是很好，于是自己做了修改。修改方法如下：

- 打开style.css文件，将color改为#C83C23。

```css
.post-content a, .comment-content a {
    border-bottom:1px solid #ddd;
    color: #C83C23;
}
```

#### 3. 代码高亮修改

对于模板自带的代码高亮不是很满意，自己基于highlight.js做了修改。修改方法如下;

- 打开footer.php文件，引入highlight.js 。

```javascript
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.5.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
```

- 打开header.php，引入css样式文件。可以自行在[highlight.js](https://highlightjs.org/)官网选择。

```html
<link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.5.0/build/styles/default.min.css">
```

#### 4. 中西文自动加空格

比较习惯中西文之间有空格的排版方式，于是参考网上做了修改。修改方法如下：

- 打开footer.php文件，在\<body>标签中加入下面代码。

```html
<!-- 自动添加空格 -->
<script src="https://cdn.jsdelivr.net/npm/pangu@4.0.7/dist/browser/pangu.min.js"></script>
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
```

#### 5. 文章页添加翻页

maupassant模板的文章页，默认没有上一篇、下一篇这样的文章翻页功能。添加方法如下：

- 打开post.php文件，在\</article>标签后添加下面代码。

```php
<div class="post-nav">
	<div class="post-nav-pre" style="float:left;">
		<?php $this->thePrev('上一篇 : %s', ''); ?>
	</div>  
	<div class="post-nav-next" style="float:right;">
	    <?php $this->theNext('下一篇 : %s', ''); ?>
	</div>
</div>
```

- 如果要样式与我一样，打开style.css添加下面代码。

```css
/* 文章翻页 */
.post-nav{
    overflow: hidden;
    margin: 35px 0;
    padding-top: 10px;
    border-top: 1px solid #ddd;
}

.post-nav-pre a{
    color:#C83C23;
}

.post-nav-next a{
    color:#C83C23;
}
```

#### 6. 边栏最新文章

边栏默认最新文章调用10篇，有些太多了，自己调整为5篇。修改方法如下：

- 打开sidebar.php，在Widget_Contents_Post_Recent后加上：,'pageSize=5'。

```php
<ul class="widget-list">
    <?php $this->widget('Widget_Contents_Post_Recent','pageSize=5')
    ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
```

#### 7. 添加版权声明

阅读文章的时候，总觉得结尾需要分明一些，于是添加了版权声明来区分。优化方法如下：

- 打开post.php，在\</article>标签后，添加版权声明代码。

```php
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
```

- 打开style.css，添加版权声明样式。

```css
/* 版权声明 */
.copyright{
    background-color: #f0f0f0;
    padding: 12px;
    line-height: 1.6;
}
.cp-url a{
    color:#C83C23;
    border-bottom: 1px solid #ddd;
}
.cp-cc a{
    color: #C83C23;
    border-bottom: 1px solid #ddd;
}
```

#### 8. 添加打赏功能

其实比较犹豫要不要加这个功能，自觉自己的文章还达不到有人赞赏的水平。不过为了版面好看，还是先加上去了，也许某个大佬会支持也说不定的哈哈。添加方法如下：

- 打开post.php，添加下面代码在合适位置。

```php
<div style="padding: 10px 0; margin: 20px auto; width: 100%; font-size:16px; text-align: center;"> 
    <button id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}"> <span>打赏</span> </button> 
    <p style="color:#999;font-size:14px;">多寡随意，丰俭由人</p>
    <div id="QR" style="display: none;"> 
        <div id="wechat" style="display: inline-block"> 
        <a class="fancybox" rel="group"><img id="wechat_qr" src="https://chilohdata.oss-cn-hongkong.aliyuncs.com/imgs/wechatpay.png" alt="WeChat Pay" /></a> 
        <p> 微信打赏 </p> 
        </div> 
        <div id="alipay" style="display: inline-block"> 
        <a class="fancybox" rel="group"><img id="alipay_qr" src="https://chilohdata.oss-cn-hongkong.aliyuncs.com/imgs/alipay.png" alt="Alipay" /></a> 
        <p> 支付宝打赏 </p> 
        </div> 
    </div> 
</div>
```
- 打开style.css，添加打赏按钮样式文件。可以按照自己喜好自行修改。

```css
/* 文章打赏 */
#QR {
    padding-top: 20px;
    border: #f05050;
}

#QR a {
	border: 0
}

#QR img {
	width: 180px;
	max-width: 100%;
	display: inline-block;
	margin: .8em 2em 0 2em
}

#rewardButton {
	border: 1px solid #f05050;
	line-height: 36px;
	text-align: center;
	height: 36px;
	display: block;
	border-radius: 4px;
	-webkit-transition-duration: .4s;
	transition-duration: .4s;
	background-color: #f05050;
	color: #fff;
	margin: 0 auto;
	padding: 0 25px
}

#rewardButton:hover {
	color: #f77b83;
	border-color: #f77b83;
	outline-style: none
}

#rewardButton {
	background-color: #f05050;
	color: white;
	border-radius: 50px;
	cursor: pointer;
}
```

#### 9. 图片 & 引用样式优化

文章中的图片之前容易跟背景色融合，于是这次加上了boder，同时也做了圆角处理，加了二层阴影。代码如下：

```css
.post-content img, .comment-content img {
    max-width:100%;
    margin-left: auto; 
    margin-right:auto; 
    display:block;
    border: 1px solid #f0f0f0;
    border-radius: 6px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
}
```

原先的 blockquote 样式中，文字过大，且排版在整体阅读时不太好看，于是做了处理：

```css
    margin: 1.5em 0em;
    padding: 0.5em 1.5em;
    /* padding-left: 1.5em; */
    border-left: 4px solid #ddd;
    color: #777;
    font-size: 0.82em;
    background-color: #f9f9f9;
```

#### 10. 简单总结一下

上面就是基于maupassant模板，这边做的一些简单优化了。所有修改后的效果，都可以在网站里直接看到。有不清楚的地方，可以在评论里相互交流，或者通过下方邮箱联系我。

- **邮件：** Y2hpbG9od2VpQGdtYWlsLmNvbQ==（注：Base 64 解码）
