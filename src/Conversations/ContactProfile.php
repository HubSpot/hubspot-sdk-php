<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ContactAddress\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactProfileShape = array{
 *   addresses: list<ContactAddress>,
 *   emails: list<ContactEmail>,
 *   phones: list<ContactPhone>,
 *   urls: list<ContactURL>,
 *   name?: ContactName|null,
 *   org?: ContactOrg|null,
 * }
 */
final class ContactProfile implements BaseModel
{
    /** @use SdkModel<ContactProfileShape> */
    use SdkModel;

    /** @var list<ContactAddress> $addresses */
    #[Required(list: ContactAddress::class)]
    public array $addresses;

    /** @var list<ContactEmail> $emails */
    #[Required(list: ContactEmail::class)]
    public array $emails;

    /** @var list<ContactPhone> $phones */
    #[Required(list: ContactPhone::class)]
    public array $phones;

    /** @var list<ContactURL> $urls */
    #[Required(list: ContactURL::class)]
    public array $urls;

    #[Optional]
    public ?ContactName $name;

    #[Optional]
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
     * @param list<ContactAddress|array{
     *   city?: string|null,
     *   country?: string|null,
     *   countryCode?: string|null,
     *   state?: string|null,
     *   street?: string|null,
     *   type?: value-of<Type>|null,
     *   zip?: string|null,
     * }> $addresses
     * @param list<ContactEmail|array{
     *   email: string,
     *   type?: value-of<ContactEmail\Type>|null,
     * }> $emails
     * @param list<ContactPhone|array{
     *   phone: string,
     *   type?: value-of<ContactPhone\Type>|null,
     * }> $phones
     * @param list<ContactURL|array{
     *   url: string, type?: value-of<ContactURL\Type>|null
     * }> $urls
     * @param ContactName|array{
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   middleName?: string|null,
     *   prefix?: string|null,
     *   suffix?: string|null,
     * } $name
     * @param ContactOrg|array{
     *   company?: string|null, department?: string|null, title?: string|null
     * } $org
     */
    public static function with(
        array $addresses,
        array $emails,
        array $phones,
        array $urls,
        ContactName|array|null $name = null,
        ContactOrg|array|null $org = null,
    ): self {
        $obj = new self;

        $obj['addresses'] = $addresses;
        $obj['emails'] = $emails;
        $obj['phones'] = $phones;
        $obj['urls'] = $urls;

        null !== $name && $obj['name'] = $name;
        null !== $org && $obj['org'] = $org;

        return $obj;
    }

    /**
     * @param list<ContactAddress|array{
     *   city?: string|null,
     *   country?: string|null,
     *   countryCode?: string|null,
     *   state?: string|null,
     *   street?: string|null,
     *   type?: value-of<Type>|null,
     *   zip?: string|null,
     * }> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $obj = clone $this;
        $obj['addresses'] = $addresses;

        return $obj;
    }

    /**
     * @param list<ContactEmail|array{
     *   email: string,
     *   type?: value-of<ContactEmail\Type>|null,
     * }> $emails
     */
    public function withEmails(array $emails): self
    {
        $obj = clone $this;
        $obj['emails'] = $emails;

        return $obj;
    }

    /**
     * @param list<ContactPhone|array{
     *   phone: string,
     *   type?: value-of<ContactPhone\Type>|null,
     * }> $phones
     */
    public function withPhones(array $phones): self
    {
        $obj = clone $this;
        $obj['phones'] = $phones;

        return $obj;
    }

    /**
     * @param list<ContactURL|array{
     *   url: string, type?: value-of<ContactURL\Type>|null
     * }> $urls
     */
    public function withURLs(array $urls): self
    {
        $obj = clone $this;
        $obj['urls'] = $urls;

        return $obj;
    }

    /**
     * @param ContactName|array{
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   middleName?: string|null,
     *   prefix?: string|null,
     *   suffix?: string|null,
     * } $name
     */
    public function withName(ContactName|array $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param ContactOrg|array{
     *   company?: string|null, department?: string|null, title?: string|null
     * } $org
     */
    public function withOrg(ContactOrg|array $org): self
    {
        $obj = clone $this;
        $obj['org'] = $org;

        return $obj;
    }
}
