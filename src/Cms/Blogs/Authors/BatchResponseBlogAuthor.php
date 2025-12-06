<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor\Status;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * Response object for batch operations on blog authors.
 *
 * @phpstan-type BatchResponseBlogAuthorShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<BlogAuthor>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseBlogAuthor implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BatchResponseBlogAuthorShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Time of batch operation completion.
     */
    #[Api]
    public \DateTimeInterface $completedAt;

    /**
     * Results of batch operation.
     *
     * @var list<BlogAuthor> $results
     */
    #[Api(list: BlogAuthor::class)]
    public array $results;

    /**
     * Time of batch operation start.
     */
    #[Api]
    public \DateTimeInterface $startedAt;

    /**
     * Status of batch operation.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * Links associated with batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    /**
     * Time of batch operation request.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseBlogAuthor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseBlogAuthor::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseBlogAuthor)
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
     * @param list<BlogAuthor|array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
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
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['results'] = $results;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;

        null !== $links && $obj['links'] = $links;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    /**
     * Time of batch operation completion.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * Results of batch operation.
     *
     * @param list<BlogAuthor|array{
     *   id: string,
     *   avatar: string,
     *   bio: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   displayName: string,
     *   email: string,
     *   facebook: string,
     *   fullName: string,
     *   language: value-of<Language>,
     *   linkedin: string,
     *   name: string,
     *   slug: string,
     *   translatedFromId: int,
     *   twitter: string,
     *   updated: \DateTimeInterface,
     *   website: string,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Time of batch operation start.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * Status of batch operation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Links associated with batch operation.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj['links'] = $links;

        return $obj;
    }

    /**
     * Time of batch operation request.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }
}
