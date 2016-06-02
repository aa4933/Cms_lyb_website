<?php
/*
 * // | JieQiangCms 街墙内容管理系统
 * // +----------------------------------------------------------------------
 * // | provide by ：www.jieqiang.com
 * //
 * // +----------------------------------------------------------------------
 * // | Author: 1569501393@qq.com
 * // +----------------------------------------------------------------------
 */
// 本类由系统自动生成，仅供测试用途
class IndexAction extends PublicAction {
	// 主页
	public function index() {
		$ad_mod = D ( 'ad' );
		
		$ad_list = $ad_mod->order ( 'ordid ASC' )->select ();
		// dump($ad_list);
		$this->assign ( 'ad_list', $ad_list );
		
		// 每日交易策略列表
		$list_announce = arcList ( '9', '6' );
		$this->assign ( 'list_announce', $list_announce );
		
		// 国际市场动态列表
		/*
		 * $list_mycompany = arcList('30', '6');
		 * $this->assign('list_mycompany', $list_mycompany);
		 */
		
		// 金融动态列表
		$list_mycompany = arcList ( '28', '6' );
		$this->assign ( 'list_mycompany', $list_mycompany );
		
		// 供求概况列表
		$list_company = arcList ( '15', '6' );
		/* var_dump($list_outlook); */
		$this->assign ( 'list_company', $list_company );
		
		// 图片新闻列表
		$list_image = arcSpeList ( " img!='' AND " );
		// var_dump($list_image);
		$this->assign ( 'list_image', $list_image );
		
		// 推荐新闻列表
		$list_best = arcSpeList ( " is_best='1' AND " );
		// var_dump($list_image);
		$this->assign ( 'list_best', $list_best );
		
		// 热门新闻列表
		$list_hot = arcSpeList ( " is_hot='1' AND " );
		// var_dump($list_hot);
		$this->assign ( 'list_hot', $list_hot );
		
		// 热点列表
		/*
		 * $list_hothh = arcList('1', '5');
		 * $this->assign('list_hothh', $list_hothh);
		 */
		
		// 热门新闻列表
		$list_hothh = arcSpeList ( " is_index='1' AND " );
		// var_dump($list_hot);
		$this->assign ( 'list_hothh', $list_hothh );
		
		// $this->assign('list_hothh', $list_hot);
		
		/*
		 * // 推荐新闻列表
		 * $list_best = arcSpeList(" is_best='1' AND ");
		 * // var_dump($list_image);
		 * $this->assign('list_best', $list_best);
		 *
		 * // 热门新闻列表
		 * $list_hot = arcSpeList(" is_hot='1' AND ");
		 * // var_dump($list_image);
		 * $this->assign('list_hot', $list_hot);
		 */
		
		/*
		 * // 友情链接列表
		 * $list_flink = D('flink')->where(" status=1 ")->select();
		 * // var_dump($list_flink);
		 * $this->assign('list_flink', $list_flink);
		 */
		
		$this->display ();
	}
	
