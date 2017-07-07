<?php

defined('IN_IA') or exit('Access Denied');

class ImagesModule extends WeModule {
	public $tablename = 'images_reply';

	public function fieldsFormDisplay($rid = 0) {
		global $_W;
		load()->func('tpl');
		if (!empty($rid)) {
			$replies = pdo_fetch("SELECT * FROM ".tablename($this->tablename)." WHERE rid = :rid", array(':rid' => $rid));
		}
		include $this->template('form');
	}

	public function fieldsFormValidate($rid = 0) {
		global $_GPC;
		if(empty($_GPC['title'])) {
			return '必须填写有效的图片标题.';
		}
		if (empty($_GPC['mediaid'])) {
			return '必须上传有效的图片.';
		}
		$this->replies['title'] = $_GPC['title'];
		$this->replies['mediaid'] = $_GPC['mediaid'];
		$this->replies['description'] = $_GPC['description'];
		$this->replies['createtime'] = time();
		return '';
	}

	public function fieldsFormSubmit($rid = 0) {
		global $_GPC, $_W;
		$sql = 'DELETE FROM '. tablename($this->tablename) . ' WHERE `rid`=:rid';
		$pars = array();
		$pars[':rid'] = $rid;
		pdo_query($sql, $pars);
		$this->replies['rid'] = $rid;

		//使用三个分号分割数据;;;
		$titles = explode(';;;', $this->replies['title']);
		$mediaids = explode(';;;', $this->replies['mediaid']);
		$descriptions = explode(';;;', $this->replies['description']);
		if (is_array($titles) && is_array($mediaids) && is_array($descriptions) && (count($titles) == count($mediaids) && count($mediaids) == count($descriptions))) {
		    $total = count($titles);
		    for ($i = 0; $i < $total; $i++) {
		        $this->replies['title'] = $titles[$i];
		        $this->replies['mediaid'] = $mediaids[$i];
		        $this->replies['description'] = $descriptions[$i];
                pdo_insert($this->tablename, $this->replies);
		    }
		} else {
		    echo "提交的数据不正确,请检测提交数据中';;;'是否是一样多的,后退修改后重新提交";die;
		}

		return true;
	}

	public function ruleDeleted($rid = 0) {
		global $_W;
		$replies = pdo_fetchall("SELECT id FROM ".tablename($this->tablename)." WHERE rid = '$rid'");
		$deleteid = array();
		if (!empty($replies)) {
			foreach ($replies as $index => $row) {
				$deleteid[] = $row['id'];
			}
		}
		pdo_delete($this->tablename, "id IN ('".implode("','", $deleteid)."')");
		return true;
	}

}

