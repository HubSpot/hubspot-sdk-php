<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\CardAuditResponse\ActionType;
use HubspotSDK\CRM\Extensions\Cards\CardAuditResponse\AuthSource;

/**
 * @phpstan-type card_audit_response = array{
 *   actionType: value-of<ActionType>,
 *   applicationID: int,
 *   authSource: value-of<AuthSource>,
 *   changedAt: int,
 *   initiatingUserID: int,
 *   objectTypeID: int,
 * }
 */
final class CardAuditResponse implements BaseModel
{
    /** @use SdkModel<card_audit_response> */
    use SdkModel;

    /** @var value-of<ActionType> $actionType */
    #[Api(enum: ActionType::class)]
    public string $actionType;

    #[Api('applicationId')]
    public int $applicationID;

    /** @var value-of<AuthSource> $authSource */
    #[Api(enum: AuthSource::class)]
    public string $authSource;

    #[Api]
    public int $changedAt;

    #[Api('initiatingUserId')]
    public int $initiatingUserID;

    #[Api('objectTypeId')]
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
        $obj = new self;

        $obj['actionType'] = $actionType;
        $obj->applicationID = $applicationID;
        $obj['authSource'] = $authSource;
        $obj->changedAt = $changedAt;
        $obj->initiatingUserID = $initiatingUserID;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $obj = clone $this;
        $obj['actionType'] = $actionType;

        return $obj;
    }

    public function withApplicationID(int $applicationID): self
    {
        $obj = clone $this;
        $obj->applicationID = $applicationID;

        return $obj;
    }

    /**
     * @param AuthSource|value-of<AuthSource> $authSource
     */
    public function withAuthSource(AuthSource|string $authSource): self
    {
        $obj = clone $this;
        $obj['authSource'] = $authSource;

        return $obj;
    }

    public function withChangedAt(int $changedAt): self
    {
        $obj = clone $this;
        $obj->changedAt = $changedAt;

        return $obj;
    }

    public function withInitiatingUserID(int $initiatingUserID): self
    {
        $obj = clone $this;
        $obj->initiatingUserID = $initiatingUserID;

        return $obj;
    }

    public function withObjectTypeID(int $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }
}
