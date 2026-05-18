<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\PreResolvedContact\ContactPropertiesLeadingToMatch;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PreResolvedContactShape = array{
 *   contactPropertiesLeadingToMatch: list<ContactPropertiesLeadingToMatch|value-of<ContactPropertiesLeadingToMatch>>,
 *   contactVid: int,
 * }
 */
final class PreResolvedContact implements BaseModel
{
    /** @use SdkModel<PreResolvedContactShape> */
    use SdkModel;

    /**
     * @var list<value-of<ContactPropertiesLeadingToMatch>> $contactPropertiesLeadingToMatch
     */
    #[Required(list: ContactPropertiesLeadingToMatch::class)]
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
     * @param list<ContactPropertiesLeadingToMatch|value-of<ContactPropertiesLeadingToMatch>> $contactPropertiesLeadingToMatch
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
     * @param list<ContactPropertiesLeadingToMatch|value-of<ContactPropertiesLeadingToMatch>> $contactPropertiesLeadingToMatch
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
