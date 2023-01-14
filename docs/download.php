<?php
if(isset($_POST['link'])) {
  $link = $_POST['link'];
  $youtube = "http://youtube.com/get_video_info?video_id=";
  $video_info = file_get_contents($youtube . parse_url($link, PHP_URL_QUERY));
  parse_str($video_info, $video_data);
  $streams = $video_data['url_encoded_fmt_stream_map'];
  $streams = explode(',',$streams);
  foreach($streams as $stream){
    parse_str($stream,$data);
    $url = $data['url'];
    $type = $data['type'];
    $quality = $data['quality'];
    echo '<a href="'.$url.'">Download in '.$quality.' ('.$type.')</a><br>';
  }
}
?>

