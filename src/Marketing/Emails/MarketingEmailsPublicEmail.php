<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Marketing\Emails\MarketingEmailsPublicEmail\Language;
use HubspotSDK\Marketing\Emails\MarketingEmailsPublicEmail\State;
use HubspotSDK\Marketing\Emails\MarketingEmailsPublicEmail\Type;

/**
 * @phpstan-type marketing_emails_public_email = array{
 *   id: string,
 *   content: MarketingEmailsPublicEmailContent,
 *   from: MarketingEmailsPublicEmailFromDetails,
 *   name: string,
 *   sendOnPublish: bool,
 *   state: value-of<State>,
 *   subcategory: string,
 *   subject: string,
 *   to: MarketingEmailsPublicEmailToDetails,
 *   activeDomain?: string,
 *   allEmailCampaignIDs?: list<string>,
 *   archived?: bool,
 *   businessUnitID?: string,
 *   campaign?: string,
 *   campaignName?: string,
 *   campaignUtm?: string,
 *   clonedFrom?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdByID?: string,
 *   deletedAt?: \DateTimeInterface,
 *   emailCampaignGroupID?: string,
 *   feedbackSurveyID?: string,
 *   folderID?: int,
 *   isPublished?: bool,
 *   isTransactional?: bool,
 *   jitterSendTime?: bool,
 *   language?: value-of<Language>,
 *   publishDate?: \DateTimeInterface,
 *   publishedAt?: \DateTimeInterface,
 *   publishedByEmail?: string,
 *   publishedByID?: string,
 *   publishedByName?: string,
 *   rssData?: MarketingEmailsPublicRssEmailDetails,
 *   stats?: MarketingEmailsEmailStatisticsData,
 *   subscriptionDetails?: MarketingEmailsPublicEmailSubscriptionDetails,
 *   testing?: MarketingEmailsPublicEmailTestingDetails,
 *   type?: value-of<Type>,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByID?: string,
 *   webversion?: MarketingEmailsPublicWebversionDetails,
 *   workflowNames?: list<string>,
 * }
 */
