<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(enum: LawfulBasis::class)]
    public string $lawfulBasis;

    #[Api]
    public string $privacyText;

    /** @var list<int> $subscriptionTypeIDs */
    #[Api('subscriptionTypeIds', list: 'int')]
    public array $subscriptionTypeIDs;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
        $obj = new self;

        $obj['lawfulBasis'] = $lawfulBasis;
        $obj->privacyText = $privacyText;
        $obj->subscriptionTypeIDs = $subscriptionTypeIDs;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param LawfulBasis|value-of<LawfulBasis> $lawfulBasis
     */
    public function withLawfulBasis(LawfulBasis|string $lawfulBasis): self
    {
        $obj = clone $this;
        $obj['lawfulBasis'] = $lawfulBasis;

        return $obj;
    }

    public function withPrivacyText(string $privacyText): self
    {
        $obj = clone $this;
        $obj->privacyText = $privacyText;

        return $obj;
    }

    /**
     * @param list<int> $subscriptionTypeIDs
     */
    public function withSubscriptionTypeIDs(array $subscriptionTypeIDs): self
    {
        $obj = clone $this;
        $obj->subscriptionTypeIDs = $subscriptionTypeIDs;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
