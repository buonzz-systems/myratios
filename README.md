# MyRatios
Fast and Non Persistent Web Statistics


### Usage

put this snippet inside the html body tag

```
<script type="text/javascript">
    var bmr_api_domain = 'myratios.cloudapp.net';
    (function() {
        var mr = document.createElement('script'); mr.type = 'text/javascript'; mr.async = true;
        mr.src = '//' + api_domain + '/bmr.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mr);
    })();
</script>
```

Change the myratios.dev with the actual hostname of where you setup the application.


### Flushing the memcache

there might be some occasions that you had messed up the stats. you can force the cache to get flushed by either ssh:

```
echo "flush_all" | nc -q 2 localhost 11211 
```

or via REST api

```
http://yourdomain.com/flush.json
```