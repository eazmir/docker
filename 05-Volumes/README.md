## Now, Docker Volumes

We have three types of Docker volumes:

### 1) Bind Mounts

**Where does it live?**
It lives on your computer's local host.

**How it works:**
You map an exact path on your host machine directly into the container, using $(pwd).

**Best for:** Local development. If you edit your index.html file (or a C++ file for a project) on your computer, the container sees the change immediately.

```bash
$ echo "<h1>Hello docker</h1>" > index.html
$ docker run -p 8080:80 -v "$(pwd)":/var/www/html --name nginx nginx
$ curl -I localhost:8080
> HTTP/1.1 200 OK
> Server: nginx
> Date: Tue, 14 Jul 2026 16:12:08 GMT
> Content-Type: text/html
> Content-Length: 37
> Last-Modified: Tue, 14 Jul 2026 15:49:31 GMT
> Connection: keep-alive
> ETag: "6a565a8b-25"
> Accept-Ranges: bytes
$ curl localhost:8080
> <h1>Hello Docker</h1>
```

--------------------------------------------------------------------------

### 2) Named Volumes (The Docker Way)

**Where does it live?**
It lives in a hidden directory managed by Docker, usually inside this path (/var/lib/docker/volumes/).

**How it works?**
You create a volume using:

```bash
$ docker volume create volume_name
```

You don't care where the files are physically stored.

**Best for:** Database containers like MariaDB, a named volume is the safest way to ensure the data persists without worrying about file permissions on your local machine.

```bash
$ docker run -p 8080:80 -v mydate:/var/www/html --name nginx nginx
$ curl -I localhost:8080
> HTTP/1.1 200 OK
> Server: nginx
> Date: Tue, 14 Jul 2026 16:42:12 GMT
> Content-Type: text/html
> Content-Length: 616
> Last-Modified: Tue, 14 Jul 2026 16:28:35 GMT
> Connection: keep-alive
> ETag: "6a5663b3-268"
> Accept-Ranges: bytes
```
