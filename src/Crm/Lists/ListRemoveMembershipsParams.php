<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::removeMemberships()
 *
 * @phpstan-type ListRemoveMembershipsParamsShape = array{body: list<string>}
 */
final class ListRemoveMembershipsParams implements BaseModel
{
    /** @use SdkModel<ListRemoveMembershipsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new ListRemoveMembershipsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListRemoveMembershipsParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListRemoveMembershipsParams)->withBody(...)
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
     * @param list<string> $body
     */
    public static function with(array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param list<string> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
