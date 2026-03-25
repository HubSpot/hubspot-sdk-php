<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\CardsDev\CardAuditResponse\ActionType;
use HubspotSDK\Crm\Extensions\CardsDev\CardAuditResponse\AuthSource;

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

    /**
     * The type of action performed, with possible values: CREATE, DELETE, UPDATE.
     *
     * @var value-of<ActionType> $actionType
     */
    #[Required(enum: ActionType::class)]
    public string $actionType;

    /**
     * The ID of the application associated with the card.
     */
    #[Required('applicationId')]
    public int $applicationID;

    /**
     * The source of authentication for the action, with possible values: APP, EXTERNAL, INTERNAL.
     *
     * @var value-of<AuthSource> $authSource
     */
    #[Required(enum: AuthSource::class)]
    public string $authSource;

    /**
     * The timestamp indicating when the change occurred.
     */
    #[Required]
    public int $changedAt;

    /**
     * The ID of the user who initiated the action.
     */
    #[Required('initiatingUserId')]
    public int $initiatingUserID;

    /**
     * The ID of the card.
     */
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
     * The type of action performed, with possible values: CREATE, DELETE, UPDATE.
     *
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * The ID of the application associated with the card.
     */
    public function withApplicationID(int $applicationID): self
    {
        $self = clone $this;
        $self['applicationID'] = $applicationID;

        return $self;
    }

    /**
     * The source of authentication for the action, with possible values: APP, EXTERNAL, INTERNAL.
     *
     * @param AuthSource|value-of<AuthSource> $authSource
     */
    public function withAuthSource(AuthSource|string $authSource): self
    {
        $self = clone $this;
        $self['authSource'] = $authSource;

        return $self;
    }

    /**
     * The timestamp indicating when the change occurred.
     */
    public function withChangedAt(int $changedAt): self
    {
        $self = clone $this;
        $self['changedAt'] = $changedAt;

        return $self;
    }

    /**
     * The ID of the user who initiated the action.
     */
    public function withInitiatingUserID(int $initiatingUserID): self
    {
        $self = clone $this;
        $self['initiatingUserID'] = $initiatingUserID;

        return $self;
    }

    /**
     * The ID of the card.
     */
    public function withObjectTypeID(int $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
