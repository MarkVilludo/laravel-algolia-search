<template>
	<ais-index
		:app-id="appId"
		:api-key="secret"
		index-name="title"
	>
		<ais-search-box></ais-search-box>
		<ais-results>
			<template slot-scope="{ result }">
				<h2>
					<ais-highlight :result="result" attribute-name="title"></ais-highlight>
				</h2>
			</template>
		</ais-results>
	</ais-index>
</template>

<script>
	export default {
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