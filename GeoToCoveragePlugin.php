<?php

define('ELEMENT_SET', 'Dublin Core');
define('ELEMENT', 'Spatial Coverage');

class GeoToCoveragePlugin extends Omeka_Plugin_AbstractPlugin
{

    protected $_hooks = array('after_save_item');

    public function hookAfterSaveItem($args)
     {
        $db = get_db();
        $elementTable = $db->getTable('Element');
        $coverageElement = $elementTable->findByElementSetNameAndElementName(ELEMENT_SET, ELEMENT);
        $item = $args['record'];
        $location = $this->_db->getTable('Location')->findLocationByItem($item, true);

        // Delete previous element texts so coverage is synced with GeoLocation
        $item->deleteElementTextsByElementId(array($coverageElement->id));

        if ($location) {
            $latlon = sprintf('%+f',$location->latitude).sprintf('%+f',$location->longitude).'/';
            $item->addTextForElement($coverageElement, $latlon);
            if ($location->address) {
                $item->addTextForElement($coverageElement, $location->address);
            }
         }

        $item->saveElementTexts();
     }

}
