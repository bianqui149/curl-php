<?php

/**
 * Request
 * @package    CURL
 * @subpackage REQUEST
 * @author     julian bianqui <bianquijulian@gmail.com>
 */
class ClassRequest
{
    public $url;
    public function __construct(string $url)
    {
        $this->url = $url;
    }
    public function get()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        return $result;
    }
}
