<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Contacts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Move an Object identified by `{taskId}` to the recycling bin.
 *
 * @see HubspotSDK\Services\Crm\Objects\ContactsService::delete()
 *
 * @phpstan-type ContactDeleteParamsShape = array{objectType: string}
 */
final class ContactDeleteParams implements BaseModel
{
    /** @use SdkModel<ContactDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new ContactDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactDeleteParams)->withObjectType(...)
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
     */
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
