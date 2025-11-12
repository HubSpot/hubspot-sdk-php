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
 * @phpstan-type PublicSubscriptionStatusShape = array{
 *   id: string,
 *   description: string,
 *   name: string,
 *   sourceOfStatus: value-of<SourceOfStatus>,
 *   status: value-of<Status>,
 *   brandId?: int|null,
 *   legalBasis?: value-of<LegalBasis>|null,
 *   legalBasisExplanation?: string|null,
 *   preferenceGroupName?: string|null,
 * }
 */
final class PublicSubscriptionStatus implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicSubscriptionStatusShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The ID for the subscription.
     */
    #[Api]
    public string $id;

    /**
     * A description of the subscription.
     */
    #[Api]
    public string $description;

    /**
     * The name of the subscription.
     */
    #[Api]
    public string $name;

    /**
     * Where the status is determined from e.g. PORTAL_WIDE_STATUS if the contact opted out from the portal.
     *
     * @var value-of<SourceOfStatus> $sourceOfStatus
     */
    #[Api(enum: SourceOfStatus::class)]
    public string $sourceOfStatus;

    /**
     * Whether the contact is subscribed.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The ID of the brand that the subscription is associated with, if there is one.
     */
    #[Api(optional: true)]
    public ?int $brandId;

    /**
     * The legal reason for the current status of the subscription.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Api(enum: LegalBasis::class, optional: true)]
    public ?string $legalBasis;

    /**
     * A more detailed explanation to go with the legal basis.
     */
    #[Api(optional: true)]
    public ?string $legalBasisExplanation;

    /**
     * The name of the preferences group that the subscription is associated with.
     */
    #[Api(optional: true)]
    public ?string $preferenceGroupName;

    /**
     * `new PublicSubscriptionStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSubscriptionStatus::with(
     *   id: ..., description: ..., name: ..., sourceOfStatus: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSubscriptionStatus)
     *   ->withID(...)
     *   ->withDescription(...)
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
        string $description,
        string $name,
        SourceOfStatus|string $sourceOfStatus,
        Status|string $status,
        ?int $brandId = null,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?string $preferenceGroupName = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->description = $description;
        $obj->name = $name;
        $obj['sourceOfStatus'] = $sourceOfStatus;
        $obj['status'] = $status;

        null !== $brandId && $obj->brandId = $brandId;
        null !== $legalBasis && $obj['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $obj->legalBasisExplanation = $legalBasisExplanation;
        null !== $preferenceGroupName && $obj->preferenceGroupName = $preferenceGroupName;

        return $obj;
    }

    /**
     * The ID for the subscription.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A description of the subscription.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The name of the subscription.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Where the status is determined from e.g. PORTAL_WIDE_STATUS if the contact opted out from the portal.
     *
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
     * Whether the contact is subscribed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The ID of the brand that the subscription is associated with, if there is one.
     */
    public function withBrandID(int $brandID): self
    {
        $obj = clone $this;
        $obj->brandId = $brandID;

        return $obj;
    }

    /**
     * The legal reason for the current status of the subscription.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $obj = clone $this;
        $obj['legalBasis'] = $legalBasis;

        return $obj;
    }

    /**
     * A more detailed explanation to go with the legal basis.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $obj = clone $this;
        $obj->legalBasisExplanation = $legalBasisExplanation;

        return $obj;
    }

    /**
     * The name of the preferences group that the subscription is associated with.
     */
    public function withPreferenceGroupName(string $preferenceGroupName): self
    {
        $obj = clone $this;
        $obj->preferenceGroupName = $preferenceGroupName;

        return $obj;
    }
}
