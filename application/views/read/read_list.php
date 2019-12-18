
<script src="/application/views/read/read_list.js?v=v<?= config_var(11060) ?>" type="text/javascript"></script>

<div class="container">
<?php

echo '<h1><span class="icon-block-xlg"><i class="far fa-bookmark"></i></span>MY READS</h1>';

//See if we have 2 or more blogs:
$has_multiple_blogs = ( count($user_blogs) >= 2 );

//User has multiple 🔴 READING LISTs, so list all 🔴 READING LISTs to enable User to choose:
echo '<div id="actionplan_steps" class="list-group actionplan-list '.( $has_multiple_blogs ? 'actionplan-sort' : '').'" style="margin-top:15px;">';
foreach ($user_blogs as $priority => $ln) {

    //Display row:
    echo '<a id="ap_in_'.$ln['in_id'].'" href="/' . $ln['in_id'] . '" sort-link-id="'.$ln['ln_id'].'" class="list-group-item itemread actionplan_sort">';

    echo '<span class="pull-right" style="padding-right:8px; padding-left:10px;">';
    echo '<span class="actionplan_remove" in-id="'.$ln['in_id'].'"><i class="fas fa-trash"></i></span>';
    echo '</span>';

    echo echo_blog_thumbnail($ln['in_id']);

    $completion_rate = $this->READ_model->read__completion_progress($session_en['en_id'], $ln);

    echo '<b class="actionplan-title montserrat montserrat blog-url in-title-'.$ln['in_id'].'">' . $ln['in_title'] . '</b>';
    echo '<div class="actionplan-overview">';
    echo '<span title="'.$completion_rate['steps_completed'].' of '.$completion_rate['steps_total'].' blogs read" class="montserrat blog-info doupper">READ '.$completion_rate['completion_percentage'].'%</span>';
    echo '</div>';
    echo '</a>';
}

echo '</div>';

//Give option to add
echo ' <a class="btn btn-read inline-block" href="/"  style="margin: 20px 0;"><i class="fas fa-plus"></i> NEW READ</a>';


if($has_multiple_blogs){

    //Give option to delete all:
    echo '<div class="pull-right"  style="margin: 20px 0;"><a href="/read/read_remove_all" style="font-size:0.8em; color:#AAA; text-decoration: none;" class="montserrat doupper" data-toggle="tooltip" title="Remove ALL reads from your reading list" data-placement="left"><i class="fas fa-trash"></i> ALL</a></div>';

    //Give sorting tip:
    echo '<div class="actionplan-tip"><i class="fas fa-lightbulb"></i> TIP: Prioritize your reads by holding them & dragging them up/down.</div>';
}


?>
</div>