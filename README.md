# GeoToCoverage

A plugin for Omeka designed to work with the GeoLocation plugin. Whenever an item is saved, the plugin will update the item's Dublin Core "Spatial Coverage" metadata with the lat/long and address provided from Geolocation.

WARNING: By default this plugin will OVERWRITE any element texts in Spatial Coverage. Anytime the location is changed in GeoLocation (on the map), the Spatial Coverage fields will likewise be changed. It is recommended that this be used in combination with the Hide Elements plugin so that the Spatial Coverage fields are hidden in editing to avoid loss of data.


