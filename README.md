# MyRatios

Super Fast Data Tracking and Reporting using Logstash, ElasticSearch and Kibana

## Installation


Clone the project to your server
** make sure to replace domain.com with your actual domain**


```
git clone https://github.com/buonzz-systems/myratios.git myratio.domain.com
```

### Setup the Virtual Host in Nginx

edit the contents of nginx/virtualhost.conf and customize the domains and paths. Then copy it in nginx config:

```
sudo cp nginx/virtualhost.conf /etc/nginx/sites-available/myratio.domain.com
ln -s /etc/nginx/sites-available/myratio.domain.com /etc/nginx/sites-enabled/myratio.domain.com

```


Copy the logstash patterns to /etc folder

```
sudo cp logstash/patterns/* /etc/logstash/patterns/
```
