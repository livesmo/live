<!-- begin-->
<div class="wrapper">
    <div class="col950 left">
        <div class="ind07 left">
            <div class="focus"  id="myalbum1">
                <div class="imgbox">
                    <ul class="imgline">
                    <?php 
                 	if(defined('STAR_SCHEDULE_TOP')) echo STAR_SCHEDULE_TOP; 
             		?>

                    </ul>
                </div>
                <a class="prev"></a><a class="next"></a>
            </div>
            <script type="text/javascript">var myalbum1 = new album("myalbum1",1);</script>
        </div>
    </div>
    <div class="col280 right">
        <div class="md md3">
            <div class="hd">
                <span class="title left d">最新动态<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                <div class="con01 small">
                    <div class="up">

                        <div class="imgbox left"><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$newsstar[0]['id']))?>"><img src="<?php echo $newsstar[0][image]?>" /></a></div>
                        <h3><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$newsstar[0]['id']))?>"><?php echo $newsstar[0][title]?></a></h3>
                        <div class="date"><?php echo date('Y-m-d H:i:s',$newsstar[0][begintime]);?></div>
                        <p><?php echo mb_substr($newsstar[0][content],0,18,'utf-8');?>...<a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$newsstar[0]['id']))?>" target="_blank">[详细]</a></p>
                        <div class="bline"><span class="left">浏览<i><?php echo $newsstar[0][lookcount]?></i></span><span class="right">评论<i><?php echo $newsstar[0][commentcount]?></i></span></div>
                    </div>
                    <ul class="list">
                    
                    	<?php
                    		unset($newsstar[0]);
                    		foreach($newsstar as $v){  
                    		
                    	?>
		                    	<li>
		                            <div class="des left">
		                                <h4><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$v['id']))?>" target="_blank"><?php echo $v['title']?></a></h4>
		                                <div class="bline"> <span class="left">浏览<i><?php echo $v[lookcount]?></i></span><span class="left">评论<i><?php echo $v[commentcount]?></i></span></div>
		                            </div>
		                        </li>
                    	<?php
                    		
                    		}

                    	?>
                       

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->



<!-- begin-->
<div class="wrapper">
    <div class="md md3">
        <div class="hd">
            <span class="title left">档期安排<i>明星娱乐商城，来这儿就够了</i></span>
            <span class="more asc  right" id="sort" ><a href="javascript:void(0)" >排序</a></span>
            <script type="text/javascript">
                $("#sort").click(function(){
                    if($(this).hasClass("asc")){
                        $(this).removeClass("asc").addClass("desc");
                    }else{
                        $(this).removeClass("desc").addClass("asc");
                    }
                });
            </script>
        </div>
        <div class="bd">
        <!--搜索条件-->
            <div class="con12">
                <a href="javascript:void(0);" class="cur">全部</a><a href="javascript:void(0);">一周内</a><a href="javascript:void(0);">一月内</a><a href="javascript:void(0);">半年内</a><a href="javascript:void(0);">一年内</a><a href="javascript:void(0);">历史</a>
            </div>
        <!--搜索条件end-->    
            <script type="text/javascript">
                $(".con12 a").click(function(){
                    $(this).addClass("cur").siblings("a").removeClass("cur");

                });
            </script>
            <div class="con13">
                <?php include('list.php');?>
            </div>
         


        </div>
    </div>



    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>
</div>

<!-- end-->




<!-- begin-->
<div class="wrapper">
    <div class="gototop" id="gototop1"><span></span></div>
    <script type="text/javascript">var mygototop = new gototop("gototop1")</script>
</div>
<script type="text/javascript">
	
    var loadMore = function () {
        var url = $("#dk_jiazai").attr('data-url');
        $.ajax({
                type:"GET",
                url:url,
                beforeSend:function(){
                    $("#dk_jiazai").html('<a href="javascript:;">数据加载中...</a>');
                },
                success:function(html){
                    $("#starmore").remove();
                    $(".shownews").last().after(html);
                }
            })
    }

</script>
