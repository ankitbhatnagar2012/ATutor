<?php

function delete_polls($course_id) {
	global $db;

	$sql	= "SELECT poll_id FROM ".TABLE_PREFIX."polls WHERE course_id=$course_id";
	$result = mysql_query($sql, $db);
	if (!$result) {
		return;
	}
	while ($row = mysql_fetch_assoc($result)) {
		$sql	 = "DELETE FROM ".TABLE_PREFIX."polls_members WHERE poll_id=$row[poll_id]";
		@mysql_query($sql, $db);
	}
	$sql	= "DELETE FROM ".TABLE_PREFIX."polls WHERE course_id=$course_id";
	$result = mysql_query($sql, $db);
}

?>