	// 栏目
	public function cate() {
		// 分类名称
		$cid = $this->_get ( 'cid' );
		/* $cateName = M ( 'article_cate' )->field ( "name, alias, img" )->where ( "id = $cid" )->find ();
		// var_dump($cateName);
		$this->assign ( 'cateName', $cateName ['name'] );
		$this->assign ( 'alias', $cateName ['alias'] );
		$this->assign ( 'img', $cateName ['img'] );
		$this->assign ( 'cid', $cid ); */
		
		$ad_list = D ( 'ad' )->order ( 'ordid ASC' )->select ();
		// dump($ad_list);
		$this->assign ( 'ad_list', $ad_list );
		
		import ( "ORG.Util.Page" );
		$where = " 1=1 AND status=1 ";
		
		/* $list = D('article')->where(" cate_id = $cid ")->select(); */
		// $list = arcList($cat_id);
		// 后期完成通过子类查找出父类的所有文章
		// 通过id查找父类id,即pid,判断pid是否为0,若是，则查找其子类的所有文章
		
		// 查找栏目信息
		$cInfo = M ( 'article_cate' )->where ( "id = $cid" )->find ();
		
		$this->assign ( 'cateName', $cInfo ['name'] );
		$this->assign ( 'alias', $cInfo ['alias'] );
		$this->assign ( 'img', $cInfo ['img'] );
		$this->assign ( 'cid', $cid );
		
		// dump($cInfo);
		if ($cInfo ['pid'] == 0) {
			// 查找子类
			$arrCids = M ( 'article_cate' )->field ( 'id' )->where ( " pid = $cid" )->select ();
			// 有子类
			if ($arrCids) {
				foreach ( $arrCids as $v ) {
					$arrCidss [] = $v ['id'];
				}
				// dump($arrCidss);
				$cids = implode ( ',', $arrCidss );
				$cids .= " ,$cid";
				$where .= " AND cate_id in ($cids) AND status=1 ";
			} else {
				$where .= " AND cate_id = $cid ";
			}
		} else {
			$where .= " AND cate_id = $cid ";
		}
		$count = M ( 'article' )->where ( $where )->order ( " add_time DESC " )->limit ( $limit )->count ();
		$p = new Page ( $count, 5 );
		$list = M ( 'article' )->where ( $where )->order ( " add_time DESC " )->limit ( $p->firstRow . ',' . $p->listRows )->select ();
		
		
		
		/* dump(count($list));
		dump($list); */
		$this->assign ( 'list_company', $list );
		// dump(M('article')->getLastSql());
		
		$page = $p->show ();
		$this->assign ( 'page', $page );
		$this->assign ( 'list', $list );
		// $this->display('list');
		if ($_GET ['cid'] == 17 or $_GET ['cid'] == 36) {
			// 预约开户
			$companys = M('Company')->where(' status=1 ')->order('ordid ASC')->select();
			// dump($companys);
			$this->assign ( 'companys', $companys );
			$this->display ( 'apply' );
			// redirect ( 'http://118.145.4.142:16927/SelfOpenAccount/firmController.fir?funcflg=getMember&memNo=117' );
			exit ();
			if ($_POST ['submit']) {
				$_POST ['add_time'] = time ();
				$id = M ( 'user' )->add ( $_POST );
				if ($id) {
					// $this->success('恭喜，预约开户成功！');
					echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" ><script>alert('恭喜，预约开户成功！'); history.go(-1);</script>";
					exit ();
				} else {
					echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" ><script>alert('对不起，请重新预约开户！'); history.go(-1);</script>";
					exit ();
					/*
					 * $this->error('对不起，请重新预约开户！');
					 * exit;
					 */
				}
			}
			$this->display ( 'apply' );
		} elseif ($_GET ['cid'] == 999 or $_GET ['cid'] == 49) {
			// 电脑下载
			$this->display ( 'down' );
		} elseif ($_GET ['cid'] == 998 or $_GET ['cid'] == 48) {
			// 手机下载
			$this->display ( 'downphone' );
		} else {
			
			// 单页处理
			if ( count($list) <= 1 ) {
				$aid = $list[0]['id'];
				redirect( U("Index/detail?aid=$aid") );
			}
			
			// 判断单页
			if (empty($cInfo)) {
				echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" ><script>alert('亲，暂无文章，请稍后查阅哦'); history.go(-1);</script>";
				exit ();
			}
			
			$this->display ( 'list' );
		}
	}
	
	// 详情
	public function detail() {
		$aid = $this->_get ( 'aid' );
		$detail = arcDetail ( $aid );
		
		$this->assign ( 'detail', $detail );
		// var_dump($detail);
		
		// 栏目导航
		$cid = M ( 'article' )->field ( "cate_id" )->where ( "id = $aid" )->find ();
		// var_dump($cid);
		$cid = $cid ['cate_id'];
		
		$ad_list = D ( 'ad' )->order ( 'ordid ASC' )->select ();
		// dump($ad_list);
		$this->assign ( 'ad_list', $ad_list );
		
		// 分类名称
		$cateName = M ( 'article_cate' )->field ( "name, alias, img" )->where ( "id = $cid" )->find ();
		// var_dump($cateName);
		$this->assign ( 'cateName', $cateName ['name'] );
		$this->assign ( 'alias', $cateName ['alias'] );
		$this->assign ( 'img', $cateName ['img'] );
		$this->assign ( 'cid', $cid );
		
		import ( "ORG.Util.Page" );
		$where = " 1=1 AND status=1 ";
		
		// dump($cInfo);
		if ($cid ['pid'] == 0) {
			// 查找子类
			$arrCids = M ( 'article_cate' )->field ( 'id' )->where ( " pid = $cid" )->select ();
			// 有子类
			if ($arrCids) {
				foreach ( $arrCids as $v ) {
					$arrCidss [] = $v ['id'];
				}
				// dump($arrCidss);
				$cids = implode ( ',', $arrCidss );
				$cids .= " ,$cid";
				$where .= " AND cate_id in ($cids) AND status=1 ";
			} else {
				$where .= " AND cate_id = $cid ";
			}
		} else {
			$where .= " AND cate_id = $cid ";
		}
		
		if (empty($detail)) {
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" ><script>alert('非法查阅！'); history.go(-1);</script>";
			exit ();
		}
		
		$count = M ( 'article' )->where ( $where )->order ( " add_time DESC " )->limit ( $limit )->count ();
		$p = new Page ( $count, 5 );
		$list = M ( 'article' )->where ( $where )->order ( " add_time DESC " )->limit ( $p->firstRow . ',' . $p->listRows )->select ();
		
		
		
		$this->assign ( 'list_company', $list );
		// dump($list);
		$this->display ();
	}
}