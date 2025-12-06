<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\Marketing\Emails\PublicEmail\EmailTemplateMode;
use HubspotSDK\Marketing\Emails\PublicEmail\Language;
use HubspotSDK\Marketing\Emails\PublicEmail\State;
use HubspotSDK\Marketing\Emails\PublicEmail\Type;
use HubspotSDK\NextPage;

/**
 * Response object for collections of marketing emails with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalPublicEmailForwardPagingShape = array{
 *   results: list<PublicEmail>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalPublicEmailForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicEmailForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of emails.
     *
     * @var list<PublicEmail> $results
     */
    #[Api(list: PublicEmail::class)]
    public array $results;

    /**
     * Total number of content emails.
     */
    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalPublicEmailForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicEmailForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicEmailForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIds?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitId?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupId?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyId?: string|null,
     *   folderId?: int|null,
     *   folderIdV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignId?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedById?: string|null,
     *   publishedByName?: string|null,
     *   rssData?: PublicRssEmailDetails|null,
     *   sendOnPublish?: bool|null,
     *   state?: value-of<State>|null,
     *   stats?: EmailStatisticsData|null,
     *   subcategory?: string|null,
     *   subject?: string|null,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|null,
     *   teamsWithAccess?: list<string>|null,
     *   testing?: PublicEmailTestingDetails|null,
     *   to?: PublicEmailToDetails|null,
     *   type?: value-of<Type>|null,
     *   unpublishedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * Collection of emails.
     *
     * @param list<PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIds?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitId?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupId?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyId?: string|null,
     *   folderId?: int|null,
     *   folderIdV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignId?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedById?: string|null,
     *   publishedByName?: string|null,
     *   rssData?: PublicRssEmailDetails|null,
     *   sendOnPublish?: bool|null,
     *   state?: value-of<State>|null,
     *   stats?: EmailStatisticsData|null,
     *   subcategory?: string|null,
     *   subject?: string|null,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|null,
     *   teamsWithAccess?: list<string>|null,
     *   testing?: PublicEmailTestingDetails|null,
     *   to?: PublicEmailToDetails|null,
     *   type?: value-of<Type>|null,
     *   unpublishedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of content emails.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
