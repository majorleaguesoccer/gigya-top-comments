<div class="gigya-top-comments">
<?php
  print '<ul id="gigya-top-comments">';
  $i = 0;
  $length = count($query_content);
  $queue = variable_get('gigya_top_comments_google_analytics_queue', '');
  
  if (!empty($query_content)){
    foreach ($query_content as $stream) {
      $node_content = node_load($stream->sid);
      $item = addslashes(htmlspecialchars(url('node/' . $stream->sid)));
      $node_title = $node_content->title;
      $node_path = 'node/' . $stream->sid;
      $event_tracking = 'onClick="_gaq.push([\'_trackEvent\',\''. $queue . '\',\'Position-' . $i . '\',\'' . $item . '\']);"';
      print '<li class="top_content_item">';
        print '<span class="comment_count" ' . $event_tracking . '>' . l($stream->comment_count, $node_path) . '</span>';
        print '<div class="meta"><span class="node_title" ' . $event_tracking . '>' . l($node_title, $node_path) . '</span>';
      if ($i == $length - 1) {
        print '</div></li>';
      }
      else {
        print '</div></li><hr class="gigya_top_comments_item_divider" />';
      }
      $i++;
    }
    print '</ul>';
  }
?>
</div>