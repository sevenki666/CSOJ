<?php
	requirePHPLib('judger');
	switch ($_GET['type']) {
		case 'problem':
			if (!validateUInt($_GET['id']) || !($problem = queryProblemBrief($_GET['id']))) {
				become404Page();
			}
			
			$visible = isProblemVisibleToUser($problem, $myUser);
			if (!$visible && $myUser != null) {
				$result = DB::query("select contest_id from contests_problems where problem_id = {$_GET['id']}");
				while (list($contest_id) = DB::fetch($result, MYSQLI_NUM)) {
					$contest = queryContest($contest_id);
					genMoreContestInfo($contest);
					if ($contest['cur_progress'] != CONTEST_NOT_STARTED && hasRegistered($myUser, $contest) && queryContestProblemRank($contest, $problem)) {
						if ($contest['run_mode'] == 1 && $contest['cur_progress'] == CONTEST_IN_PROGRESS) {
							$visible = true;
							if (!$myUser) {
								$visible = false;
							}
							$reg = DB::selectFirst("select time_window from contests_registrants where contest_id = {$contest['id']} and username = '{$myUser['username']}'");
							if (!$reg || empty($reg['time_window'])) {
								$visible = false;
							}
							$selectedTime = new DateTime($reg['time_window']);
							$duration = intval($contest['time_window_mode_last_min']);
							$endTime = clone $selectedTime;
							$endTime->modify("+{$duration} minutes");
							$now = new DateTime(UOJTime::$time_now_str);
							if ($now < $selectedTime || $now > $endTime) {
								$visible = false;
							}
						} else {
							$visible = true;
						}
					}
				}
			}
			if (!$visible) {
				become404Page();
			}

			$id = $_GET['id'];
			
			$file_name = "/var/uoj_data/$id/download.zip";
			$download_name = "problem_$id.zip";
			break;
		case 'testlib.h':
			$file_name = "/opt/uoj/judger/uoj_judger/include/testlib.h";
			$download_name = "testlib.h";
			break;
		case 'statement':
			if (!validateUInt($_GET['id']) || !($problem = queryProblemBrief($_GET['id']))) {
				become404Page();
			}
			
			$visible = isProblemVisibleToUser($problem, $myUser);
			if (!$visible && $myUser != null) {
				$result = DB::query("select contest_id from contests_problems where problem_id = {$_GET['id']}");
				while (list($contest_id) = DB::fetch($result, MYSQLI_NUM)) {
					$contest = queryContest($contest_id);
					genMoreContestInfo($contest);
					if ($contest['cur_progress'] != CONTEST_NOT_STARTED && hasRegistered($myUser, $contest) && queryContestProblemRank($contest, $problem)) {
						if ($contest['run_mode'] == 1 && $contest['cur_progress'] == CONTEST_IN_PROGRESS) {
							$visible = true;
							if (!$myUser) {
								$visible = false;
							}
							$reg = DB::selectFirst("select time_window from contests_registrants where contest_id = {$contest['id']} and username = '{$myUser['username']}'");
							if (!$reg || empty($reg['time_window'])) {
								$visible = false;
							}
							$selectedTime = new DateTime($reg['time_window']);
							$duration = intval($contest['time_window_mode_last_min']);
							$endTime = clone $selectedTime;
							$endTime->modify("+{$duration} minutes");
							$now = new DateTime(UOJTime::$time_now_str);
							if ($now < $selectedTime || $now > $endTime) {
								$visible = false;
							}
						} else {
							$visible = true;
						}
					}
				}
			}
			if (!$visible) {
				become404Page();
			}

			$id = $_GET['id'];
			
			$file_name = "/opt/uoj/web/files/statement/$id.pdf";
			$download_name = "statement$id.pdf";
			break;
		case 'image':
			Auth::check() || become404Page();
			$id = $_GET['id'];
			$file_name = "/opt/uoj/web/files/image/$id";
			$download_name = "$id";
			break;
		case 'video':
			Auth::check() || become404Page();
			$id = $_GET['id'];
			$file_name = "/opt/uoj/web/files/video/$id";
			$download_name = "$id";
			break;
		case 'etc':
			Auth::check() || become404Page();
			$id = $_GET['id'];
			$file_name = "/opt/uoj/web/files/etc/$id";
			$download_name = "$id";
			break;
		default:
			become404Page();
	}
	
	$finfo = finfo_open(FILEINFO_MIME);
	$mimetype = finfo_file($finfo, $file_name);
	if ($mimetype === false) {
		become404Page();
	}
	finfo_close($finfo);
	
	header("X-Sendfile: $file_name");
	header("Content-type: $mimetype");
	if ($_GET['type'] == 'statement' || $_GET['type'] == 'video') {
		header("Content-Disposition: inline; filename=$download_name");
	} else {
		header("Content-Disposition: attachment; filename=$download_name");
	}
?>