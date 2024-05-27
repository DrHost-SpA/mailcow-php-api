<?php

namespace Drhostcl\Mailcow\Domainaliases;

use Drhostcl\Mailcow\MailCowAPI;

class Domainaliases
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
    public function getAliases()
    {
        return $this->MailCowAPI->get('get/alias-domain/all');
    }

    /**
     * @return array|string
     */
    public function getAlias(string $aliasID)
    {
        return $this->MailCowAPI->get('get/alias-domain/' . $aliasID);
    }

    /**
     * @return array|string
     */
    public function createAlias(string $alias_dest, string $alias_address)
    {
        return $this->MailCowAPI->post('add/alias-domain', [
            "alias_domain"=>$alias_address,
            "target_domain"=>$alias_dest,
            "active" => "1",
            "rl_value" => "10",
            "rl_frame" => "s",
            "key_size"=>2048
        ]);
    }

    /**
     * @return array|string
     */
    public function updateAlias(string $alias_id, string $alias_address, string $alias_dest, string $private_comment = null, string $public_comment = null)
    {
        return $this->MailCowAPI->post('edit/alias-domain', [
            "items" => [
                $alias_id
            ],
            "attr" => [
                "address" => $alias_address,
                "goto" => $alias_dest,
                "active" => "1",
                "private_comment" => $private_comment,
                "public_comment" => $public_comment,
            ]]);
    }

    /**
     * @return array|string
     */
    public function deleteAlias(string $AliasID)
    {
        return $this->MailCowAPI->post('delete/alias-domain', [$AliasID]);
    }
}