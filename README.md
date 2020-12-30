# docker nginx + php-fpm+perf learning


## runing

* install deps

```code
cd app
composer install
```

* benchmark

```code
ab -n 2000 -c 20 http://localhost/
```

* perf

```code
docker-compose exec web sh

echo 0 > /proc/sys/kernel/kptr_restrict
echo 1 >/proc/sys/kernel/perf_event_paranoid

cd /opt/app/perf
perf record -ag -F 99
```

* view flame graph

> with flamescope 

```code

generate perf file && then open view flamescope for view results
perf script > php-app.perf
```

