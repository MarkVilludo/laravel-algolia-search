<template>
	<ais-index
		:app-id="appId"
		:api-key="secret"
		index-name="title"
	>
		<div class="container">
			<header-top></header-top>
			
			<div class="search-form mb-5">
				<div class="col-lg-8 offset-lg-2">
					<ais-search-box placeholder="Find posts..." :class="['clearfix']"></ais-search-box>
				</div>
			</div>
		</div>
		
		<div class="container">
			<ais-results :class="['row']" :results-per-page="9">
				<template slot-scope="{ result }">
					<div class="col-md-4">
						<div class="search-result pb-4">
							<div class="card h-100">
								<img class="card-img-top" :src="result.image" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><ais-highlight :result="result" attribute-name="title"></ais-highlight></h5>
									<p class="card-text">{{ result.body.substring(0, 200) }}</p>
								</div>
							</div>
						</div>
					</div>
				</template>
			</ais-results>
		</div>
	</ais-index>
</template>

<script>
	import Header from './partial/Header.vue';

	export default {
		components: {'header-top': Header},
	    data: function (){
		    return {
                appId: process.env.MIX_ALGOLIA_APP_ID,
                secret: process.env.MIX_ALGOLIA_SECRET
		    };
        },
		methods: {
	 
		},
		created(){
	 
		}
	};
</script>