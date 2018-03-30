<template>
    <div>
        <ais-search-box class="search-input-text-box">
            
            <div class="form-row form-group">
                <div class="col-8">
                    <ais-input placeholder="Find products..." class="form-control" autofocus></ais-input>
                </div>
                <div class="col-2">
                    <ais-clear :classNames="{'ais-clear': 'btn btn-warning btn-sm'}">
                        <i class="material-icons">close</i>
                    </ais-clear>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm" type="submit">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </div>

            <custom-category-menu></custom-category-menu>
           
            <custom-price-range></custom-price-range>

        </ais-search-box>
    </div>
</template>

<script>
import CustomPriceRange from './CustomPriceRange.vue';
import CustomCategoryMenu from './CustomCategoryMenu.vue';

export default {
    components: {
        'custom-price-range': CustomPriceRange,
        'custom-category-menu': CustomCategoryMenu
    }
}
</script>