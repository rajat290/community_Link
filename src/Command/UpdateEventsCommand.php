<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;

class UpdateEventsCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $eventsTable = TableRegistry::getTableLocator()->get('Events');

        $today = date('Y-m-d');

        // Ready → Archive (past date)
        $eventsReady = $eventsTable->find()
            ->where(['status' => 'Ready to go', 'event_date <' => $today])
            ->all();

        foreach ($eventsReady as $ev) {
            $ev->status = 'Archive';
            $eventsTable->save($ev);
        }

        // Preparing → Failed (past date)
        $eventsPreparing = $eventsTable->find()
            ->where(['status' => 'Preparing', 'event_date <' => $today])
            ->all();

        foreach ($eventsPreparing as $ev) {
            $ev->status = 'Failed';
            $eventsTable->save($ev);
        }

        $io->out("Events status updated successfully.");
        return Command::SUCCESS;
    }
}
