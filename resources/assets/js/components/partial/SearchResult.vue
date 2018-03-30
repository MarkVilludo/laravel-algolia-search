<template>
    <ais-results :results-per-page="8">
        <template slot-scope="{ result }">
            <div class="clearfix mb-4">
                <div class="media">
                    <img class="align-self-start mr-3" :src="result.image" alt="Generic placeholder image">
                    <div class="media-body">
                        <h3 class="mt-0">
                            <a :href="'/products/'+result.id" class="text-info">
                                {{ result.title }}
                            </a>
                        </h3>
                        <h5 class="mt-0 ">Category: <span class="text-success">{{ result.category }}</span></h5>
                        <h5 class="mt-0 ">Price: <span class="text-danger">${{ result.price }}</span></h5>
                        <p>{{ result.body }}</p>
                    </div>
                </div>
            </div>
        </template>
    </ais-results>
</template>
