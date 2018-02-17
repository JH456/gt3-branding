
<?php queue_css_url('https://www.w3schools.com/w3css/4/w3.css') ?>
<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show w3Page')); ?>

<?php
$calledPlugins = array();

function fire_specific_plugin_hook($pluginName, $hookName, $args = array())
{
    // Get the specific hook.
    $pluginBroker = get_plugin_broker();
    $hookNameSpecific = $pluginBroker->getHook($pluginName, $hookName);

    // Return null if the specific hook doesn't exist.
    if (!$hookNameSpecific) {
        return null;
    }

    foreach ($hookNameSpecific as $cb) {
        call_user_func($cb, $args);
    }
}
?>

<div class='w3-row'>
    <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
</div>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div class='w3-row' id="item-tags">
    <div class="element-text"><?php echo tag_string('item'); ?></div>
    <br>
</div>
<?php endif;?>

<section class='w3-row'>
    <div class='w3-row'>
        <div class='w3-col s6 m6 l6'>
            <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
            <?php fire_specific_plugin_hook('DocsViewer', 'public_items_show', array('view' => $this, 'item' => $item)) ?>
            <?php endif; ?>
        </div>
        <div class='w3-col s6 m6 l6'>
            <h2>Document Text</h2>
            <p style='height: 600px; overflow-y: scroll;'><?php echo metadata('item', array('Item Type Metadata', 'Text')); ?></p>
            <!-- The following returns all of the files associated with an item. -->
            <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
                <h2><?php echo __('Files'); ?></h2>
                <?php echo item_image_gallery(); ?>
            </div>
            <?php endif; ?>

            <!-- If the item belongs to a collection, the following creates a link to that collection. -->
            <?php if (metadata('item', 'Collection Name')): ?>
            <div id="collection" class="element">
                <h2><?php echo __('Collection'); ?></h2>
                <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class='w3-row'>
    <section>
        <?php fire_specific_plugin_hook('Scripto', 'public_items_show', array('view' => $this, 'item' => $item)) ?>
    </section>
</div>

<div class='w3-row'>
    <section>
        <?php fire_specific_plugin_hook('ItemRelations', 'public_items_show', array('view' => $this, 'item' => $item)) ?>
    </section>
</div>

<div class='w3-row'>
    <!-- The following prints a citation for this item. -->
    <section id="item-citation" class="element">
        <h2><?php echo __('Citation'); ?></h2>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </section>
</div>

<section>
    <?php /*fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item));*/ ?>
    <?php fire_specific_plugin_hook('Commenting', 'public_items_show', array('view' => $this, 'item' => $item)) ?>
</section>


<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

<?php echo foot(); ?>
