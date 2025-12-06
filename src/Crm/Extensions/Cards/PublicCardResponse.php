<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\ActionType;
use HubspotSDK\Crm\Extensions\Cards\CardAuditResponse\AuthSource;

/**
 * @phpstan-type PublicCardResponseShape = array{
 *   id: string,
 *   actions: CardActions,
 *   auditHistory: list<CardAuditResponse>,
 *   display: CardDisplayBody,
 *   fetch: PublicCardFetchBody,
 *   title: string,
 *   createdAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicCardResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicCardResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Api]
    public CardActions $actions;

    /** @var list<CardAuditResponse> $auditHistory */
    #[Api(list: CardAuditResponse::class)]
    public array $auditHistory;

    /**
     * Configuration for displayed info on a card.
     */
    #[Api]
    public CardDisplayBody $display;

    #[Api]
    public PublicCardFetchBody $fetch;

    #[Api]
    public string $title;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PublicCardResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCardResponse::with(
     *   id: ..., actions: ..., auditHistory: ..., display: ..., fetch: ..., title: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCardResponse)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withAuditHistory(...)
     *   ->withDisplay(...)
     *   ->withFetch(...)
     *   ->withTitle(...)
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
     * @param CardActions|array{baseUrls: list<string>} $actions
     * @param list<CardAuditResponse|array{
     *   actionType: value-of<ActionType>,
     *   applicationId: int,
     *   authSource: value-of<AuthSource>,
     *   changedAt: int,
     *   initiatingUserId: int,
     *   objectTypeId: int,
     * }> $auditHistory
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     * @param PublicCardFetchBody|array{
     *   objectTypes: list<CardObjectTypeBody>, targetUrl: string
     * } $fetch
     */
    public static function with(
        string $id,
        CardActions|array $actions,
        array $auditHistory,
        CardDisplayBody|array $display,
        PublicCardFetchBody|array $fetch,
        string $title,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['actions'] = $actions;
        $obj['auditHistory'] = $auditHistory;
        $obj['display'] = $display;
        $obj['fetch'] = $fetch;
        $obj['title'] = $title;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Configuration for custom user actions on cards.
     *
     * @param CardActions|array{baseUrls: list<string>} $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $obj = clone $this;
        $obj['actions'] = $actions;

        return $obj;
    }

    /**
     * @param list<CardAuditResponse|array{
     *   actionType: value-of<ActionType>,
     *   applicationId: int,
     *   authSource: value-of<AuthSource>,
     *   changedAt: int,
     *   initiatingUserId: int,
     *   objectTypeId: int,
     * }> $auditHistory
     */
    public function withAuditHistory(array $auditHistory): self
    {
        $obj = clone $this;
        $obj['auditHistory'] = $auditHistory;

        return $obj;
    }

    /**
     * Configuration for displayed info on a card.
     *
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $obj = clone $this;
        $obj['display'] = $display;

        return $obj;
    }

    /**
     * @param PublicCardFetchBody|array{
     *   objectTypes: list<CardObjectTypeBody>, targetUrl: string
     * } $fetch
     */
    public function withFetch(PublicCardFetchBody|array $fetch): self
    {
        $obj = clone $this;
        $obj['fetch'] = $fetch;

        return $obj;
    }

    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
