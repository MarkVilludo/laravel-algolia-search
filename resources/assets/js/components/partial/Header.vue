<template>
    <div class="text-center mb-4">
        <h1 class="mb-4">Algolia Search with Laravel and Vue.js</h1>
        
        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
            <a class="btn btn-secondary" :class="[(pathName == '/' && 'active')]" href="/">Advance Search</a>
            <a class="btn btn-secondary" :class="[(pathName == '/instant' && 'active')]" href="/instant">Instant Blog Search</a>
            <a class="btn btn-secondary" href="/suggestable">Autocomplete Search</a>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            pathName: location.pathname
        }
    }
}
</script>
