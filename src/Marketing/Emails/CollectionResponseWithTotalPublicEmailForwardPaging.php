<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required(list: PublicEmail::class)]
    public array $results;

    /**
     * Total number of content emails.
     */
    #[Required]
    public int $total;

    #[Optional]
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
     *   allEmailCampaignIDs?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitID?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupID?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyID?: string|null,
     *   folderID?: int|null,
     *   folderIDV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignID?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedByID?: string|null,
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
     *   updatedByID?: string|null,
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
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * Collection of emails.
     *
     * @param list<PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIDs?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitID?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupID?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyID?: string|null,
     *   folderID?: int|null,
     *   folderIDV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignID?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedByID?: string|null,
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
     *   updatedByID?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Total number of content emails.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
