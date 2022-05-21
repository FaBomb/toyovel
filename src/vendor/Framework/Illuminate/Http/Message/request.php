<?php

namespace Illuminate\Http\Message;

class Request {

    public $query;

    public $request;

    public $attributes;

    public $cookies;

    // Headers (taken from the $_SERVER).
    public $headers;

    protected $content;

    protected $pathInfo;

    protected $requestUri;

    protected $method;

    /**
     * @param array                $query      The GET parameters
     * @param array                $request    The POST parameters
     * @param array                $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array                $cookies    The COOKIE parameters
     * @param array                $server     The SERVER parameters
     * @param string|resource|null $content    The raw body data
     */
    
    public function __construct(array $query=[], array $request=[],
        array $attributes=[], array $cookies=[],array $files=[], array $server=[], $content=null) {
        
        $this->initialize($query, $request, $attributes, $cookies, $files=[], $server, $content);
    }

    public function initialize(array $query=[], array $request=[],
        array $attributes=[], array $cookies=[], array $files=[], array $server=[], $content=null) {
        
        $this->query = $query;
        $this->request = $request;
        $this->attributes = $attributes;
        $this->cookies = $cookies;
        $this->server = $server;
        $this->files = $files;
        $this->headers = self::setHeaders();

        $this->content = $content;
        $this->pathInfo = self::setPathInfo();
        $this->requestUri = self::setRequestUri();
        $this->method = self::setMethod();
        
    }


    public static function capture() {
        $request = self::createRequestFromFactory($_GET, $_POST, [],
            $_COOKIE, $_FILES, $_SERVER);

        return $request;

    }

    private static function createRequestFromFactory($query, $request, $attributes, $cookies, $files, $server) {
        return new static($query, $request, $attributes, $cookies,$files, $server);
    }

    private function setMethod() {

        $server = $this->server;
        
        if (isset($this->request['_method'])) {
            return strtoupper($this->request['_method']);
        }

        return $server['REQUEST_METHOD'];

    }

    public function method() {

        return $this->method;

    }

    private function setHeaders() {

        $headers['cookie'] = $this->setHeader('HTTP_COOKIE');
        $headers['accept-language'] = $this->setHeader('HTTP_ACCEPT_LANGUAGE');
        $headers['accept-encoding'] = $this->setHeader('HTTP_ACCEPT_ENCODING');
        $headers['sec-fetch-dest'] = $this->setHeader('HTTP_SEC_FETCH_DEST');
        $headers['sec-fetch-user'] = $this->setHeader('HTTP_SEC_FETCH_USER');
        $headers['sec-fetch-mode'] = $this->setHeader('HTTP_SEC_FETCH_MODE');
        $headers['sec-fetch-site'] = $this->setHeader('HTTP_SEC_FETCH_SITE');
        $headers['accept'] = $this->setHeader('HTTP_ACCEPT');
        $headers['user-agent'] = $this->setHeader('HTTP_USER_AGENT');
        $headers['upgrade-insecure-requests'] = $this->setHeader('HTTP_UPGRADE_INSECURE_REQUESTS');
        $headers['sec-ch-ua-platform'] = $this->setHeader('HTTP_SEC_CH_UA_PLATFORM');
        $headers['sec-ch-ua-mobile'] = $this->setHeader('HTTP_SEC_CH_UA_MOBILE');
        $headers['sec-ch-ua'] = $this->setHeader('HTTP_SEC_CH_UA');
        $headers['cache-control'] = $this->setHeader('HTTP_CACHE_CONTROL');
        $headers['connection'] = $this->setHeader('HTTP_CONNECTION');
        $headers['host'] = $this->setHeader('HTTP_HOST');
        $headers['content-hength'] = $this->setHeader('CONTENT_LENGTH');
        $headers['content-type'] = $this->setHeader('CONTENT_TYPE');

        return $headers;
    }

    private function setHeader($key) {
        if (isset($this->server[$key])) {
            return $this->server[$key];
        }
    }

    public function headers() {

        return $this->headers;

    }

    private function setPathInfo() {

        return rtrim(preg_replace('/\?.*/', '', $this->getUri()), '/');

    }

    private function getUri() {

        return $this->server['REQUEST_URI'];

    }

    public function pathInfo() {

        return $this->pathInfo;

    }

    private function setRequestUri() {

        return $this->getUri();

    }

    public function requestUri() {

        return $this->requestUri;
            
    }

    public function all() {

        return $this->query;

    }

    public function get($key) {

        return $this->query[$key];

    }
}
