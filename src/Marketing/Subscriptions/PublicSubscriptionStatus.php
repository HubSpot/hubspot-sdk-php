<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\LegalBasis;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\SourceOfStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus\Status;

/**
 * @phpstan-type PublicSubscriptionStatusShape = array{
 *   id: string,
 *   description: string,
 *   name: string,
 *   sourceOfStatus: SourceOfStatus|value-of<SourceOfStatus>,
 *   status: Status|value-of<Status>,
 *   brandID?: int|null,
 *   legalBasis?: null|LegalBasis|value-of<LegalBasis>,
 *   legalBasisExplanation?: string|null,
 *   preferenceGroupName?: string|null,
 * }
 */
final class PublicSubscriptionStatus implements BaseModel
{
    /** @use SdkModel<PublicSubscriptionStatusShape> */
    use SdkModel;

    /**
     * The ID for the subscription.
     */
    #[Required]
    public string $id;

    /**
     * A description of the subscription.
     */
    #[Required]
    public string $description;

    /**
     * The name of the subscription.
     */
    #[Required]
    public string $name;

    /**
     * Where the status is determined from e.g. PORTAL_WIDE_STATUS if the contact opted out from the portal.
     *
     * @var value-of<SourceOfStatus> $sourceOfStatus
     */
    #[Required(enum: SourceOfStatus::class)]
    public string $sourceOfStatus;

    /**
     * Whether the contact is subscribed.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The ID of the brand that the subscription is associated with, if there is one.
     */
    #[Optional('brandId')]
    public ?int $brandID;

    /**
     * The legal reason for the current status of the subscription.
     *
     * @var value-of<LegalBasis>|null $legalBasis
     */
    #[Optional(enum: LegalBasis::class)]
    public ?string $legalBasis;

    /**
     * A more detailed explanation to go with the legal basis.
     */
    #[Optional]
    public ?string $legalBasisExplanation;

    /**
     * The name of the preferences group that the subscription is associated with.
     */
    #[Optional]
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
        ?int $brandID = null,
        LegalBasis|string|null $legalBasis = null,
        ?string $legalBasisExplanation = null,
        ?string $preferenceGroupName = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['name'] = $name;
        $self['sourceOfStatus'] = $sourceOfStatus;
        $self['status'] = $status;

        null !== $brandID && $self['brandID'] = $brandID;
        null !== $legalBasis && $self['legalBasis'] = $legalBasis;
        null !== $legalBasisExplanation && $self['legalBasisExplanation'] = $legalBasisExplanation;
        null !== $preferenceGroupName && $self['preferenceGroupName'] = $preferenceGroupName;

        return $self;
    }

    /**
     * The ID for the subscription.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A description of the subscription.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The name of the subscription.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Where the status is determined from e.g. PORTAL_WIDE_STATUS if the contact opted out from the portal.
     *
     * @param SourceOfStatus|value-of<SourceOfStatus> $sourceOfStatus
     */
    public function withSourceOfStatus(
        SourceOfStatus|string $sourceOfStatus
    ): self {
        $self = clone $this;
        $self['sourceOfStatus'] = $sourceOfStatus;

        return $self;
    }

    /**
     * Whether the contact is subscribed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The ID of the brand that the subscription is associated with, if there is one.
     */
    public function withBrandID(int $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * The legal reason for the current status of the subscription.
     *
     * @param LegalBasis|value-of<LegalBasis> $legalBasis
     */
    public function withLegalBasis(LegalBasis|string $legalBasis): self
    {
        $self = clone $this;
        $self['legalBasis'] = $legalBasis;

        return $self;
    }

    /**
     * A more detailed explanation to go with the legal basis.
     */
    public function withLegalBasisExplanation(
        string $legalBasisExplanation
    ): self {
        $self = clone $this;
        $self['legalBasisExplanation'] = $legalBasisExplanation;

        return $self;
    }

    /**
     * The name of the preferences group that the subscription is associated with.
     */
    public function withPreferenceGroupName(string $preferenceGroupName): self
    {
        $self = clone $this;
        $self['preferenceGroupName'] = $preferenceGroupName;

        return $self;
    }
}
