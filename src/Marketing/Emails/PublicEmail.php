<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\PublicEmail\EmailTemplateMode;
use HubspotSDK\Marketing\Emails\PublicEmail\Language;
use HubspotSDK\Marketing\Emails\PublicEmail\State;
use HubspotSDK\Marketing\Emails\PublicEmail\Type;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSampleSizeDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSamplingDefault;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbStatus;
use HubspotSDK\Marketing\Emails\PublicEmailTestingDetails\AbSuccessMetric;

/**
 * A marketing email.
 *
 * @phpstan-type PublicEmailShape = array{
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
 * }
 */
final class PublicEmail implements BaseModel
{
    /** @use SdkModel<PublicEmailShape> */
    use SdkModel;

    #[Required]
    public bool $isAb;

    /**
     * The email ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The active domain of the email.
     */
    #[Optional]
    public ?string $activeDomain;

    /**
     * List of emailCampaignIds.
     *
     * @var list<string>|null $allEmailCampaignIds
     */
    #[Optional(list: 'string')]
    public ?array $allEmailCampaignIds;

    /**
     * Determines if the email is archived or not.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?string $businessUnitId;

    /**
     * The campaign GUID on the email.
     */
    #[Optional]
    public ?string $campaign;

    /**
     * The name of the campaign.
     */
    #[Optional]
    public ?string $campaignName;

    #[Optional]
    public ?string $campaignUtm;

    /**
     * The ID of the email this email was cloned from.
     */
    #[Optional]
    public ?string $clonedFrom;

    /**
     * Data structure representing the content of the email.
     */
    #[Optional]
    public ?PublicEmailContent $content;

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The id of the user who created the email.
     */
    #[Optional]
    public ?string $createdById;

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    #[Optional]
    public ?string $emailCampaignGroupId;

