<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add the records provided to the list. Records that do not exist or that are already members of the list are ignored.
 *
 * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
 *
 * @see HubspotSDK\CRM\Lists\Memberships->add
 *
 * @phpstan-type membership_add_params = array{body: list<string>}
 */
final class MembershipAddParams implements BaseModel
{
    /** @use SdkModel<membership_add_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Api(list: 'string')]
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
        $obj = new self;

        $obj->body = $body;

        return $obj;
    }

    /**
     * @param list<string> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
