<?php
class thedailysheeple {
  public function __construct() {
    // Filters
    add_filter('the_content', array($this, 'insertTDSdelivery'), '1');
    add_filter('the_content', array($this, 'add_author_content'), '2');

    // Actions
    add_action('show_user_profile', array($this, 'my_show_extra_profile_fields'));
    add_action('edit_user_profile', array($this, 'my_show_extra_profile_fields'));
    add_action('personal_options_update', array($this, 'my_save_extra_profile_fields'));
    add_action('edit_user_profile_update', array($this, 'my_save_extra_profile_fields'));
  }

  /**
   * Add contributor information to the end of the content
   */
  public function add_author_content($content) {
    if (!is_page_template()) {
      $authoID   = get_the_author_ID();
      $authName  = get_the_author();
      $postID    = get_the_ID();
      $post      = get_post($postID);
      $profile   = get_usermeta($post->post_author, 'display_name');
      $profilecustom  = get_post_meta($postID, "Author", true);
      $websiteUrl     = get_post_meta($postID, "websiteurl", true);
      $websiteName    = get_post_meta($postID, "websitename", true);
      $profileUrl     = get_usermeta($post->post_author, "user_url");
      $profileWebsite = get_usermeta($post->post_author, "profilewebsitename");

      $exceptions = array(2, 3);
      if (in_array($authID, $exceptions)) {
        var_dump($authID);
        $displayName = $profilecustom; // Was $profile but -M updated to fix Contributing Author text
        $link = sprintf('<a href="%s" target="_blank">%s</a>', $websiteUrl, $websiteName);
        $content .= sprintf("<p><em>Contributed by %s.</em></p>\n", $displayName);
        $desc = '';
      } else {
        $displayName = $authName;
        $link = sprintf('<a href="%s" target="_blank">%s</a>', $profileUrl, $profileWebsite);
        $content .= sprintf("<p><em>Contributed by %s of %s.</em></p>\n", $displayName, $link);
        $desc = get_the_author_meta('description');
      }

      if (!empty($desc)) {
        $content .= sprintf("<p><em>%s</em></p>\n", $desc);
      }
    }
    return $content;
  }

  public function insertTDSdelivery($content) {
    $content .= "<p class=\"delivered-by\">Delivered by <a href=\"http://www.thedailysheeple.com\" target=\"_blank\">The Daily Sheeple</a></p><hr>\n";
    return $content;
  }

  public function my_show_extra_profile_fields($user) { ?>
<h3>Extra profile information</h3>

<table class="form-table">
  <tr>
    <th><label for="profilewebsitename">User Website Name</label></th>
    <td>
      <input type="text" name="profilewebsitename" id="profilewebsitename" value="<?php echo esc_attr( get_the_author_meta( 'profilewebsitename', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description">Website Name</span>
    </td>
  </tr>
   <tr>
    <th><label for="profilewebsiteRSS">Website RSS Feed URL</label></th>
    <td>
      <input type="text" name="profilewebsiteRSS" id="profilewebsiteRSS" value="<?php echo esc_attr( get_the_author_meta( 'profilewebsiteRSS', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description">Website RSS Feed URL</span>
    </td>
  </tr>
      <tr>
    <th><label for="profilehandlinginstructions">Special Handling Instructions</label></th>
    <td>
      <input type="text" name="profilehandlinginstructions" id="profilehandlinginstructions" value="<?php echo esc_attr( get_the_author_meta( 'profilehandlinginstructions', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description">Special Handling Instructions</span>
    </td>
  </tr>

</table>
  <?php }

  public function my_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
      return false;
    update_user_meta( $user_id, 'profilewebsitename', $_POST['profilewebsitename'] );
    update_user_meta( $user_id, 'profilewebsiteRSS', $_POST['profilewebsiteRSS'] );
    update_user_meta( $user_id, 'profilehandlinginstructions', $_POST['profilehandlinginstructions'] );
  }

  public function get_the_featured_excerpt() {
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $th_str = substr($excerpt, 0, 20);
    return $the_str;
  }

  public function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    if ($length && is_numeric($length)) {
      $title = substr($title, 0, $length);
    }

    if (strlen($title) > 0) {
      $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
      if ($echo) {
        echo $title;
      } else {
        return $title;
      }
    }
  }
}
