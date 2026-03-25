<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CardActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\CardActions
 * @phpstan-import-type CardAuditResponseShape from \HubspotSDK\Crm\Extensions\CardsDev\CardAuditResponse
 * @phpstan-import-type CardDisplayBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\CardDisplayBody
 * @phpstan-import-type PublicCardFetchBodyShape from \HubspotSDK\Crm\Extensions\CardsDev\PublicCardFetchBody
 *
 * @phpstan-type PublicCardResponseShape = array{
 *   id: string,
 *   actions: CardActions|CardActionsShape,
 *   auditHistory: list<CardAuditResponse|CardAuditResponseShape>,
 *   display: CardDisplayBody|CardDisplayBodyShape,
 *   fetch: PublicCardFetchBody|PublicCardFetchBodyShape,
 *   title: string,
 *   createdAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PublicCardResponse implements BaseModel
{
    /** @use SdkModel<PublicCardResponseShape> */
    use SdkModel;

    /**
     * The unique id of the card.
     */
    #[Required]
    public string $id;

    #[Required]
    public CardActions $actions;

    /**
     * A list of actions performed on the card, including creation, deletion, and updates.
     *
     * @var list<CardAuditResponse> $auditHistory
     */
    #[Required(list: CardAuditResponse::class)]
    public array $auditHistory;

    #[Required]
    public CardDisplayBody $display;

    #[Required]
    public PublicCardFetchBody $fetch;

    /**
     * The top-level title for this card, displayed to users in the CRM UI.
     */
    #[Required]
    public string $title;

    /**
     * The date and time when the card was created.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The date and time when the card was last updated.
     */
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
     * @param CardActions|CardActionsShape $actions
     * @param list<CardAuditResponse|CardAuditResponseShape> $auditHistory
     * @param CardDisplayBody|CardDisplayBodyShape $display
     * @param PublicCardFetchBody|PublicCardFetchBodyShape $fetch
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

    /**
     * The unique id of the card.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param CardActions|CardActionsShape $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * A list of actions performed on the card, including creation, deletion, and updates.
     *
     * @param list<CardAuditResponse|CardAuditResponseShape> $auditHistory
     */
    public function withAuditHistory(array $auditHistory): self
    {
        $self = clone $this;
        $self['auditHistory'] = $auditHistory;

        return $self;
    }

    /**
     * @param CardDisplayBody|CardDisplayBodyShape $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $self = clone $this;
        $self['display'] = $display;

        return $self;
    }

    /**
     * @param PublicCardFetchBody|PublicCardFetchBodyShape $fetch
     */
    public function withFetch(PublicCardFetchBody|array $fetch): self
    {
        $self = clone $this;
        $self['fetch'] = $fetch;

        return $self;
    }

    /**
     * The top-level title for this card, displayed to users in the CRM UI.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * The date and time when the card was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The date and time when the card was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
