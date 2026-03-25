<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::addMemberships()
 *
 * @phpstan-type ListAddMembershipsParamsShape = array{body: list<string>}
 */
final class ListAddMembershipsParams implements BaseModel
{
    /** @use SdkModel<ListAddMembershipsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new ListAddMembershipsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListAddMembershipsParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListAddMembershipsParams)->withBody(...)
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
