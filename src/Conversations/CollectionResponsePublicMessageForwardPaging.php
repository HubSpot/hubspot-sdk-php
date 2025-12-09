<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Direction;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\TruncationStatus;
use HubspotSDK\Conversations\ConversationsPublicConversationsMessage\Type;
use HubspotSDK\Conversations\PublicThreadStatusChange\NewStatus;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponsePublicMessageForwardPagingShape = array{
 *   results: list<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange>,
 *   paging?: ForwardPaging|null,
 * }
 */
final class CollectionResponsePublicMessageForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicMessageForwardPagingShape> */
    use SdkModel;

    /**
     * @var list<ConversationsPublicConversationsMessage|PublicComment|PublicWelcomeMessage|PublicAssignmentMessage|PublicThreadStatusChange|PublicThreadInboxChange> $results
     */
    #[Required(list: PublicMessage::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicMessageForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicMessageForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicMessageForwardPaging)->withResults(...)
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
     * @param list<ConversationsPublicConversationsMessage|array{
     *   id: string,
     *   archived: bool,
     *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
     *   channelAccountId: string,
     *   channelId: string,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   direction: value-of<Direction>,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   text: string,
     *   truncationStatus: value-of<TruncationStatus>,
     *   type: value-of<Type>,
     *   inReplyToId?: string|null,
     *   richText?: string|null,
     *   status?: PublicMessageStatus|null,
     *   subject?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicComment|array{
     *   id: string,
     *   archived: bool,
     *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   richText: string,
     *   senders: list<PublicSender>,
     *   text: string,
     *   type: value-of<PublicComment\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicWelcomeMessage|array{
     *   id: string,
     *   archived: bool,
     *   channelAccountId: string,
     *   channelId: string,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   text: string,
     *   type: value-of<PublicWelcomeMessage\Type>,
     *   richText?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicAssignmentMessage|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   type: value-of<PublicAssignmentMessage\Type>,
     *   assignedFrom?: string|null,
     *   assignedTo?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicThreadStatusChange|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   newStatus: value-of<NewStatus>,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   type: value-of<PublicThreadStatusChange\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicThreadInboxChange|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   fromInboxId: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   toInboxId: string,
     *   type: value-of<PublicThreadInboxChange\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<ConversationsPublicConversationsMessage|array{
     *   id: string,
     *   archived: bool,
     *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
     *   channelAccountId: string,
     *   channelId: string,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   direction: value-of<Direction>,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   text: string,
     *   truncationStatus: value-of<TruncationStatus>,
     *   type: value-of<Type>,
     *   inReplyToId?: string|null,
     *   richText?: string|null,
     *   status?: PublicMessageStatus|null,
     *   subject?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicComment|array{
     *   id: string,
     *   archived: bool,
     *   attachments: list<PublicFile|PublicLocation|PublicContact|PublicUnsupportedContent|PublicMessageHeader|PublicQuickReplies|PublicWhatsAppTemplateMetadata|PublicSocialMetadataAttachment>,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   richText: string,
     *   senders: list<PublicSender>,
     *   text: string,
     *   type: value-of<PublicComment\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicWelcomeMessage|array{
     *   id: string,
     *   archived: bool,
     *   channelAccountId: string,
     *   channelId: string,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   text: string,
     *   type: value-of<PublicWelcomeMessage\Type>,
     *   richText?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicAssignmentMessage|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   type: value-of<PublicAssignmentMessage\Type>,
     *   assignedFrom?: string|null,
     *   assignedTo?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicThreadStatusChange|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   newStatus: value-of<NewStatus>,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   type: value-of<PublicThreadStatusChange\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PublicThreadInboxChange|array{
     *   id: string,
     *   archived: bool,
     *   client: PublicClient,
     *   conversationsThreadId: string,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   fromInboxId: string,
     *   recipients: list<PublicRecipient>,
     *   senders: list<PublicSender>,
     *   toInboxId: string,
     *   type: value-of<PublicThreadInboxChange\Type>,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

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
