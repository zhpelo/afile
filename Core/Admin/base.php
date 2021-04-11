<?php get_admin_header(); ?>
<div class="container-fluid">
	<div class="survey-info">
		<div class="item">
			<h2>今日注册用户</h2>
			<p class="num">0</p>
			<p>日同比 0%</p>
			<p>总用户数 1000</p>
		</div>

		<div class="item">
			<h2>今日登录用户</h2>
			<p class="num">0</p>
			<p>日同比 0%</p>
			<p>总用户数 1000</p>
		</div>

		<div class="item">
			<h2>今日上传文件数</h2>
			<p class="num">0</p>
			<p>日同比 0%</p>
			<p>总用户数 1000</p>
		</div>

		<div class="item">
			<h2>今日总下载数</h2>
			<p class="num">0</p>
			<p>日同比 0%</p>
			<p>总用户数 1000</p>
		</div>
	</div>


	<div class="statistics-wrap">
		<div class="item">
			<div class="flex-box" style="background: rgba(255, 125, 68, 0.1);"
				onclick="location.href='/order/lists.html#!order_status=0'">
				<h5 class="title">待付款订单</h5>
				<div class="num">0</div>
			</div>
			<div class="flex-box" style="background: rgba(255, 69, 68, 0.1);"
				onclick="location.href='/delivery/lists.html'">
				<h5 class="title">待发货订单</h5>
				<div class="num">0</div>
			</div>
		</div>

		<div class="item">
			<div class="flex-box" style="background: rgba(255, 125, 68, 0.1);"
				onclick="location.href='/order/lists.html#!order_status=3'">
				<h5 class="title">待收货订单</h5>
				<div class="num">0</div>
			</div>
			<div class="flex-box" style="background: rgba(255, 69, 68, 0.1);"
				onclick="location.href='/order/lists.html#!order_status=10'">
				<h5 class="title">已完成订单</h5>
				<div class="num">4</div>
			</div>
		</div>

		<div class="item">
			<div class="flex-box" style="background: rgba(80, 130, 255, 0.1);"
				onclick="location.href='/orderrefund/lists.html'">
				<h5 class="title">退款中订单</h5>
				<div class="num">0</div>
			</div>
			<div class="flex-box" style="background: rgba(255, 125, 68, 0.1);"
				onclick="location.href='/goods/lists.html'">
				<h5 class="title">库存预警</h5>
				<div class="num">0</div>
			</div>
		</div>

		<div class="item">
			<div class="flex-box" style="background: rgba(60, 188, 66, 0.1);"
				onclick="location.href='/goods/lists.html?state=1'">
				<h5 class="title">出售中商品</h5>
				<div class="num">33</div>
			</div>
			<div class="flex-box" style="background: rgba(255, 174, 68, 0.1);"
				onclick="location.href='/goods/lists.html?state=0'">
				<h5 class="title">仓库中商品</h5>
				<div class="num">0</div>
			</div>
		</div>

	</div>

	<h2 style="margin-bottom: 20px;">常用功能</h2>

	<div class="common-functions">
		<a class="common-functions-item" href="#/goods/addgoods.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/issue_good.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">发布商品</div>
					<p class="ns-item-content-desc">发布实物商品</p>
				</div>
			</div>
		</a>
		<a class="common-functions-item" href="#/diy/index.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/page_decoration.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">店铺装修</div>
					<p class="ns-item-content-desc">主页面进行装修</p>
				</div>
			</div>
		</a>
		<a class="common-functions-item" href="#/shop/config.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/shop_settings.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">店铺设置</div>
					<p class="ns-item-content-desc">修改店铺信息</p>
				</div>
			</div>
		</a>
		<a class="common-functions-item" href="#/order/lists.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/order_select.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">订单查询</div>
					<p class="ns-item-content-desc">查询系统普通订单</p>
				</div>
			</div>
		</a>

		<a class="common-functions-item" href="#/member/index.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/member_manage.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">会员管理</div>
					<p class="ns-item-content-desc">店铺会员管理</p>
				</div>
			</div>
		</a>
		<a class="common-functions-item" href="#/memberwithdraw/lists.html">
			<div class="common-functions-box">
				<div class="ns-item-pic">
					<img src="https://shop.chunzaichengnan.com/app/shop/view/public/img/menu_icon/member_withdraw.png">
				</div>
				<div class="ns-item-con">
					<div class="ns-item-content-title">会员提现</div>
					<p class="ns-item-content-desc">店铺会员提现</p>
				</div>
			</div>
		</a>

	</div>

</div>

<?php get_admin_footer(); ?>