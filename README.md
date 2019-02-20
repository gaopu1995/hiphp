# hiphp

#### 项目介绍
hi,这里是hiphp。


#### 安装教程
1. git clone
2. 配置host 127.0.0.1 hiphp.com 
3. nginx简单配置  

```
server {
    listen 80;
    server_name hiphp.com;
    root /share/hiphp/;
    charset utf-8;

    location / {
        index  index.php index.html index.htm;
        if (-e $request_filename) {
            break;
        }

        if (!-e $request_filename) {
            rewrite ^/(.*)$ /index.php/$1 last;
            break;
         }
    }
    location ~ .+\.php($|/) {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    access_log logs/hiphp.access.log;
    error_log logs/hiphp.error.log;
}
```