<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Memberships;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 *
 * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
 *
 * @see HubspotSDK\Services\Crm\Lists\MembershipsService::add()
 *
 * @phpstan-type MembershipAddParamsShape = array{body: list<string>}
 */
final class MembershipAddParams implements BaseModel
{
    /** @use SdkModel<MembershipAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new MembershipAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipAddParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipAddParams)->withBody(...)
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