    /** @var value-of<EmailTemplateMode>|null $emailTemplateMode */
    #[Optional(enum: EmailTemplateMode::class)]
    public ?string $emailTemplateMode;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Optional]
    public ?string $feedbackSurveyId;

    #[Optional]
    public ?int $folderId;

    #[Optional]
    public ?int $folderIdV2;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Optional]
    public ?PublicEmailFromDetails $from;

    /**
     * Returns the published status of the email. This is read only.
     */
    #[Optional]
    public ?bool $isPublished;

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    #[Optional]
    public ?bool $isTransactional;

    #[Optional]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $previewKey;

    #[Optional]
    public ?string $primaryEmailCampaignId;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Optional]
    public ?\DateTimeInterface $publishDate;

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $publishedAt;

    /**
     * Email of the user who published/sent the email.
     */
    #[Optional]
    public ?string $publishedByEmail;

    /**
     * The ID of the user who published the email.
     */
    #[Optional]
    public ?string $publishedById;

    /**
     * Name of the user who published the email.
     */
    #[Optional]
    public ?string $publishedByName;

    /**
     * RSS related data if it is a blog or rss email.
     */
    #[Optional]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Optional]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    #[Optional]
    public ?EmailStatisticsData $stats;

    /**
     * The email subcategory.
     */
    #[Optional]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Data structure representing the subscription fields of the email.
     */
    #[Optional]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /** @var list<string>|null $teamsWithAccess */
    #[Optional(list: 'string')]
    public ?array $teamsWithAccess;

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    #[Optional]
    public ?PublicEmailTestingDetails $testing;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Optional]
    public ?PublicEmailToDetails $to;

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    #[Optional]
    public ?\DateTimeInterface $unpublishedAt;

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who last updated the email.
     */
    #[Optional]
    public ?string $updatedById;

    /** @var list<string>|null $usersWithAccess */
    #[Optional(list: 'string')]
    public ?array $usersWithAccess;

    #[Optional]
    public ?PublicWebversionDetails $webversion;

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @var list<string>|null $workflowNames
     */
    #[Optional(list: 'string')]
    public ?array $workflowNames;

    /**
     * `new PublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmail::with(isAb: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmail)->withIsAb(...)
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
     * @param list<string> $allEmailCampaignIds
     * @param PublicEmailContent|array{
     *   flexAreas?: array<string,mixed>|null,
     *   plainTextVersion?: string|null,
     *   smartFields?: array<string,mixed>|null,
     *   styleSettings?: PublicEmailStyleSettings|null,
     *   templatePath?: string|null,
     *   themeSettingsValues?: array<string,mixed>|null,
     *   widgetContainers?: array<string,mixed>|null,
     *   widgets?: array<string,mixed>|null,
     * } $content
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     * @param PublicEmailFromDetails|array{
     *   customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
     * } $from
     * @param Language|value-of<Language> $language
     * @param PublicRssEmailDetails|array{
     *   blogEmailType?: string|null,
     *   blogImageMaxWidth?: int|null,
     *   blogLayout?: string|null,
     *   hubspotBlogId?: string|null,
     *   maxEntries?: int|null,
     *   rssEntryTemplate?: string|null,
     *   timing?: array<string,mixed>|null,
     *   url?: string|null,
     *   useHeadlineAsSubject?: bool|null,
     * } $rssData
     * @param State|value-of<State> $state
     * @param EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * } $stats
     * @param PublicEmailSubscriptionDetails|array{
     *   officeLocationId?: string|null,
     *   preferencesGroupId?: string|null,
     *   subscriptionId?: string|null,
     *   subscriptionName?: string|null,
     * } $subscriptionDetails
     * @param list<string> $teamsWithAccess
     * @param PublicEmailTestingDetails|array{
     *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
     *   abSamplingDefault?: value-of<AbSamplingDefault>|null,
     *   abStatus?: value-of<AbStatus>|null,
     *   abSuccessMetric?: value-of<AbSuccessMetric>|null,
     *   abTestPercentage?: int|null,
     *   hoursToWait?: int|null,
     *   isAbVariation?: bool|null,
     *   testId?: string|null,
     * } $testing
     * @param PublicEmailToDetails|array{
     *   contactIds?: PublicEmailRecipients|null,
     *   contactIlsLists?: PublicEmailRecipients|null,
     *   contactLists?: PublicEmailRecipients|null,
     *   limitSendFrequency?: bool|null,
     *   suppressGraymail?: bool|null,
     * } $to
     * @param Type|value-of<Type> $type
     * @param list<string> $usersWithAccess
     * @param PublicWebversionDetails|array{
     *   domain?: string|null,
     *   enabled?: bool|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isPageRedirected?: bool|null,
     *   metaDescription?: string|null,
     *   pageExpiryEnabled?: bool|null,
     *   redirectToPageId?: string|null,
     *   redirectToUrl?: string|null,
     *   slug?: string|null,
     *   title?: string|null,
     *   url?: string|null,
     * } $webversion
     * @param list<string> $workflowNames
     */
    public static function with(
        bool $isAb,
        ?string $id = null,
        ?string $activeDomain = null,
        ?array $allEmailCampaignIds = null,
        ?bool $archived = null,
        ?string $businessUnitId = null,
        ?string $campaign = null,
        ?string $campaignName = null,
        ?string $campaignUtm = null,
        ?string $clonedFrom = null,
        PublicEmailContent|array|null $content = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdById = null,
        ?\DateTimeInterface $deletedAt = null,
        ?string $emailCampaignGroupId = null,
        EmailTemplateMode|string|null $emailTemplateMode = null,
        ?string $feedbackSurveyId = null,
        ?int $folderId = null,
        ?int $folderIdV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $isPublished = null,
        ?bool $isTransactional = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?string $previewKey = null,
        ?string $primaryEmailCampaignId = null,
        ?\DateTimeInterface $publishDate = null,
        ?\DateTimeInterface $publishedAt = null,
        ?string $publishedByEmail = null,
        ?string $publishedById = null,
        ?string $publishedByName = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        EmailStatisticsData|array|null $stats = null,
        ?string $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        ?array $teamsWithAccess = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $unpublishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedById = null,
        ?array $usersWithAccess = null,
        PublicWebversionDetails|array|null $webversion = null,
        ?array $workflowNames = null,
    ): self {
        $obj = new self;

        $obj['isAb'] = $isAb;

        null !== $id && $obj['id'] = $id;
        null !== $activeDomain && $obj['activeDomain'] = $activeDomain;
        null !== $allEmailCampaignIds && $obj['allEmailCampaignIds'] = $allEmailCampaignIds;
        null !== $archived && $obj['archived'] = $archived;
        null !== $businessUnitId && $obj['businessUnitId'] = $businessUnitId;
        null !== $campaign && $obj['campaign'] = $campaign;
        null !== $campaignName && $obj['campaignName'] = $campaignName;
        null !== $campaignUtm && $obj['campaignUtm'] = $campaignUtm;
        null !== $clonedFrom && $obj['clonedFrom'] = $clonedFrom;
        null !== $content && $obj['content'] = $content;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdById && $obj['createdById'] = $createdById;
        null !== $deletedAt && $obj['deletedAt'] = $deletedAt;
        null !== $emailCampaignGroupId && $obj['emailCampaignGroupId'] = $emailCampaignGroupId;
        null !== $emailTemplateMode && $obj['emailTemplateMode'] = $emailTemplateMode;
        null !== $feedbackSurveyId && $obj['feedbackSurveyId'] = $feedbackSurveyId;
        null !== $folderId && $obj['folderId'] = $folderId;
        null !== $folderIdV2 && $obj['folderIdV2'] = $folderIdV2;
        null !== $from && $obj['from'] = $from;
        null !== $isPublished && $obj['isPublished'] = $isPublished;
        null !== $isTransactional && $obj['isTransactional'] = $isTransactional;
        null !== $jitterSendTime && $obj['jitterSendTime'] = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj['name'] = $name;
        null !== $previewKey && $obj['previewKey'] = $previewKey;
        null !== $primaryEmailCampaignId && $obj['primaryEmailCampaignId'] = $primaryEmailCampaignId;
        null !== $publishDate && $obj['publishDate'] = $publishDate;
        null !== $publishedAt && $obj['publishedAt'] = $publishedAt;
        null !== $publishedByEmail && $obj['publishedByEmail'] = $publishedByEmail;
        null !== $publishedById && $obj['publishedById'] = $publishedById;
        null !== $publishedByName && $obj['publishedByName'] = $publishedByName;
        null !== $rssData && $obj['rssData'] = $rssData;
        null !== $sendOnPublish && $obj['sendOnPublish'] = $sendOnPublish;
        null !== $state && $obj['state'] = $state;
        null !== $stats && $obj['stats'] = $stats;
        null !== $subcategory && $obj['subcategory'] = $subcategory;
        null !== $subject && $obj['subject'] = $subject;
        null !== $subscriptionDetails && $obj['subscriptionDetails'] = $subscriptionDetails;
        null !== $teamsWithAccess && $obj['teamsWithAccess'] = $teamsWithAccess;
        null !== $testing && $obj['testing'] = $testing;
        null !== $to && $obj['to'] = $to;
        null !== $type && $obj['type'] = $type;
        null !== $unpublishedAt && $obj['unpublishedAt'] = $unpublishedAt;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedById && $obj['updatedById'] = $updatedById;
        null !== $usersWithAccess && $obj['usersWithAccess'] = $usersWithAccess;
        null !== $webversion && $obj['webversion'] = $webversion;
        null !== $workflowNames && $obj['workflowNames'] = $workflowNames;

        return $obj;
    }

    public function withIsAb(bool $isAb): self
    {
        $obj = clone $this;
        $obj['isAb'] = $isAb;

        return $obj;
    }

    /**
     * The email ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj['activeDomain'] = $activeDomain;

        return $obj;
    }

    /**
     * List of emailCampaignIds.
     *
     * @param list<string> $allEmailCampaignIDs
     */
    public function withAllEmailCampaignIDs(array $allEmailCampaignIDs): self
    {
        $obj = clone $this;
        $obj['allEmailCampaignIds'] = $allEmailCampaignIDs;

        return $obj;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $obj = clone $this;
        $obj['businessUnitId'] = $businessUnitID;

        return $obj;
    }

    /**
     * The campaign GUID on the email.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj['campaign'] = $campaign;

        return $obj;
    }

    /**
     * The name of the campaign.
     */
    public function withCampaignName(string $campaignName): self
    {
        $obj = clone $this;
        $obj['campaignName'] = $campaignName;

        return $obj;
    }

    public function withCampaignUtm(string $campaignUtm): self
    {
        $obj = clone $this;
        $obj['campaignUtm'] = $campaignUtm;

        return $obj;
    }

    /**
     * The ID of the email this email was cloned from.
     */
    public function withClonedFrom(string $clonedFrom): self
    {
        $obj = clone $this;
        $obj['clonedFrom'] = $clonedFrom;

        return $obj;
    }

    /**
     * Data structure representing the content of the email.
     *
     * @param PublicEmailContent|array{
     *   flexAreas?: array<string,mixed>|null,
     *   plainTextVersion?: string|null,
     *   smartFields?: array<string,mixed>|null,
     *   styleSettings?: PublicEmailStyleSettings|null,
     *   templatePath?: string|null,
     *   themeSettingsValues?: array<string,mixed>|null,
     *   widgetContainers?: array<string,mixed>|null,
     *   widgets?: array<string,mixed>|null,
     * } $content
     */
    public function withContent(PublicEmailContent|array $content): self
    {
        $obj = clone $this;
        $obj['content'] = $content;

        return $obj;
    }

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The id of the user who created the email.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj['createdById'] = $createdByID;

        return $obj;
    }

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    public function withEmailCampaignGroupID(string $emailCampaignGroupID): self
    {
        $obj = clone $this;
        $obj['emailCampaignGroupId'] = $emailCampaignGroupID;

        return $obj;
    }

    /**
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     */
    public function withEmailTemplateMode(
        EmailTemplateMode|string $emailTemplateMode
    ): self {
        $obj = clone $this;
        $obj['emailTemplateMode'] = $emailTemplateMode;

        return $obj;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj['feedbackSurveyId'] = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderID(int $folderID): self
    {
        $obj = clone $this;
        $obj['folderId'] = $folderID;

        return $obj;
    }

    public function withFolderIDV2(int $folderIDV2): self
    {
        $obj = clone $this;
        $obj['folderIdV2'] = $folderIDV2;

        return $obj;
    }

    /**
     * Data structure representing the from fields on the email.
     *
     * @param PublicEmailFromDetails|array{
     *   customReplyTo?: string|null, fromName?: string|null, replyTo?: string|null
     * } $from
     */
    public function withFrom(PublicEmailFromDetails|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * Returns the published status of the email. This is read only.
     */
    public function withIsPublished(bool $isPublished): self
    {
        $obj = clone $this;
        $obj['isPublished'] = $isPublished;

        return $obj;
    }

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    public function withIsTransactional(bool $isTransactional): self
    {
        $obj = clone $this;
        $obj['isTransactional'] = $isTransactional;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj['jitterSendTime'] = $jitterSendTime;

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

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withPreviewKey(string $previewKey): self
    {
        $obj = clone $this;
        $obj['previewKey'] = $previewKey;

        return $obj;
    }

    public function withPrimaryEmailCampaignID(
        string $primaryEmailCampaignID
    ): self {
        $obj = clone $this;
        $obj['primaryEmailCampaignId'] = $primaryEmailCampaignID;

        return $obj;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj['publishDate'] = $publishDate;

        return $obj;
    }

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj['publishedAt'] = $publishedAt;

        return $obj;
    }

    /**
     * Email of the user who published/sent the email.
     */
    public function withPublishedByEmail(string $publishedByEmail): self
    {
        $obj = clone $this;
        $obj['publishedByEmail'] = $publishedByEmail;

        return $obj;
    }

    /**
     * The ID of the user who published the email.
     */
    public function withPublishedByID(string $publishedByID): self
    {
        $obj = clone $this;
        $obj['publishedById'] = $publishedByID;

        return $obj;
    }

    /**
     * Name of the user who published the email.
     */
    public function withPublishedByName(string $publishedByName): self
    {
        $obj = clone $this;
        $obj['publishedByName'] = $publishedByName;

        return $obj;
    }

    /**
     * RSS related data if it is a blog or rss email.
     *
     * @param PublicRssEmailDetails|array{
     *   blogEmailType?: string|null,
     *   blogImageMaxWidth?: int|null,
     *   blogLayout?: string|null,
     *   hubspotBlogId?: string|null,
     *   maxEntries?: int|null,
     *   rssEntryTemplate?: string|null,
     *   timing?: array<string,mixed>|null,
     *   url?: string|null,
     *   useHeadlineAsSubject?: bool|null,
     * } $rssData
     */
    public function withRssData(PublicRssEmailDetails|array $rssData): self
    {
        $obj = clone $this;
        $obj['rssData'] = $rssData;

        return $obj;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj['sendOnPublish'] = $sendOnPublish;

        return $obj;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * @param EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * } $stats
     */
    public function withStats(EmailStatisticsData|array $stats): self
    {
        $obj = clone $this;
        $obj['stats'] = $stats;

        return $obj;
    }

    /**
     * The email subcategory.
     */
    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj['subcategory'] = $subcategory;

        return $obj;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj['subject'] = $subject;

        return $obj;
    }

    /**
     * Data structure representing the subscription fields of the email.
     *
     * @param PublicEmailSubscriptionDetails|array{
     *   officeLocationId?: string|null,
     *   preferencesGroupId?: string|null,
     *   subscriptionId?: string|null,
     *   subscriptionName?: string|null,
     * } $subscriptionDetails
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails|array $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj['subscriptionDetails'] = $subscriptionDetails;

        return $obj;
    }

    /**
     * @param list<string> $teamsWithAccess
     */
    public function withTeamsWithAccess(array $teamsWithAccess): self
    {
        $obj = clone $this;
        $obj['teamsWithAccess'] = $teamsWithAccess;

        return $obj;
    }

    /**
     * AB testing related data. This property is only returned for AB type emails.
     *
     * @param PublicEmailTestingDetails|array{
     *   abSampleSizeDefault?: value-of<AbSampleSizeDefault>|null,
     *   abSamplingDefault?: value-of<AbSamplingDefault>|null,
     *   abStatus?: value-of<AbStatus>|null,
     *   abSuccessMetric?: value-of<AbSuccessMetric>|null,
     *   abTestPercentage?: int|null,
     *   hoursToWait?: int|null,
     *   isAbVariation?: bool|null,
     *   testId?: string|null,
     * } $testing
     */
    public function withTesting(PublicEmailTestingDetails|array $testing): self
    {
        $obj = clone $this;
        $obj['testing'] = $testing;

        return $obj;
    }

    /**
     * Data structure representing the to fields of the email.
     *
     * @param PublicEmailToDetails|array{
     *   contactIds?: PublicEmailRecipients|null,
     *   contactIlsLists?: PublicEmailRecipients|null,
     *   contactLists?: PublicEmailRecipients|null,
     *   limitSendFrequency?: bool|null,
     *   suppressGraymail?: bool|null,
     * } $to
     */
    public function withTo(PublicEmailToDetails|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUnpublishedAt(\DateTimeInterface $unpublishedAt): self
    {
        $obj = clone $this;
        $obj['unpublishedAt'] = $unpublishedAt;

        return $obj;
    }

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the user who last updated the email.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj['updatedById'] = $updatedByID;

        return $obj;
    }

    /**
     * @param list<string> $usersWithAccess
     */
    public function withUsersWithAccess(array $usersWithAccess): self
    {
        $obj = clone $this;
        $obj['usersWithAccess'] = $usersWithAccess;

        return $obj;
    }

    /**
     * @param PublicWebversionDetails|array{
     *   domain?: string|null,
     *   enabled?: bool|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isPageRedirected?: bool|null,
     *   metaDescription?: string|null,
     *   pageExpiryEnabled?: bool|null,
     *   redirectToPageId?: string|null,
     *   redirectToUrl?: string|null,
     *   slug?: string|null,
     *   title?: string|null,
     *   url?: string|null,
     * } $webversion
     */
    public function withWebversion(
        PublicWebversionDetails|array $webversion
    ): self {
        $obj = clone $this;
        $obj['webversion'] = $webversion;

        return $obj;
    }

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @param list<string> $workflowNames
     */
    public function withWorkflowNames(array $workflowNames): self
    {
        $obj = clone $this;
        $obj['workflowNames'] = $workflowNames;

        return $obj;
    }
}
