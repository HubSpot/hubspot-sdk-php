<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type contact_profile = array{
 *   addresses: list<ContactAddress>,
 *   emails: list<ContactEmail>,
 *   phones: list<ContactPhone>,
 *   urls: list<ContactURL>,
 *   name?: ContactName,
 *   org?: ContactOrg,
 * }
 */
final class ContactProfile implements BaseModel
{
    /** @use SdkModel<contact_profile> */
    use SdkModel;

    /** @var list<ContactAddress> $addresses */
    #[Api(list: ContactAddress::class)]
    public array $addresses;

    /** @var list<ContactEmail> $emails */
    #[Api(list: ContactEmail::class)]
    public array $emails;

    /** @var list<ContactPhone> $phones */
    #[Api(list: ContactPhone::class)]
    public array $phones;

    /** @var list<ContactURL> $urls */
    #[Api(list: ContactURL::class)]
    public array $urls;

    #[Api(optional: true)]
    public ?ContactName $name;

    #[Api(optional: true)]
    public ?ContactOrg $org;

    /**
     * `new ContactProfile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactProfile::with(addresses: ..., emails: ..., phones: ..., urls: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactProfile)
     *   ->withAddresses(...)
     *   ->withEmails(...)
     *   ->withPhones(...)
     *   ->withURLs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ContactAddress> $addresses
     * @param list<ContactEmail> $emails
     * @param list<ContactPhone> $phones
     * @param list<ContactURL> $urls
     */
    public static function with(
        array $addresses,
        array $emails,
        array $phones,
        array $urls,
        ?ContactName $name = null,
        ?ContactOrg $org = null,
    ): self {
        $obj = new self;

        $obj->addresses = $addresses;
        $obj->emails = $emails;
        $obj->phones = $phones;
        $obj->urls = $urls;

        null !== $name && $obj->name = $name;
        null !== $org && $obj->org = $org;

        return $obj;
    }

    /**
     * @param list<ContactAddress> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $obj = clone $this;
        $obj->addresses = $addresses;

        return $obj;
    }

    /**
     * @param list<ContactEmail> $emails
     */
    public function withEmails(array $emails): self
    {
        $obj = clone $this;
        $obj->emails = $emails;

        return $obj;
    }

    /**
     * @param list<ContactPhone> $phones
     */
    public function withPhones(array $phones): self
    {
        $obj = clone $this;
        $obj->phones = $phones;

        return $obj;
    }

    /**
     * @param list<ContactURL> $urls
     */
    public function withURLs(array $urls): self
    {
        $obj = clone $this;
        $obj->urls = $urls;

        return $obj;
    }

    public function withName(ContactName $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withOrg(ContactOrg $org): self
    {
        $obj = clone $this;
        $obj->org = $org;

        return $obj;
    }
}
