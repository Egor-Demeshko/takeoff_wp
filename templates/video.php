
<?php 
    $mobile_video_id = get_field('to_mobile_video');
    $desktop_video_id = get_field('to_desktop_video');

// Get the URL of the video file
$mobile_url = wp_get_attachment_url($mobile_video_id);
$desktop_url = wp_get_attachment_url($desktop_video_id);
// Get the title of the available video file
$caption = wp_get_attachment_caption($mobile_video_id);
$caption = ($caption && strlen($caption) > 0) ? $caption : wp_get_attachment_caption($desktop_video_id);
?>

<div class="video_wrapper">
    <video autoplay muted playsinline loop alt="<?php echo $caption; ?>">
        <source src="<?php echo $mobile_url ?>" media="(max-width: 500px)">
        <source src="<?php echo $desktop_url ?>">
    </video>
</div>