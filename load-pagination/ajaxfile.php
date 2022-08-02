<?php
## Database configuration
include 'config.php';

$start = 0;$rowperpage = 3;
if(isset($_POST['start'])){
   $start = $_POST['start']; 
}
if(isset($_POST['rowperpage'])){
   $rowperpage = $_POST['rowperpage']; 
}

## Fetch records
$sql = 'SELECT * FROM posts order by id desc limit '.$rowperpage.' OFFSET '.$start;

$records = pg_query($con, $sql);
$html = '';

while ($row = pg_fetch_assoc($records)) {
   $id = $row['id'];
   $title = $row['title'];
   $content = $row['description'];
   $shortcontent = substr($content, 0, 160)."...";
   $link = $row['link'];

   // Creating HTML structure
   $html .= '<div id="post_'.$id.'" class="post">';
   $html .= '<h2>'.$title.'</h2>';
   $html .= '<p>'.$shortcontent.'</p>';
   $html .= "<a href='".$link."' target='_blank' class='more'>More</a>";
   $html .= '</div>';

}

echo $html;