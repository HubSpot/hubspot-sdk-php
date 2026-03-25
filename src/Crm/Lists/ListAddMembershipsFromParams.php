<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::addMembershipsFrom()
 *
 * @phpstan-type ListAddMembershipsFromParamsShape = array{listID: string}
 */
final class ListAddMembershipsFromParams implements BaseModel
{
    /** @use SdkModel<ListAddMembershipsFromParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $listID;

    /**
     * `new ListAddMembershipsFromParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAddMembershipsFromParams::with(listID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAddMembershipsFromParams)->withListID(...)
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
    public static function with(string $listID): self
    {
        $self = new self;

        $self['listID'] = $listID;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }
}
