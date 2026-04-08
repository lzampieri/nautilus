<script setup>
import { setOptions, importLibrary } from '@googlemaps/js-api-loader';
import { ref } from 'vue';

setOptions({
  key: import.meta.env.VITE_PUBLIC_MAPS_API_KEY,
  version: 'weekly'
});

const mapRef = ref();
const autocRef = ref();

const load = async () => {
    await importLibrary("places");

    const map = new google.maps.Map(mapRef.value)
    // The map is here only 'cause it is mandatory, but it will be not rendered

    const placeAutocomplete = new google.maps.places.PlaceAutocompleteElement({});
    autocRef.value.appendChild(placeAutocomplete);

    placeAutocomplete.addEventListener('gmp-select', async ({ placePrediction }) => {
        const place = placePrediction.toPlace();
        await place.fetchFields({ fields: ['displayName', 'formattedAddress', 'location'] });
        console.log(place)
    });
} 

load();
</script>

<template>
    <div ref="mapRef" class="w-0 h-0" />
    <div ref="autocRef" class="w-full h-full">
        Ciaooo
    </div>
</template>
