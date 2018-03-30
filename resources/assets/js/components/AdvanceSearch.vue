<template>
	<div>
		<div class="container">
			<header-top></header-top>
		</div>
		
		<div class="container pt-4">
			<ais-index :app-id="appId" :api-key="secret" index-name="advance_search">
				<div class="row">
					<div class="col-md-4">
						<search-form></search-form>

						<ais-powered-by></ais-powered-by>
					</div>
					<div class="col-md-8 pl-5">
						<search-result></search-result>
					</div>
				</div>

				<div class="row">
					<div class="col pt-3">
						<ais-pagination v-on:page-change="onPageChange" :classNames="paginationClass"></ais-pagination>
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
			onPageChange(){
				window.scrollTo(0,0);
			}
		},
		computed: {
			paginationClass(){
				return {
					'ais-pagination': 'pagination justify-content-center',
					'ais-pagination__item': 'page-item',
					'ais-pagination__link': 'page-link',
					'ais-pagination__item--active': 'active',
            		'ais-pagination__item--disabled': 'disabled'
				}
			} // 
		}
	};
</script>