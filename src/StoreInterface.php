<?php
namespace Saft\StoreInterface;

interface StoreInterface {
    public function delete($a);
    public function get($a);
    public function add($a);
    public function has($a);
    public function query($a);
}
