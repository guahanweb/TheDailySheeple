<?php
/*
Template Name: Feed Listing
*/

function buildNav($cats) {
	$item = '<li><a href="#" data-category="%s">%s</a></li>';
	$out = '<ul id="category-filter">';
	$out .= sprintf($item, 'contributors', 'Contributors');
	foreach ($cats as $cat) {
		$out .= sprintf($item, $cat->slug, $cat->name);
	}
	$out .= '<li class="footer"><a href="http://www.thedailysheeple.com/wp-admin/edit-tags.php?taxonomy=rss_feed_category&post_type=rss_manager_post" target="_blank" class="btn btn-primary btn-small">Add Category</a></li>';
	$out .= '</ul>';
	return $out;
}

$categories = get_terms('rss_feed_category');
if (FALSE !== ($last_fetch = get_option('rss-feed-manager-updated'))) {
	$ts = time() - strtotime($last_fetch);
	$update_minutes = round($ts / 60);
}

// If we're not at least Admin or Editor, reject access
if (!current_user_can('edit_others_posts')) {
	wp_die('Permission Denied - Please <a href="http://www.thedailysheeple.com/wp-login.php">LOGIN HERE</a> to access this system.', 'You do not have sufficient privileges to view this page - Contact the administrator if you should have access to this page but don not.');
}

require_once('lib/SimplePie/autoloader.php');
$rss = new SimplePie();
$rss->set_cache_duration(3600); // 1 hour cache
$rss->set_cache_location(dirname(__FILE__) . '/lib/SimplePie/cache/');
get_header();
?>
<link type="text/css" rel="stylesheet" href="/wp-content/themes/TDS-1/styles/contributorlist.css" />
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
<style type="text/css">
#category-filter {
	float: left;
	width: 180px;
	list-style-type: none;
	margin: 0;
	padding: 0;
}

#category-filter > li {
	list-style-type: none;
	border: 1px solid #aaa;
	border-top: none;
	display: block;
}

#category-filter > li:first-child {
	border-top: 1px solid #aaa;
}

#category-filter > li a {
	text-decoration: none;
	font-size: 11px;
	color: #999;
	background-color: #eee;
	display: block;
	padding: 4px 10px;
}

#category-filter > li.footer {
	border-left: none;
	border-right: none;
	border-bottom: none;
	padding-top: 10px;
}

#category-filter > li.footer a {
	color: #fff;
	padding: 2px;
	font-size: 12px;
	line-height: 16px;
	text-decoration: none;
}

#category-filter > li.footer a:hover {
	color: #fff;
}

#category-filter > li.active {
	border-right: 1px solid #fff;
}

#category-filter > li.active a {
	background-color: #fff;
	border-right: 1px solid #fff;
	color: #E89910;
}

#feed-list {
	margin-left: 180px;
	border-top: 1px solid #aaa;
	padding: 5px 15px;
}

div#main_content_area .card > h1 {
	margin: 0 0 4px;
	font-size: 16px;
	background-color: #eee;
	padding: 8px;
	text-align: center;
	border-top: 2px solid #aaa;
	border-bottom: 2px solid #aaa;
	line-height: 24px;
}

div#main_content_area .card p {
	margin: 8px 0 14px;
	line-height: 1.4em;
	font-size: 12px;
}

div#main_content_area .feeds img {
	border: none;
}

div#main_content_area .feed {
	width: 240px;
	height: 150px;
	overflow: auto;
	float: left;
	padding: 8px;
	border: 1px solid #ccc;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	font-size: 0.8em;
	font-family: Helvetica, Verdana, sans-serif;
	margin: 5px;
}

div#main_content_area .feed h1 {
	text-align: center;
	font-size: 14px;
	border-bottom: 1px solid #aaa;
}

div#main_content_area .feed a {
	line-height: 1.4em;
	text-decoration: none;
	color:#00F;
	display: block;
}
div#main_content_area .feed a:hover, div#main_content_area .feed .item.highlighted a:hover {
	background-color: #B9C9FF;
	color: #000000;
	display: block;
}

div#main_content_area .feed .item {
	margin: 3px 0 0;
	padding: 0 0 3px;
	border-bottom: 1px solid #ccc;
}

div#main_content_area .feed .item:last-child {
	border-bottom: none;
}

div#main_content_area .feed .item.highlighted a {
	background-color: #FFFCCC;
}

div#main_content_area .create-link {
	padding: 4px 0;
	text-align: center;
}

div#main_content_area .create-link a.btn {
	color: #fff;
	text-decoration: none;
	width: 100px;
}

.hide {
	display: none;
}
div.feed-menu { 
	text-align: center; 
	font-size: 8pt; 
	color:#666;
	text-decoration: none; 
	padding: 2px 0px 5px 0px;
}

div#main_content_area .feed .feed-menu a.edit-feed {
	display: inline;
	background-color: #fff;
	text-decoration: none;
}

div#main_content_area .feed .feed-menu a.edit-feed:hover {
	text-decoration: underline;
}

</style>
<tr>
	<td>
	<div id="main_content_area">
		<h1 class="subheading"><span>Welcome to ASS Version 2.0 - Automated Streaming Service</span> </h1>
<!-- ASS menu area -->
<style>
#ass-menu {
	padding: 5px 20px 5px 20px;
	font-family: Arial;
	background-color:#C1D3FF;
	margin: 20px 0px 20px 0px;	
}

#ass-menu > span {
	font-color: #666;
	font-style: italic;
	font-size: 12px;
	line-height: 18px;
	float: left;
}

