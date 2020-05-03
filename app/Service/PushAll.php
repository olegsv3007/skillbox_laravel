<?php


namespace App\Service;


class PushAll
{
    private $id;
    private $apiKey;

    protected $url = "https://pushall.ru/api.php";

    public function __construct($apiKey, $id)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    public function send($title, $text)
    {
        $data = [
            "type" => "self",
            "id" => $this->id,
            "key" => $this->apiKey,
            "text" => $title,
            "title" => $text,
        ];

        \curl_setopt_array($ch = curl_init(), [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
