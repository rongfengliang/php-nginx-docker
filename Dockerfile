FROM alpine
ENV TZ Asia/Shanghai
# first add mirror for alpine repos
RUN set -x \
    && /bin/sed -i 's,http://dl-cdn.alpinelinux.org,https://mirrors.aliyun.com,g' /etc/apk/repositories
RUN apk update && apk add  --no-cache nginx nginx-debug php7-fpm  php7-json  perf  tzdata  && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
COPY --from=ochinchina/supervisord:latest /usr/local/bin/supervisord /usr/local/bin/supervisord
CMD ["/usr/local/bin/supervisord","-c","/etc/supervisor.conf"]
