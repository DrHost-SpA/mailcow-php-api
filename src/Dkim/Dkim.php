<?php

namespace Drhostcl\Mailcow\Dkim;

use Drhostcl\Mailcow\MailCowAPI;

class Dkim
{

    /**
     * @var MailCowAPI
     */
    private $MailCowAPI;

    public function __construct(MailCowAPI $MailCowAPI)
    {
        $this->MailCowAPI = $MailCowAPI;
    }

    /**
     * @return array|string
     */
    public function getDkim(string $domain)
    {
        return $this->MailCowAPI->get('get/dkim/' . $domain);
    }

    /**
     * @return array|string
     */
    public function addDkim(string $domain)
    {
        return $this->MailCowAPI->post('add/dkim', [
            "dkim_selector" => "dkim",
            "domains" => $domain,
            "key_size" => "2048",
        ]);
    }

    /**
     * @return array|string
     */
    public function deleteDomains(string $domain)
    {
        return $this->MailCowAPI->post('delete/dkim', [$domain]);
    }
}
