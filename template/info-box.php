<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}
echo "<div class='post-details-box'>";
echo "<h2>Post Details</h2>";
echo "<p>Category Name: " . $cat_name . "</p>";
echo "<p>Post ID: " . $post_id . "</p>";
echo "<p>Word Count: " . $word_count . "</p>";
echo "<p>Estimated Reading Time: " . $min_need . " minutes</p>";
echo "</div>";