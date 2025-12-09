<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Memberships;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Remove the records provided from the list. Records that do not exist or that are not members of the list are ignored.
 *
 * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
 *
 * @see HubspotSDK\Services\Crm\Lists\MembershipsService::remove()
 *
 * @phpstan-type MembershipRemoveParamsShape = array{body: list<string>}
 */
final class MembershipRemoveParams implements BaseModel
{
    /** @use SdkModel<MembershipRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new MembershipRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipRemoveParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipRemoveParams)->withBody(...)
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
        $obj = new self;

        $obj['body'] = $body;

        return $obj;
    }

    /**
     * @param list<string> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }
}
