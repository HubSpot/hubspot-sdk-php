<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContactAddressShape from \HubspotSDK\Conversations\ContactAddress
 * @phpstan-import-type ContactEmailShape from \HubspotSDK\Conversations\ContactEmail
 * @phpstan-import-type ContactPhoneShape from \HubspotSDK\Conversations\ContactPhone
 * @phpstan-import-type ContactURLShape from \HubspotSDK\Conversations\ContactURL
 * @phpstan-import-type ContactNameShape from \HubspotSDK\Conversations\ContactName
 * @phpstan-import-type ContactOrgShape from \HubspotSDK\Conversations\ContactOrg
 *
 * @phpstan-type ContactProfileShape = array{
 *   addresses: list<ContactAddressShape>,
 *   emails: list<ContactEmailShape>,
 *   phones: list<ContactPhoneShape>,
 *   urls: list<ContactURLShape>,
 *   name?: null|ContactName|ContactNameShape,
 *   org?: null|ContactOrg|ContactOrgShape,
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
     * @param list<ContactAddressShape> $addresses
     * @param list<ContactEmailShape> $emails
     * @param list<ContactPhoneShape> $phones
     * @param list<ContactURLShape> $urls
     * @param ContactNameShape $name
     * @param ContactOrgShape $org
     */
    public static function with(
        array $addresses,
        array $emails,
        array $phones,
        array $urls,
        ContactName|array|null $name = null,
        ContactOrg|array|null $org = null,
    ): self {
        $self = new self;

        $self['addresses'] = $addresses;
        $self['emails'] = $emails;
        $self['phones'] = $phones;
        $self['urls'] = $urls;

        null !== $name && $self['name'] = $name;
        null !== $org && $self['org'] = $org;

        return $self;
    }

    /**
     * @param list<ContactAddressShape> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $self = clone $this;
        $self['addresses'] = $addresses;

        return $self;
    }

    /**
     * @param list<ContactEmailShape> $emails
     */
    public function withEmails(array $emails): self
    {
        $self = clone $this;
        $self['emails'] = $emails;

        return $self;
    }

    /**
     * @param list<ContactPhoneShape> $phones
     */
    public function withPhones(array $phones): self
    {
        $self = clone $this;
        $self['phones'] = $phones;

        return $self;
    }

    /**
     * @param list<ContactURLShape> $urls
     */
    public function withURLs(array $urls): self
    {
        $self = clone $this;
        $self['urls'] = $urls;

        return $self;
    }

    /**
     * @param ContactNameShape $name
     */
    public function withName(ContactName|array $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param ContactOrgShape $org
     */
    public function withOrg(ContactOrg|array $org): self
    {
        $self = clone $this;
        $self['org'] = $org;

        return $self;
    }
}
