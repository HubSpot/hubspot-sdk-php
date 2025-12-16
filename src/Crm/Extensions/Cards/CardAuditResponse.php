<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\ActionType;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\AuthSource;

/**
 * @phpstan-type CardAuditResponseShape = array{
 *   actionType: ActionType|value-of<ActionType>,
 *   applicationID: int,
 *   authSource: AuthSource|value-of<AuthSource>,
 *   changedAt: int,
 *   initiatingUserID: int,
 *   objectTypeID: int,
 * }
 */
final class CardAuditResponse implements BaseModel
{
    /** @use SdkModel<CardAuditResponseShape> */
    use SdkModel;

    /** @var value-of<ActionType> $actionType */
    #[Required(enum: ActionType::class)]
    public string $actionType;

    #[Required('applicationId')]
    public int $applicationID;

    /** @var value-of<AuthSource> $authSource */
    #[Required(enum: AuthSource::class)]
    public string $authSource;

    #[Required]
    public int $changedAt;

    #[Required('initiatingUserId')]
    public int $initiatingUserID;

    #[Required('objectTypeId')]
    public int $objectTypeID;

    /**
     * `new CardAuditResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardAuditResponse::with(
     *   actionType: ...,
     *   applicationID: ...,
     *   authSource: ...,
     *   changedAt: ...,
     *   initiatingUserID: ...,
     *   objectTypeID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardAuditResponse)
     *   ->withActionType(...)
     *   ->withApplicationID(...)
     *   ->withAuthSource(...)
     *   ->withChangedAt(...)
     *   ->withInitiatingUserID(...)
     *   ->withObjectTypeID(...)
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
     * @param ActionType|value-of<ActionType> $actionType
     * @param AuthSource|value-of<AuthSource> $authSource
     */
    public static function with(
        ActionType|string $actionType,
        int $applicationID,
        AuthSource|string $authSource,
        int $changedAt,
        int $initiatingUserID,
        int $objectTypeID,
    ): self {
        $self = new self;

        $self['actionType'] = $actionType;
        $self['applicationID'] = $applicationID;
        $self['authSource'] = $authSource;
        $self['changedAt'] = $changedAt;
        $self['initiatingUserID'] = $initiatingUserID;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    public function withApplicationID(int $applicationID): self
    {
        $self = clone $this;
        $self['applicationID'] = $applicationID;

        return $self;
    }

    /**
     * @param AuthSource|value-of<AuthSource> $authSource
     */
    public function withAuthSource(AuthSource|string $authSource): self
    {
        $self = clone $this;
        $self['authSource'] = $authSource;

        return $self;
    }

    public function withChangedAt(int $changedAt): self
    {
        $self = clone $this;
        $self['changedAt'] = $changedAt;

        return $self;
    }

    public function withInitiatingUserID(int $initiatingUserID): self
    {
        $self = clone $this;
        $self['initiatingUserID'] = $initiatingUserID;

        return $self;
    }

    public function withObjectTypeID(int $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
