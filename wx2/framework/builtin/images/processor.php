<?php

defined('IN_IA') or exit('Access Denied');

class ImagesModuleProcessor extends WeModuleProcessor {
	public function respond() {
		global $_W;
		$rid = $this->rule;
		$sql = "SELECT `mediaid` FROM " . tablename('images_reply') . " WHERE `rid`=:rid limit 1";
		$mediaid = pdo_fetchcolumn($sql, array(':rid' => $rid));
		if (empty($mediaid)) {
			return false;
		}

// 		for ($i = 1; $i <= 2; $i++) {
// 		    $sql = "SELECT `mediaid` FROM " . tablename('images_reply') . " WHERE `rid`=:rid limit {$i},1";
// 		    $mediaid = pdo_fetchcolumn($sql, array(':rid' => $rid));
// 		    if ($mediaid) {
// 		        self::$repeatInfo[] = $mediaid;
// 		    }
// 		}

		return $this->respImage($mediaid);
	}
}
