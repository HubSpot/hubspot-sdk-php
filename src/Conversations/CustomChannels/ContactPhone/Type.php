<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\ContactPhone;

enum Type: string
{
    case CELL = 'CELL';

    case MAIN = 'MAIN';

    case HOME = 'HOME';

    case WORK = 'WORK';
}
