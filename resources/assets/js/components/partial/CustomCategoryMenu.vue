<template>
	<div class="custom-category-menu form-group" v-if="show">
		<h3>Category</h3>

		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between align-items-center"
				v-for="facet in facetValues"
				:key="facet.name"
				:class="[(facet.isRefined ? 'list-group-item-primary' : '')]">
				<a href="#" class="text-dark" @click.prevent="handleClick(facet.path)">
					{{facet.name}}
				</a>
				<span class="badge badge-primary badge-pill">{{facet.count}}</span>
			</li>
		</ul>
	</div>
</template>

<script>
import { Component } from 'vue-instantsearch';

export default {
	mixins: [Component],
	computed: {
		facetValues() {
			const { data } = this.searchStore.getFacetValues(
				this.attribute,
				this.sortBy
			);
			if (Array.isArray(data)) {
				return data;
			}
			return [];
		},
		show() {
			return this.facetValues.length > 0;
		},
	}, // computed

	methods: {
		handleClick(path) {
			this.searchStore.toggleFacetRefinement(this.attribute, path);
		},
	},

	data() {
		return {
			attribute: 'category',
			limit: 6,
			sortBy: ['name:asc']
		};
	},

	created() {
		this.searchStore.stop();
		
		this.searchStore.maxValuesPerFacet = this.limit;
		this.searchStore.addFacet({
			name: this.attribute,
			attributes: [this.attribute],
		}, 'tree');

		this.searchStore.start();
		this.searchStore.refresh();
	},

	destroyed() {
		this.searchStore.stop();
		this.searchStore.removeFacet(this.attribute);
		this.searchStore.start();
	},
};
</script>
