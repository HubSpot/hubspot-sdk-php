<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
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
final class PublicCardResponse implements BaseModel
{
    /** @use SdkModel<PublicCardResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Required]
    public CardActions $actions;

    /** @var list<CardAuditResponse> $auditHistory */
    #[Required(list: CardAuditResponse::class)]
    public array $auditHistory;

    /**
     * Configuration for displayed info on a card.
     */
    #[Required]
    public CardDisplayBody $display;

    #[Required]
    public PublicCardFetchBody $fetch;

    #[Required]
    public string $title;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
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
