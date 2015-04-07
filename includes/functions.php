<?php
	// Should be used after every query to see if a result set has been assigned
	// If the query failed, it is recommended to echo the query in a development environment
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	// Associates the latest-accessed page ID with a user ID in the database
	// function activity_log_push($user_id) {
	// 	global $db;

	// 	$query = "UPDATE activity_log "
	// 	$last_page_accessed = mysqli_insert_id($db);
	// 	$query .= "SET lpa_id = {$last_page_accessed} "
	// 	$query .= "WHERE user_id = {$user_id}; "
	// }

	// Gets the last page ID accessed by a user ID
	function get_lpa_id($user_id) {
		global $db;

		$query = "SELECT *";
		$query .= "FROM activity_log ";
		$query .= "WHERE user_id = {$user_id}; ";
		$lpa_id_set = mysqli_query($db, $query);
		confirm_query($lpa_id_set);
		$row = mysqli_fetch_assoc($lpa_id_set);
		return $row['lpa_id'];
	}

	// Returns the set of ALL pages that belong to a user ID
	function find_all_pages($user_id) {
		global $db;

		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE user_id = {$user_id} ";
		$query .= "ORDER BY id ASC";
		$page_set = mysqli_query($db, $query);
		confirm_query($page_set);
		return $page_set;
	}

	// Returns the set of VISIBLE pages that belong to a user ID
	function find_visible_pages($user_id) {
		global $db;

		$query  = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE user_id = {$user_id} ";
		$query .= "AND visible = 1 ";
		$query .= "ORDER BY id ASC";
		$page_set = mysqli_query($db, $query);
		confirm_query($page_set);
		return $page_set;
	}

	// Returns the number of pages that are visible for a user
	function count_pages($user_id) {
		$page_set = find_visible_pages($user_id);
		$num_pages = 0;
		while ($row = mysqli_fetch_row($page_set)) {
			$num_pages++;
		}
		return $num_pages;
	}

	// Returns an array of visible page names for a given user ID
	function get_page_name_array($user_id) {
		$page_set = find_visible_pages($user_id);
		$page_names = array();
		while ($row = mysqli_fetch_assoc($page_set)) {
			array_push($page_names, $row['page_name']);
		}
		return $page_names;
	}

	// Adds a page to the database
	// Intended to add .s-inactive-page-button to the #pages-that-exist-container
	// Intended to add .m-inactive-page-button to the #m-page-button-container
	function add_new_page($user_id, $new_page_name = "PAGE",
							$html_content = "<p>Default new page content</p>", $visible) {
		global $db;

		$query = "INSERT INTO pages (";
		$query .= "user_id, page_name, html_content, visible";
		$query .= ") VALUES (";
		$query .= "{$user_id}, {$new_page_name}, {$html_content}, {$visible}";
		$query .= ") ";
		$result = mysqli_query($db, $query);
		confirm_query($result);
	}

	// sets a page's visibility field to 0 given the user ID and page ID
	function delete_page($user_id, $page_id) {
		global $db;

		$query = "UPDATE pages ";
		$query .= "SET visible = 0 ";
		$query .= "WHERE page_id = {$page_id} ";
		$result = msqli_query($db, $query);
		confirm_query($result);
	}

	// returns HTML representing the list of pages on the sidebar
	// uses the activity log table to determine which page is considered active
	// uses the pages table to determine which pages are still visible
	function sidebar_page_list($user_id) {
		$page_set = find_visible_pages($user_id);
		$output = "";
		while ($page = mysqli_fetch_assoc($page_set)) {
			// if the last page accessed by the user is the page
			// currently being traversed, add an active page button to the button container
			if (get_lpa_id($user_id) == $page['id']) {
				$output .= sidebar_page_button($page['page_name'], 1);
			} else {
				$output .= sidebar_page_button($page['page_name'], 0);
			}
		}
		return $output;
	}

	// returns a String of HTML representing a sidebar page button div
	function sidebar_page_button($page_name, $active = 0) {
		$output = "<div class=";
		if ($active == 1) {
			$output .= "\"s-active-page-button\"";
		} else {
			$output .= "\"s-inactive-page-button\"";
		}
		$output .= ">";
		$output .= "<div class=\"s-page-button-text\">{$page_name}</div>";
		$output .= "</div>";
		return $output;
	}

	// returns HTML representing the list of pages on the sidebar
	// uses the activity log table to determine which page is considered active
	// uses the pages table to determine which pages are still visible
	function main_page_list($user_id) {
		$page_set = find_visible_pages($user_id);
		$output = "";
		while ($page = mysqli_fetch_assoc($page_set)) {
			// if the last page accessed by the user is the page
			// currently being traversed, add an active page button to the button container
			if (get_lpa_id($user_id) == $page['id']) {
				$output .= main_page_button($page['page_name'], 1);
			} else {
				$output .= main_page_button($page['page_name'], 0);
			}
		}
		return $output;
	}

	// returns a String of HTML representing a main page button div
	function main_page_button($page_name, $active = 0) {
		$output = "<div class=";
		if ($active == 1) {
			$output .= "\"m-active-page-button\"";
			$output .= ">";
			$output .= "<div class=\"m-active-page-button-text\">{$page_name}</div>";
		} else {
			$output .= "\"m-inactive-page-button\"";
			$output .= ">";
			$output .= "<div class=\"m-inactive-page-button-text\">{$page_name}</div>";
		}
		$output .= "</div>";
		return $output;
	}
?>