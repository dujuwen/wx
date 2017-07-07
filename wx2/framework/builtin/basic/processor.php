<?php

defined('IN_IA') or exit('Access Denied');

class BasicModuleProcessor extends WeModuleProcessor {

	public function respond() {
		//$sql = "SELECT * FROM " . tablename('basic_reply') . " WHERE `rid` IN ({$this->rule})  ORDER BY RAND() LIMIT 1";
		$sql = "SELECT * FROM " . tablename('basic_reply') . " WHERE `rid` IN ({$this->rule})  ORDER BY id desc LIMIT 0,1";
		$reply = pdo_fetch($sql);
		if (empty($reply)) {
			return false;
		}
		$reply['content'] = htmlspecialchars_decode($reply['content']);
        $reply['content'] = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $reply['content']);
		$reply['content'] = strip_tags($reply['content'], '<a>');

		//处理多次推送
		for ($i = 1; $i <= 2; $i++) {
		    $sql = "SELECT * FROM " . tablename('basic_reply') . " WHERE `rid` IN ({$this->rule})  ORDER BY id desc LIMIT $i,1";
		    $newReply = pdo_fetch($sql);
		    if (empty($newReply)) {
		        continue;
		    }
		    $newReply['content'] = htmlspecialchars_decode($newReply['content']);
		    $newReply['content'] = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $newReply['content']);
		    $newReply['content'] = strip_tags($newReply['content'], '<a>');
		    self::$repeatInfo[] = $newReply['content'];
		}

		return $this->respText($reply['content']);
	}
}
