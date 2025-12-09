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
     * @param CardActions|array{baseURLs: list<string>} $actions
     * @param list<CardAuditResponse|array{
     *   actionType: value-of<ActionType>,
     *   applicationID: int,
     *   authSource: value-of<AuthSource>,
     *   changedAt: int,
     *   initiatingUserID: int,
     *   objectTypeID: int,
     * }> $auditHistory
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     * @param PublicCardFetchBody|array{
     *   objectTypes: list<CardObjectTypeBody>, targetURL: string
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
        $self = new self;

        $self['id'] = $id;
        $self['actions'] = $actions;
        $self['auditHistory'] = $auditHistory;
        $self['display'] = $display;
        $self['fetch'] = $fetch;
        $self['title'] = $title;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Configuration for custom user actions on cards.
     *
     * @param CardActions|array{baseURLs: list<string>} $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * @param list<CardAuditResponse|array{
     *   actionType: value-of<ActionType>,
     *   applicationID: int,
     *   authSource: value-of<AuthSource>,
     *   changedAt: int,
     *   initiatingUserID: int,
     *   objectTypeID: int,
     * }> $auditHistory
     */
    public function withAuditHistory(array $auditHistory): self
    {
        $self = clone $this;
        $self['auditHistory'] = $auditHistory;

        return $self;
    }

    /**
     * Configuration for displayed info on a card.
     *
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $self = clone $this;
        $self['display'] = $display;

        return $self;
    }

    /**
     * @param PublicCardFetchBody|array{
     *   objectTypes: list<CardObjectTypeBody>, targetURL: string
     * } $fetch
     */
    public function withFetch(PublicCardFetchBody|array $fetch): self
    {
        $self = clone $this;
        $self['fetch'] = $fetch;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
