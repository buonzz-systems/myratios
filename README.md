# MyRatios
Fast and Non Persistent Web Statistics


### Usage

put this snippet inside the html body tag

```
 <script type="text/javascript">
        var api_domain = 'myratios.dev';
        (function() {
            var mr = document.createElement('script'); mr.type = 'text/javascript'; mr.async = true;
            mr.src = '//' + api_domain + '/pageview.json';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mr);
        })();
    </script>
```

Change the myratios.dev with the actual hostname of where you setup the application.
