<template>
    <ais-results>
        <template slot-scope="{ result }">
            <h2>
            {{ result.title }}
            </h2>
            <p>{{ result.body }}</p>
        </template>
    </ais-results>
</template>
