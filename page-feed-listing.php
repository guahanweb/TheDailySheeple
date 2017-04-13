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
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/feed-list.css" />
<link type="text/css" rel="stylesheet" href="/wp-content/themes/TDS-1/styles/contributorlist.css" />
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
//
var API_URL = '<?php echo plugins_url(); ?>/rss-feed-manager/api.php';
</script>
<tr>
	<td>
	<div id="main_content_area">
		<h1 class="subheading"><span>Welcome to ASS Version 2.0 - Automated Streaming Service</span> </h1>

<!-- ASS menu area -->
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
        <div class="recent-list">
            <div class="list-heading">
                <h1>50 Recent Posts</h1>
            </div>
            <div class="list-grid">
                <?php printf('<img src="%s/rss-feed-manager/images/loading-spinner.gif" alt="loading" />', plugins_url()); ?>
            </div>
        </div>
		<div class="feeds"><img src="<?php echo plugins_url(); ?>/rss-feed-manager/images/loading-spinner.gif" alt="loading" /></div>
	</div>
<?php
$img = sprintf('<img src="%s/rss-feed-manager/images/loading-spinner.gif" alt="loading" />', plugins_url());
foreach ($categories as $cat) {
	echo "<div class=\"hide card\" id=\"{$cat->slug}\">\n";
	echo "<h1>{$cat->name}</h1>\n";
    echo <<<EOH
<div class="recent-list">
    <div class="list-heading">
        <h1>50 Recent Posts</h1>
    </div>
    <div class="list-grid">
        $img
    </div>
</div>
EOH;
	echo "<div class=\"feeds\">\n";
	echo sprintf('<img src="%s/rss-feed-manager/images/loading-spinner.gif" alt="loading" />', plugins_url());
	echo "</div>\n";
	echo "</div>\n";
}
?>
</div>

	<div class="clearing"></div>
</div>
<script type="text/template" id="tpl-recent">
    <table border="0" cellpadding="0" cellspacing="0">
    <% 
    var cls = 'even';
    _.each(items, function (item, i) { 
        cls = cls === 'even' ? 'odd' : 'even';
    %>
        <tr class="<%= cls %>">
            <td>
                <div class="item-title"><a href="<%= item.link %>" target="_blank"><%= item.title %></a></div>
                <div class="item-site">
                    published <span class="pub-date"><%= item.postDate %></span>
                    by <span class="pub-name"><a href="<%= item.author.authorurl %>" target="_blank"><%= item.author.author %></a></span>
                </div>
            </td>
            <% if (type == 'contributors') { %>
            <td>
                <a href="#" class="btn btn-secondary btn-small">repost</a>
            </td>
            <% } %>
        </tr>
    <% }); %>
    </table>
</script>
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
<script src="<?php echo get_template_directory_uri(); ?>/js/feed/feed.js"></script>
<script src="http://bubble.websnapr.com/3X4p5G200t9F/swh/" type="text/javascript"></script>
<?php
get_footer();
?>
