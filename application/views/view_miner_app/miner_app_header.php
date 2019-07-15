<?php
//Attempt to fetch session variables:
$session_en = $this->session->userdata('user');
$en_all_7372 = $this->config->item('en_all_7372');
$en_all_7368 = $this->config->item('en_all_7368');
$uri_segment_1 = $this->uri->segment(1);
$uri_segment_2 = $this->uri->segment(2);
?><!doctype html>
<html lang="en">
<head>
    <!--

    WELCOME TO MENCH SOURCE CODE!

    INTERESTED IN BUILDING THE FUTURE OF EDUCATION?

    CHECKOUT OUR GITHUB PROJECT PAGE FOR MORE INFO:

    https://github.com/askmench

    -->
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="/img/bp_white.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <title><?= (isset($title) ? $title . ' | ' : '') ?>Mench</title>


    <link href="/css/lib/devices.min.css" rel="stylesheet"/>
    <link href="/css/lib/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <?php $this->load->view('view_shared/global_js_css'); ?>
    <script src="/js/custom/platform-js.js?v=v<?= $this->config->item('app_version') ?>" type="text/javascript"></script>

</head>


<body id="platform_body" class="<?= (isset($_GET['skip_header']) ? 'grey-bg' : '') ?>">

    <?php $this->load->view('view_shared/google_tag_manager'); ?>

    <!-- Managed by JS to edit various fields -->
    <div class="edit-box hidden"></div>

    <div class="wrapper" id="platform">

        <?php if (!isset($_GET['skip_header'])) { ?>
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="navbar-brand dashboard-logo">
                            <table style="width: 100%; border:0; padding:0; margin:0 0 0 0;">
                                <tr>
                                    <td style="width:40px;">
                                        <img src="/img/mench_white.png" />
                                    </td>
                                    <td class="<?= advance_mode() ?>">
                                        <input type="text" class="algolia_search" id="platform_search" data-lpignore="true"
                                               placeholder="<?= $en_all_7368[7256]['m_desc'] ?>">
                                    </td>
                                </tr>
                            </table>
                        </span>
                    </div>

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-main navbar-right">


                            <!-- Core Miner Functions -->
                            <li class="<?= ($uri_segment_1 == 'intents' ? 'intent-active' : 'intent-inactive') ?>">
                                <a href="/intents/<?= $this->session->userdata('user_default_intent') ?>">
                                    <?= $en_all_7368[4535]['m_icon'] .' '. $en_all_7368[4535]['m_name'] ?>
                                </a>
                            </li>
                            <li class="<?= advance_mode().($uri_segment_1 == 'entities' ? 'entity-active' : 'entity-inactive') ?>">
                                <a href="/entities/<?= $this->config->item('en_focus_id') ?>">
                                    <?= $en_all_7368[4536]['m_icon'] .' '. $en_all_7368[4536]['m_name'] ?>
                                </a>
                            </li>
                            <li class="<?= advance_mode().($uri_segment_1 == 'links' ? 'links-active' : 'links-inactive') ?>">
                                <a href="/links">
                                    <?= $en_all_7368[6205]['m_icon'] .' '. $en_all_7368[6205]['m_name'] ?>
                                </a>
                            </li>


                            <!-- List other Apps -->
                            <li class="<?= advance_mode().($uri_segment_1 == 'dashboard' ? 'links-active' : 'links-inactive') ?>" data-toggle="tooltip" data-placement="left" title="<?= $en_all_7368[7161]['m_name'] ?>">
                                <a href="/dashboard">
                                    <?= $en_all_7368[7161]['m_icon'] ?>
                                </a>
                            </li>
                            <li class="<?= advance_mode().($uri_segment_1 == 'Minerapp' ? 'links-active' : 'links-inactive') ?>" data-toggle="tooltip" data-placement="left" title="<?= $en_all_7368[6287]['m_name'] ?>">
                                <a href="/miner_app/admin_tools">
                                    <?= $en_all_7368[6287]['m_icon'] ?>
                                </a>
                            </li>
                            <li class="<?= advance_mode() ?> links-inactive" data-toggle="tooltip" data-placement="left" title="<?= $en_all_7372[7369]['m_name'] ?>">
                                <a href="/actionplan">
                                    <?= $en_all_7372[7369]['m_icon'] ?>
                                </a>
                            </li>


                            <!-- Advance Mode & Logout -->
                            <li class="links-inactive <?= ( en_auth(array(1308)) ? '' : ' hidden ' ) ?>" data-toggle="tooltip" data-placement="left" title="<?= $en_all_7368[5007]['m_name'] ?>">
                                <a href="javascript:void(0)" onclick="toggle_advance(0)">
                                    <i class="<?= ( $this->session->userdata('advance_view_enabled')==1 ? 'fas fa-expand-arrows' : 'fal fa-expand-arrows ' ) ?> advance-icon"></i>
                                </a>
                            </li>
                            <li data-toggle="tooltip" data-placement="left" title="<?= $en_all_7368[7291]['m_name'] ?>">
                                <a href="/logout">
                                    <?= $en_all_7368[7291]['m_icon'] ?>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
            </nav>
        <?php } ?>


        <div class="main-panel no-side">
            <div class="content <?= (isset($_GET['skip_header']) ? 'no-frame' : 'dash') ?>">
                <div class="container-fluid">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    $hm = $this->session->flashdata('flash_message');
                    if ($hm) {
                        echo $hm;
                    }
                    ?>