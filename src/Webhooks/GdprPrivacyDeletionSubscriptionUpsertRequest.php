<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\GdprPrivacyDeletionSubscriptionUpsertRequest\Action;
use HubSpotSDK\Webhooks\GdprPrivacyDeletionSubscriptionUpsertRequest\SubscriptionType;

/**
 * @phpstan-type GdprPrivacyDeletionSubscriptionUpsertRequestShape = array{
 *   actions: list<Action|value-of<Action>>,
 *   objectTypeID: string,
 *   portalID: int,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 * }
 */
final class GdprPrivacyDeletionSubscriptionUpsertRequest implements BaseModel
{
    /** @use SdkModel<GdprPrivacyDeletionSubscriptionUpsertRequestShape> */
    use SdkModel;

    /** @var list<value-of<Action>> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('portalId')]
    public int $portalID;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * `new GdprPrivacyDeletionSubscriptionUpsertRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GdprPrivacyDeletionSubscriptionUpsertRequest::with(
     *   actions: ..., objectTypeID: ..., portalID: ..., subscriptionType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GdprPrivacyDeletionSubscriptionUpsertRequest)
     *   ->withActions(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
     *   ->withSubscriptionType(...)
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
     * @param list<Action|value-of<Action>> $actions
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        array $actions,
        string $objectTypeID,
        int $portalID,
        SubscriptionType|string $subscriptionType = 'GDPR_PRIVACY_DELETION',
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }

    /**
     * @param list<Action|value-of<Action>> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public function withSubscriptionType(
        SubscriptionType|string $subscriptionType
    ): self {
        $self = clone $this;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }
}
