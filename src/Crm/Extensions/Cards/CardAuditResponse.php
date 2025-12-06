<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\ActionType;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\AuthSource;

/**
 * @phpstan-type CardAuditResponseShape = array{
 *   actionType: value-of<ActionType>,
 *   applicationId: int,
 *   authSource: value-of<AuthSource>,
 *   changedAt: int,
 *   initiatingUserId: int,
 *   objectTypeId: int,
 * }
 */
final class CardAuditResponse implements BaseModel
{
    /** @use SdkModel<CardAuditResponseShape> */
    use SdkModel;

    /** @var value-of<ActionType> $actionType */
    #[Api(enum: ActionType::class)]
    public string $actionType;

    #[Api]
    public int $applicationId;

    /** @var value-of<AuthSource> $authSource */
    #[Api(enum: AuthSource::class)]
    public string $authSource;

    #[Api]
    public int $changedAt;

    #[Api]
    public int $initiatingUserId;

    #[Api]
    public int $objectTypeId;

    /**
     * `new CardAuditResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardAuditResponse::with(
     *   actionType: ...,
     *   applicationId: ...,
     *   authSource: ...,
     *   changedAt: ...,
     *   initiatingUserId: ...,
     *   objectTypeId: ...,
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
        int $applicationId,
        AuthSource|string $authSource,
        int $changedAt,
        int $initiatingUserId,
        int $objectTypeId,
    ): self {
        $obj = new self;

        $obj['actionType'] = $actionType;
        $obj['applicationId'] = $applicationId;
        $obj['authSource'] = $authSource;
        $obj['changedAt'] = $changedAt;
        $obj['initiatingUserId'] = $initiatingUserId;
        $obj['objectTypeId'] = $objectTypeId;

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
        $obj['applicationId'] = $applicationID;

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
        $obj['changedAt'] = $changedAt;

        return $obj;
    }

    public function withInitiatingUserID(int $initiatingUserID): self
    {
        $obj = clone $this;
        $obj['initiatingUserId'] = $initiatingUserID;

        return $obj;
    }

    public function withObjectTypeID(int $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }
}
