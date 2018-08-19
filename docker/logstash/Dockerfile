FROM logstash:2.4

COPY ./config/nginx.conf /logstash-config/nginx.conf
COPY ./patterns/NGINX_ACCESS /etc/logstash/patterns/NGINX_ACCESS

CMD ["-f", "/logstash-config/nginx.conf"]
