<?php
	if (!validateUInt($_GET['id']) || !($blog = queryBlog($_GET['id']))) {
		become404Page();
	}
	if (!Auth::check()) {
		redirectToLogin();
	}

	redirectTo(HTML::blog_url($blog['poster'], '/post/'.$_GET['id']));
?>
