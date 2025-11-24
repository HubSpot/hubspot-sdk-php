<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\ContactPhone;

enum Type: string
{
    case CELL = 'CELL';

    case HOME = 'HOME';

    case MAIN = 'MAIN';

    case WORK = 'WORK';
}