#ass-menu-links {
	text-align: right;	
}

#ass-menu .ass-menu-links a {
	font-size: 10pt;
	color:#000;
	text-decoration:none;
	padding: 0px 10px 0px 10px;
	
}
#ass-menu .ass-menu-links a:hover {
	font-size: 10pt;
	color: #666;
	text-decoration:none;

}
</style>
<div id="ass-menu">
<?php
if (FALSE !== $last_fetch) {
	printf('<span class="last-update">Feeds last updated %d minutes ago</span>', $update_minutes);
}
?>
<div class="ass-menu-links" id="ass-menu-links">
<a href="http://www.thedailysheeple.com/wp-admin/post-new.php?post_type=rss_manager_post" target="_blank">add new stream</a> | 
<a href="http://www.thedailysheeple.com/wp-admin/user-new.php" target="_blank">add contributor</a> | 
<a href="javascript:timedRefresh(500)">refresh page</a> |
<a href="http://www.thedailysheeple.com/wp-content/plugins/rss-feed-manager/cron/execute.php" target="_blank">refresh streams</a>

</div>
</div>
<!-- END ASS menu area -->
<?php echo buildNav($categories); ?>
<div id="feed-list">
	<div class="card">
		<p>Select a category from the navigation list to the left</p>
	</div>
	<div class="hide card" id="contributors">
		<h1>Contributor Listing</h1>
		<div class="create-link"><a href="http://www.thedailysheeple.com/wp-admin/user-new.php" target="_blank" class="btn btn-primary brn-small">Add Contributor</a></div>
		<div class="feeds"><img src="<?php echo plugins_url(); ?>/rss-feed-manager/images/loading-spinner.gif" alt="loading" /></div>
	</div>
<?php
foreach ($categories as $cat) {
	echo "<div class=\"hide card\" id=\"{$cat->slug}\">\n";
	echo "<h1>{$cat->name}</h1>\n";
	echo "<div class=\"feeds\">\n";
	echo sprintf('<img src="%s/rss-feed-manager/images/loading-spinner.gif" alt="loading" />', plugins_url());
	echo "</div>\n";
	echo "</div>\n";
}
?>
</div>

	<div class="clearing"></div>
</div>
<script type="text/template" id="tpl-feed">
	<% if (type == 'contributors') { %>
	<div class="feed">
		<h1><a href="<%= title.websiteurl %>" target="_blank"><%= title.website %></a></h1>
		<div class="feed-menu">
			<%= (null !== title.handling && title.handling.length > 0) ? "Handling: <i>" + title.handling + "</i> | " : '' %>
			<a class="edit-feed" href="<%= title.editurl %>">edit</a>
		</div>
		<div class="items">
		<% if (title.feedurl != '') {
			_.each(items, function(item, i) { %>
			<div class="item<%= (item.new ? ' highlighted' : '') %>">
				<a class="title websnapr" href="<%= item.link %>" target="_blank"><%= item.title %></a>
			</div>
		<% 	});
		} else { %>
			<a href="<%= title.editurl %>" class="btn btn-primary btn-small" target="_blank">Add Feed</a>
		<% } %>
		</div>
	</div>
	<% } else { %>
	<div class="feed">
		<h1><%= title %></h1>
		<div class="items">
		<% _.each(items, function(item, i) { %>
			<div class="item<%= (item.highlighted) ? ' highlight' : '' %>">
				<a class="title" href="<%= item.link %>" target="_blank"><%= item.title %></a>
				
			</div>
		<% }); %>
		</div>
	</div>
	<% } %>
</script>
<script src="<?php echo plugins_url(); ?>/rss-feed-manager/js/underscore-min.js"></script>
<script>
;(function($) {
	var $menu = $('#category-filter'),
		$cards = $('.card', '#feed-list'),
		api = '<?php echo plugins_url(); ?>/rss-feed-manager/api.php',
		tpl_feed = _.template($('#tpl-feed').html()),
		cache = {}; // cache simple lets us load each feed ONCE per page load

	function handleResponse(data) {
		var $container = $('.feeds', '#' + data.category),
			feed, $feed, item, $item, id;
			
		if (data.success == false) {
			$container.html('ERROR: ' + data.errmsg);
		} else {
			$container.empty();
			for (id in data.feeds) {
				feed = data.feeds[id];
				$feed = $(tpl_feed({
					type : data.category,
					title : (data.category == 'contributors') ? feed.author : feed.title,
					items : feed.items
				}));
				$feed.appendTo($container);				
			}
			
			// cache that we have retrieved
			cache[data.category] = true;
		}
	}
	
	function loadFeedsByCat(cat, dest) {
		$.ajax({
			url : api,
			type : 'GET',
			dataType : 'json',
			data : { 'cat' : cat },
			success : function(res) {
				handleResponse(res);
			}
		});
	}
	
	$menu.on('click', 'a', function(e) {
		if (!$(this).hasClass('btn')) {
			e.preventDefault();
			$('li', $menu).removeClass('active');
			$(this).closest('li').addClass('active');

			$cards.hide();
			$('#' + $(this).data('category')).show();
			if (undefined === cache[$(this).data('category')]) {
				// Load category
				loadFeedsByCat($(this).data('category'), $('#' + $(this).data('category') + ' .feeds'));
			}
		}
	});
}(jQuery));
</script>
<script src="http://bubble.websnapr.com/3X4p5G200t9F/swh/" type="text/javascript"></script>
<?php
get_footer();
?>