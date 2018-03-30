<template>
	<div>
		<div class="container">
			<header-top></header-top>
		</div>
		
		<div class="container">
			<ais-index :app-id="appId" :api-key="secret" index-name="advance_search">
				<div class="row">
					<div class="col-md-4">
						<search-form></search-form>
					</div>
					<div class="col-md-8">
						<search-result></search-result>
					</div>
				</div>
			</ais-index>
		</div>
	</div>
</template>

<script>
	import Header from './partial/Header.vue';
	import SearchResult from './partial/SearchResult.vue';
	import SearchForm from './partial/SearchForm.vue';

	export default {
		components: {
			'header-top': Header,
			'search-result': SearchResult,
			'search-form': SearchForm,
		},
	    data: function (){
		    return {
                appId: process.env.MIX_ALGOLIA_APP_ID,
				secret: process.env.MIX_ALGOLIA_SECRET,
		    };
        },
		methods: {
	 
		},
		created(){
	 
		}
	};
</script>