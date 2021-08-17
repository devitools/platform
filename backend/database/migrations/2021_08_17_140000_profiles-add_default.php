<?php

declare(strict_types=1);

use App\Domains\Admin\Profile;
use Devitools\Database\Migration\TableAlter;
use Devitools\Database\Table;

/**
 * Class ProfilesAddDefault
 */
class ProfilesAddDefault extends TableAlter
{
    /**
     * @return string
     */
    protected function table(): string
    {
        return Profile::resource();
    }

    /**
     * @param Table $table
     *
     * @return void
     */
    protected function onUp(Table $table)
    {
        $table->boolean('default')
            ->default(false);
    }

    /**
     * @param Table $table
     *
     * @return void
     */
    protected function onDown(Table $table)
    {
        $table->dropColumn('default');
    }

}

