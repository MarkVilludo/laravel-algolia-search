<template>
	<div class="form-group">
		<h3>Price <small>${{showMinMax[0]}} - ${{showMinMax[1]}}</small></h3>

		<div class="price-slider">
			<input type="text" id="price-range-slider">
		</div>
	</div>
</template>

<script>
import { Component } from 'vue-instantsearch';
import BootstrapSlider from 'bootstrap-slider';

export default {
	mixins: [Component],
	data(){
		return {
			showMinMax: [0, 100],
			attributeName: "price",
			slider: {}
		};
	},
	computed: {
		storeActiveRefinements(){
			return this.searchStore.activeRefinements;
		}
	}, // computed

    mounted(){
		var vm = this;
		this.slider = new BootstrapSlider('#price-range-slider', {
			min: 0,
			max: 100,
			range: true,
			value: [0, 100],
			step: 1
		});
		// Show change at title
		this.slider.on("change", function(ch){
			vm.showMinMax = ch.newValue;
		});
		// Run change query
		this.slider.on("slideStop", function(chn){
			vm.runSearch( Number(chn[0]), Number(chn[1]) );
		});
	},
	
	methods: {
		runSearch(min, max){
			this.searchStore.stop(); // Stop query
			this.searchStore.removeNumericRefinement(this.attributeName, '>');
			// For minmun range
			if(min > 0){
				this.searchStore.addNumericRefinement(this.attributeName, '>', min);
				// Remove the max value if lower than the min value.
				if(min > max){
					this.searchStore.removeNumericRefinement(this.attributeName, '<');
				}
			}
			// For maximum range
			if(max > min){
				this.searchStore.removeNumericRefinement(this.attributeName, '<');
				this.searchStore.addNumericRefinement(this.attributeName, '<', max);
			}
			this.searchStore.start(); // Run query
        	this.searchStore.refresh();
		}
	}, // methods

	watch: {
		storeActiveRefinements(){
			if(this.storeActiveRefinements.length == 0){
				this.showMinMax = [0, 100];
				if(this.slider){
					this.slider.setValue([0, 100]);
				}
			}
		}//
	}//

};
</script>