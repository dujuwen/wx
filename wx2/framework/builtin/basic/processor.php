<?php

defined('IN_IA') or exit('Access Denied');

class BasicModuleProcessor extends WeModuleProcessor {

	public function respond() {
		$sql = "SELECT * FROM " . tablename('basic_reply') . " WHERE `rid` IN ({$this->rule})  ORDER BY RAND() LIMIT 1";
		$reply = pdo_fetch($sql);
		if (empty($reply)) {
			return false;
		}
		$reply['content'] = htmlspecialchars_decode($reply['content']);
        $reply['content'] = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $reply['content']);
		$reply['content'] = strip_tags($reply['content'], '<a>');

		$alreadyReturnId = $reply['id'];

	    $sql = "SELECT * FROM " . tablename('basic_reply') . " WHERE `rid` IN ({$this->rule})  ORDER BY RAND() LIMIT 3";
	    $newReplies = pdo_fetchall($sql);
	    if ($newReplies) {
	        $num = 0;
	        foreach ($newReplies as $newReply) {
	            if ($newReply['id'] != $alreadyReturnId && $num < 2) {
    	            $num++;
    	            $content = $newReply['content'];
//             	    $content = htmlspecialchars_decode($content);
//             	    $content = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $content);
//             	    $content = strip_tags($content, '<a>');
            	    self::$repeatInfo[] = $content;
	            }
	        }
	    }

	    $re = $this->respText($reply['content']);
	    self::$repeatInfo2[] = $re;

		return $re;
	}
}
