jQuery(document).ready(function () {
    jQuery('.google-map').each(function () {
        var mapData = jQuery("#" + this.id).data('map-data');
        
        
        
        var sleGoogleMaps = new SleGoogleMaps.api.mapsV3();
        sleGoogleMaps.setMapData(mapData, true)
                .setMapCanvas("#" + this.id)
                .initGoogleMaps();
    });
});