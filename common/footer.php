<?php
function gt3_gtFooterBlock_gtBuild($logoPath) {

    $linkSet = array(
      'Emergency Information'           => "http://www.gatech.edu/emergency/",
      'Legal &amp; Privacy Information' => "http://www.gatech.edu/legal/",
      'Accessibility'                   => "http://www.gatech.edu/accessibility/",
      'Accountability'                  => "http://www.gatech.edu/accountability/",
      'Accreditation'                   => "https://www.gatech.edu/accreditation/",
      'Employment'                      => "http://ohr.gatech.edu/employment/careers");

    $buffer = '

      <div class="gt-gt-footer">
        <div class="gt-gt-footer-left">
          <ul class="gt-gt-footer-legallinks">';
    foreach ($linkSet as $text => $url) {
       $buffer .= "                     <li><a href=\"" . $url . "\">" . $text . "</a></li>\n";
    }
    $buffer .= '
          </ul>
          <p class="gt-gt-footer-copyright">&copy;' . date('Y') . ' Georgia Institute of Technology</p>
        </div>
        <div class="gt-gt-footer-right">
          <a href="http://www.gatech.edu/"><img alt="Georgia Institute of Technology" src="' . $logoPath . 'gt-logo.svg" /></a>
        </div>
      </div>
    ';

    return $buffer;

}
?>

</div><!-- end content -->
</div><!-- end main wrapper -->

<footer id='gt-footer' class='site-footer' role="contentinfo">

  <div class='gt-background-site-footer'>
    <div class='gt-site-footer'>
        <div class='region-footer-first'><div class='content'>

        <div id="custom-footer-text">
            <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
            <p><?php echo $footerText; ?></p>
            <?php endif; ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
        </div>


        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>


    <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

          </div></div>
      </div> <!-- end 'gt-site-footer' -->
    </div> <!-- end 'gt-background-site-footer' -->

    <div class="gt-background-gt-footer">
<?php print gt3_gtFooterBlock_gtBuild(WEB_THEME . '/gt3-branding/images/'); ?>
    </div><!-- gt-background-gt-footer -->

</footer>

</div><!-- end page -->
</div><!--end wrap-->

<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
    Omeka.skipNav();
    Omeka.megaMenu("#top-nav");
    Seasons.mobileSelectNav();
});
</script>
<script type="text/javascript" src="<?php print WEB_THEME;?>/gt3-branding/javascripts/gt3/gt_gt_header.js"></script>

</body>

</html>
