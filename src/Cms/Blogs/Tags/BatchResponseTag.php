<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag\Status;
use HubspotSDK\Cms\Blogs\Tags\Tag\Language;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Response object for batch operations on blog tags.
 *
 * @phpstan-type BatchResponseTagShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<Tag>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseTag implements BaseModel
{
    /** @use SdkModel<BatchResponseTagShape> */
    use SdkModel;

    /**
     * Time of batch operation completion.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * Results of batch operation.
     *
     * @var list<Tag> $results
     */
    #[Required(list: Tag::class)]
    public array $results;

    /**
     * Time of batch operation start.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * Status of batch operation.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Links associated with batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * Time of batch operation request.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseTag()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseTag::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseTag)
     *   ->withCompletedAt(...)
     *   ->withResults(...)
     *   ->withStartedAt(...)
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
     * @param list<Tag|array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }> $results
     * @param Status|value-of<Status> $status
     * @param array<string,string> $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $links && $self['links'] = $links;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;

        return $self;
    }

    /**
     * Time of batch operation completion.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Results of batch operation.
     *
     * @param list<Tag|array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Time of batch operation start.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Status of batch operation.
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
     * Links associated with batch operation.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * Time of batch operation request.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
