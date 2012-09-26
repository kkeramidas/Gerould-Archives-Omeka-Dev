<?php 
/**
 * Use this file to define customized helper functions, filters or 'hacks'
 * defined specifically for use in your Omeka theme. Ideally, you should
 * namespace these with your theme name to avoid conflicts with functions
 * in Omeka and any plugins.
 */

function gerould_display_random_featured_item($withImage = null)
{
    $html = gerould_display_random_featured_items('1', $withImage);
    return $html;
}

function gerould_display_random_featured_items($num = 5, $hasImage = null)
{
    $html = '';

    if ($randomFeaturedItems = random_featured_items($num, $hasImage)) {
        foreach ($randomFeaturedItems as $randomItem) {

            if (item_has_files($randomItem)) {
                $html .= link_to_item(item_fullsize(array(), 0, $randomItem), array('class'=>'image'), 'show', $randomItem);
            }

    		$html .= '<h2>'. __('Featured Item') .'</h2>';

            $itemTitle = item('Dublin Core', 'Title', array(), $randomItem);

            $html .= '<h3>' . link_to_item($itemTitle, array(), 'show', $randomItem) . '</h3>';

            if ($itemDescription = item('Dublin Core', 'Description', array('snippet'=>190), $randomItem)) {
                $html .= '<p class="item-description">' . $itemDescription . '</p>';
            }
        }
    } else {
        $html .= '<p>'.__('No featured items are available.').'</p>';
    }

    return $html;
}

function gerould_display_random_featured_collection()
{
    $featuredCollection = random_featured_collection();
    $html = '<h2>' . __('Featured Collection') . '</h2>';
    if ($featuredCollection) {
        $html .= '<h3>' . link_to_collection($collectionTitle, array(), 'show', $featuredCollection) . '</h3>';
        if ($collectionDescription = collection('Description', array('snippet'=>360), $featuredCollection)) {
            $html .= '<p class="collection-description">' . $collectionDescription . '</p>';
        }

    } else {
        $html .= '<p>' . __('No featured collections are available.') . '</p>';
    }
    return $html;
}