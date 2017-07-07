<?php

defined('IN_IA') or exit('Access Denied');

class ImagesModuleProcessor extends WeModuleProcessor {
	public function respond() {
		global $_W;
		$rid = $this->rule;
		$sql = "SELECT `mediaid` FROM " . tablename('images_reply') . " WHERE `rid`=:rid limit 0,1";
		$mediaid = pdo_fetchcolumn($sql, array(':rid' => $rid));
		if (empty($mediaid)) {
			return false;
		}

		for ($i = 1; $i <= 2; $i++) {
		    $sql = "SELECT `mediaid` FROM " . tablename('images_reply') . " WHERE `rid`=:rid limit {$i},1";
		    $newMediaid = pdo_fetchcolumn($sql, array(':rid' => $rid));
		    if ($newMediaid) {
		        self::$repeatInfo[] = $newMediaid;
		    }
		}

		return $this->respImage($mediaid);
	}
}