final class MarketingEmailsPublicEmail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<marketing_emails_public_email> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public MarketingEmailsPublicEmailContent $content;

    #[Api]
    public MarketingEmailsPublicEmailFromDetails $from;

    #[Api]
    public string $name;

    #[Api]
    public bool $sendOnPublish;

    /** @var value-of<State> $state */
    #[Api(enum: State::class)]
    public string $state;

    #[Api]
    public string $subcategory;

    #[Api]
    public string $subject;

    #[Api]
    public MarketingEmailsPublicEmailToDetails $to;

    #[Api(optional: true)]
    public ?string $activeDomain;

    /** @var list<string>|null $allEmailCampaignIDs */
    #[Api('allEmailCampaignIds', list: 'string', optional: true)]
    public ?array $allEmailCampaignIDs;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('businessUnitId', optional: true)]
    public ?string $businessUnitID;

    #[Api(optional: true)]
    public ?string $campaign;

    #[Api(optional: true)]
    public ?string $campaignName;

    #[Api(optional: true)]
    public ?string $campaignUtm;

    #[Api(optional: true)]
    public ?string $clonedFrom;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('createdById', optional: true)]
    public ?string $createdByID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    #[Api('emailCampaignGroupId', optional: true)]
    public ?string $emailCampaignGroupID;

    #[Api('feedbackSurveyId', optional: true)]
    public ?string $feedbackSurveyID;

    #[Api('folderId', optional: true)]
    public ?int $folderID;

    #[Api(optional: true)]
    public ?bool $isPublished;

    #[Api(optional: true)]
    public ?bool $isTransactional;

    #[Api(optional: true)]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishDate;

    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

    #[Api(optional: true)]
    public ?string $publishedByEmail;

    #[Api('publishedById', optional: true)]
    public ?string $publishedByID;

    #[Api(optional: true)]
    public ?string $publishedByName;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicRssEmailDetails $rssData;

    #[Api(optional: true)]
    public ?MarketingEmailsEmailStatisticsData $stats;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailTestingDetails $testing;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('updatedById', optional: true)]
    public ?string $updatedByID;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicWebversionDetails $webversion;

    /** @var list<string>|null $workflowNames */
    #[Api(list: 'string', optional: true)]
    public ?array $workflowNames;

    /**
     * `new MarketingEmailsPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsPublicEmail::with(
     *   id: ...,
     *   content: ...,
     *   from: ...,
     *   name: ...,
     *   sendOnPublish: ...,
     *   state: ...,
     *   subcategory: ...,
     *   subject: ...,
     *   to: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsPublicEmail)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withFrom(...)
     *   ->withName(...)
     *   ->withSendOnPublish(...)
     *   ->withState(...)
     *   ->withSubcategory(...)
     *   ->withSubject(...)
     *   ->withTo(...)
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
     * @param State|value-of<State> $state
     * @param list<string> $allEmailCampaignIDs
     * @param Language|value-of<Language> $language
     * @param Type|value-of<Type> $type
     * @param list<string> $workflowNames
     */
    public static function with(
        string $id,
        MarketingEmailsPublicEmailContent $content,
        MarketingEmailsPublicEmailFromDetails $from,
        string $name,
        bool $sendOnPublish,
        State|string $state,
        string $subcategory,
        string $subject,
        MarketingEmailsPublicEmailToDetails $to,
        ?string $activeDomain = null,
        ?array $allEmailCampaignIDs = null,
        ?bool $archived = null,
        ?string $businessUnitID = null,
        ?string $campaign = null,
        ?string $campaignName = null,
        ?string $campaignUtm = null,
        ?string $clonedFrom = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdByID = null,
        ?\DateTimeInterface $deletedAt = null,
        ?string $emailCampaignGroupID = null,
        ?string $feedbackSurveyID = null,
        ?int $folderID = null,
        ?bool $isPublished = null,
        ?bool $isTransactional = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?\DateTimeInterface $publishDate = null,
        ?\DateTimeInterface $publishedAt = null,
        ?string $publishedByEmail = null,
        ?string $publishedByID = null,
        ?string $publishedByName = null,
        ?MarketingEmailsPublicRssEmailDetails $rssData = null,
        ?MarketingEmailsEmailStatisticsData $stats = null,
        ?MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?MarketingEmailsPublicEmailTestingDetails $testing = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedByID = null,
        ?MarketingEmailsPublicWebversionDetails $webversion = null,
        ?array $workflowNames = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->content = $content;
        $obj->from = $from;
        $obj->name = $name;
        $obj->sendOnPublish = $sendOnPublish;
        $obj['state'] = $state;
        $obj->subcategory = $subcategory;
        $obj->subject = $subject;
        $obj->to = $to;

        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $allEmailCampaignIDs && $obj->allEmailCampaignIDs = $allEmailCampaignIDs;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $campaignName && $obj->campaignName = $campaignName;
        null !== $campaignUtm && $obj->campaignUtm = $campaignUtm;
        null !== $clonedFrom && $obj->clonedFrom = $clonedFrom;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdByID && $obj->createdByID = $createdByID;
        null !== $deletedAt && $obj->deletedAt = $deletedAt;
        null !== $emailCampaignGroupID && $obj->emailCampaignGroupID = $emailCampaignGroupID;
        null !== $feedbackSurveyID && $obj->feedbackSurveyID = $feedbackSurveyID;
        null !== $folderID && $obj->folderID = $folderID;
        null !== $isPublished && $obj->isPublished = $isPublished;
        null !== $isTransactional && $obj->isTransactional = $isTransactional;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $publishedByEmail && $obj->publishedByEmail = $publishedByEmail;
        null !== $publishedByID && $obj->publishedByID = $publishedByID;
        null !== $publishedByName && $obj->publishedByName = $publishedByName;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $stats && $obj->stats = $stats;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $testing && $obj->testing = $testing;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByID && $obj->updatedByID = $updatedByID;
        null !== $webversion && $obj->webversion = $webversion;
        null !== $workflowNames && $obj->workflowNames = $workflowNames;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withContent(
        MarketingEmailsPublicEmailContent $content
    ): self {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    public function withFrom(MarketingEmailsPublicEmailFromDetails $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj->sendOnPublish = $sendOnPublish;

        return $obj;
    }

    /**
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj->subcategory = $subcategory;

        return $obj;
    }

    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    public function withTo(MarketingEmailsPublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj->activeDomain = $activeDomain;

        return $obj;
    }

    /**
     * @param list<string> $allEmailCampaignIDs
     */
    public function withAllEmailCampaignIDs(array $allEmailCampaignIDs): self
    {
        $obj = clone $this;
        $obj->allEmailCampaignIDs = $allEmailCampaignIDs;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitID = $businessUnitID;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withCampaignName(string $campaignName): self
    {
        $obj = clone $this;
        $obj->campaignName = $campaignName;

        return $obj;
    }

    public function withCampaignUtm(string $campaignUtm): self
    {
        $obj = clone $this;
        $obj->campaignUtm = $campaignUtm;

        return $obj;
    }

    public function withClonedFrom(string $clonedFrom): self
    {
        $obj = clone $this;
        $obj->clonedFrom = $clonedFrom;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdByID = $createdByID;

        return $obj;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    public function withEmailCampaignGroupID(string $emailCampaignGroupID): self
    {
        $obj = clone $this;
        $obj->emailCampaignGroupID = $emailCampaignGroupID;

        return $obj;
    }

    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj->feedbackSurveyID = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderID(int $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withIsPublished(bool $isPublished): self
    {
        $obj = clone $this;
        $obj->isPublished = $isPublished;

        return $obj;
    }

    public function withIsTransactional(bool $isTransactional): self
    {
        $obj = clone $this;
        $obj->isTransactional = $isTransactional;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj->jitterSendTime = $jitterSendTime;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj->publishedAt = $publishedAt;

        return $obj;
    }

    public function withPublishedByEmail(string $publishedByEmail): self
    {
        $obj = clone $this;
        $obj->publishedByEmail = $publishedByEmail;

        return $obj;
    }

    public function withPublishedByID(string $publishedByID): self
    {
        $obj = clone $this;
        $obj->publishedByID = $publishedByID;

        return $obj;
    }

    public function withPublishedByName(string $publishedByName): self
    {
        $obj = clone $this;
        $obj->publishedByName = $publishedByName;

        return $obj;
    }

    public function withRssData(
        MarketingEmailsPublicRssEmailDetails $rssData
    ): self {
        $obj = clone $this;
        $obj->rssData = $rssData;

        return $obj;
    }

    public function withStats(MarketingEmailsEmailStatisticsData $stats): self
    {
        $obj = clone $this;
        $obj->stats = $stats;

        return $obj;
    }

    public function withSubscriptionDetails(
        MarketingEmailsPublicEmailSubscriptionDetails $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj->subscriptionDetails = $subscriptionDetails;

        return $obj;
    }

    public function withTesting(
        MarketingEmailsPublicEmailTestingDetails $testing
    ): self {
        $obj = clone $this;
        $obj->testing = $testing;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedByID = $updatedByID;

        return $obj;
    }

    public function withWebversion(
        MarketingEmailsPublicWebversionDetails $webversion
    ): self {
        $obj = clone $this;
        $obj->webversion = $webversion;

        return $obj;
    }

    /**
     * @param list<string> $workflowNames
     */
    public function withWorkflowNames(array $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
