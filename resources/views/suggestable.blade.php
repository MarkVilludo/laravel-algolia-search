<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<div id="my-app">
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="text-center mb-4">
                <h1>Algolia autocomplete search</h1>
                <p>Go to <a href="/">Instant Search</a></p>
            </div>

            <div class="col-lg-6 offset-lg-3">
                <input type="text" id="search-input" class="form-control" />
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
<script>
    var client = algoliasearch('41ZMI9R1JK', 'b114369c19b18a3291888059b7fd4621');
    var index = client.initIndex('title');
    index.setSettings({
        'searchableAttributes': ['title', 'body']
    },function(err, content) {
        console.log(err);
    });

    $('#search-input').autocomplete({
        hint: false,
        openOnFocus: true
    }, [{
        source: $.fn.autocomplete.sources.hits(index, { hitsPerPage: 5 }),
        displayKey: 'title', // Title will show at input after clicked
        templates: {
            suggestion: function(suggestion){
                var suggObj = suggestion._highlightResult;
                var resHtml = '<strong>Title: </strong>'+suggObj.title.value+
                    '<br><strong>Body: </strong>' +suggObj.body.value.substring(0, 30)+'...';
                return resHtml;
            }
        }
    }]).on('autocomplete:selected', function(event, suggestion){
        location.pathname = '/posts/'+suggestion.id;
    });
</script>
</body>
</html>