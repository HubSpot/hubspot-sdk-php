<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PreResolvedContactShape = array{
 *   contactPropertiesLeadingToMatch: list<string>, contactVid: int
 * }
 */
final class PreResolvedContact implements BaseModel
{
    /** @use SdkModel<PreResolvedContactShape> */
    use SdkModel;

    /** @var list<string> $contactPropertiesLeadingToMatch */
    #[Required(list: 'string')]
    public array $contactPropertiesLeadingToMatch;

    #[Required]
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
        $self = new self;

        $self['contactPropertiesLeadingToMatch'] = $contactPropertiesLeadingToMatch;
        $self['contactVid'] = $contactVid;

        return $self;
    }

    /**
     * @param list<string> $contactPropertiesLeadingToMatch
     */
    public function withContactPropertiesLeadingToMatch(
        array $contactPropertiesLeadingToMatch
    ): self {
        $self = clone $this;
        $self['contactPropertiesLeadingToMatch'] = $contactPropertiesLeadingToMatch;

        return $self;
    }

    public function withContactVid(int $contactVid): self
    {
        $self = clone $this;
        $self['contactVid'] = $contactVid;

        return $self;
    }
}
