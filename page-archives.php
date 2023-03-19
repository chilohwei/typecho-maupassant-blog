<?php
/**
 * Archives
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="col-md-12">
        <article class="page-wrapper" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="post-content" itemprop="articleBody">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives); 
                $year=0; $mon=0; $i=0; $j=0;
                $output = '<div class="archives">';
                while($archives->next()){
                    $year_tmp = date('Y',$archives->created);
                    $mon_tmp = date('m',$archives->created);
                    $y=$year; $m=$mon;
                    if ($year > $year_tmp || $mon > $mon_tmp) {
                        $output .= '</ul></div>';
                    }
                    if ($year != $year_tmp) {
                        $year = $year_tmp;
                        $output .= '<div class="archives-item"><h2>'.date('Y 年',$archives->created).'</h2><ul class="archives_list">'; //输出年份
                    }
                    $output .= '<li>'.date(' m 月 d 日 ',$archives->created).' &nbsp;&nbsp;<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>'; //输出文章
                }
                $output .= '</ul></div></div>';
                echo $output;
                ?>
            </div>
        </article>
    </div><!-- end #main-->
<?php $this->need('footer.php'); ?>