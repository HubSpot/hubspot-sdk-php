<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PreResolvedContactsShape = array{
 *   contacts: list<PreResolvedContact>
 * }
 */
final class PreResolvedContacts implements BaseModel
{
    /** @use SdkModel<PreResolvedContactsShape> */
    use SdkModel;

    /** @var list<PreResolvedContact> $contacts */
    #[Api(list: PreResolvedContact::class)]
    public array $contacts;

    /**
     * `new PreResolvedContacts()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreResolvedContacts::with(contacts: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreResolvedContacts)->withContacts(...)
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
     * @param list<PreResolvedContact> $contacts
     */
    public static function with(array $contacts): self
    {
        $obj = new self;

        $obj->contacts = $contacts;

        return $obj;
    }

    /**
     * @param list<PreResolvedContact> $contacts
     */
    public function withContacts(array $contacts): self
    {
        $obj = clone $this;
        $obj->contacts = $contacts;

        return $obj;
    }
}
