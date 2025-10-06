<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\SourceOfStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\Status;

/**
 * @phpstan-type public_subscription_status = array{
 *   id: string,
 *   name: string,
 *   sourceOfStatus: value-of<SourceOfStatus>,
 *   status: value-of<Status>,
 *   brandID?: int,
 *   legalBasis?: value-of<LegalBasis>,
 *   legalBasisExplanation?: string,
 *   preferenceGroupName?: string,
 * }
 */
final class PublicSubscriptionStatus implements BaseModel, ResponseConverter
{
    /** @use SdkModel<public_subscription_status> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public string $name;

    /** @var value-of<SourceOfStatus> $sourceOfStatus */
    #[Api(enum: SourceOfStatus::class)]
    public string $sourceOfStatus;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api('brandId', optional: true)]
    public ?int $brandID;

    /** @var value-of<LegalBasis>|null $legalBasis */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    #[Api(optional: true)]
    public ?string $preferenceGroupName;

    /**
     * `new PublicSubscriptionStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSubscriptionStatus::with(
     *   id: ..., name: ..., sourceOfStatus: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSubscriptionStatus)
     *   ->withID(...)
     *   ->withName(...)
     *   ->withSourceOfStatus(...)
     *   ->withStatus(...)
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
     * @param SourceOfStatus|value-of<SourceOfStatus> $sourceOfStatus
     * @param Status|value-of<Status> $status
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public static function with(
        string $id,
        string $name,
        SourceOfStatus|string $sourceOfStatus,
        Status|string $status,
        ?int $brandID = null,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?string $preferenceGroupName = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;
        $obj['sourceOfStatus'] = $sourceOfStatus;
        $obj['status'] = $status;

        null !== $brandID && $obj->brandID = $brandID;
        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;
        null !== $preferenceGroupName && $obj->preferenceGroupName = $preferenceGroupName;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param SourceOfStatus|value-of<SourceOfStatus> $sourceOfStatus
     */
    public function withSourceOfStatus(
        SourceOfStatus|string $sourceOfStatus
    ): self {
        $obj = clone $this;
        $obj['sourceOfStatus'] = $sourceOfStatus;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withBrandID(int $brandID): self
    {
        $obj = clone $this;
        $obj->brandID = $brandID;

        return $obj;
    }

    /**
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    public function withPreferenceGroupName(string $preferenceGroupName): self
    {
        $obj = clone $this;
        $obj->preferenceGroupName = $preferenceGroupName;

        return $obj;
    }
}
