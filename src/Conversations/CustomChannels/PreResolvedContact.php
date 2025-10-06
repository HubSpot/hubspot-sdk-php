<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type pre_resolved_contact = array{
 *   contactPropertiesLeadingToMatch: list<string>, contactVid: int
 * }
 */
final class PreResolvedContact implements BaseModel
{
    /** @use SdkModel<pre_resolved_contact> */
    use SdkModel;

    /** @var list<string> $contactPropertiesLeadingToMatch */
    #[Api(list: 'string')]
    public array $contactPropertiesLeadingToMatch;

    #[Api]
    public int $contactVid;

    /**
     * `new PreResolvedContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PreResolvedContact::with(contactPropertiesLeadingToMatch: ..., contactVid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PreResolvedContact)
     *   ->withContactPropertiesLeadingToMatch(...)
     *   ->withContactVid(...)
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
     * @param list<string> $contactPropertiesLeadingToMatch
     */
    public static function with(
        array $contactPropertiesLeadingToMatch,
        int $contactVid
    ): self {
        $obj = new self;

        $obj->contactPropertiesLeadingToMatch = $contactPropertiesLeadingToMatch;
        $obj->contactVid = $contactVid;

        return $obj;
    }

    /**
     * @param list<string> $contactPropertiesLeadingToMatch
     */
    public function withContactPropertiesLeadingToMatch(
        array $contactPropertiesLeadingToMatch
    ): self {
        $obj = clone $this;
        $obj->contactPropertiesLeadingToMatch = $contactPropertiesLeadingToMatch;

        return $obj;
    }

    public function withContactVid(int $contactVid): self
    {
        $obj = clone $this;
        $obj->contactVid = $contactVid;

        return $obj;
    }
}
