<?php

function gt3_gtHeaderBlock_gtBuild($logoPath, $partner, $searchConfig = NULL) {

    $buffer = '';

    $partners = array(
      'emory' => array(
        'name' => 'Emory University',
        'link' => 'http://www.emory.edu/',
        'logo' => 'emory-logo.svg',
        'color' => '#002878',
        'schema' => 'light', #-- 'light' toggles a white drop-down arrow; 'dark' a black drop-down arrow
        'trayLinks' => array(
          'http://map.emory.edu/' => 'Emory Map',
          'http://directory.service.emory.edu' => 'Emory Directory'
        ),
      ),
    );

    $topNavLinks = '
            <nav role="navigation" aria-label="Georgia Tech Campus Links">
              <ul>
                <li class="gt-ctn"><a href="http://www.gatech.edu/creating-the-next">Creating the Next</a></li>
                <li><a id="gt-campustoggle" class="gt-campustoggle" href="#">Directories / Maps</a></li>' .
($searchConfig != NULL ? '
                <li><form action="' . $searchConfig['path'] . '" method="get" id="search-block-form" accept-charset="UTF-8" class="search-form search-block-form">
                <div class="js-form-item form-item js-form-type-search form-type-search js-form-item-keys form-item-keys form-no-label">
                  <label id="gt-searchlabel" for="gt-search-field">Search</label>
                  <input title="Enter the terms you wish to search for." data-drupal-selector="edit-keys" type="search" id="gt-search-field" name="' . $searchConfig['fieldname'] . '" size="15" maxlength="128" value="Search This Site" class="form-search" />
                  <a id="gt-searchtoggle"><i class="svg-magglass" aria-hidden="true"></i> <span class="visually-hidden">Search</span></a>
                  <button class="visually-hidden" type="submit">Submit</button>
                </div>
                </form></li> ' : '') . '
              </ul>
            </nav>
    ';


    if (($partner == '') || !isset($partners[$partner])) {
      /* Standard Georgia Tech Header Bar */
      $buffer .= '
      <div class="gt-gt-header">
        <div class="gt-header-linkbar">

          <div class="gt-header-logo"><a href="http://www.gatech.edu/"><img alt="Georgia Institute of Technology" src="' . $logoPath . 'gt-logo.svg"></a></div>

          <div class="gt-header-gt-right">
        ' . $topNavLinks . '
          </div>

        </div>
      </div><!-- gt-gt-header -->
      ';

    } else {

      $p = $partners[$partner];

      /* Partnership Header Bar for Partnership Palette */
      $buffer .= '
      <div class="gt-header-partner-split">
        <svg class="gt-header-partner-divide" height=44 width=44 xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
          <path d="M 44 0 L 44 44 L 0 44 Z" fill="' . $p['color'] . '" />
        </svg>
        <div class="gt-header-partner-bar">
          <svg height=44 width=100% viewbox="0 0 2 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M 0 0 L 2 0 L 2 2 L 0 2 Z" fill="' . $p['color'] . '" />
          </svg>
        </div>
      </div>

      <div class="gt-gt-header">
        <div class="gt-header-linkbar">

          <div class="gt-header-logo"><a href="http://www.gatech.edu/"><img alt="Georgia Institute of Technology" src="' . $logoPath . 'gt-logo.svg"></a></div>

          <div class="gt-header-gt-left">
            <nav role="navigation" aria-label="Georgia Tech Campus Links">
              <ul>
                <li><a id="gt-campustoggle" class="gt-campustoggle" href="#"><i class="svg-dropdown" aria-hidden="true"></i><span class="gt-text">Directories / Maps</span></a></li>
              </ul>
            </nav>
          </div>

          <div class="gt-header-partner-logo"><a href="' . $p['link'] . '"><img alt="' . $p['name'] . '" src="' . $logoPath . $p['logo'] . '"></a></div>

          <div class="gt-header-partner-right">
            <nav role="navigation" aria-label="' . $p['name'] . ' Campus Links">
              <ul>
                <li><a id="gt-campustoggle-p" class="gt-campustoggle" href="#"><span class="gt-text">Directories / Maps</span><i class="svg-dropdown' . ($p['schema'] == 'light' ? '-white' : '') . '" aria-hidden="true"></i></a></li>
              </ul>
            </nav>
          </div>

        </div><!-- gt-header-linkbar -->
      </div><!-- gt-gt-header -->
';
    }


    /* Drop Down Tray Section */
    $buffer .= '
      <div class="gt-gt-header-tray" id="gt-header-tray">

        <div class="gt-tray-container gt-tech-links" id="gt-tech-links">';

    if (!isset($p)) {
      $buffer .= '
          <nav id="header-links" role="navigation" aria-label="Directory and Map Links">
            <ul class="menu">
              <li class="ulink"><a href="http://www.directory.gatech.edu">Campus Directory</a></li>
              <li class="ulink"><a href="http://map.gtalumni.org">Campus Map</a></li>
            </ul>
          </nav>';

    } else {
      $buffer .= '
          <nav id="header-links" class="partner" role="navigation" aria-label="Georgia Tech Directory and Map Links">
            <ul class="menu">
              <li class="ulink"><a href="http://map.gtalumni.org">Georgia Tech Map</a></li>
              <li class="ulink"><a href="http://www.directory.gatech.edu">Georgia Tech Directory</a></li>
            </ul>
          </nav>
          <nav id="header-links" class="partner" role="navigation" aria-label="' . $p['name'] . ' Directory and Map Links">
            <ul class="menu">' . "\n";
      foreach ($p['trayLinks'] as $url => $text) {
        $buffer .= '              <li class="ulink"><a href="' . $url . '">' . $text . '</a></li>' . "\n";
      }
      $buffer .= '
            </ul>
          </nav>';
    }

    $buffer .= '
        </div><!-- gt-tray-container gt-tech-links -->

        <div class="gt-tray-container gt-search-as-tray" id="gt-search-as-tray">
          <form action="/search/node" method="get" accept-charset="UTF-8" class="search-form search-tray-form">
            <div class="js-form-item form-item js-form-type-search form-type-search js-form-item-keys form-item-keys form-no-label">
              <label id="gt-searchlabel" for="gt-search-field-tray">Search</label>
              <input title="Enter the terms you wish to search for." data-drupal-selector="edit-keys" type="search" id="gt-search-field-tray" name="keys" size="15" maxlength="128" value="Search This Site" class="form-search" />
              <button id="gt-searchsubmit" type="submit">Search Site</button>
            </div>
          </form>
        </div><!-- gt-tray-container gt-search-as-tray-->

      </div><!-- gt-gt-header-tray -->

    ';

    return $buffer;

}

?>
<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    #queue_css_url('//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic');
    queue_css_file(array('iconfonts', 'normalize', 'style'), 'screen');
    queue_css_file(array('gt3-css'), 'screen');
    queue_css_file('print', 'print');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array(
        'vendor/selectivizr',
        'vendor/jquery-accessibleMegaMenu',
        'vendor/respond',
        'jquery-extra-selectors',
        'seasons',
        'globals',
    ));
    ?>

    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap" class='page-wrapper'><div id='page'>
      <header id='gt-header' role="banner">
        <div class="gt-background-gt-header">
        <?php print gt3_gtHeaderBlock_gtBuild(WEB_THEME . '/gt3-branding/images/', '', NULL); ?>
        </div><!-- gt-background-gt-header -->
        <div class="gt-background-site-identity">
         <div class="region-header">
          <div class="gt-site-identity">
            <div class='gt-branding__name'>
              <div id="gt-branding__thisUnit">
                <?php echo link_to_home_page(theme_logo()); ?>
              </div><!-- gt-branding__thisUnit -->
            </div><!-- gt-brainding__name -->
          </div><!-- gt-site-identity -->
         </div><!-- region-header -->
        </div><!-- gt-background-site-identity -->
        <div class="gt-background-menu">
         <div class="region-primary-menu">
          <div class="gt-main-menu">
            <nav id="top-nav" class="top" role="navigation">
            <?php echo public_nav_main(); ?>
            </nav>
          </div><!-- gt-main-menu -->
         </div><!-- region-primary-menu -->
        </div><!-- gt-background-menu -->
      </header>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

        <div id='main-wrapper' class='gt-background-page'>
        <div id="content" class='gt-page-body' role="main" tabindex="-1">
            <?php
                if(! is_current_url(WEB_ROOT)) {
                  fire_plugin_hook('public_content_top', array('view'=>$this));
                }
            ?>
