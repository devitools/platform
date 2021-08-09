<?php

declare(strict_types=1);

namespace App\Domains\Main;

use Devitools\Agnostic\Schema;

/**
 * Class Server
 *
 * @package App\Domains\Main
 */
class Server extends Schema
{
    /**
     * The resource associated with the schema.
     *
     * @return string
     */
    public static function resource(): string
    {
        return 'servers';
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return 'main/server';
    }

    /**
     * Build the schema fields and actions.
     *
     * @return void
     */
    public function construct(): void
    {
        $this->addField('name')
            ->validationRequired();

        $this->addField('ip')
            ->validationRequired();

        $this->addField('user')
            ->validationRequired();

        $this->addField('key')
            ->validationRequired();
    }
}
