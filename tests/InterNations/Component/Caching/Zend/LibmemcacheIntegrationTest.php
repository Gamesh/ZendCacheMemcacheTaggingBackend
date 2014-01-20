<?php
namespace InterNations\Component\Caching\Tests\Zend;

use Memcached;
use InterNations\Component\Caching\Zend\LibmemcachedTaggingBackend;

class LibmemcacheIntegrationTest extends AbstractIntegrationTest
{
    public function setUp()
    {
        if (!class_exists('Memcached')) {
            $this->markTestSkipped('pecl/memcached not installed');
        }

        $this->memcache = new Memcached();
        $this->memcache->addServer(
            ZEND_CACHE_TAGGING_BACKEND_MEMCACHED1_HOST,
            ZEND_CACHE_TAGGING_BACKEND_MEMCACHED1_PORT
        );
        $this->memcache->addServer(
            ZEND_CACHE_TAGGING_BACKEND_MEMCACHED2_HOST,
            ZEND_CACHE_TAGGING_BACKEND_MEMCACHED2_PORT
        );
        $this->backend = new LibmemcachedTaggingBackend($this->memcache);
    }
}