<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\LawfulBasis;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest\Type;

/**
 * @phpstan-type LegalConsentOptionsLegitimateInterestShape = array{
 *   lawfulBasis: value-of<LawfulBasis>,
 *   privacyText: string,
 *   subscriptionTypeIDs: list<int>,
 *   type: value-of<Type>,
 * }
 */
final class LegalConsentOptionsLegitimateInterest implements BaseModel
{
    /** @use SdkModel<LegalConsentOptionsLegitimateInterestShape> */
    use SdkModel;

    /** @var value-of<LawfulBasis> $lawfulBasis */
    #[Required(enum: LawfulBasis::class)]
    public string $lawfulBasis;

    #[Required]
    public string $privacyText;

    /** @var list<int> $subscriptionTypeIDs */
    #[Required('subscriptionTypeIds', list: 'int')]
    public array $subscriptionTypeIDs;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new LegalConsentOptionsLegitimateInterest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LegalConsentOptionsLegitimateInterest::with(
     *   lawfulBasis: ..., privacyText: ..., subscriptionTypeIDs: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LegalConsentOptionsLegitimateInterest)
     *   ->withLawfulBasis(...)
     *   ->withPrivacyText(...)
     *   ->withSubscriptionTypeIDs(...)
     *   ->withType(...)
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
     * @param LawfulBasis|value-of<LawfulBasis> $lawfulBasis
     * @param list<int> $subscriptionTypeIDs
     * @param Type|value-of<Type> $type
     */
    public static function with(
        LawfulBasis|string $lawfulBasis,
        string $privacyText,
        array $subscriptionTypeIDs,
        Type|string $type = 'legitimate_interest',
    ): self {
        $self = new self;

        $self['lawfulBasis'] = $lawfulBasis;
        $self['privacyText'] = $privacyText;
        $self['subscriptionTypeIDs'] = $subscriptionTypeIDs;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param LawfulBasis|value-of<LawfulBasis> $lawfulBasis
     */
    public function withLawfulBasis(LawfulBasis|string $lawfulBasis): self
    {
        $self = clone $this;
        $self['lawfulBasis'] = $lawfulBasis;

        return $self;
    }

    public function withPrivacyText(string $privacyText): self
    {
        $self = clone $this;
        $self['privacyText'] = $privacyText;

        return $self;
    }

    /**
     * @param list<int> $subscriptionTypeIDs
     */
    public function withSubscriptionTypeIDs(array $subscriptionTypeIDs): self
    {
        $self = clone $this;
        $self['subscriptionTypeIDs'] = $subscriptionTypeIDs;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
